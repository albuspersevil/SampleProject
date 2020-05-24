<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CompanyStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
   

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    { 
         $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        
        $validationRule = [
            'company_name' => 'required|max:50',
            'company_email' => 'required|unique:company,company_email',  //Company email will be unique.
            'company_website' => 'required|regex:'.$regex,
            'logo' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ];
        if(!empty($request->id))
        {
        unset($validationRule['company_email']); 
        unset($validationRule['logo']);    
        $validationRule['company_email'] = 'required|email|max:100|unique:company,company_email,' . $request->id . ',id';
        $validationRule['logo'] = 'sometimes|image|mimes:jpeg,jpg,png|max:2048';
        }
        return $validationRule;
    }
     /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'company_email.required' => 'Company Email is required!',
            'company_name.required' => 'Company Name is required!',
            'company_name.max'  => 'Company Name Must not exceed 50 characters.',
            'company_website.regex' => 'Company Url must be valid.',
            'logo.required' => 'Please Select a Company Logo.',
        ];
    }
}
