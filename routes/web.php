<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/basic1', function () {
    return ("helloworld");
});

Route::match(['get','post'], 'multy1',function (){
    return 'multy1';
});



/*//路由参数

//路由参数
Route::get('user/{id?}',function ($id = 3){
    return 'user-'.$id;
});*/
/*Route::get('user/{name?}',function ($name = 'zhoukun'){
    return 'user-name-'.$name;
})->where('name','[A-Za-z]+');*/

//路由群组

Route::group(['prefix' => 'menber'],function (){
    Route::get('/user/center',['as' => 'center', function () {
        return route('center');
    }]);
    Route::any('multy2',function (){
        return 'menber-multy2';
    });
});
 Route::get('/info', 'MemberController@info');
/*Route::get('/info/{id}', ['uses'=>'MenberController@info',
        'as'=>'menberinfo'
    ]);*/
Route::get('test', 'StudentController@test1');
Route::get('query', 'StudentController@query5');
Route::get('orm', 'StudentController@orm2');