<?php

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'can:admin_access']], function () {
    //Dashboard
    Route::get('/', 'DashboardController@index')->name('dashboard');
    // Settings
    Route::get('/change-color', [
        'uses' => 'DashboardController@changeColor',
        'as' => 'change.color',
    ]);

    Route::get('/fix-nav', [
        'uses' => 'DashboardController@fixNav',
        'as' => 'change.nav',
    ]);

    //Banners
    Route::resource('banners', BannerController::class);

    Route::get('/banners/status/{id}', [
        'uses' => 'BannerController@status',
        'as' => 'banner.status',
    ]);

    //Vacantes
    Route::resource('jobs', JobController::class);

    Route::get('/vacante/cambiar-status/{id}', [
        'uses' => 'JobController@status',
        'as' => 'jobs.status',
    ]);

    Route::get('/vacantes/borrador', [
        'uses' => 'JobController@archives',
        'as' => 'jobs.archive',
    ]);
    //Campañas
    Route::resource('campaings', CampaingController::class);

    Route::get('/campaing/cambiar-status/{id}', [
        'uses' => 'CampaingController@status',
        'as' => 'campaing.status',
    ]);

    //Configuration
    Route::get('/configuration', 'DashboardController@configuration')->name('configuration'); //

    //CONFIGURACIÓN
    Route::get('/configuracion', [
        'uses' => 'DashboardController@admin_settings',
        'as' => 'admin.settings',
    ]);

    Route::get('/configuracion/seo', [
        'uses' => 'DashboardController@seo',
        'as' => 'admin.seos',
    ]);

    Route::get('/configuracion/usuarios_y_permisos', [
        'uses' => 'DashboardController@users',
        'as' => 'admin.users',
    ]);

    Route::put('/configuracion/usuarios_y_permisos/crear_usuario', [
        'uses' => 'DashboardController@create_u',
        'as' => 'admin.users.create'
    ]);

    Route::delete('/configuracion/usuarios/{id}', [
        'uses' => 'DashboardController@user_d',
        'as' => 'admin.user.delete'
    ]);



    Route::get('/configuracion/sistema', [
        'uses' => 'DashboardController@systemConfig',
        'as' => 'admin.system',
    ]);

    Route::get('/configuracion/notificaciones', [
        'uses' => 'DashboardController@alerts',
        'as' => 'admin.notificactions'
    ]);

    Route::get('/configuracion/notificaciones/{name}/status', [
        'uses' => 'DashboardController@alertStatus',
        'as' => 'admin.notificactions.status',
    ]);


    Route::put('/configuracion/actualizar-password/{id}', [
        'uses' => 'UserController@updatePassword',
        'as' => 'user.update.pass',
    ]);

    Route::put('/configuracion/actualizar-cuenta/{id}', [
        'uses' => 'UserController@update',
        'as' => 'user.update.account'
    ]);

    Route::put('/configuracion/usuario/{id}/eliminar', [
        'uses' => 'UserController@destroy',
        'as' => 'delete.user'
    ]);


    //Públicaciones
    Route::resource('posts', PostController::class);


    //Reseñas
    Route::resource('comments', CommentController::class);

    // Get Functions
    Route::resource('categories', CategoryController::class); //

    Route::resource('user-rules', UserRuleController::class);

    Route::get('/user-rules/change-status/{id}', [
        'uses' => 'UserRuleController@changeStatus',
        'as' => 'user-rules.status',
    ]);

    //Administration
    Route::resource('seo', SEOController::class); //
    Route::resource('legals', LegalTextController::class);
    Route::resource('faq', FAQController::class);

    Route::resource('users', UserController::class); //
    Route::get('user/config', 'UserController@config')->name('user.config');  //
    Route::get('user/help', 'DashboardController@help')->name('user.help');  //


});

Route::get('/', [
    'uses' => 'FrontController@index',
    'as' => 'index',
]);

Route::get('/vacantes', [
    'uses' => 'FrontController@jobs',
    'as' => 'jobs.all',
]);

Route::get('/vacante/{slug}', [
    'uses' => 'FrontController@job',
    'as' => 'job.detail'
])->where('slug', '[\w\d\-\_]+');

Route::post('apply_job/{id}', [
    'uses' => 'FrontController@applyTo',
    'as' => 'apply.to',
]);


Route::get('legales/{slug}', 'FrontController@legalText')->name('legal.text');
Route::get('preguntas_frecuentes', 'FrontController@faqs')->name('faqs.text');
