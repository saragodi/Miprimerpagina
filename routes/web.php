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



    Route::get('/mensajes-actualizaciones', [
        'uses' => 'DashboardController@messages',
        'as' => 'update.messages',
    ]);

    Route::resource('banners', 'BannerController');

    Route::post('/banners/status/{id}', [
        'uses' => 'BannerController@status',
        'as' => 'banners.status',
    ]);

    Route::resource('popups', PopupController::class);

    Route::post('/popups/status/{id}', [
        'uses' => 'PopupController@status',
        'as' => 'popups.status',
    ]);

    //Configuration
    Route::get('/configuration', 'DashboardController@configuration')->name('configuration'); //

    //Catalog
    Route::post('/get-subcategories', [
        'uses' => 'ProductController@fetchSubcategory',
        'as' => 'dynamic.subcategory',
    ]);

    //Proyectos
    Route::resource('projects', ProjectController::class);

    Route::post('/projects/status/{id}', [
        'uses' => 'ProjectController@status',
        'as' => 'projects.status',
    ]);

    Route::post('project/new-image', [
        'uses' => 'ProjectController@storeImage',
        'as' => 'image.store',
    ]);

    Route::post('project/main-image', [
        'uses' => 'ProjectController@mainImage',
        'as' => 'main.image.update'
    ]);

    Route::post('project/update-image/{id}', [
        'uses' => 'ProjectController@updateImage',
        'as' => 'image.update',
    ]);

    Route::delete('project/delete-image/{id}', [
        'uses' => 'ProjectController@destroyImage',
        'as' => 'image.destroy',
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

    Route::get('clientsquery', [
        'uses' => 'ClientController@query',
        'as' => 'clients.search',
    ]);

    Route::resource('newsletter', NewsletterController::class); //
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



Route::get('sobre_nosotros', [
    'uses' => 'FrontController@about',
    'as' => 'about',
]);

//Proyectos
Route::get('/proyectos/{slug}', [
    'uses' => 'FrontController@detail',
    'as' => 'detail',
])->where('slug', '[\w\d\-\_]+');

Route::get('/proyectos', [
    'uses' => 'FrontController@projects',
    'as' => 'allProjects',
]);



//Blog
Route::get('/publicacion/{slug}', [
    'uses' => 'FrontController@detailPost',
    'as' => 'postDetail'
])->where('slug', '[\w\d\-\_]+');

Route::get('/publicaciones', [
    'uses' => 'FrontController@posts',
    'as' => 'allPost',
]);

Route::get('/publicaciones/{category_slug}', [
    'uses' => 'FrontController@category',
    'as' => 'category',
]);


/* Newsletter */
Route::post('registro-newsletter', 'FrontController@newsletter')->name('newsletter_front.store');


/* Search Functions */
Route::get('/busqueda-general', [
    'uses' => 'SearchController@query',
    'as' => 'search.query',
]);


Route::get('legales/{slug}', 'FrontController@legalText')->name('legal.text');
Route::get('preguntas_frecuentes', 'FrontController@faqs')->name('faqs.text');
