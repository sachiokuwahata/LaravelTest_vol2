<?php
// use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {   
//     if (Auth::guard($guard)->check() && $guard === 'user') {
//         return redirect(RouteServiceProvider::HOME);
//     } elseif (Auth::guard($guard)->check() && $guard === 'company') {
//         return redirect(RouteServiceProvider::COMPANY_HOME);
//     }
//     return view('welcome'); 

// });
Route::get('/', 'WelcomeController@index');

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('User')->prefix('user')->name('user.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => false,
        'verify'   => false
    ]);

    // ログイン認証後
    Route::middleware('auth:user')->group(function () {
    // Route::middleware('guest:web')->group(function () {

        // TOPページ
        Route::resource('home', 'HomeController', ['only' => 'index']);

    });
});


Route::namespace('Company')->prefix('company')->name('company.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => false,
        'verify'   => false
    ]);

    // Route::get('/interviewerShow/{id}', 'IterviewerContactController@interviewerShow')->name('company.interviewerShow');
    // Route::post('/sendMessage', 'ChatController@sendMessage')->name('sendMessage');


    // ログイン認証後
    Route::middleware('auth:company')->group(function () {

        // TOPページ
        // Route::resource('home', 'HomeController', ['only' => 'index']);
        Route::get('/home', 'HomeController@index')->name('home');


        Route::get('/interviewerShow/{id}', 'IterviewerContactController@interviewerShow')->name('company.interviewerShow');
        Route::post('/firstMessage', 'ChatController@firstMessage')->name('firstMessage');
        // Route::get('/chat/show/{roomid}', 'ChatController@show')->name('show');

        Route::group(['middleware' => ['ChatroomAccess']], function() {
            Route::get('/chat/show/{roomid}', 'ChatController@show')->name('show');
            //ここに実行したい処理を記述
          });

          Route::get('/messageList', 'mypageContactController@messageList')->name('messageList');
          Route::get('/profile', 'mypageContactController@profile')->name('profile');
          Route::get('/profileEdit', 'mypageContactController@profileEdit')->name('profileEdit');
          Route::post('/profileUpdate', 'mypageContactController@profileUpdate')->name('profileUpdate');

          Route::get('/contract/show', 'ContractController@show')->name('contract.show');
          Route::post('/contract/presentation', 'ContractController@presentation')->name('contract.presentation');

          Route::get('/getaddress', 'ReferFriendController@getaddress')->name('getaddress');
        //   Route::get('/contactFriend/{hashid}', 'ReferFriendController@contactFriend')->name('contactFriend');
          Route::get('/contactFriend/{id}', 'ReferFriendController@contactFriend')->name('contactFriend');



    });


});

