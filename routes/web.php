<?php

use Illuminate\Support\Facades\Route;
session_start();

use App\Http\Controllers\FileController;
use App\Http\Controllers\StaffController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the 'web' middleware group. Now create something great!
|
*/

/////////////////////////////////////////////////////////////////// SEVICE ///////////////////////////////////////////////////////////////////

Route::get('/',                             'ServiceController@toServiceIndex')                     ->name('toServiceIndex');
Route::get('/company',                      'ServiceController@toServiceCompany')                   ->name('toServiceCompany');
Route::get('/news',                         'ServiceController@toServiceNews')                      ->name('toServiceNews');
Route::get('/detail',                       'ServiceController@toServiceNewsDetail')                ->name('toServiceNewsDetail');
Route::get('/contact',                      'ServiceController@toServiceContact')                   ->name('toServiceContact');
Route::get('/policy',                       'ServiceController@toServicePolicy')                    ->name('toServicePolicy');


/////////////////////////////////////////////////////////////////// ADMIN ///////////////////////////////////////////////////////////////////

/////////////////// Admin ///////////////////

Route::get('/admin',                        'AdminController@toAdminLogin')                         ->name('toAdminLogin');
Route::get('/admin/list', 				    'AdminController@toAdminList')                          ->name('toAdminList');
Route::get('/admin/register', 			    'AdminController@toAdminRegister')                      ->name('toAdminRegister');
Route::get('/admin/edit', 				    'AdminController@toAdminEdit')			                ->name('toAdminEdit');

Route::post('/admin_login', 			    'LoginController@onAdminLogin')                         ->name('onAdminLogin');
Route::get( '/admin_logout',                'AdminController@onAdminLogout')                        ->name('onAdminLogout');
Route::post('/admin_register', 			    'AdminController@onAdminRegister')                      ->name('onAdminRegister');
Route::post('/admin_edit', 				    'AdminController@onAdminEdit')                          ->name('onAdminEdit');
Route::post('/admin_delete', 			    'AdminController@onDeleteAdmin')                        ->name('onDeleteAdmin');
Route::post('/admin_selected_delete',       'AdminController@onCheckedDeleteAdmin')                 ->name('onCheckedDeleteAdmin');

/////////////////// Content ///////////////////

Route::get('/admin/content', 			    'ContentController@toAdminContent')                     ->name('toAdminContent');

Route::post('/admin/concept_upload', 	    'ContentController@conceptUpload')	                    ->name('conceptUpload');
Route::post('/admin/recom_upload', 		    'ContentController@recommUpload')	                    ->name('recommendationUpload');
Route::post('/admin/content_register', 	    'ContentController@register')		                    ->name('registerContent');
Route::post('/admin/content_edit', 	        'ContentController@edit')		                        ->name('editContent');
Route::post('/admin/content_avoid', 	    'ContentController@onAvoidDuplicate')                   ->name('onAvoidDuplicate');

/////////////////// Client ///////////////////

Route::get('/admin/client', 			    'ClientController@toAdminClient')                       ->name('toAdminClient');
Route::get('/admin/client/add', 	        'ClientController@toAdminClientRegister')               ->name('toAdminClientRegister');
Route::get('/admin/client/view', 		    'ClientController@toAdminClientView')			        ->name('toAdminClientView');
Route::get('/admin/client/edit', 		    'ClientController@toAdminClientEdit')		            ->name('toAdminClientEdit');
Route::get('/admin/client/reset', 		    'ClientController@toAdminClientReset')		            ->name('toAdminClientReset');

Route::post('/admin_client_register', 	    'ClientController@onAdminClientRegister')               ->name('onAdminClientRegister');
Route::post('/admin_client_edit', 		    'ClientController@onAdminClientEdit')                   ->name('onAdminClientEdit');
Route::post('/admin_client_upload', 	    'ClientController@onFileUpload')	                    ->name('uploadFile');
Route::get( '/admin/getClients',		    'ClientController@getClients')		                    ->name('getClients');
Route::post('/admin_selected_client_delete','ClientController@onDeleteCheckedClient')               ->name('onDeleteCheckedClient');
Route::post('/admin_client_delete',	        'ClientController@onDeleteClient')                      ->name('onDeleteClient');
Route::post('/admin_client_reset',          'ClientController@onAdminClientReset')                  ->name('onAdminClientReset');

/////////////////// Video ///////////////////

Route::get('/admin/video',				    'VideoController@index')                                ->name('toAdminVideo');
Route::get('/admin/video/add',		        'VideoController@toRegister')                           ->name('toAdminVideoRegister');
Route::get('/admin/video/edit',			    'VideoController@toEdit')                               ->name('toAdminVideoEdit');

Route::get('/admin_getVideos', 			    'VideoController@getVideos')		                    ->name('getVideos');
Route::post('/admin_video_register', 	    'VideoController@register')			                    ->name('registerVideo');
Route::post('/admin_video_upload', 		    'VideoController@videoUpload')		                    ->name( 'videoUpload');
Route::post('/admin_video_delete', 		    'VideoController@delete')			                    ->name('deleteVideo');
Route::post('/admin_video_edit', 		    'VideoController@update')			                    ->name('updateVideo');
Route::post('/admin_video_avoid', 		    'VideoController@onAvoidDuplicate')                     ->name('onAvoidDuplicate');
Route::post('/admin_video_search', 		    'VideoController@onSearchVideo')                        ->name('onSearchVideo');

/////////////////// Staff ///////////////////

Route::get('/admin/staff', 				    'StaffController@index')                                ->name('toAdminStaff');
Route::get('/admin/staff/edit', 		    'StaffController@toEdit')			                    ->name('toAdminStaffEdit');
Route::get('/admin/staff/view', 		    'StaffController@toView')			                    ->name('toStaffView');
Route::get('/admin/staff/add', 	            'StaffController@toAdd')                                ->name('toAdminStaffRegister');

Route::post('/admin_staff_register',	    'StaffController@register')			                    ->name('onStaffRegister');
Route::get( '/admin_getStaffs',			    'StaffController@getStaffs')		                    ->name('getStaffs');
Route::post('/admin_staff_edit',		    'StaffController@edit')			                        ->name('staffEdit');
Route::post('/admin_staff_delete',		    'StaffController@onAdminDeleteCheckedStaff')            ->name('onAdminDeleteCheckedStaff');
Route::post('/admin_staff_search',          'StaffController@onAdminStaffSearch')                   ->name('onAdminStaffSearch');
Route::post('/admin_staff_clear',           'StaffController@onAdminStaffSearchClear')              ->name('onAdminStaffSearchClear');
Route::post('/admin_staff_csv',             'StaffController@onAdminStaffCSVUpload')                ->name('onAdminStaffCSVUpload');
Route::post('/admin_staff_csv_register',    'StaffController@onAdmiStaffRegisterUploadCSV')         ->name('onAdmiStaffRegisterUploadCSV');
Route::post('/admin_staff_download_csv',    'StaffController@onDownloadCSV')                        ->name('onDownloadCSV');

/////////////////// News ///////////////////

Route::get('/admin/news',                   'NewsController@toAdminNews')                           ->name('toAdminNews');
Route::get('/admin/news/add',               'NewsController@toAdminNewsRegister')                   ->name('toAdminNewsRegister');
Route::get('/admin/news/detail',            'NewsController@toAdminNewsDetail')                     ->name('toAdminNewsDetail');
Route::get('/admin/news/edit',              'NewsController@toAdminNewsEdit')                       ->name('toAdminNewsEdit');

Route::post('/admin_news_register',         'NewsController@onAdminNewsRegister')                   ->name('onAdminNewsRegister');
Route::post('/admin_news_upload',           'NewsController@onAdminNewsUpload')                     ->name('onAdminNewsUpload');
Route::post('/admin_news_search',           'NewsController@onAdminSearchNews')                     ->name('onAdminSearchNews');
Route::post('/admin_news_delete',           'NewsController@onAdminDeleteNews')                     ->name('onAdminDeleteNews');
Route::post('/admin_news_edit',             'NewsController@onAdminEditNews')                       ->name('onAdminEditNews');
Route::post('/admin_news_avoid',            'NewsController@onAvoidDuplicateNews')                  ->name('onAvoidDuplicateNews');

/////////////////// Kokoro ///////////////////
Route::get('/admin/kokoro',                 'KokoroController@index')                               ->name('toAdminKokoro');
Route::get('/admin/kokoro/add',             'KokoroController@toAdminKokoroRegister')               ->name('toAdminKokoroRegister');
Route::get('/admin/kokoro/edit/{id}',       'KokoroController@toAdminKokoroEdit')                   ->name('toAdminKokoroEdit');
Route::get('/admin/kokoro/type',            'KokoroController@toAdminAddKokoroType')                ->name('toAdminAddKokoroType');

Route::post('/admin/kokoro_upload',         'KokoroController@onAdminKokoroUpload')                 ->name('onAdminKokoroUpload');
Route::post('/admin/kokoro_add',            'KokoroController@onAdminKokoroRegister')               ->name('onAdminKokoroRegister');
Route::post('/admin/kokoro_delete',         'KokoroController@onDeleteAdminKokoro')                 ->name('onDeleteAdminKokoro');
Route::post('/admin/kokoro_checked_delete', 'KokoroController@onDeleteAdminCheckedKokoro')          ->name('onDeleteAdminCheckedKokoro');
Route::post('/admin/kokoro_edit',           'KokoroController@onAdminKokoroEdit')                   ->name('onAdminKokoroEdit');
Route::post('/admin/kokoro_type',           'KokoroController@onAdminAddKokoroType')                ->name('onAdminAddKokoroType');
Route::post('/admin/kokoro_type_delete',    'KokoroController@onAdminDeleteKokoroType')             ->name('onAdminDeleteKokoroType');

/////////////////////////////////////////////////////////////////// USER ///////////////////////////////////////////////////////////////////

Route::get('/user',                         'StaffController@toUserLogin')                          ->name('toUserLogin');
Route::get('/user/forget',                  'StaffController@toForget')                             ->name('toForget');
Route::get('/user/basic',                   'StaffController@toBasicInfo')                          ->name('toBasicInfo');
Route::get('/user/edit',                    'StaffController@toUserEdit')                           ->name('toUserEdit');
Route::get('/user/mypage',                  'StaffController@toMyPage')                             ->name('toMyPage');
Route::get('/user/logout',                  'StaffController@onUserlogout')                         ->name('onUserLogout');
Route::get('/user/menu',                    'StaffController@toUserMenu')                           ->name('toUserMenu');
Route::get('/user/password',                'StaffController@toUserResetPassword')                  ->name('toUserResetPassword');
Route::get('/user/concept',                 'StaffController@toConcept')                            ->name('toConcept');
Route::get('/user/exercise',                'StaffController@toExercise')                           ->name('toExercise');
Route::get('/user/relax',                   'StaffController@toRelax')                              ->name('toRelax');
Route::get('/user/play',                    'StaffController@toPlayVideo')                          ->name('toPlayVideo');
Route::get('/user/karada',                  'StaffController@toKarada')                             ->name('toKarada');
Route::get('/user/kokoro',                  'StaffController@toKokoro')                             ->name('toKokoro');
Route::get('/user/kokoros',                 'StaffController@toKokoros')                            ->name('toKokoroSolution');
Route::get('/user/online',                  'StaffController@toOnline')                             ->name('toOnline');
Route::get('/user/kokoro/{id}',             'StaffController@toKokoroSolution')                     ->name('toKokoroSolution');
Route::get('/user/reset', function(){
    return view('well_peida.user.reset');
});

Route::post('/user_login',                  'LoginController@onUserLogin')                          ->name('onUserLogin');
Route::post('/user_forgotten',              "LoginController@onUserForgotten")                      ->name('onUserForgotten');
Route::post('/user_basic',                  'StaffController@onRegisterBasic')                      ->name('onRegisterBasic');
Route::post('/user_edit',                   "StaffController@onUserEdit")                           ->name('onUserEdit');
Route::post('/user_password',               "StaffController@onResetPassword")                      ->name('onResetPassword');
Route::post('/user_video',                  "StaffController@onRegisterVideoHistory")               ->name('onRegisterVideoHistory');

/////////////////////////////////////////////////////////////////// CLIENT ///////////////////////////////////////////////////////////////////

Route::get('/client',                       'ClientController@toClientLogin')                       ->name('toClientLogin');
Route::get('/client/forgotten',             'ClientController@toLoginForgotten')                    ->name('toLoginForgotten');
Route::get('/client/main',                  'ClientController@toClientMain')                        ->name('toClientMain');
Route::get('/client/new',                   'ClientController@toClientNew')                         ->name('toClientNew');
Route::get('/client/info',                  'ClientController@toClientStaffInfo')                   ->name('toClientStaffInfo');
Route::get('/client/edit',                  'ClientController@toClientStaffEdit')                   ->name('toClientStaffEdit');
Route::get('/client/view',                  'ClientController@toClientView')                        ->name('toClientView');
Route::get('/client/view_edit',             'ClientController@toClientViewEdit')                    ->name('toClientViewEdit');
Route::get('/client/view_reset',            'ClientController@toClientResetPassword')               ->name('toClientResetPassword');
Route::get('/client/staff_reset',           'ClientController@toClientStaffResetPassword')          ->name('toClientStaffResetPassword');

Route::post('/client_login',                'LoginController@onClientLogin')                        ->name('onClientLogin');
Route::get( '/client_logout',               'ClientController@onClientLogout')                      ->name('onClientLogout');
Route::post('/client_forget',               'LoginController@onClientForget')                       ->name('onClientForget');
Route::post('/client_new_staff',            'ClientController@onClientNewStaff')                    ->name('onClientNewStaff');
Route::post('/client_staff_edit',           'ClientController@onClientStaffEdit')                   ->name('onClientStaffEdit');
Route::post('/client_edit',                 'ClientController@onClientViewEdit')                    ->name('onClientViewEdit');
Route::post('/client_checkedDelete',        'ClientController@onDeleteCheckedStaff')                ->name('onDeleteCheckedStaff');
Route::post('/client_reset',                'ClientController@onClientResetPassword')               ->name('onClientResetPassword');
Route::post('/client_history',              'VideoController@onDeleteVideoHistory')                 ->name('onDeleteVideoHistory');
Route::post('/client_staff_reset',          'ClientController@onClientStaffReset')                  ->name('onClientStaffReset');
