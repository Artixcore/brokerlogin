<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\User;

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

Route::get('/upload-insurance', 'InController@get_insurance');
Route::post('/upload-insurance', 'InController@upload_insurance');

Route::get('/', 'Frontend\UserController@home');

Route::get('/exam', function () {
    return view('admin.agent.exam');
});

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
  ]);

// Frontend

Route::post('avatar-update','UserController@update_avatar')->name('avatar-update');
Route::post('password-update','UserController@ChangePassword')->name('password-update');

Route::get('home', 'Frontend\UserController@home');

Route::get('broker/profile/{name}',  'Frontend\UserController@brokerprofile')->name('broker.profile');

Route::get('admin/profile/{name}',  'Frontend\UserController@adminprofile')->name('admin.profile');

Route::post('update-ava','UserController@update_avatar');


Route::post('nachweis/delete/{id}','InController@delete_nach')->name('nachweis.delete');

Route::get('changestatus', 'UserController@status')->name('changestatus');


// Download in Excel
Route::get('admin/database', 'Admin\DatabaseController@view_page')->name('admin.db');

Route::get('file-export', 'Admin\AgentController@fileExport')->name('file-export');
Route::get('app-export', 'Admin\AppointmentController@appExport')->name('app-export');
Route::get('nachExport-export', 'Admin\AppointmentController@nachExport')->name('nachExport-export');
Route::get('customerExport-export', 'Admin\AppointmentController@customerExport')->name('customerExport-export');
Route::get('FremdvertragExport-export', 'Admin\AppointmentController@FremdvertragExport')->name('FremdvertragExport-export');
Route::get('CarInsuranceExport-export', 'Admin\AppointmentController@CarInsuranceExport')->name('CarInsuranceExport-export');
Route::get('HomeExport-export', 'Admin\AppointmentController@HomeExport')->name('HomeExport-export');
Route::get('LawExport-export', 'Admin\AppointmentController@LawExport')->name('LawExport-export');
Route::get('TravelExport-export', 'Admin\AppointmentController@TravelExport')->name('TravelExport-export');


// Application
Route::namespace('Application')->prefix('application')->name('application.')->group(function(){

    Route::get('offer/{customer_number}', 'ApplicationController@view_page')->name('offer');
    Route::get('view/{application_number}', 'ApplicationController@view_mail')->name('view');
    Route::post('upgrade/{id}', 'ApplicationController@upgrade')->name('upgrade');
    Route::get('new', 'ApplicationController@new')->name('new');
    Route::get('pdf/{customer_number}', 'ApplicationController@pdf')->name('pdf');

    Route::post('update/{id}', 'ApplicationController@update_status')->name('update');

    Route::post('delete/{id}', 'ApplicationController@delete_docu')->name('delete');
    Route::post('delete/app/{id}', 'ApplicationController@delete_app')->name('delete.app');

    Route::post('post_application', 'ApplicationController@post_application')->name('post_application');
    Route::get('fremdvertrag', 'ApplicationController@fremdvertrag')->name('fremdvertrag');
    Route::get('fremdvertrag/page/{customer_number}', 'ApplicationController@fremdvertrag_page')->name('fremdvertrag.page');
    Route::post('fremdvertrag/post', 'ApplicationController@fremdvertrag_post')->name('fremdvertrag.post');
    Route::get('fremdvertrag/edit/{con_number}', 'ApplicationController@fremdvertrag_edit')->name('fremdvertrag.edit');
    Route::post('fremdvertrag/delete/{id}', 'ApplicationController@fremdvertrag_delete')->name('fremdvertrag.delete');


});

// Mail
Route::namespace('Mail')->prefix('mail')->name('mail.')->group(function(){

   Route::get('homes/{insurance_number}', 'MailController@home')->name('homes');

   Route::get('car/{insurance_number}', 'MailController@car')->name('car');

   Route::post('application', 'MailController@admin_offer_home_mail')->name('home');

   Route::post('application','MailController@admin_application_mail')->name('application');

   Route::post('home', 'MailController@admin_offer_home_mail')->name('home');

   Route::post('cars', 'MailController@admin_offer_car_mail')->name('cars');

   Route::post('nachweis','MailController@admin_nachweis_mail')->name('nachweis');

   Route::post('laws', 'MailController@law_mail')->name('laws');
   Route::post('travel', 'MailController@travel_mail')->name('travel');

   Route::post('application/doc','MailController@admin_application_doc_mail')->name('doc');

   Route::post('application/doc','MailController@admin_application_doc_mail')->name('doc');

   // Agent
   Route::post('agent_kvg_mail','MailController@agent_kvg_mail')->name('agent_kvg_mail');
   Route::post('agent_vvg_mail','MailController@agent_vvg_mail')->name('agent_vvg_mail');
   Route::post('agent_kvgvvg_mail','MailController@agent_kvgvvg_mail')->name('agent_kvgvvg_mail');


});

// Admin
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UserController',['except' => ['show','create','store']]);
    Route::get('dashboard', 'DasboardController@view_dashboard')->name('dashboard');

    Route::post('select', 'BackupController@forms')->name('select');

    Route::get('taxes', 'AgentController@taxes')->name('taxes');

    Route::post('updateJerk/apps', 'AgentController@UpdateJerk')->name('updateJerk.apps');

    Route::post('taxes/alv', 'AgentController@taxes_alv')->name('taxes.alv');
    Route::post('taxes/alv/update/{id}', 'AgentController@taxes_alv_update')->name('taxes.alv.update');

    Route::post('taxes/ahv', 'AgentController@taxes_ahv')->name('taxes.ahv');
    Route::post('taxes/ahv/update/{id}', 'AgentController@taxes_ahv_update')->name('taxes.ahv.update');

    Route::post('taxes/risiko', 'AgentController@taxes_risiko')->name('taxes.risiko');
    Route::post('taxes/risiko/update/{id}', 'AgentController@taxes_risiko_update')->name('taxes.risiko.update');

    Route::post('taxes/nbus', 'AgentController@taxes_nbus')->name('taxes.nbus');
    Route::post('taxes/nbus/update/{id}', 'AgentController@taxes_nbus_update')->name('taxes.nbus.update');

    Route::post('taxes/ktgs', 'AgentController@taxes_ktgs')->name('taxes.ktgs');
    Route::post('taxes/ktgs/update/{id}', 'AgentController@taxes_ktgs_update')->name('taxes.ktgs.update');

    Route::get('back', 'DasboardController@back')->name('back');
    Route::get('backup', 'DasboardController@backup')->name('backup');

    Route::get('offer-from-company', 'OfferFromController@view')->name('offer-from');

    Route::get('form', 'InsuranceController@form')->name('form');
    Route::get('form/home', 'InsuranceController@home')->name('form.home');
    Route::post('form/home', 'InsuranceController@home_form')->name('form.home');

    Route::get('commission', 'InsuranceController@commission')->name('commission');

    Route::get('form/car', 'InsuranceController@car')->name('form.car');
    Route::post('form/car', 'InsuranceController@car_form')->name('form.car');

    Route::get('form/business', 'InsuranceController@business')->name('form.business');

    Route::get('insurance/cars', 'InsuranceController@cars')->name('insurance.cars');
    Route::get('insurance/homes', 'InsuranceController@homes')->name('insurance.homes');

    Route::get('view/insurance/car/{insurance_number}','InsuranceController@view_single_car')->name('view.insurance.car');

    Route::get('view/insurance/home/{insurance_number}','InsuranceController@view_single_home')->name('view.insurance.home');
    Route::post('view/insurance/home/{id}','InsuranceController@view_single_home_post')->name('view.insurance.home');
    Route::post('post/insurance/car/{id}','InsuranceController@car_update_form')->name('post.insurance.car');

    Route::post('mailCar', 'InsuranceController@mailCar')->name('mailCar');
    Route::post('mailhome', 'InsuranceController@mailhome')->name('mailhome');

    Route::get('customer', 'CustomerController@view_customer')->name('customer');
    Route::get('customer/edit/{customer_number}', 'CustomerController@edit_customer')->name('customer.edit');
    Route::post('customer/edit/{id}', 'CustomerController@update_customer')->name('customer.edit');
    Route::post('save', 'CustomerController@save_customer')->name('save');
    Route::post('delete/customer/{id}', 'CustomerController@delete_customer')->name('delete.customer');
    Route::get('nachweis/{customer_number}', 'CustomerController@nachweis')->name('nachweis');

    Route::get('nachweis/view/{nachweis_number}', 'CustomerController@nachweis_view')->name('nachweis.view');

    Route::post('post_nachweis', 'CustomerController@post_nachweis')->name('post_nachweis');
    Route::post('edit_nachweis/{customer_number}', 'CustomerController@edit_nachweis')->name('edit_nachweis');

    // Contract

    Route::get('contact', 'ContactsController@contact')->name('contact');
    Route::get('contact/view/{customer_number}', 'ContactsController@customer_number')->name('contact.view');
    Route::get('contact/view/dos/{customer_number}', 'ContactsController@dos')->name('contact.view.dos');
    Route::get('contact/view/app/{application_number}', 'ContactsController@application_number')->name('contact.view.app');
    Route::get('contact/view/doc/{application_number}', 'ContactsController@application_doc')->name('contact.view.doc');
    Route::get('contact/doc/{doc_number}', 'ContactsController@doc')->name('contact.doc');
    Route::get('contact', 'ContactsController@contact')->name('contact');


    // Agent

    // Expance
    Route::get('e_page/{id}', 'AgentController@e_page')->name('e_page');
    Route::post('e_page/delete/{id}', 'AgentController@e_page_delete')->name('e_page.delete');
    Route::get('e_page_edit/{user_id}', 'AgentController@e_page_edit')->name('e_page_edit');
    Route::post('expanse', 'AgentController@expanse')->name('expanse');
    Route::post('expanse_update/{id}', 'AgentController@expanse_update')->name('expanse_update');
    Route::post('delete_expanse/{id}', 'AgentController@delete_expanse')->name('delete_expanse');

    // Applications
    Route::get('apps/{id}', 'AgentController@application')->name('apps');

    // Total
    Route::get('total/{user_id}', 'TotalController@total')->name('total');


    Route::get('agent/total/{user_id}', 'AgentController@total')->name('agent.total');
    Route::get('agent/total/grand/{user_id}', 'AgentController@grand_total')->name('agent.total.grand');

    Route::get('create', 'AgentController@create')->name('create');
    Route::post('filtre', 'AgentController@date_fil')->name('filtre');
    Route::post('ext_pay', 'AgentController@ext_pay')->name('ext_pay');

    Route::get('agent', 'AgentController@agent')->name('agent');
    Route::get('agent/contact/{id}', 'AgentController@agent_contact')->name('agent.contact');
    Route::get('agent/total/{id}', 'AgentController@agent_total')->name('agent.total');
    Route::post('agent/oexpanse', 'AgentController@oexpanse')->name('agent.oexpanse');
    Route::post('agent/del.oexpa/{id}', 'AgentController@del_oexpanse')->name('agent.del.oexpa');
    Route::post('post', 'AgentController@post')->name('post');

    Route::post('userdoc', 'AgentController@agent_doc')->name('userdoc');

    Route::get('agent/{id}', 'AgentController@single')->name('name');
    Route::get('update/{id}', 'AgentController@update')->name('update');
    Route::post('update_user/{id}', 'AgentController@update_user')->name('update_user');
    Route::post('update_avatar/{id}', 'AgentController@update_avatar')->name('update_avatar');
    Route::post('update_files/{id}', 'AgentController@update_files')->name('update_files');

    Route::post('spasen', 'AgentController@spasen')->name('spasen');

    // View Applications

    Route::get('appointment', 'AppointmentController@appointment')->name('appointment');
    Route::post('appointment', 'AppointmentController@appointment_post')->name('appointment');
    Route::post('docs', 'ContactsController@docs')->name('docs');
    Route::post('update/{id}', 'AppointmentController@update_status')->name('update');
    Route::post('comission/{id}', 'AppointmentController@comission')->name('comission');


    Route::get('task', 'TaskController@get_page')->name('task');
    Route::post('savetask', 'TaskController@save_task')->name('savetask');
    Route::post('delete_task/{id}', 'TaskController@delete_task')->name('delete_task');

    Route::get('task/update_task/{task_number}', 'TaskController@update_task')->name('task.update_task');
    Route::post('task/update_form_task/{id}', 'TaskController@update_form_task')->name('task.update_form_task');

    Route::get('invoice', 'InvoiceController@invoice')->name('invoice');
    Route::get('new-invoice', 'InvoiceController@new')->name('new-invoice');
    Route::get('invoice/{invoice_number}', 'InvoiceController@invoice_number')->name('invoice');
    Route::post('invoice', 'InvoiceController@post')->name('invoice');


    // Lead

    Route::get('lead', 'LeadController@lead')->name('lead');
    Route::post('update_lead/{id}', 'LeadController@update_lead')->name('lead.update');
    Route::post('lead/import', 'LeadController@import')->name('lead.import');
    Route::get('lead/view/{lead_number}', 'LeadController@view_all')->name('lead.view');
    Route::get('lead/view/{imports}', 'LeadController@imports')->name('lead.view.imports');
    Route::post('savelead', 'LeadController@save_lead')->name('savelead');

    Route::get('leadmail', 'LeadController@lead_mail')->name('leadmail');


    Route::post('lead/note', 'LeadController@leadnote')->name('lead.note');
    Route::post('lead/agent', 'LeadController@lead_agent')->name('lead.agent');

    Route::post('lead/status/{id}', 'LeadController@leadstatus')->name('lead.status');
    Route::post('delete/lead/{id}', 'LeadController@lead_delete')->name('delete.lead');

    Route::get('insurance', 'InsuranceController@insurance')->name('insurance');
    Route::get('insurance/car/list', 'InsuranceController@car_list')->name('insurance.car.list');
    Route::get('insurance/home/list', 'InsuranceController@home_list')->name('insurance.home.list');
    Route::get('insurance-form', 'InsuranceController@insurance_form')->name('insurance.form');
    Route::post('insurance/home/delete/{id}', 'InsuranceController@insurance_home_delete')->name('insurance.home.delete');
    Route::post('insurance/car/delete/{id}', 'InsuranceController@insurance_car_delete')->name('insurance.car.delete');

    Route::get('mail', 'InsuranceController@mail')->name('mail');
    Route::post('mail/post', 'InsuranceController@post')->name('mail.post');

    Route::post('send_nachweis', 'CustomerController@send_nachweis')->name('send_nachweis');

    Route::post('saveinsurance', 'InsuranceController@save_insurance')->name('saveinsurance');
    Route::post('insurance_type', 'InsuranceController@insurance_type')->name('insurance_type');

    Route::get('company', 'InsuranceCompanyController@company')->name('company');
    Route::get('company/health', 'InsuranceCompanyController@company_health')->name('company.health');
    Route::post('company/health', 'InsuranceCompanyController@companyhealth')->name('company.health');
    Route::post('savecompany', 'InsuranceCompanyController@save_insurance')->name('savecompany');

    Route::get('form/law', 'InsuranceController@law')->name('form.law');
    Route::get('form/law/list', 'InsuranceController@law_list')->name('form.law.list');
    Route::post('form/law', 'InsuranceController@law_post')->name('form.law');
    Route::get('form/law/edit/{law_number}', 'InsuranceController@law_edit')->name('form.law.edit');
    Route::post('form/law/update/{id}', 'InsuranceController@law_update')->name('form.law.update');
    Route::post('form/law/delete/{id}', 'InsuranceController@law_delete')->name('form.law.delete');

    Route::get('form/travel', 'InsuranceController@travel')->name('form.travel');
    Route::get('form/travel/list', 'InsuranceController@travel_list')->name('form.travel.list');
    Route::post('form/travel', 'InsuranceController@travel_post')->name('form.travel');
    Route::get('form/travel/edit/{travel_number}', 'InsuranceController@travel_edit')->name('form.travel.edit');
    Route::post('form/travel/update/{id}', 'InsuranceController@travel_update')->name('form.travel.update');
    Route::post('form/travel/delete/{id}', 'InsuranceController@travel_delete')->name('form.travel.delete');


    Route::post('savecompany', 'InsuranceCompanyController@save_insurance')->name('savecompany');
    Route::get('update-insurance/{company_name}', 'InsuranceCompanyController@update_insurance_page')->name('update-insurance');
    Route::post('update-insurance/health/{id}', 'InsuranceCompanyController@update_insurance_post')->name('update-insurance.health');

    Route::post('update-insurance/health/logo/{id}', 'InsuranceCompanyController@update_insurance_post_logo')->name('update-insurance.health.logo');
    Route::post('delete/health/logo/{id}', 'InsuranceCompanyController@delog')->name('delete.health.logo');

    Route::get('update/health/{name}', 'InsuranceCompanyController@update_insurance_page_health')->name('update.health');
    Route::post('update-insurance/{id}', 'InsuranceCompanyController@update_insurance')->name('update-insurance');

    Route::post('delete/insurance/{id}', 'InsuranceCompanyController@delete_insurance_company')->name('delete.insurance');
    Route::post('delete/insurance/health/{id}', 'InsuranceCompanyController@delete_insurance_company_health')->name('delete.insurance.health');

    Route::post('delete/icon/{id}', 'InsuranceCompanyController@delete_icon_company')->name('delete.icon');

});


// Broker
Route::namespace('Broker')->prefix('broker')->name('broker.')->group(function(){

    Route::get('dashboard', 'DasboardController@view_dashboard')->name('dashboard');

    Route::get('offer-from-company', 'OfferFromController@view')->name('offer-from');

    Route::get('form', 'InsuranceController@form')->name('form');
    Route::get('form/home', 'InsuranceController@home')->name('form.home');
    Route::post('form/home', 'InsuranceController@home_form')->name('form.home');

    Route::get('view/insurance/car/{insurance_number}','InsuranceController@view_single_car')->name('view.insurance.car');

    Route::get('view/insurance/home/{insurance_number}','InsuranceController@view_single_home')->name('view.insurance.home');
    Route::post('view/insurance/home/{id}','InsuranceController@view_single_home_post')->name('view.insurance.home');
    Route::post('post/insurance/car/{id}','InsuranceController@car_update_form')->name('post.insurance.car');

    Route::post('mailCar', 'InsuranceController@mailCar')->name('mailCar');
    Route::post('mailhome', 'InsuranceController@mailhome')->name('mailhome');

    Route::get('form/car', 'InsuranceController@car')->name('form.car');
    Route::post('form/car', 'InsuranceController@car_form')->name('form.car');

    Route::get('form/business', 'InsuranceController@business')->name('form.business');

    Route::get('customer', 'CustomerController@view_customer')->name('customer');
    Route::get('customer/edit/{customer_number}', 'CustomerController@edit_customer')->name('customer.edit');
    Route::post('customer/edit/{id}', 'CustomerController@update_customer')->name('customer.edit');
    Route::post('save', 'CustomerController@save_customer')->name('save');
    Route::get('nachweis/{customer_number}', 'CustomerController@nachweis')->name('nachweis');
    Route::post('post_nachweis', 'CustomerController@post_nachweis')->name('post_nachweis');
    Route::get('edit_nachweis/{customer_number}', 'CustomerController@edit_nachweis')->name('edit_nachweis');

    Route::get('company/health', 'InsuranceController@company_health')->name('company.health');

    Route::get('contact', 'ContactsController@contact')->name('contact');
    Route::post('docs', 'ApplicationController@docs')->name('docs');
    Route::post('update/{id}', 'ApplicationController@update_status')->name('update');

    Route::get('contact', 'ContactsController@contact')->name('contact');
    Route::get('contact/view/{customer_number}', 'ContactsController@customer_number')->name('contact.view');
    Route::get('contact/doc/{doc_number}', 'ContactsController@doc')->name('contact.doc');
    Route::get('contact/app/{application_number}', 'ContactsController@appli')->name('contact.app');
    Route::get('contact', 'ContactsController@contact')->name('contact');


    Route::get('offer/{customer_number}', 'ApplicationController@view_page')->name('offer');
    Route::get('new', 'ApplicationController@new')->name('new');
    Route::get('pdf/{customer_number}', 'ApplicationController@pdf')->name('pdf');

    Route::post('update/{id}', 'ApplicationController@update_status')->name('update');
    Route::post('post_application', 'ApplicationController@post_application')->name('post_application');

    // Law
    Route::get('form/law/list', 'InsuranceController@law_list')->name('form.law.list');
    Route::get('form/law', 'InsuranceController@law')->name('form.law');
    Route::post('form/law', 'InsuranceController@law_post')->name('form.law');
    Route::get('form/law/edit/{law_number}', 'InsuranceController@law_edit')->name('form.law.edit');
    Route::post('form/law/update/{id}', 'InsuranceController@law_update')->name('form.law.update');
    Route::post('form/law/delete/{id}', 'InsuranceController@law_delete')->name('form.law.delete');


    Route::get('form/travel', 'InsuranceController@travel')->name('form.travel');
    Route::get('form/travel/list', 'InsuranceController@travel_list')->name('form.travel.list');
    Route::post('form/travel', 'InsuranceController@travel_post')->name('form.travel');
    Route::get('form/travel/edit/{travel_number}', 'InsuranceController@travel_edit')->name('form.travel.edit');
    Route::post('form/travel/update/{id}', 'InsuranceController@travel_update')->name('form.travel.update');
    Route::post('form/travel/delete/{id}', 'InsuranceController@travel_delete')->name('form.travel.delete');


    Route::post('lead/note', 'LeadController@leadnote')->name('lead.note');
    Route::post('update_lead/{id}', 'LeadController@update_lead')->name('lead.update');
    Route::post('lead/status/{id}', 'LeadController@leadstatus')->name('lead.status');

    Route::get('task', 'TaskController@get_page')->name('task');
    Route::post('savetask', 'TaskController@save_task')->name('savetask');
    Route::get('task/update_task/{task_number}', 'TaskController@update_task')->name('task.update_task');
    Route::post('task/update_form_task/{id}', 'TaskController@update_form_task')->name('task.update_form_task');

    Route::get('lead', 'LeadController@lead')->name('lead');
    Route::get('lead/view/{lead_number}', 'LeadController@view_all')->name('lead.view');
    Route::post('savelead', 'LeadController@save_lead')->name('savelead');

    Route::get('insurance', 'InsuranceController@insurance')->name('insurance');
    Route::get('insurance-form', 'InsuranceController@insurance_form')->name('insurance.form');
    Route::get('insurance/car/list', 'InsuranceController@car_list')->name('insurance.car.list');
    Route::get('insurance/home/list', 'InsuranceController@home_list')->name('insurance.home.list');

    Route::post('saveinsurance', 'InsuranceController@save_insurance')->name('saveinsurance');
    Route::post('insurance_type', 'InsuranceController@insurance_type')->name('insurance_type');


    Route::get('fremdvertrag', 'ApplicationController@fremdvertrag')->name('fremdvertrag');
    Route::get('fremdvertrag/page/{customer_number}', 'ApplicationController@fremdvertrag_page')->name('fremdvertrag.page');
    Route::post('fremdvertrag/post', 'ApplicationController@fremdvertrag_post')->name('fremdvertrag.post');
    Route::get('fremdvertrag/edit/{con_number}', 'ApplicationController@fremdvertrag_edit')->name('fremdvertrag.edit');
    Route::post('fremdvertrag/delete/{id}', 'ApplicationController@fremdvertrag_delete')->name('fremdvertrag.delete');


});




// SuperAdmin
Route::namespace('Superadmin')->prefix('superadmin')->name('superadmin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UserController',['except' => ['show','create','store']]);
});
