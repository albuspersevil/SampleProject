<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use App\Http\Requests\CompanyStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        $i=0;
        $userdata=Company::all();
        return view('companyinfo',compact('userdata','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addnewcompany');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyStoreRequest $request)
    {
        $input = array_map('trim', $request->all());
        $company = new Company();
        $company->company_name=ucfirst($input['company_name']);
        $company->company_email=$input['company_email'];
        $company->company_website=$input['company_website'];
        if (request()->has('logo')) 
                {
                    $company->company_logo = request()->logo->store('images', 'public');
                    $img_path = public_path('storage/uploads/') . $company->company_logo;
                    $image = Image::make($request->file('logo')->getRealPath())->resize('200', '200');
                    $image->save();
                }
        if($company->save())
        {
            return redirect()->route('company.index')
                      ->with('success', 'Company Info updated successfully');
        }
        else
        {
            return redirect()->back()->with('message','Something Went Wrong.');   
        }

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Company::find($id);
        return view('editcompanydetails',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyStoreRequest $request, $id)
    {
        $input = array_map('trim', $request->all());
        $company = Company::find($id);
        $company->company_name=ucfirst($input['company_name']);
        $company->company_email=$input['company_email'];
        $company->company_website=$input['company_website'];
        if (!empty($request->logo)) {
                if (Storage::disk('public')->exists($company->company_logo)) {
                    $file = public_path('storage/') . $company->company_logo;
                    unlink($file);
                }
                if (request()->has('logo')) {
                    $company->company_logo = request()->logo->store('images', 'public');
                    $img_path = public_path('storage/uploads/') . $company->company_logo;
                    $image = Image::make($request->file('logo')->getRealPath())->resize('200', '200');
                    $image->save();
                }
            }
        if($company->save())
        {
            return redirect()->route('company.index')
                      ->with('success', 'Company Info updated successfully');
        }
        else
        {
            return redirect()->back()->with('message','Something Went Wrong.');   
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Company::find($id);
        $data->delete();
        return redirect()->route('company.index')
                        ->with('success', 'Company deleted successfully');
    }
}
