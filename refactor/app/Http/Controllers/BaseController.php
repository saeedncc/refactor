<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Gate;

class BaseController extends Controller
{
	/**
    * @var ModelRepository
    */
	protected $repository;
	
	protected $success='success';	
	protected $fail='fail';


	protected function isauthorize($action,$model,$message=''){
		
		$response = Gate::inspect($action, $model);
		
		if (!$response->allowed()) {
			$this->responseError($message);
		} 
	}


	protected function responseError($data){
		throw new HttpResponseException(response()->json(array('state'=>$this->fail,'result'=>$data))); 
	}
	

	protected function responseOk($data){
		return response()->json(array('state'=>$this->success,'result'=>$data));
	}
	
}
