<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CandidateCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:100'],
            'email' => ['required', 'max:200', 'email'],
            'phone' => ['required', 'max:20'],
            'years' => ['nullable', 'integer'],
            'job_id' => ['required', 'integer'],
            'skill' => ['nullable']
        ];
        // $table->string("name", 100)->nullable(false);
        // $table->string("email", 200)->unique()->nullable(false);
        // $table->string("phone", 20)->unique()->nullable();
        // $table->integer('years')->nullable();
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response([
            "errors" => $validator->getMessageBag()
        ], 400));
    }
}
