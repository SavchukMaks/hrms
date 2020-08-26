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


Route::get('/', ['uses' => 'Dashboard\CountController@count'])->middleware(['auth', 'isCustomer']);
Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'Dashboard\CountController@count'])->middleware(['auth']);

Route::group(['middleware'=>['auth'], 'prefix'=>'vacancy'], function (){

    Route::get('/add', ['as' => 'page_cr', 'uses' => 'Vacancy\CRUDController@create']);
    Route::post('/save', ['as' => 'page_create', 'uses' => 'Vacancy\CRUDController@save']);
    Route::get('/list/{sort?}', ['as' => 'vacancy_list', 'uses' => 'Vacancy\CRUDController@list']);

    Route::get('/search', ['as' => 'vacancy_search_autocomplete', 'uses' => 'Vacancy\SearchController@autocompleteSearch']);
    Route::get('/search_tags', ['as' => 'vacancy_search_tags', 'uses' => 'Vacancy\CRUDController@searchTags']);
    Route::get('/view/{id}', ['as' => 'vacancy_view', 'uses' => 'Vacancy\CRUDController@view']);
    Route::get('/edit/{id}', ['as' => 'vacancy_edit', 'uses' => 'Vacancy\CRUDController@edit']);
    Route::get('/updates_remotely/{id}', ['as' => 'vacancy_updates_remotely', 'uses' => 'Vacancy\CRUDController@updatesRemotely']);
    Route::get('/updates_category/{id}', ['as' => 'vacancy_updates_category', 'uses' => 'Vacancy\CRUDController@updatesCategory']);
    Route::get('/updates_type/{id}', ['as' => 'vacancy_updates_type', 'uses' => 'Vacancy\CRUDController@updatesType']);
    Route::put('/update',['as' => 'vacancy_update', 'uses' => 'Vacancy\AjaxEditController@update']);
    Route::put('/update/location',['as' => 'vacancy_update_location', 'uses' => 'Vacancy\AjaxEditController@updateLocation']);
    Route::put('/update/type',['as' => 'vacancy_update_type', 'uses' => 'Vacancy\AjaxEditController@updateType']);

    Route::get('/list/{id}', ['as' => 'vacancy_list_category', 'uses' => 'Vacancy\CRUDController@listCategory']);
    Route::post('/categories/delete', ['as' => 'vacancy_categories_delete', 'uses' => 'Vacancy\CategoriesCRUDController@delete']);
    Route::get('/categories', ['as' => 'vacancy_categories', 'uses' => 'Vacancy\CategoriesCRUDController@view']);
    Route::post('/categories/add', ['as' => 'vacancy_categories_add', 'uses' => 'Vacancy\CategoriesCRUDController@add']);
    Route::post('/categories/edit',['as' => 'vacancy_categories_edit', 'uses' => 'Vacancy\CategoriesCRUDController@edit']);

    Route::get('/search', ['as' => 'vacancy_search_autocomplete', 'uses' => 'Vacancy\SearchController@autocompleteSearch']);

    Route::post('/list/candidates', ['as' => 'get_candidates', 'uses' => 'Vacancy\CRUDController@listCandidatesToVacancies']);
    Route::get('/search/vacancy', ['as' => 'vacancy_search', 'uses' => 'Vacancy\SearchController@search']);
    Route::post('/create',['as' => 'vacancy_add', 'uses' => 'Vacancy\CRUDController@save']);
    Route::get('/search/city', ['as' => 'city_search_autocomplete', 'uses' => 'City\SearchController@search']);
    Route::get('/search/candidate/types', ['as' => 'candidate_search_autocomplete', 'uses' => 'DictCandidateType\CandidateTypeController@search']);
    Route::get('/id{uniqueId}',['as' => 'page_id_vacancy', 'uses' => 'Vacancy\CRUDController@show']);

    Route::get('/edit', function () {
        return view('pages.vacancies-edit');
    });

    Route::get('/archive', function () {
        return view('pages.vacancies-archive');
    });

    Route::get('/welcome-messages',['as' => 'welcome_message', 'uses' => 'Vacancy\WelcomeMessageController@list']);
    Route::get('/welcome-messages',['as' => 'welcome_message_popup', 'uses' => 'Vacancy\WelcomeMessageCRUDController@list']);
    Route::post('/welcome-messages',['as' => 'welcome_message_delete', 'uses' => 'Vacancy\WelcomeMessageCRUDController@delete']);
    Route::post('/welcome-messages/search',['as' => 'searchCandidate', 'uses' => 'Vacancy\WelcomeMessageCRUDController@search']);
    Route::get('/welcome-messages/edit/{id}',['as' => 'welcome_message_edit', 'uses' => 'Vacancy\WelcomeMessageCRUDController@create']);
    Route::post('/welcome-messages/edit',['as' => 'welcome_message_edits', 'uses' => 'Vacancy\WelcomeMessageCRUDController@edit']);
    Route::get('/welcome-messages/view/{id}',['as' => 'welcome_message_view', 'uses' => 'Vacancy\WelcomeMessageCRUDController@view']);
    Route::post('/welcome-messages/save',['as' => 'welcome_message_save', 'uses' => 'Vacancy\WelcomeMessageCRUDController@save']);
    Route::get('/test-tasks/list',['as' => 'test_task_list', 'uses' => 'Vacancy\TestTaskCRUDController@list']);
    Route::get('/test-tasks/add',['as' => 'test_task_add', 'uses' => 'Vacancy\TestTaskCRUDController@add']);
    Route::get('/test-tasks/create',['as' => 'test_task_create', 'uses' => 'Vacancy\TestTaskCRUDController@newTask']);
    Route::post('/test-tasks/list/search',['as' => 'test_task_search', 'uses' => 'Vacancy\TestTaskCRUDController@search']);
    Route::get('/test-tasks/view/{id}',['as' => 'test_task_view', 'uses' => 'Vacancy\TestTaskCRUDController@view'] );
    Route::get('/test-tasks/edit/{id}',['as' => 'test_task_edit_by_id', 'uses' => 'Vacancy\TestTaskCRUDController@create']);
    Route::post('/test-tasks/update/{id}',['as' => 'test_task_update_by_id', 'uses' => 'Vacancy\TestTaskCRUDController@update']);
    Route::post('/test-tasks/edit',['as' => 'test_task_edit', 'uses' => 'Vacancy\TestTaskCRUDController@edit']);
    Route::get('/test-tasks/delete/{id?}',['as' => 'test_task_delete', 'uses' => 'Vacancy\TestTaskCRUDController@delete']);
});

Route::group(['middleware'=>['auth'], 'prefix'=>'candidate'], function (){

    Route::post('/photo/save',['as' => 'upload_photo_candidate', 'uses' => 'Candidate\PhotoController@save']);
    Route::get('/add', ['as' => 'page_candidates', 'uses' => 'Candidate\CRUDController@create']);
    Route::post('/add', ['as' => 'page_add_candidates', 'uses' => 'Candidate\CRUDController@create']);
    Route::get('/experience/add/{id}', ['as' => 'experience_add_candidates', 'uses' => 'Candidate\CRUDController@experienceCreate']);
    Route::get('/experience/delete/{id}', ['as' => 'experience_delete_candidates', 'uses' => 'Candidate\CRUDController@experienceDelete']);
    Route::get('/experience/edit/{id}', ['as' => 'experience_edit_page_candidates', 'uses' => 'Candidate\CRUDController@experienceEditPage']);
    Route::post('/experience/edit/{id}', ['as' => 'experience_edit_candidates', 'uses' => 'Candidate\CRUDController@experienceEdit']);
    Route::post('/save', ['as' => 'save_candidate', 'uses' => 'Candidate\CRUDController@save']);
    Route::get('/list/{sort?}', ['as' => 'candidate_list' , 'uses' => 'Candidate\CRUDController@list']);
    Route::get('/search', ['as' => 'candidate_search_autocomplete', 'uses' => 'Candidate\SearchController@searchAutocomplete']);
    Route::get('/search/candidate', ['as' => 'candidate_search', 'uses' => 'Candidate\SearchController@search']);
    Route::get('/edit/{id?}', ['as' => 'edit_candidate', 'uses' => 'Candidate\CRUDController@edit']);
    Route::post('/photo/update',['as' => 'update_photo_candidate', 'uses' => 'Candidate\PhotoController@update']);
    Route::get('/photo/edit',['as' => 'edit_photo_candidate', 'uses' => 'Candidate\PhotoController@edit']);
    Route::put('/update',['as' => 'update_candidate', 'uses' => 'Candidate\AjaxEditController@update']);
    Route::put('/update/location',['as' => 'update_candidate_location', 'uses' => 'Candidate\AjaxEditController@updateLocation']);
    Route::put('/edit/link',['as' => 'edit_link', 'uses' => 'Candidate\AjaxEditController@editLink']);
    Route::put('/update/skills',['as' => 'update_candidate_skills', 'uses' => 'Candidate\AjaxEditController@updateSkills']);
    Route::delete('/delete/skills',['as' => 'delete_candidate_skills', 'uses' => 'Candidate\AjaxEditController@deleteSkills']);
    Route::post('/edit/file',['as' => 'edit_file', 'uses' => 'Candidate\AjaxEditController@editFile']);
    Route::get('/view/{id}', ['as' => 'get_view_candidate', 'uses' => 'Candidate\CRUDController@view']);
    Route::delete('/delete/file',['as' => 'delete_candidate_file', 'uses' => 'Candidate\AjaxEditController@deleteFile']);

    Route::get('/delete/{id}', ['as' => 'delete_candidate', 'uses' => 'Candidate\CRUDController@delete']);

    Route::get('/type/list', ['as' => 'type_list', 'uses' => 'Candidate\TypeController@list']);
    Route::get('/type/edit/{id}', ['as' => 'type_edit', 'uses' => 'Candidate\TypeController@edit']);
    Route::post('/type/update/{id}', ['as' => 'type_update', 'uses' => 'Candidate\TypeController@update']);
    Route::post('/type/create', ['as' => 'type_create', 'uses' => 'Candidate\TypeController@create']);
    Route::get('/type/delete/{id}', ['as' => 'type_delete', 'uses' => 'Candidate\TypeController@delete']);
    Route::get('/type/add', ['as' => 'type_add', 'uses' => 'Candidate\TypeController@add']);

    Route::get('/messages', function () {
        return view('pages.message-list');
    });
});

Route::group(['middleware'=>['auth'], 'prefix'=>'company'], function (){

    Route::get('/profile', function () {
        return view('pages.company-profile');
    });

    Route::get('/subscription', function () {
        return view('pages.company-subscription');
    });

    Route::get('/history', function () {
        return view('pages.company-history');
    });

});

Route::group(['prefix'=>'email'], function (){

    Route::get('/write', function () {
        return view('pages.email-write');
    });

    Route::get('/history', function () {
        return view('pages.email-history');
    });

});

Route::group(['prefix'=>'interview'], function (){

    Route::get('/list/{year?}/{month?}', ['as' => 'interview_list', 'uses' => 'Interview\CRUDController@list']);
    Route::get('/create', ['as' => 'interview_add', 'uses' => 'Interview\CRUDController@add']);
    Route::get('/save', ['as' => 'interview_save', 'uses' => 'Interview\CRUDController@save']);
    Route::get('/month', ['as' => 'interview_month', 'uses' => 'Interview\CRUDController@month']);
    Route::get('/day', ['as' => 'interview_day', 'uses' => 'Interview\CRUDController@day']);
    Route::get('/delete/{id}', ['as' => 'delete_interview', 'uses' => 'Interview\CRUDController@delete']);

//    Route::get('/calendar', function () {
//        return view('pages.interview-calendar');
//    });

//    Route::get('/create', function () {
//        return view('pages.interview-create');
//    });

});

Route::group(['middleware'=>['auth'], 'prefix'=>'user/profile'], function (){

    Route::get('/edit/{id?}', ['as' => 'edit', 'uses' => 'UserProfile\CRUDController@edit']);
    Route::put('/update/location',['as' => 'update_location', 'uses' => 'UserProfile\AjaxEditController@updateLocation']);
    Route::put('/update',['as' => 'update', 'uses' => 'UserProfile\AjaxEditController@update']);
});

Route::group(['middleware'=>['auth'],'prefix' => 'clients'],function () {

    Route::get('/list',['as'=>'list','uses' =>'Clients\CRUDController@list']);
    Route::get('/add', ['as' => 'client_add', 'uses' => 'Clients\CRUDController@add']);
    Route::post('/add', ['as' => 'client_redirect', 'uses' => 'Clients\CRUDController@redirect']);
    Route::post('/save', ['as' => 'client_create', 'uses' => 'Clients\CRUDController@create']);
});

Route::group(['middleware' => ['auth'], 'prefix' => 'customer'], function () {

    Route::get('/list/vacancys', ['as' => 'customer_list_vacancys', 'uses' => 'Customer\CRUDController@listVacancys']);
    Route::post('/list/vacancys/data', ['as' => 'customer_list_vacancys_popups', 'uses' => 'Customer\CRUDController@customerList']);
    Route::get('/search', ['as' => 'search', 'uses' => 'Customer\CRUDController@search']);

});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/user/logout', 'Auth\LoginController@logoutUser')->name('user_logout');
Route::get('/user-password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('user_password_reset');
Route::post('/user-password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password_email');