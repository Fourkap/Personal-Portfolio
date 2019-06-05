<?php
/**
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
 * php version 7.2.10
 *
 * @category Route
 * @package  Routes
 * @author   Tao BERQUER <tao.berquer@gmail.com>
 * @author   Alexandre Kaprielian <alex.kaprielian@gmail.com>
 * @license  https://github.com/taoberquer/Portfolio/blob/develop/LICENSE GNU Public License
 * @link     https://github.com/taoberquer/Portfolio
 **/

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(
    function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('diploma', 'DiplomaController');
        Route::resource('skill', 'SkillController');
        Route::resource('project', 'ProjectController');
    }
);

Route::get('projet/{name}', 'ProjectController@show')->name('project.show');
Route::get('projet/{name}/documentation', 'ProjectController@show')->name('project.show');
