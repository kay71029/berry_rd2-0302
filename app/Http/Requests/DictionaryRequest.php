<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;

class DictionaryRequest extends Request
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
        return
            [
                'lang'=>'required|exists:languages',
                'word' =>'required|unique:dictionaries',
                'founder' =>'required',
            ];
    }

    public function response(array $errors)
    {
        return response()->json(['result' => true, 'ret' => null, 'message' => $errors, 'error' => 422], 422);
    }
}