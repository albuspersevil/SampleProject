<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeStoreRequest;
use Illuminate\Http\Request;
use App\Employee;
use App\Company;

class EmployeeController extends Controller
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
        $empdata=Employee::all();
        return view('employeeinfo',compact('empdata','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company=Company::all();
        return view('addnewemployee',compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response 
     */
    public function store(EmployeeStoreRequest $request)
    {  
        $input = array_map('trim', $request->all());
        $compny = explode(' ', $input['company']);
        $company = new Employee();
        $company->firstname=ucfirst($input['firstname']);
        $company->lastname=ucfirst($input['lastname']);
        $company->email=$input['email'];
        $company->phone=$input['mobile'];
        $company->company_id=$compny['0']; // for comapany id
        $company->company_name=$compny['1']; // for company name
        if($company->save())
        {
            return redirect()->route('employee.index')
                      ->with('success', 'New Employee Created successfully.');
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
        $employee = Employee::find($id);   
        return view('showcompanyinfo',compact('employee')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $company=Company::all();
        $employee = Employee::find($id);
        return view('editemployee', compact('employee','company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeStoreRequest $request, $id)
    {
        $input = array_map('trim', $request->all());
        $compny = explode(' ', $input['company']);
        $company = Employee::find($id);
        $company->firstname=ucfirst($input['firstname']);
        $company->lastname=ucfirst($input['lastname']);
        $company->email=$input['email'];
        $company->phone=$input['mobile'];
        $company->company_id=$compny['0']; // for comapany id
        $company->company_name=$compny['1']; // for company name
        if($company->save())
        {
            return redirect()->route('employee.index')
                      ->with('success', 'Employee Info Updated successfully.');
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
        $data = Employee::find($id);
        $data->delete();
        return redirect()->route('employee.index')
                        ->with('success', 'Employee deleted successfully');
    }
}
