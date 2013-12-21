<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function() {

    // 最新の記事5件を取得する
    return View::make('hello')->
            with("blogs", Blog::select('title')->get(5));
});

Route::get('login', function () {
    if (Auth::check())
        return Redirect::to("blog");
    return View::make("login");
});

Route::get("logout", function() {
    Auth::logout();
    return Redirect::to("/");
});

Route::post('login', function () {
    if (Auth::attempt(array('email' => Input::get("email"), 'password' => Input::get("password")), true))
    {
        return Redirect::to("blog");
    }
    return Redirect::to("login");
});

Route::get('register', function()
{
    return View::make('user.register');
});

Route::post('register', function()
{
    if (Auth::check())
        return Redirect::to("blog");

    $rules = array(
        'name' => 'required',
        'password' => 'required|min:8',
        'email' => 'required|email|unique:users'
    );
    $message = array(
        'name.required' => "ユーザ名を入力してください",
        "password.required" => "パスワードを入力してください",
        "password.min" => "パスワードは8文字以上記入してください",
        "email.required" => "E-Mailアドレスは必須",
        "email.email" => "E-Mailアドレスは、半角英数で記入してくだし",
        "email.unique" => "他のメールアドレスを指定してください。メールアドレスは既に登録されています。"
    );
 
    $validator = Validator::make(Input::all(), $rules, $message);
 
    if ($validator->fails()) {
        return Redirect::to('register')->withErrors($validator);
    }

    // 作成
    $user = new User();
    $user->name = Input::get("name");
    $user->password = Hash::make(Input::get("password"));
    $user->email = Input::get("email");
    $user->save();
    login::login($user);

    return Redirect::to("/");
});

Route::group(array('before'=>'auth'), function() {
    Route::any("blog", "BlogController@index");
    Route::get("user", function(){});
});




