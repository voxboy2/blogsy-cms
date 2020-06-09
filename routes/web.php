<?php



use App\Http\Controllers\Blog\PostsController;

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




Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('blog/posts/{post}', [PostsController::class, 'show'])->name('blog.show');
Route::get('blog/categories/{category}', [PostsController::class, 'category'])->name('blog.category');
Route::get('blog/tags/{tag}', [PostsController::class, 'tag'])->name('blog.tag');


// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');



Route::middleware(['auth'])->prefix('admin')->group(function() {

    Route::resource('categories', 'CategoriesController');

    Route::resource('posts', 'PostsController');

    Route::resource('tags', 'TagsController');

    Route::get('/user/profile', 'ProfilesController@index')->name('user.profile');

    Route::get('logout', 'UsersController@logout')->name('logout');


    Route::post('/user/profile/update', 'ProfilesController@update')->name('user.profile.update');

  


    Route::get('trashed-posts', 'PostsController@trashed')->name('trashed-posts.index');
    
    Route::put('restore-posts/{post}', 'PostsController@restore')->name('restore-posts');
});


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function (){
    Route::get('users', 'UsersController@index')->name('users.index');
    Route::get('/user/create', 'UsersController@create')->name('user.create');
    Route::post('/user/store', 'UsersController@store')->name('user.store');
    Route::post('users/make-admin/{id}', 'UsersController@makeAdmin')->name('users.make-admin');
    Route::post('users/not-admin/{id}', 'UsersController@not_Admin')->name('users.not-admin');
    Route::get('/user/delete/{id}', 'UsersController@destroy')->name('user.profile.delete');

    Route::post('/settings/update', 'SettingsController@update')->name('settings.update');
    Route::get('/settings', 'SettingsController@index')->name('settings');


    Route::get('/dashboard', function() {
        return view('admin.dashboard');
    })->name('dashboard');

 



  

});