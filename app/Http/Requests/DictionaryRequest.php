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
                'lang'=>'required',
                'word' =>'required|unique:dictionaries',
                'founder' =>'required',
            ];
    }

    public function response(array $errors)
    {
        return response()->json(['message'=>$errors,'code'=>422],422);
    }
}