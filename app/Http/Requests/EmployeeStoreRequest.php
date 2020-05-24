<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class EmployeeStoreRequest extends FormRequest
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
        $validationRule = [
            'firstname' => 'required|min:2|max:50|string',
            'lastname' => 'required|string',
            'company' => 'required',
            'email' => 'required|email|max:100|unique:employees,email', //employee email will be unique. 
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            
        ];
        if(!empty($request->id))
        {
        unset($validationRule['email']);   
        $validationRule['email'] = 'required|email|max:100|unique:employees,email,' . $request->id . ',id';
        }
        return $validationRule;
    }

    public function messages()
    {
        return [
            'firstname.required' => 'Please Enter Your First Name.',
            'firstname.min' => 'The First Name Must Have Minimum of 2 Words.',
            'firstname.max' => 'The First Name Have Maximum of 50 Words.',
            'firstname.string' => 'The First Name Must be of Words Or Characters.',
            'lastname.required' => 'Please Enter Your Last Name.',
            'lastname.string' => 'The Last Name Must be of Words Or Characters.',
            'company.required' => 'Please Select Company.',
            'branding_company_name.required' => 'Please enter company name.',
            'mobile.required' => 'Please Enter Your Mobile Number.',
            'mobile.regex' => 'The Mobile Number Must Be Numeric..',
            'mobile.min' => 'The Maximum Mobile Number will be of 10 digits.',
            'email.required' => 'Please enter email address.',
            'email.email' => 'Please enter valid email address.',
        ];
    }
}
