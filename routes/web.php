<?php
use App\Exports\UsersExport;
use App\Exports\ModelsExport;
use  Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

$param = "asdfasdfas";
$param = Crypt::encrypt($param);
Route::get('admin/move_or_copy', 'PageController@move_or_copy')->name('move_or_copy');
Route::get('admin/invoice/{id}', 'CommentsController@invoice');
Route::get('admin/invoice{id}', 'CommentsController@printPDF');

Route::get('admin/userscreate', 'UsersController@show')->name('user.create');
Route::get('admin/usersstoress', 'UsersController@store')->name('user.store');
Route::get('admin/usersedit/{id}', 'UsersController@edit');

Route::get('admin/userseditasd{id}', 'UsersController@destroy');

Route::get('admin/usersedited/{id}', 'UsersController@update');


Route::get('admin/index', 'ModelsController@index')->name('index');
Route::get('admin/count', 'ModelsController@count')->name('count');
Route::get('admin/datatable', 'ModelsController@datatable')->name('datatable');

Route::get('admin/makepages', 'PageController@makepage')->name('make');
Route::get('admin/makepagea', 'PageController@pages')->name('pages');

Route::get('admin/allpages', 'PageController@allpages')->name('allpages');

Route::get('admin/makepage', 'ProjectController@index')->name('projects');
Route::get('admin/makepageasdfas', 'ProjectController@store')->name('project.store');
Route::get('admin/projects/{id}','ProjectController@projects')->name('projects.pro');
Route::get('admin/projectAll','ProjectController@StoreAll')->name('projectsAll');

Route::post('admin/edited{id}', 'ModelsController@update')->name('update');
Route::get('admin/users', 'UsersController@index')->name('users');


Route::resource('admin', 'ModelsController');





Route::get('admin/makepageasdf/{id}', 'ModelsController@destroy');
Route::get('admin/makepageasdasdf/{id}', 'ProjectController@destroy');
Route::get('admin/model/storeNote', 'ProjectController@storeNote')->name('storeNote');

Route::get('admin/model', 'CommentsController@ratings')->name('ratings');
Route::post('posts', 'PageController@ratingRate')->name('rating.rate');

Route::get('admin/pages/commented', 'CommentsController@store')->name('comments');



Route::get('MthfckWrldnvrgvp123{id}2131ntbsht', 'CommentsController@detail')->name('detail');
Route::get('admin/modelview/{id}', 'CommentsController@detailforadmin')->name('detailforadmin');

Route::get('admin/detailpages/{id}', 'PageController@detailpage')->name('detailpages');


Route::get('admin/edited/{id}', 'ModelsController@deleteImage')->name('deleteImage');
Route::get('admin/deleteVid/{id}', 'ModelsController@deleteVideo')->name('deleteVideo');

Route::get('Imntthsshtdugt{id}dugtmmssg', 'PageController@page')->name('admin.pages');
Route::get('admin/datatable/search', 'ModelsController@search')->name('search');
Route::get('admin/datatable/advancedsearch', 'ModelsController@advancedSearch')->name('advancedSearch');
Route::delete('admin/makepage/{id}', 'PageController@delete');

Auth::routes();
Route::get('/logout', function(){
	Auth::logout();
	return redirect('login');
})->name('logout');


Route::get('/download',function(){
	return Excel::download(new ModelsExport, 'models.xlsx');
})->name('export');

