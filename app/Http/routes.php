<?php

Route::get('bar', function (Bar $bar){
    dd($bar);
});


//Esto va afectar a todos las funciones del controller
//Route::get('index', ['middleware' => 'auth', 'uses' => 'PagesController@index']);

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('/about', 'PagesController@about');

Route::get('/contact','PagesController@contact');

Route::resource('/articles','ArticlesController');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('admin', ['middleware' => 'manager', function (){

    return 'this page may only be viewed by managers';
}]);

Route::get('foo', 'FooController@foo');

Route::get('tags/{tags}', 'TagsController@show');