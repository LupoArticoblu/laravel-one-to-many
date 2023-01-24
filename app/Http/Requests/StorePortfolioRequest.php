<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePortfolioRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255|min:3',
            'date' => 'required',
            //la grandezza massima di un immagine in questo caso si misura in bit
            'image' => 'nullable|image|max:64000',
            'text' => 'required',

        ];
    }

    public function messages()
    {
        return[
            'title.required' => 'titolo obbligatorio',
            'title.max' => 'max caratteri :max',
            'title.min' => 'min caratteri :min',
            'date.required' => 'inserisci una data',
            'text.required' => 'testo mancante',
            'image.image' => 'file incorretto',
            'image.max' => 'file troppo grande, massimo 6 Mb'
        ];
    }
}
