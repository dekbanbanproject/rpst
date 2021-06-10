<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FontendController;
use App\Http\Controllers\QrLoginController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\ScanOpdController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\StoreSettingController;
use App\Http\Controllers\FontobtController;
use Illuminate\Support\Facades\DB;


Route::resource('first', 'FirstController');

Route::get('/',[FontobtController::class,'welcome'])->name('Per.welcome');
Route::post('report_searchfont','FontendController@report_searchfont')->name('Per.report_searchfont');

// Route::get('mcontact', 'FontendController@mcontact')->name('Per.mcontact');
Route::post('Fontend/savecontact','FontendController@savecontact')->name('Per.savecontact');

Route::get('QrLogin', 'QrLoginController@index');
Route::get('qrLogin', ['uses' => 'QrLoginController@index']);
Route::get('qrLogin-option1', ['uses' => 'QrLoginController@indexoption2']);
Route::post('qrLogin', ['uses' => 'QrLoginController@checkUser']);

// Route::get('/',[FontendController::class,'welcome'])->name('Per.welcome');
Route::get('mcontact',[FontendController::class,'mcontact'])->name('Per.mcontact');
Route::get('login',[QrLoginController::class,'login']);
Route::get('register',[QrLoginController::class,'register']);
Route::get('logout',[QrLoginController::class,'logout']);
Route::post('create',[QrLoginController::class,'create'])->name('auth.create');
Route::post('check',[QrLoginController::class,'check'])->name('auth.check');

Route::get('readQrcode', 'QrcodeController@readQrcode')->name('qrcode.readQrcode');
Route::get('createQrcode', 'QrcodeController@createQrcode')->name('qrcode.createQrcode');
Route::get('/getbarcode', 'QrcodeController@ajax_product')->name('barcode.ajax_product');

Route::get('/fontobtindex', 'FontendController@fontobtindex')->name('Per.fontobtindex');
Route::get('Fontend/welcome_room', 'FontendController@welcome_room')->name('Per.welcome_room');
Route::get('Fontend/welcome_obt', 'FontendController@welcome_obt')->name('Per.welcome_obt');
Route::get('Fontend/room_emty', 'FontendController@room_emty');
Route::match(['get','post'],'/savefontend','FontendController@savefontend')->name('Per.savefontend');
Route::match(['get','post'],'Fontend/contact','FontendController@contact')->name('Per.contact');
Route::get('/header', 'FontendController@header')->name('Per.header');

Route::match(['get','post'],'/printbarcode', 'FontendController@barcodeprint')->name('Per.barcodeprint');

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');//****settingdashbord */
Route::get('dashbord_medical/{idstore}/{iduser}', 'DashbordController@dashbord_medical')->name('dash.dashbord_medical');//****dashbord_medical */
Route::get('dashbord_home', 'DashbordController@dashbord_home')->name('dash.dashbord_home');//****dashbord_medical */


Route::get('dashboard_store',[StoreController::class,'dashboard_store']); // ******** store ***********//
Route::get('profile',[ConfigController::class,'profile']);
Route::post('profile/create',[ConfigController::class,'create'])->name('pro.create');
Route::post('profile/profile_save',[ConfigController::class,'profile_save'])->name('pro.profile_save');
Route::get('profile/profile_edit/{iduser}',[ConfigController::class,'profile_edit'])->name('pro.profile_edit');
Route::post('profile/profile_update',[ConfigController::class,'profile_update'])->name('pro.profile_update');
Route::post('profile/profile_updatecancel',[ConfigController::class,'profile_updatecancel'])->name('pro.profile_updatecancel');
Route::post('changpassword',[ConfigController::class,'changpassword'])->name('changpassword');
Route::post('profile_permiss_update',[ConfigController::class,'profile_permiss_update'])->name('pro.profile_permiss_update');

Route::get('setting/infoperson',[StoreSettingController::class,'infoperson'])->name('per.infoperson');
Route::post('setting/profile_save',[StoreSettingController::class,'profile_save'])->name('per.profile_save');
Route::post('setting/profile_update',[StoreSettingController::class,'profile_update'])->name('per.profile_update');
Route::post('setting/profile_permiss_update',[StoreSettingController::class,'profile_permiss_update'])->name('per.profile_permiss_update');
Route::post('setting/position_save',[StoreSettingController::class,'position_save'])->name('per.position_save');

Route::get('setting/infoposition',[StoreSettingController::class,'infoposition'])->name('per.infoposition');
Route::post('setting/positionsave',[StoreSettingController::class,'positionsave'])->name('per.positionsave');
Route::post('setting/position_update',[StoreSettingController::class,'position_update'])->name('per.position_update');
Route::get('setting/position_delete/{id}',[StoreSettingController::class,'position_delete'])->name('per.position_delete');

Route::get('setting/storemains',[StoreSettingController::class,'storemains'])->name('per.storemains');
Route::post('setting/storemains_save',[StoreSettingController::class,'storemains_save'])->name('per.storemains_save');
Route::post('setting/storemains_update',[StoreSettingController::class,'storemains_update'])->name('per.storemains_update');
Route::get('setting/storemains_delete/{id}',[StoreSettingController::class,'storemains_delete'])->name('per.storemains_delete');

Route::get('setting/storesub',[StoreSettingController::class,'storesub'])->name('per.storesub');
Route::post('setting/storesub_save',[StoreSettingController::class,'storesub_save'])->name('per.storesub_save');
Route::post('setting/storesub_update',[StoreSettingController::class,'storesub_update'])->name('per.storesub_update');
Route::get('setting/storesub_delete/{id}',[StoreSettingController::class,'storesub_delete'])->name('per.storesub_delete');

Route::get('setting/unit',[StoreSettingController::class,'unit'])->name('per.unit');
Route::post('setting/unit_save',[StoreSettingController::class,'unit_save'])->name('per.unit_save');
Route::post('setting/unit_update',[StoreSettingController::class,'unit_update'])->name('per.unit_update');
Route::get('setting/unit_delete/{id}',[StoreSettingController::class,'unit_delete'])->name('per.unit_delete');

Route::get('setting/category',[StoreSettingController::class,'category'])->name('per.category');
Route::post('setting/category_save',[StoreSettingController::class,'category_save'])->name('per.category_save');
Route::post('setting/category_update',[StoreSettingController::class,'category_update'])->name('per.category_update');
Route::get('setting/category_delete/{id}',[StoreSettingController::class,'category_delete'])->name('per.category_delete');

Route::get('setting/products',[StoreSettingController::class,'products'])->name('per.products');
Route::post('setting/products_save',[StoreSettingController::class,'products_save'])->name('per.products_save');
Route::post('setting/products_update',[StoreSettingController::class,'products_update'])->name('per.products_update');
Route::get('setting/products_delete/{id}',[StoreSettingController::class,'products_delete'])->name('per.products_delete');

//=======================Start==========Clinic=================products=======//

Route::get('opd',[ScanOpdController::class,'opd'])->name('scan.opd');
Route::get('opd_search',[ScanOpdController::class,'opd_search'])->name('scan.opd_search');

Route::get('/live_search',[ScanOpdController::class,'index'])->name('index');
Route::get('/live_search/action',[ScanOpdController::class,'action'])->name('live_search.action');


Route::prefix('staff')->group(function(){
    Route::get('/index','StaffController@index')->name('staff.index');
    Route::get('/create','StaffController@create')->name('staff.create');
    Route::post('/store','StaffController@store')->name('staff.store');
    Route::get('/edit/{id}','StaffController@edit')->name('staff.edit');
    Route::post('/update/{id}','StaffController@update')->name('staff.update');
    Route::get('/destroy/{id}','StaffController@destroy')->name('staff.destroy');

    Route::get('/permiss','StaffController@permiss')->name('staff.permiss');
    Route::get('/permisslist/{id}','StaffController@permisslist')->name('staff.permisslist');
    Route::post('/permisslist_save','StaffController@permisslist_save')->name('staff.permisslist_save');
    Route::post('/permiss_save','StaffController@permiss_save')->name('staff.permiss_save');
    Route::get('/switchactivepermiss','StaffController@switchactivepermiss')->name('staff.switchactivepermiss');
});
Route::prefix('supplier')->group(function(){
    Route::get('/supindex/{idstore}/{iduser}','ClinicsupController@supindex')->name('sup.supindex');
    Route::get('/create/{idstore}/{iduser}','ClinicsupController@create')->name('sup.create');
    Route::post('/store/{idstore}/{iduser}','ClinicsupController@store')->name('sup.store');
    Route::get('/edit/{idstore}/{iduser}/{id}','ClinicsupController@edit')->name('sup.edit');
    Route::post('/update/{idstore}/{iduser}/{id}','ClinicsupController@update')->name('sup.update');
    Route::get('/sup_destroy/{idstore}/{iduser}/{id}','ClinicsupController@sup_destroy')->name('sup.sup_destroy');
});

Route::prefix('report')->group(function(){
    Route::get('/report_dashboard/{idstore}/{iduser}','ReportController@report_dashboard')->name('repo.report_dashboard');

    Route::get('/report_orders/{idstore}/{iduser}','ReportController@report_orders')->name('repo.report_orders');
    Route::post('/report_orders_search','ReportController@report_orders_search')->name('repo.report_orders_search');
    Route::get('/report_orders_rep/{idstore}/{iduser}/{id}','ReportController@report_orders_rep')->name('repo.report_orders_rep');
    Route::get('/excel_orders/{idstore}/{iduser}/{id}','ReportController@excel_orders')->name('repo.excel_orders');//Excel

    Route::get('/report_recieve/{idstore}/{iduser}','ReportController@report_recieve')->name('repo.report_recieve');
    Route::post('/report_recieve_search','ReportController@report_recieve_search')->name('repo.report_recieve_search');
    Route::get('/report_recieve_rep/{idstore}/{iduser}/{id}','ReportController@report_recieve_rep')->name('repo.report_recieve_rep');
    Route::get('/excel_recieve/{idstore}/{iduser}/{id}','ReportController@excel_recieve')->name('repo.excel_recieve');//Excel

    Route::get('/report_pays/{idstore}/{iduser}','ReportController@report_pays')->name('repo.report_pays');
    Route::post('/report_pays_search','ReportController@report_pays_search')->name('repo.report_pays_search');
    Route::get('/report_pays_rep/{idstore}/{iduser}/{id}','ReportController@report_pays_rep')->name('repo.report_pays_rep');
    Route::get('/excel_pays/{idstore}/{iduser}/{id}','ReportController@excel_pays')->name('repo.excel_pays');//Excel


});

// Route::match(['get','post'],'setting/unit/{idstore}/{iduser}','ClinicsettingController@unit')->name('setting.unit');
// Route::match(['get','post'],'setting/unit_save','ClinicsettingController@unit_save')->name('setting.unit_save');
// Route::match(['get','post'],'setting/unit_update','ClinicsettingController@unit_update')->name('setting.unit_update');
// Route::match(['get','post'],'setting/unitdestroy/{idstore}/{iduser}/{id}', 'ClinicsettingController@unitdestroy')->name('setting.unitdestroy');

// Route::match(['get','post'],'setting/category/{idstore}/{iduser}','ClinicsettingController@category')->name('setting.category');
// Route::match(['get','post'],'setting/category_save','ClinicsettingController@category_save')->name('setting.category_save');
// Route::match(['get','post'],'setting/category_update','ClinicsettingController@category_update')->name('setting.category_update');
// Route::match(['get','post'],'setting/categorydestroy/{idstore}/{iduser}/{id}', 'ClinicsettingController@categorydestroy')->name('setting.categorydestroy');

Route::match(['get','post'],'setting/locate/{idstore}/{iduser}','ClinicsettingController@locate')->name('setting.locate');
Route::match(['get','post'],'setting/locate_save','ClinicsettingController@locate_save')->name('setting.locate_save');
Route::match(['get','post'],'setting/locate_update','ClinicsettingController@locate_update')->name('setting.locate_update');
Route::match(['get','post'],'setting/locatedestroy/{idstore}/{iduser}/{id}', 'ClinicsettingController@locatedestroy')->name('setting.locatedestroy');

// Route::match(['get','post'],'setting/drug/{idstore}/{iduser}','ClinicsettingController@drug')->name('setting.drug');
// Route::match(['get','post'],'setting/drug_excel','ClinicsettingController@drug_excel')->name('setting.drug_excel');
// Route::match(['get','post'],'setting/drug_export_excel/{idstore}/{iduser}','ClinicsettingController@drug_export_excel')->name('setting.drug_export_excel');

// Route::match(['get','post'],'setting/drug_create/{idstore}/{iduser}','ClinicsettingController@drug_create')->name('setting.drug_create');
// Route::match(['get','post'],'setting/drug_save','ClinicsettingController@drug_save')->name('setting.drug_save');
// Route::match(['get','post'],'setting/drug_edit/{idstore}/{iduser}/{id}','ClinicsettingController@drug_edit')->name('setting.drug_edit');
// Route::match(['get','post'],'setting/drug_update','ClinicsettingController@drug_update')->name('setting.drug_update');
// Route::match(['get','post'],'setting/drugdestroy/{idstore}/{iduser}/{id}', 'ClinicsettingController@drugdestroy')->name('setting.drugdestroy');

Route::match(['get','post'],'setting/order/{idstore}/{iduser}','ClinicsettingController@order')->name('setting.order');
Route::match(['get','post'],'setting/order_add/{idstore}/{iduser}','ClinicsettingController@order_add')->name('setting.order_add');
Route::match(['get','post'],'setting/order_save','ClinicsettingController@order_save')->name('setting.order_save');
Route::match(['get','post'],'setting/order_edit/{idstore}/{iduser}/{id}','ClinicsettingController@order_edit')->name('setting.order_edit');
Route::match(['get','post'],'setting/order_update','ClinicsettingController@order_update')->name('setting.order_update');
Route::match(['get','post'],'setting/order_destroy/{idstore}/{iduser}/{id}','ClinicsettingController@order_destroy')->name('setting.order_destroy');

Route::match(['get','post'],'setting/order_print/{idstore}/{iduser}/{id}', 'ClinicsettingController@order_print')->name('setting.order_print');//Print order

Route::match(['get','post'],'setting/sticker/{idstore}/{iduser}', 'ClinicsettingController@sticker')->name('setting.sticker');                   //  PDF Sticker
Route::match(['get','post'],'setting/stickerbarcodeprint/{idstore}/{iduser}/{id}', 'ClinicsettingController@stickerbarcodeprint')->name('setting.stickerbarcodeprint');
Route::match(['get','post'],'setting/stickerqrcodeprint/{idstore}/{iduser}/{id}', 'ClinicsettingController@stickerqrcodeprint')->name('setting.stickerqrcodeprint');

Route::match(['get','post'],'setting/recieve_drug/{idstore}/{iduser}','ClinicsettingController@recieve_drug')->name('setting.recieve_drug');
Route::match(['get','post'],'setting/recieve_drug_add/{idstore}/{iduser}','ClinicsettingController@recieve_drug_add')->name('setting.recieve_drug_add');
Route::match(['get','post'],'setting/recieve_drug_save','ClinicsettingController@recieve_drug_save')->name('setting.recieve_drug_save');
Route::match(['get','post'],'setting/recieve_drug_edit/{idstore}/{iduser}/{id}','ClinicsettingController@recieve_drug_edit')->name('setting.recieve_drug_edit');
Route::match(['get','post'],'setting/recieve_drug_update','ClinicsettingController@recieve_drug_update')->name('setting.recieve_drug_update');
Route::match(['get','post'],'setting/recieve_drug_destroy/{idstore}/{iduser}/{id}','ClinicsettingController@recieve_drug_destroy')->name('setting.recieve_drug_destroy');

Route::match(['get','post'],'setting/pay_drug/{idstore}/{iduser}','ClinicsettingController@pay_drug')->name('setting.pay_drug');
Route::match(['get','post'],'setting/pay_drug_add/{idstore}/{iduser}','ClinicsettingController@pay_drug_add')->name('setting.pay_drug_add');
Route::match(['get','post'],'setting/pay_drug_save','ClinicsettingController@pay_drug_save')->name('setting.pay_drug_save');
Route::match(['get','post'],'setting/pay_drug_edit/{idstore}/{iduser}/{id}','ClinicsettingController@pay_drug_edit')->name('setting.pay_drug_edit');
Route::match(['get','post'],'setting/pay_drug_update','ClinicsettingController@pay_drug_update')->name('setting.pay_drug_update');
Route::match(['get','post'],'setting/pay_drug_destroy/{idstore}/{iduser}/{id}','ClinicsettingController@pay_drug_destroy')->name('setting.pay_drug_destroy');

Route::match(['get','post'],'setting/pay_print/{idstore}/{iduser}/{id}', 'ClinicsettingController@pay_print')->name('setting.pay_print');//Print Pay
Route::match(['get','post'],'setting/drug_print/{idstore}/{iduser}', 'ClinicsettingController@drug_print')->name('setting.drug_print');//Print drug

Route::get('setting/detailsup','ClinicsettingController@detailsup')->name('setting.detailsup');
Route::get('setting/selectsup','ClinicsettingController@selectsup')->name('setting.selectsup');
Route::get('setting/selectsuplot','ClinicsettingController@selectsuplot')->name('setting.selectsuplot');
Route::get('setting/selectsuptotal','ClinicsettingController@selectsuptotal')->name('setting.selectsuptotal');
Route::get('setting/selectsupunit','ClinicsettingController@selectsupunit')->name('setting.selectsupunit');
Route::get('setting/selectsuppiceunit','ClinicsettingController@selectsuppiceunit')->name('setting.selectsuppiceunit');
Route::get('setting/selectsupdatget','ClinicsettingController@selectsupdatget')->name('setting.selectsupdatget');
Route::get('setting/selectsupdatexp','ClinicsettingController@selectsupdatexp')->name('setting.selectsupdatexp');


//************************Hosxp**********************************//

// Route::match(['get','post'],'hos/drugitems/{idstore}','Api\HosController@drugitems')->name('hos.drugitems');
Route::match(['get','post'],'hos/drug_hos/{idstore}/{iduser}','HosController@drug_hos')->name('hos.drug_hos');
Route::match(['get','post'],'hos/drug_hos_save','HosController@drug_hos_save')->name('hos.drug_hos_save');
Route::match(['get','post'],'hos/dashboard_hos/{idstore}/{iduser}','HosController@dashboard_hos')->name('hos.dashboard_hos');
Route::match(['get','post'],'hos/hdc','HosController@hdc')->name('hos.hdc');
Route::match(['get','post'],'hos/sss','HosController@sss')->name('hos.sss');
Route::match(['get','post'],'hos/soap','HosController@soap')->name('hos.soap');

//================================= Web Service ==================================//

// Route::get('/enduro/clima', function () {
//     $opts = array(
//         'ssl' => array('ciphers'=>'RC4-SHA', 'verify_peer'=>false, 'verify_peer_name'=>false)
//     );
// $params = array ('encoding' => 'UTF-8', 'verifypeer' => false, 'verifyhost' => false, 'soap_version' => SOAP_1_2, 'trace' => 1, 'exceptions' => 1, "connection_timeout" => 180, 'stream_context' => stream_context_create($opts) );
// $url = "http://www.webservicex.net/globalweather.asmx?WSDL";

// try{
//     $client = new SoapClient($url,$params);
//     dd($client->GetCitiesByCountry(['CountryName' => 'Peru'])->GetCitiesByCountryResult);
// }
// catch(SoapFault $fault) {
//     echo '<br>'.$fault;
// }
// });

// $client = new SoapClient("http://services.xmethods.net/soap/urn:xmethods-delayedquotes.wsdl");
// print($client->getQuote("ibm"));

//************************Start Hosxp Api**********************************//
// Route::match(['get','post'],'api/drugitems','Api\DrugController@index')->name('api.index');


//************************End Hosxp Api**********************************//
Route::match(['get','post'],'Mainpage/clinic_per','ClinicperController@index')->name('Clinic.index');
Route::match(['get','post'],'Mainpage/clinic_per_create','ClinicperController@create')->name('Clinic.create');
Route::match(['get','post'],'Mainpage/persave','ClinicperController@persave')->name('Clinic.persave');
Route::match(['get','post'],'Mainpage/clinic_per_edit/{id}','ClinicperController@edit')->name('Clinic.edit');
Route::match(['get','post'],'Mainpage/perupdate','ClinicperController@perupdate')->name('Clinic.perupdate');

// Route::match(['get','post'],'/clinic_per-destroy/{id}', 'ClinicperController@clinic_per_destroy');
Route::match(['get','post'],'/delete', 'ClinicperController@clinicper_delete')->name('Clinic.delete');

Route::match(['get','post'],'/updateperq','ClinicperController@updateperq')->name('Clinic.updateperq');
Route::match(['get','post'],'/updatestatus','ClinicperController@updatestatus')->name('Clinic.updatestatus');
Route::match(['get','post'],'/per_search','ClinicperController@per_search')->name('Clinic.per_search');

Route::match(['get','post'],'sym/sym_index','ClinicsymController@sym_index')->name('Clinic.sym_index');
Route::match(['get','post'],'sym/sym_edit/{id}','ClinicsymController@sym_edit')->name('Clinic.sym_edit');
Route::match(['get','post'],'sym/sym_update','ClinicsymController@sym_update')->name('Clinic.sym_update');
// Route::match(['get','post'],'/sym_destroy/{id}', 'ClinicsymController@sym_destroy');
 Route::match(['get','post'],'sym/symdelete', 'ClinicsymController@symdelete')->name('Clinic.symdelete');

Route::match(['get','post'],'sym/sym_create/{id}','ClinicsymController@sym_create')->name('Clinic.sym_create');

Route::match(['get','post'],'sym/sym_save','ClinicsymController@sym_save')->name('Clinic.sym_save');
Route::match(['get','post'],'sym/sym_historysearch','ClinicsymController@sym_historysearch')->name('Clinic.sym_historysearch');

//=======================PDF==========Clinic========================//

Route::match(['get','post'],'report/report_symindex','ClinicreportController@report_symindex')->name('Clinic.report_symindex');
Route::post('report/report_search','ClinicreportController@report_search')->name('Rep.report_search');//ค้นหารายงาน
Route::match(['get','post'],'report/reportpdf', 'ClinicreportController@reportpdf')->name('Clinic.reportpdf');//PDF



Route::match(['get','post'],'pdf/pdf_sticker', 'PdfController@pdf_sticker')->name('sticker.pdf_sticker');//PDF Sticker

//=======================End==========Clinic========================//


//=========================Apartment====person==========================
Route::match(['get','post'],'dashbord_apartment','PersonController@dashbord_apartment')->name('Per.dashbord_apartment');
Route::match(['get','post'],'person/per_index','PersonController@per_index')->name('Per.per_index');
Route::match(['get','post'],'person/per_edit/{id}','PersonController@per_edit')->name('Per.per_edit');
Route::match(['get','post'],'person/per_save','PersonController@per_save')->name('Per.per_save');

// Route::match(['get','post'],'/','PersonController@savefontend')->name('Per.savefontend');

Route::match(['get','post'],'person/per_update','PersonController@per_update')->name('Per.per_update');
Route::delete('/person-destroy/{id}', 'PersonController@destroy');
Route::get('person/per_index/switchperson','PersonController@switchperson')->name('setup.person');

//=========================Apartment====room==========================
Route::match(['get','post'],'person/room','PersonController@room_index')->name('Per.room_index');
Route::match(['get','post'],'person/room/save','PersonController@room_save')->name('Per.room_save');
Route::match(['get','post'],'person/room/update','PersonController@room_update')->name('Per.room_update');
//Route::match(['get','post'],'person/room/room_destroy/{id}', 'PersonController@room_destroy');
Route::delete('/room-destroy/{id}', 'PersonController@room_destroy');

//=========================Apartment====roomlist==========================
Route::match(['get','post'],'person/roomlist','PersonController@roomlist_index')->name('Per.roomlist_index');
Route::match(['get','post'],'person/roomlist/save','PersonController@roomlist_save')->name('Per.roomlist_save');
Route::match(['get','post'],'person/roomlist/update','PersonController@roomlist_update')->name('Per.roomlist_update');
// Route::match(['get','post'],'person/roomlist/roomlist_destroy/{id}', 'PersonController@roomlist_destroy');
Route::delete('/roomlist-destroy/{id}', 'PersonController@roomlist_destroy');

//========================rent  owner====================
Route::match(['get','post'],'person/owner','OwnerController@owner')->name('OW.owner');
Route::match(['get','post'],'person/save','OwnerController@save')->name('OW.save');

Route::match(['get','post'],'person/owneredit/{id}','OwnerController@owneredit')->name('OW.owneredit');
Route::match(['get','post'],'person/update','OwnerController@update')->name('OW.update');
// Route::match(['get','post'],'person/destroy/{id}','OwnerController@destroy');
Route::delete('/owner-destroy/{id}', 'OwnerController@destroy');
//========================rent====================

Route::match(['get','post'],'person/rent','RentController@rent')->name('Re.rent');
Route::match(['get','post'],'person/update_status','RentController@update_status')->name('Re.update_status');
Route::match(['get','post'],'person/rent_add/{id}','RentController@add')->name('Re.add');
Route::match(['get','post'],'person/rent/save','RentController@save')->name('Re.save');
// Route::match(['get','post'],'person/rent/rent_destroy/{id}','RentController@rent_destroy');
Route::delete('/rent-destroy/{id}', 'RentController@rent_destroy');

Route::match(['get','post'],'person/rent_detail/{id}','RentController@rent_detail')->name('Re.rent_detail');
Route::match(['get','post'],'person/rent/rent_detail_destroy/{id}','RentController@rent_detail_destroy');

Route::get('person/rent_pdf/{id}', 'RentController@rent_pdf');//PDF

Route::match(['get','post'],'person/history/{id}','RentController@history')->name('Re.history');
Route::match(['get','post'],'person/history/history_destroy/{id}','RentController@history_destroy');

//========================report rent====================
Route::match(['get','post'],'report/report_rentmonth','RentController@report_rentmonth')->name('Rep.report_rentmonth');
Route::post('report/report_rentmonthsearch','RentController@report_rentmonthsearch')->name('Rep.report_rentmonthsearch');
Route::get('report/report_rentmonth_pdf', 'RentController@report_rentmonth_pdf');//PDF



Route::get('report/report_rentmonth_excel', 'RentController@report_rentmonth_excel')->name('Rep.report_rentmonth_excel');//Export Excel
Route::post('reportrentexport', 'RentController@reportrentexport'); //export



// Route::get('products/products', 'ProductsController@indexproducts')->name('P.products');
Route::get('products/supplies', 'ProductsController@indexsupplies')->name('P.supplies');
Route::post('products/supplies/save', 'ProductsController@savesupplies')->name('P.savesupplies');
Route::post('products/supplies/update', 'ProductsController@updatesupplies')->name('P.updatesupplies');
Route::get('products/supplies/destroy/{id}', 'ProductsController@destroysupplies');

Route::get('products/units', 'ProductsController@indexunits')->name('P.units');
Route::post('products/units/save', 'ProductsController@saveunits')->name('P.saveunits');
Route::post('products/units/update', 'ProductsController@updateunits')->name('P.updateunits');
Route::get('products/units/destroy/{id}', 'ProductsController@destroyunits');

Route::get('products/category', 'ProductsController@indexcategory')->name('P.category');
Route::post('products/category/save', 'ProductsController@savecategory')->name('P.savecategory');
Route::post('products/category/update', 'ProductsController@updatecategory')->name('P.updatecategory');
Route::get('products/category/destroy/{id}', 'ProductsController@destroycategory');

Route::get('products/products', 'ProductsController@indexproducts')->name('P.products');
Route::post('products/products/save', 'ProductsController@saveproducts')->name('P.saveproducts');
Route::post('products/products/update', 'ProductsController@updateproducts')->name('P.updateproducts');
Route::get('products/products/destroy/{id}', 'ProductsController@destroyproducts');
Route::get('products/pdf/productspdf', 'PdfController@productspdf')->name('P.productspdf');//PDF


Route::get('products/pdf/oderspdf', 'PdfController@oderspdf')->name('P.oderspdf');//PDF
