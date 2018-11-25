<?php

Route::group(['middleware' => 'web', 'prefix' => 'user', 'namespace' => 'Modules\User\Http\Controllers'], function()
{
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login')->name('login');
    Route::post('logout', 'LoginController@logout')->name('logout');
    Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'RegisterController@register');
    Route::get('password-request', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password-request', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password-reset', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password-reset', 'ResetPasswordController@reset')->name('password.update');
});
