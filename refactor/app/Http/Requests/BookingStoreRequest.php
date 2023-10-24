<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class BookingStoreRequest extends FormRequest
{
	use FormInvalidResponse;

	
	public function rules()
    {
		
			$rules=[
				'from_language_id'=>'required|string',
				'job_for'=>'required|array',
			];
		
		    if ($this->filled('immediate')  &&  $this->immediate== 'no') {
				
				$rules['due_date']='nullable|date';
				$rules['due_time']='nullable|integer';
				$rules['due_time']='nullable|integer';
				$rules['duration']='nullable|integer';
            
			}else {
				
				$rules['duration']='required|integer';
				
            }

		return 	$rules;
    }
	

	protected function prepareForValidation()
	{
		$merges=[
			'from_language_id' => e($this->from_language_id),
			'customer_phone_type' => $this->has('customer_phone_type') ? 'yes' : 'no',
			'customer_physical_type' => $this->has('customer_physical_type') ? 'yes' : 'no',
		];
		
		
		 if ($this->filled('immediate')  &&  $this->immediate== 'no') {
			 
			$merges['due'] = Carbon::now()->addMinute(5)->format('Y-m-d H:i:s');
			$merges['immediate'] = 'yes';
			$merges['customer_phone_type'] = 'yes';
			

		} else {
			$due = $this->due_date . " " . $this->due_time;
			$due_carbon = Carbon::createFromFormat('m/d/Y H:i', $due);

			$merges['due'] = $due_carbon->format('Y-m-d H:i:s');
			
		}
		
		
		$this->merge($merges);
	}
	
	
	
	public function withValidator($validator)
	{
		$validator->after(function ($validator) {
			if (!$this->has('customer_phone_type') && $this->has('customer_physical_type')) {
				$validator->errors()->add('field', trans('validation.select'));
			}
			
		});
	}
	
	public function messages()
	{
		return [
			'from_language_id.required' => trans('validation.need'),
			'due_date.required' =>  trans('validation.need'),
			'due_time.required' =>  trans('validation.need'),
			'duration.required' =>  trans('validation.need'),
			'customer_phone_type.required' =>  trans('validation.select'),
			'customer_physical_type.required' =>  trans('validation.select'),
		];
	}
	
	
}
