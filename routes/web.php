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
    return view('backend.home.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// down code

Route::group(['namespace'=> 'Admin','as'=>'admin.','prefix'=>'admin'],function(){

  
      // Route::post('/logout', 'AdminController@logout')->name('logout');
      // Route::get('/home','AdminController@index')->name('home');

      Route::get('/site/identity', 'AdminController@viewsiteidentity')->name('update.site.identity');
      Route::post('/update/header/site-logo', 'AdminController@updateheadersitelogo')->name('update.header.site-logo');
      Route::post('/update/footer/site-logo', 'AdminController@updatefootersitelogo')->name('update.footer.site-logo');
      Route::post('/update/footer/breadcrumb-background', 'AdminController@updateBreadcrumbBackgroundImage')
                                            ->name('update.breadcrumb-background');


      Route::get('/basic/setting', 'AdminController@basicsetting')->name('update.basic.setting');
      Route::post('/basic/setting', 'AdminController@updateBasicSetting');

      Route::get('/update/site-contact', 'AdminController@viewsitecontact')->name('update.site-contact');
      Route::post('/update/site-contact', 'AdminController@updateSiteContact');

      Route::get('/update/site-seo', 'AdminController@viewsiteseo')->name('update.site-seo');
      Route::post('/update/site-seo', 'AdminController@updateSiteSeo');

      Route::get('/site/social-link', 'AdminController@viewsitesociallink')->name('update.site.social-link');
      Route::post('/site/social-link', 'AdminController@updateSiteSocialLink');


      Route::get('/site/smtp/setting', 'AdminController@viewsitesmtpsetting')->name('update.site.smtp-setting');
      Route::post('/site/smtp/setting', 'AdminController@updateSiteSMTPSetting');
  
      Route::get('/site/cache/setting', 'AdminController@viewsitecachesetting')->name('update.site.cache-setting');
      Route::post('/site/cache/setting', 'AdminController@updateSiteCacheSetting');

      Route::resource('team-member','TeamMemberController');
      Route::resource('testimonial','TestimonialController');
      Route::resource('question-answer','QuestionAnswerController');
      
      Route::resource('category','CategoryController');
      Route::get('category/{slug}/type','categorycontroller@index')->name('category.index');
      Route::get('category/{slug}/create','categorycontroller@create')->name('category.create');
      Route::get('category/{id}/{slug}/edit','categorycontroller@edit')->name('category.edit');

      // Route::resource('post-type','PostTypeController');
      Route::resource('blog','BlogController'); 
});