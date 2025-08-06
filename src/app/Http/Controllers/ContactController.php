<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function show(Contact $contact)
{
    return response()->json($contact);
}
public function destroy(Contact $contact)
    {
        $contact->delete();
        return back()->with('success', '削除しました');
    }

    public function input()
    {
        $categories = Category::all();
        return view('contact.input', compact('categories'));
    }

    // 確認画面の表示
    public function confirm(Request $request)
    {
        $validated = $request->validate([
            'last_name'     => 'required|string',
            'first_name'    => 'required|string',
            'gender'        => 'required|in:男性,女性,その他',
            'email'         => 'required|email',
            'phone'         => 'required|numeric',
            'address'       => 'required|string',
            'building'      => 'nullable|string',
            'category_id'   => 'required|exists:categories,id',
            'content'       => 'required|string|max:120',
        ], [
            'last_name.required' => '姓を入力してください',
            'first_name.required' => '名を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'phone.required' => '電話番号を入力してください',
            'phone.numeric' => '電話番号は5桁までの数字で入力してください',
            'address.required' => '住所を入力してください',
            'category_id.required' => 'お問い合わせの種類を選択してください',
            'category_id.exists' => '正しいお問い合わせの種類を選択してください',
            'content.required' => 'お問い合わせ内容を入力してください',
            'content.max' => 'お問合せ内容は120文字以内で入力してください',
        ]);

        // カテゴリ名を取得（確認画面表示用）
        $categoryName = Category::find($validated['category_id'])->name;

        return view('contact.confirm', [
            'inputs' => $validated,
            'categoryName' => $categoryName,
        ]);
    }

    // 送信処理（保存）＋完了画面表示
    public function send(Request $request)
    {
        if ($request->input('action') === 'back') {
            return redirect()->route('contact.input')->withInput();
        }

        Contact::create($request->except('action'));

        return view('contact.thanks');
    }
}
