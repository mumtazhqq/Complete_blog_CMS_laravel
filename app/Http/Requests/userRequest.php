<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name'=>'required|',
            'email'=>'bail|required|email',
            'github'=>'required',
            'twitter'=>'required',
            'current_password' => 'required',
            'password'=>'required|confirmed|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9]).*$/',
            'imagepath'=>'image',
            'description'=>'required|max:200',



        ];
    }

    public function messages()
    {
        return [

            'name.required'=> __('Please enter your name '),
            'email.required'=> __('Please enter your email '),
            'github.required'=> __('Please enter your github link '),
            'twitter.required'=> __('Please enter your twitter link '),
            'password.required'=> __('Please enter your new password '),
            'password_confirmation.required'=> __('password does not match '),
            'description.required'=> __('Please enter a description about you '),
            'password.min'=>__('password must be equal or bigger than 6 characters '),
            'password.regex'=>__('please to enter a strong password (at least 6 of a-z or A-Z and number )'),
            'current_password.required' => 'Please enter your current password',

        ];
    }
}
