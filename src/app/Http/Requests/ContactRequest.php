<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'last_name' => 'required',
        'first_name' => 'required',
        'gender' => 'required|in:男性,女性,その他',
        'email' => 'required|email',
        'phone' => ['required', 'regex:/^[0-9]{10,11}$/'],
        'address' => 'required',
        'category_id' => 'required|exists:categories,id',
        'content' => 'required|max:120',
    ];
    }

    public function messages()
{
    return [
        'last_name.required' => '姓を入力してください',
        'first_name.required' => '名を入力してください',
        'gender.required' => '性別を選択してください',
        'email.required' => 'メールアドレスを入力してください',
        'email.email' => 'メールアドレスはメール形式で入力してください',
        'phone.required' => '電話番号を入力してください',
        'phone.regex' => '電話番号は5桁までの数字で入力してください',
        'address.required' => '住所を入力してください',
        'category_id.required' => 'お問い合わせの種類を選択してください',
        'content.required' => 'お問い合わせ内容を入力してください',
        'content.max' => 'お問合せ内容は120文字以内で入力してください',
    ];
}
}