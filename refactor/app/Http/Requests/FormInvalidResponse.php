<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

trait FormInvalidResponse
{
	protected function failedValidation(Validator $validator) { 
        throw new HttpResponseException(response()->json(array('state'=>'fail','result'=>$validator->errors()->all()), 200)); 
	}

}
