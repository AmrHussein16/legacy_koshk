<?php

/**
 * Koshk Routes - START
 */

Route::get('/', 'StartController@index')->name('start');

Route::group(
    ['namespace' => 'Koshk'],
    function () {

        // Start Koshk refactored routes
        Route::get('home', 'Player\HomeController@index')->name('home');

        // Communities ...
        Route::group(['prefix' => 'community', 'as' => 'community', 'controller' => 'CommunityController'], function () {
            Route::get('/', 'index');
            Route::get('{comm_name}', 'community')->name('show');
            Route::post('{comm_name}', array(
                'as' => 'community/{comm_name}',
                'uses' => 'follow'
            ));
            Route::get('{comm_name}/{activity_name}', 'activity')->name('activity');
        });

        // Producers ...
        Route::group(['prefix' => 'producer', 'as' => 'producer', 'controller' => 'ProducerController'], function () {
            Route::get('/', 'index');
            Route::get('{prod_name}', 'producer')->name('show');
            Route::post('{prod_name}', array(
                'as' => '{prod_name}',
                'uses' => 'follow'
            ));
            Route::get('{prod_name}/{activity_name}', 'activity')->name('activity');
            Route::post('{prod_name}/{activity_name}', 'submit')->name('activity.submit');
        });

        // Comic Book ...
        Route::get('comicbook', 'Player\PlayerController@comicbook')->name('comicbook');

        // End Koshk refactored routes

        Route::get('/submit', 'FormSubmitController@index');
        Route::post('/submit', 'FormSubmitController@showUploadFile');
        Route::get('story', 'Player\PlayerController@story')->name('story');
        Route::post('entry', 'Player\PlayerController@index');
        Route::post('facebook/land', 'FBController@handleCanvasCallback');

        Route::get('submissions', 'SubmissionController@index')->name('submissions');

        // Artists ...
        Route::get('artist', 'ArtistController@index')->name('artist');;
        Route::get('artist/{artist_name}', 'ArtistController@artist');
        //Settings: create a new setting
        Route::post('artist/{artist_name}', array(
            'as' => 'artist/{artist_name}',
            'uses' => 'ArtistController@follow'
        ));

        Route::post('community/{comm_name}/{activity_name}', 'CommunityController@submit');
        Route::get('community/{comm_name}/{activity_name}/{challenge_name}', 'CommunityController@challenge');

        Route::get('producer/{prod_name}/{activity_name}/{challenge_name}', 'ProducerController@challenge');
    }
);

// FIXME:: fix this
Route::get('/insi', 'InsiController@index')->name("main");
Route::get('/minor', 'InsiController@minor')->name("minor");
Route::get('active-users', 'ActiveUsersController@index')->name('active-users');
//Route::post('facebook/land', 'Auth\SocialAuthController@handleProviderCallback');


Route::get('test', 'StartController@test')->name('test');
Route::get('acstart', 'StartController@acstart')->name('acstart');


/**
 * Koshk Routes - END
 */

/**
 * Authentication
 */
Route::get('login', 'Auth\LoginController@show')->name('auth.login');
Route::post('login', 'Auth\LoginController@login')->name('auth.doLogin');
Route::get('logout', 'Auth\LoginController@logout')->name('auth.logout');

Route::group(['middleware' => ['registration', 'guest']], function () {
    Route::get('register', 'Auth\RegisterController@show')->name('auth.register');
    Route::post('register', 'Auth\RegisterController@register')->name('auth.doRegister');
});

Route::emailVerification();

Route::group(['middleware' => ['password-reset', 'guest']], function () {
    Route::resetPassword();
});

/**
 * Two-Factor Authentication
 */
Route::group(['middleware' => 'two-factor'], function () {
    Route::get('auth/two-factor-authentication', 'Auth\TwoFactorTokenController@show')->name('auth.token');
    Route::post('auth/two-factor-authentication', 'Auth\TwoFactorTokenController@update')->name('auth.token.validate');
});

/**
 * Social Login
 */
Route::get('auth/{provider}/login', 'Auth\SocialAuthController@redirectToProvider')->name('social.login');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

/**
 * Impersonate Routes
 */
Route::group(['middleware' => 'auth'], function () {
    Route::impersonate();
});


/**
 * Installation
 */

Route::group(['prefix' => 'install'], function () {
    Route::get('/', 'InstallController@index')->name('install.start');
    Route::get('requirements', 'InstallController@requirements')->name('install.requirements');
    Route::get('permissions', 'InstallController@permissions')->name('install.permissions');
    Route::get('database', 'InstallController@databaseInfo')->name('install.database');
    Route::get('start-installation', 'InstallController@installation')->name('install.installation');
    Route::post('start-installation', 'InstallController@installation')->name('install.installation');
    Route::post('install-app', 'InstallController@install')->name('install.install');
    Route::get('complete', 'InstallController@complete')->name('install.complete');
    Route::get('error', 'InstallController@error')->name('install.error');
});
