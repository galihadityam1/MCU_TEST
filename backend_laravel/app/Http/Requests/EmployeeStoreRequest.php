<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
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
        if (request()->isMethod('post')) {
            return [
                'name'=> 'required|string|max:258',
                'position'=> 'required|string',
            ];
        } else {
            return [
                'name'=> 'required|string|max:258',
                'position'=> 'required|string',
            ];
        }
    }

    public function message()
    {
        if (request()->isMethod('post')) {
            return [
                'name.required'=> 'Name is required!',
                'position.required'=> 'Position is required!',
            ];
        } else {
            return [
                'name.required'=> 'Name is required!',
                'position.required'=> 'Position is required!',
            ];
        }
    }
}
