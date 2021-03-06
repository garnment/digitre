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

/* Page home */
$router->get('/', 'MainController@showWidgets')->name('widgets');

/* Page settings */
$router->get('/settings','MainController@showSettings')->name('showSettings');
$router->post('/settings/update','MainController@updateSettings')->name('updateSettings');