<?php
use App\Exports\UsersExport;
use App\Exports\ModelsExport;
use  Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
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
$param = "asdfasdfas";
$param = Crypt::encrypt($param);
Route::get('/', function () {
    return view('admin.images');
});

Route::get('admin/index', 'ModelsController@index')->name('index');
Route::get('admin/count', 'ModelsController@count')->name('count');
Route::get('admin/datatable', 'ModelsController@datatable')->name('datatable');

Route::get('admin/makepages', 'PageController@makepage')->name('make');
Route::get('admin/makepagea', 'PageController@pages')->name('pages');


Route::get('admin/makepage', 'ProjectController@index')->name('projects');
Route::get('admin/makepageasdfas', 'ProjectController@store')->name('store');
Route::get('admin/projects/{id}','ProjectController@projects')->name('projects.pro');
Route::get('admin/projectAll','ProjectController@StoreAll')->name('projectsAll');

Route::post('admin/edited{id}', 'ModelsController@update')->name('update');
Route::resource('admin', 'ModelsController');

Route::get('admin/makepageasdf/{id}', 'ModelsController@destroy');
Route::get('admin/makepageasdasdf/{id}', 'ProjectController@destroy');
Route::get('admin/model/storeNote', 'ProjectController@storeNote')->name('storeNote');

Route::get('admin/model', 'CommentsController@ratings')->name('ratings');
Route::post('posts', 'PageController@ratingRate')->name('rating.rate');

Route::get('admin/pages/commented', 'CommentsController@store')->name('comments');
Route::get('admin/model/{id}', 'CommentsController@detail')->name('detail');

Route::get('admin/edited/{id}', 'ModelsController@deleteImage')->name('deleteImage');
Route::get('admin/deleteVid/{id}', 'ModelsController@deleteVideo')->name('deleteVideo');

Route::get('admin/pages/{id}', 'PageController@page')->name('admin.pages');
Route::get('admin/datatable/search', 'ModelsController@search')->name('search');
Route::get('admin/datatable/advancedsearch', 'ModelsController@advancedSearch')->name('advancedSearch');
Route::delete('admin/makepage/{id}', 'PageController@delete');

Auth::routes();
Route::get('/logout', function(){
	Auth::logout();
	return redirect('login');
})->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/download',function(){
	return Excel::download(new ModelsExport, 'models.xlsx');
})->name('export');

