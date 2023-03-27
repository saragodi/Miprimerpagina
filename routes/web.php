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

    Route::post('/banners/status/{id}', [
        'uses' => 'BannerController@status',
        'as' => 'banners.status',
    ]);

    //Vacantes
    Route::resource('jobs', JobController::class);

    //Campañas


    //Configuration
    Route::get('/configuration', 'DashboardController@configuration')->name('configuration'); //

    //CONFIGURACIÓN
    Route::get('/configuracion', [
        'uses' => 'DashboardController@admin_settings',
        'as' => 'admin.settings',
    ]);

    Route::get('/configuracion/temas', [
        'uses' => 'DashboardController@settings_look',
        'as' => 'admin.settings_look',
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

    //Catalog
    Route::post('/get-subcategories', [
        'uses' => 'ProductController@fetchSubcategory',
        'as' => 'dynamic.subcategory',
    ]);

    //Públicaciones
    Route::resource('posts', PostController::class);

    // Get Functions
    Route::resource('categories', CategoryController::class); //

    Route::resource('clients', ClientController::class);

    Route::resource('user-rules', UserRuleController::class);

    Route::get('/user-rules/change-status/{id}', [
        'uses' => 'UserRuleController@changeStatus',
        'as' => 'user-rules.status',
    ]);

    //Administration
    Route::get('general-preferences', [
        'uses' => 'IntegrationController@index',
        'as' => 'general.config',
    ]);
    Route::resource('seo', SEOController::class); //
    Route::resource('legals', LegalTextController::class);
    Route::resource('faq', FAQController::class);

    Route::resource('users', UserController::class); //
    Route::get('user/config', 'UserController@config')->name('user.config');  //
    Route::get('user/help', 'DashboardController@help')->name('user.help');  //

    Route::resource('template', MailThemeController::class); //
    Route::resource('mail', MailController::class)->except(['show, create, index']);
    Route::resource('notifications', NotificationController::class)->except(['show']); //

    Route::get('/notifications/all', [
        'uses' => 'NotificationController@all',
        'as' => 'notifications.all',
    ]);

    Route::get('/notifications/all/mark-as-read', [
        'uses' => 'NotificationController@markAsRead',
        'as' => 'notifications.mark.read',
    ]);

    //Country
    //Route::resource('countries', CountryController::class);
    Route::resource('config', StoreConfigController::class);

    // Sección Soporte
    Route::get('support', 'DashboardController@shipping')->name('support.help');

    /* Rutas de Correo */
    Route::post('/resend-order-mail/{order_id}', [
        'uses' => 'NotificationController@resendOrder',
        'as' => 'resend.order.mail',
    ]);

    Route::post('/resend-invoice-mail/{invoice_id}', [
        'uses' => 'NotificationController@resendInvoice',
        'as' => 'resend.invoice.mail',
    ]);

    // Búsqueda
    Route::get('/busqueda-general', [
        'uses' => 'DashboardController@generalSearch',
        'as' => 'back.search.query',
    ]);
});

Route::get('/', [
    'uses' => 'FrontController@index',
    'as' => 'index',
]);

Route::get('/vacantes', [
    'uses' => 'FrontController@jobs',
    'as' => 'jobs',
]);

Route::get('/vacantes/{slug}', [
    'uses' => 'FrontController@job',
    'as' => 'job.detail'
])->where('slug', '[\w\d\-\_]+');

Route::put('apply_job/{id}', [
    'uses' => 'FrontController@applyTo',
    'as' => 'apply.to',
]);


Route::get('legales/{slug}', 'FrontController@legalText')->name('legal.text');
Route::get('preguntas_frecuentes', 'FrontController@faqs')->name('faqs.text');
