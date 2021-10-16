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
            'name' => 'required|string|max:16|alpha',
            'email' => 'required|string|email',
            'message' => 'required|max:500|alpha_num',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前を入力して下さい。',
            'name.max' => '名前は16文字以内で入力して下さい。',
            'name.alpha' => '名前に不正な文字が含まれています。',

            'email.required' => 'メールアドレスを入力して下さい。',
            //'email.distinct' => 'メールアドレスが重複しています。',
            'email.email' => 'メールアドレスの書式が正しくありません。',
            //'email.unique' => 'そのメールアドレスは既に登録されています。',

            'message.required' => 'メッセージを入力して下さい。',
            'message.max' => 'メッセージは500文字以内で入力して下さい。',
            'message.alpha_num' => 'メッセージに不正な文字が含まれています。',

            'phone_number.phone_number' => '電話番号は数字で入力して下さい。',
            'birthday.date' => '誕生日はyyyy/mm/ddで入力して下さい。',
        ];
    }
}
