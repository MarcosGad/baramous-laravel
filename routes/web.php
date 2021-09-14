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


/*
Route::group(['prefix' => 'admin'], function () 
{
    Route::get('/hagz', 'hagzController@create')->name('admin.hagz');
});
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
})->name('index');


//Auth::routes();
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//hagz
Route::get('/hagz', 'hagzController@create')->name('hagz');
Route::post('/hagz', 'hagzController@store')->name('hagz');
Route::get('admin/mangehagz', 'managehagzController@index')->name('admin.mangehagz');

Route::get('admin/showhagz', 'managehagzController@show')->name('admin.showhagz');
Route::get('admin/showhagztwo', 'managehagzController@showTwo')->name('admin.showhagztwo');

Route::get('admin/showhagz/notshowadmin/{id}', 'managehagzController@notshowadmin')->name('admin.showhagz.notshowadmin');
Route::get('admin/showhagztwo/notshowadmintwo/{id}', 'managehagzController@notshowadmintwo')->name('admin.showhagztwo.notshowadmintwo');

Route::get('admin/editstate/{id}', 'managehagzController@edit')->name('admin.editstate');
Route::get('admin/editstatetwo/{id}', 'managehagzController@editTwo')->name('admin.editstatetwo');

Route::post('admin/editstate/update/{id}', 'managehagzController@update')->name('editstate.update');
Route::post('admin/editstatetwo/updateTwo/{id}', 'managehagzController@updateTwo')->name('editstatetwo.updateTwo');


//profile
Route::get('/profile', 'profileController@index')->name('profile');
Route::post('/profile', 'profileController@update')->name('profile');


//users 
Route::get('admin/users', 'usersController@index')->name('admin.users');
Route::get('admin/users/delete/{id}', 'usersController@destroy')->name('admin.users.delete');

//dayof
Route::get('admin/dayof', 'dayofController@index')->name('admin.dayof');
Route::post('admin/dayof', 'dayofController@store')->name('admin.dayof');

//viewhagz
Route::get('/viewhagz', 'viewhagzController@index')->name('viewhagz');
Route::get('/viewhagz/notshow/{id}', 'viewhagzController@notshow')->name('viewhagz.notshow');


//hsystem
Route::get('/hsystem', 'hsystemController@index')->name('hsystem');
Route::get('admin/hsystem', 'hsystemController@show')->name('admin.hsystem');
Route::get('admin/createhsystem', 'hsystemController@create')->name('admin.createhsystem');
Route::post('admin/createhsystem', 'hsystemController@store')->name('admin.createhsystem');
Route::get('admin/edithsystem/{id}', 'hsystemController@edit')->name('admin.edithsystem');
Route::post('admin/edithsystem/update/{id}', 'hsystemController@update')->name('edithsystem.update');
Route::get('admin/hsystem/delete/{id}', 'hsystemController@destroy')->name('admin.hsystem.delete');

//post
Route::get('/post', 'postController@index')->name('post');
Route::get('admin/post', 'postController@show')->name('admin.post');
Route::get('admin/createpost', 'postController@create')->name('admin.createpost');
Route::post('admin/createpost', 'postController@store')->name('admin.createpost');
Route::get('admin/editpost/{id}', 'postController@edit')->name('admin.editpost');
Route::post('admin/editpost/update/{id}', 'postController@update')->name('editpost.update');
Route::get('admin/post/delete/{id}', 'postController@destroy')->name('admin.post.delete');

//pagestart
Route::get('/pagestart', 'pagestartController@index')->name('pagestart');
Route::get('admin/pagestart', 'pagestartController@show')->name('admin.pagestart');
Route::get('admin/createpagestart', 'pagestartController@create')->name('admin.createpagestart');
Route::post('admin/createpagestart', 'pagestartController@store')->name('admin.createpagestart');
Route::get('admin/editpagestart/{id}', 'pagestartController@edit')->name('admin.editpagestart');
Route::post('admin/editpagestart/update/{id}', 'pagestartController@update')->name('editpagestart.update');
Route::get('admin/pagestart/delete/{id}', 'pagestartController@destroy')->name('admin.pagestart.delete');

//tablehgz
Route::get('/tablehgz', 'tablehgzController@index')->name('tablehgz');
Route::get('admin/tablehgz', 'tablehgzController@show')->name('admin.tablehgz');
Route::get('admin/createtablehgz', 'tablehgzController@create')->name('admin.createtablehgz');
Route::post('admin/createtablehgz', 'tablehgzController@store')->name('admin.createtablehgz');
Route::get('admin/edittablehgz/{id}', 'tablehgzController@edit')->name('admin.edittablehgz');
Route::post('admin/edittablehgz/update/{id}', 'tablehgzController@update')->name('edittablehgz.update');
Route::get('admin/tablehgz/delete/{id}', 'tablehgzController@destroy')->name('admin.tablehgz.delete');

//aya
Route::get('admin/aya', 'ayaController@index')->name('admin.aya');
Route::get('admin/createaya', 'ayaController@create')->name('admin.createaya');
Route::post('admin/createaya', 'ayaController@store')->name('admin.createaya');
Route::get('admin/edithaya/{id}', 'ayaController@edit')->name('admin.editaya');
Route::post('admin/editaya/update/{id}', 'ayaController@update')->name('editaya.update');
Route::get('admin/aya/delete/{id}', 'ayaController@destroy')->name('admin.aya.delete');

//ayastart
Route::get('admin/ayastart', 'ayastartController@index')->name('admin.ayastart');
Route::get('admin/createayastart', 'ayastartController@create')->name('admin.createayastart');
Route::post('admin/createayastart', 'ayastartController@store')->name('admin.createayastart');
Route::get('admin/edithayastart/{id}', 'ayastartController@edit')->name('admin.editayastart');
Route::post('admin/editayastart/update/{id}', 'ayastartController@update')->name('editayastart.update');
Route::get('admin/ayastart/delete/{id}', 'ayastartController@destroy')->name('admin.ayastart.delete');

//alarm
Route::get('admin/alarm', 'alarmController@index')->name('admin.alarm');
Route::get('admin/createalarm', 'alarmController@create')->name('admin.createalarm');
Route::post('admin/createalarm', 'alarmController@store')->name('admin.createalarm');
Route::get('admin/editalarm/{id}', 'alarmController@edit')->name('admin.editalarm');
Route::post('admin/editalarm/update/{id}', 'alarmController@update')->name('editalarm.update');
Route::get('admin/alarm/delete/{id}', 'alarmController@destroy')->name('admin.alarm.delete');

//alarmstart
Route::get('admin/alarmstart', 'alarmstartController@index')->name('admin.alarmstart');
Route::get('admin/createalarmstart', 'alarmstartController@create')->name('admin.createalarmstart');
Route::post('admin/createalarmstart', 'alarmstartController@store')->name('admin.createalarmstart');
Route::get('admin/editalarmstart/{id}', 'alarmstartController@edit')->name('admin.editalarmstart');
Route::post('admin/editalarmstart/update/{id}', 'alarmstartController@update')->name('editalarmstart.update');
Route::get('admin/alarmstart/delete/{id}', 'alarmstartController@destroy')->name('admin.alarmstart.delete');

//daterange
Route::get('admin/daterange', 'DateRangeController@index')->name('admin.daterange');
Route::post('admin/daterange/fetch_data', 'DateRangeController@fetch_data')->name('admin.daterange.fetch_data');
Route::post('admin/daterange/postdata', 'DateRangeController@postdata')->name('daterange.postdata');



//homepage
Route::get('admin/homepage', 'homepageController@show')->name('admin.homepage');
Route::get('admin/createhomepage', 'homepageController@create')->name('admin.createhomepage');
Route::post('admin/createhomepage', 'homepageController@store')->name('admin.createhomepage');
Route::get('admin/edithomepage/{id}', 'homepageController@edit')->name('admin.edithomepage');
Route::post('admin/edithomepage/update/{id}', 'homepageController@update')->name('edithomepage.update');
Route::get('admin/homepage/delete/{id}', 'homepageController@destroy')->name('admin.homepage.delete');

//massages
Route::get('/massages', 'massageController@index')->name('massages');
Route::get('/massages/delete/{id}', 'massageController@destroy')->name('massages.delete');
Route::get('/showmassages/{id}', 'massageController@edit')->name('showmassages');

//note
Route::get('/note', 'noteController@create')->name('note');
Route::post('/note', 'noteController@store')->name('note');
Route::get('admin/note', 'managehagzController@note')->name('admin.note');
Route::get('admin/note/delete/{id}', 'managehagzController@destroy')->name('admin.note.delete');

Route::get('admin/createmassage/{email}', 'managehagzController@createmassage')->name('admin.createmassage');
Route::post('admin/createmassage/postmassage/{id}', 'managehagzController@postmassage')->name('createmassage.postmassage');

//downlooods
Route::get('/downlooods', 'homepageController@index')->name('downlooods');

Route::get('admin/downlooods', 'downlooodController@show')->name('admin.downlooods');
Route::get('admin/createdownlooods', 'downlooodController@create')->name('admin.createdownlooods');
Route::post('admin/createdownlooods', 'downlooodController@store')->name('admin.createdownlooods');
Route::get('admin/editdownlooods/{id}', 'downlooodController@edit')->name('admin.editdownlooods');
Route::post('admin/editdownlooods/update/{id}', 'downlooodController@update')->name('editdownlooods.update');
Route::get('admin/downlooods/delete/{id}', 'downlooodController@destroy')->name('admin.downlooods.delete');

//all user massage
Route::get('admin/allUserMas', 'managehagzController@allUserMas')->name('admin.allUserMas');
Route::post('admin/allUserMas', 'managehagzController@postAllUserMas')->name('admin.allUserMas');




    //route for query results
    Route::get('/results', function () {
        $user = baramous\User::where('name', 'like' ,  '%' . request('search') . '%' )->get();
        return view('admin.results')
        ->with('users' , $user ) 
        ->with('name' ,  'Result : '. request('search') )
        ->with('query' , request('search') )   ;
        
    }) ;


