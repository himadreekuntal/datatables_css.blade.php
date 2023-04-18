<?php

use App\Http\Controllers\Employee\EmployeeLoginController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

/*Auth::routes(['register' => false]);*/

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['middleware' => ['auth']], function() {
    Route::get('/pos', [App\Http\Controllers\HomeController::class, 'pos'])->name('pos');
    Route::get('/hrm', [App\Http\Controllers\HomeController::class, 'hrm'])->name('hrm');
    Route::get('/finance', [App\Http\Controllers\HomeController::class, 'finance'])->name('finance');
    Route::get('/report', [App\Http\Controllers\HomeController::class, 'report'])->name('report');
    Route::get('/other', [App\Http\Controllers\HomeController::class, 'other'])->name('other');
    Route::resource('categories', App\Http\Controllers\CategoryController::class);
    Route::get('/categories/status/update', 'App\Http\Controllers\CategoryController@updateStatus')->name('category.status');

    Route::resource('brands', App\Http\Controllers\BrandController::class);
    Route::get('/brands/status/update', 'App\Http\Controllers\BrandController@updateStatus')->name('brand.status');

    Route::resource('products', App\Http\Controllers\ProductController::class);
    Route::get('/products/status/update', 'App\Http\Controllers\ProductController@updateStatus')->name('product.status');
    Route::get('/products/addStock/{product_id}', [
        'as' => 'addStock', 'uses' => 'App\Http\Controllers\ProductController@addStock'
    ]);
    Route::get('/pdfProduct/{id}', [
        'as' => 'pdfProduct', 'uses' => 'App\Http\Controllers\ProductController@pdfProduct'
    ]);
    Route::post('stockUpdate/{id}', 'App\Http\Controllers\ProductController@stockUpdate')->name('stockUpdate');

    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('customers', App\Http\Controllers\CustomerController::class);
    Route::get('/pdfCustomer/{id}', [
        'as' => 'pdfCustomer', 'uses' => 'App\Http\Controllers\CustomerController@pdfCustomer'
    ]);
    Route::get('/customers/status/update', 'App\Http\Controllers\CustomerController@updateStatus')->name('customer.status');
    Route::resource('sales', App\Http\Controllers\SaleController::class);
    Route::get('searchajax', ['as'=>'searchajax','uses'=>'SaleController@getProduct']);

    Route::get('api/v1/products/search','App\Http\Controllers\SaleController@search')
    ->name('api.products.search');
    Route::get('/print/{sale_id}', [
        'as' => 'print', 'uses' => 'App\Http\Controllers\SaleController@prnpriview'
    ]);
    Route::get('/printchalan/{sale_id}', [
        'as' => 'printchalan', 'uses' => 'App\Http\Controllers\SaleController@prnprichalan'
    ]);

    Route::get('/mail/{id}', [
        'as' => 'mail', 'uses' => 'App\Http\Controllers\SaleController@mail'
    ]);
    Route::get('/customermail/{id}', [
        'as' => 'customermail', 'uses' => 'App\Http\Controllers\SaleController@customermail'
    ]);

    Route::get('/pdf/{sale_id}', [
        'as' => 'pdf', 'uses' => 'App\Http\Controllers\SaleController@export_pdf'
    ]);

    Route::resource('quotations', App\Http\Controllers\QuotationController::class);
    Route::get('/printQuotation/{quotation_id}', [
        'as' => 'quotationprint', 'uses' => 'App\Http\Controllers\QuotationController@prnpriview'
    ]);
    Route::get('/mailQuotation/{id}', [
        'as' => 'quotationmail', 'uses' => 'App\Http\Controllers\QuotationController@mail'
    ]);

    Route::get('/pdfQuotation/{quotation_id}', [
        'as' => 'quotationpdf', 'uses' => 'App\Http\Controllers\QuotationController@export_pdf'
    ]);
    Route::resource('reports', 'App\Http\Controllers\ReportController');
    Route::get('reportStock', 'App\Http\Controllers\ReportController@stock')->name('reportStock');

    Route::get('reportLC', 'App\Http\Controllers\ReportController@reportLC')->name('reportLC');
    Route::post('displayLCReport', 'App\Http\Controllers\ReportController@displayLCReport')->name('displayLCReport');

    Route::get('reportProduct', 'App\Http\Controllers\ReportController@product')->name('reportProduct');
    Route::get('reportMonthlyStock', 'App\Http\Controllers\ReportController@monthlyStock')->name('reportMonthlyStock');
    Route::post('displayReport', 'App\Http\Controllers\ReportController@displayReport')->name('displayReport');
    Route::post('displayProductReport', 'App\Http\Controllers\ReportController@displayProductReport')->name('displayProductReport');
    Route::resource('stockFiles', App\Http\Controllers\StockFileController::class);
    Route::resource('tenders', App\Http\Controllers\TenderController::class);
    Route::get('/tenders/status/update/{id}', 'App\Http\Controllers\TenderController@updateStatus')->name('tenders.status');
    Route::get('/bgs/status/update/{id}', 'App\Http\Controllers\TenderController@bgStatus')->name('bgs.status');
    Route::get('/pgs/status/update/{id}', 'App\Http\Controllers\TenderController@pgStatus')->name('pgs.status');
    Route::resource('bankGurantees', App\Http\Controllers\BankGuranteeController::class);

    Route::resource('performanceGurantees', App\Http\Controllers\PerformanceGuranteeController::class);
    Route::get('/testEmail', 'App\Http\Controllers\CustomerEmailController@testEmail')->name('testEmail');
    Route::resource('employeeLeaves', App\Http\Controllers\EmployeeLeaveController::class);


    Route::resource('employeeLeaves', App\Http\Controllers\EmployeeLeaveController::class);
    Route::get('/employeeLeaves/approve/{id}', 'App\Http\Controllers\EmployeeLeaveController@approve')->name('approve');
    Route::get('/employeeLeaves/disapprove/{id}', 'App\Http\Controllers\EmployeeLeaveController@disapprove')->name('disapprove');
    Route::get('reportLeave', 'App\Http\Controllers\EmployeeLeaveController@reportLeave')->name('reportLeave');
    Route::post('displayLeaveReport', 'App\Http\Controllers\EmployeeLeaveController@displayLeaveReport')->name('displayLeaveReport');
    Route::resource('monthlySalaries', App\Http\Controllers\MonthlySalaryController::class);
    Route::get('monthlySalaries/approve/{id}', [App\Http\Controllers\MonthlySalaryController::class, 'approve'])->name('salary-approve');
});











Route::resource('lCDetails', App\Http\Controllers\LCDetailController::class);

Route::resource('lCDetails', App\Http\Controllers\LCDetailController::class);
Route::get('ltrPayment/{id}', 'App\Http\Controllers\LCDetailController@ltrPayment')->name('ltrPayment');

Route::resource('lTRPayments', App\Http\Controllers\LTRPaymentController::class);

Route::get('lcReport/{id}', 'App\Http\Controllers\LCDetailController@lcReport')->name('lcReport');

Route::resource('departments', App\Http\Controllers\DepartmentController::class);
Route::get('/departments/status/update', 'App\Http\Controllers\DepartmentController@updateStatus')->name('department.status');

Route::resource('employees', App\Http\Controllers\EmployeeController::class);

Route::resource('expenditureLists', App\Http\Controllers\ExpenditureListController::class);

Route::resource('dailyExpenditures', App\Http\Controllers\DailyExpenditureController::class);
Route::get('reportExpense', 'App\Http\Controllers\DailyExpenditureController@reportExpense')->name('reportExpense');
Route::post('displayExpenseReport', 'App\Http\Controllers\DailyExpenditureController@displayExpenseReport')->name('displayExpenseReport');

Route::get('reportBalance', 'App\Http\Controllers\DailyExpenditureController@reportBalance')->name('reportBalance');
Route::post('displayBalanceSheet', 'App\Http\Controllers\DailyExpenditureController@displayBalanceSheet')->name('displayBalanceSheet');

Route::get('cashBook', 'App\Http\Controllers\DailyExpenditureController@cashBook')->name('cashBook');
Route::post('displayCashBook', 'App\Http\Controllers\DailyExpenditureController@displayCashBook')->name('displayCashBook');


Route::resource('designations', App\Http\Controllers\DesignationController::class);
Route::get('/designations/status/update', 'App\Http\Controllers\DesignationController@updateStatus')->name('designation.status');

Route::resource('educationEmployees', App\Http\Controllers\EducationEmployeeController::class);




Route::resource('productDescriptions', App\Http\Controllers\ProductDescriptionController::class);

Route::resource('customerEmails', App\Http\Controllers\CustomerEmailController::class);
Route::get('email/{id}', 'App\Http\Controllers\CustomerEmailController@email')->name('email');
Route::get('sms/{id}', 'App\Http\Controllers\CustomerEmailController@sms')->name('sms');

Route::post('send-email', 'App\Http\Controllers\CustomerEmailController@sendEmail')->name('sendEmail');
Route::post('send-sms', 'App\Http\Controllers\CustomerEmailController@sendSms')->name('sendSms');

Route::resource('customerEmailDetails', App\Http\Controllers\CustomerEmailDetailController::class);



Route::prefix('employee')->name('employee.')->group(function(){

    Route::middleware(['guest:employee'])->group(function(){
        Route::view('/','employee_dashboard.login')->name('login');
        Route::post('/check',[EmployeeLoginController::class,'check'])->name('check');


    });

    Route::middleware(['auth:employee'])->group(function(){
        //  Route::view('/home','student_dashboard.home')->name('home');
        Route::get('/home',[EmployeeLoginController::class,'index'])->name('home');
        Route::get('/leave',[EmployeeLoginController::class,'leave'])->name('leave');
       Route::get('/leaveCreate',[EmployeeLoginController::class,'leaveCreate'])->name('leaveCreate');
        Route::post('/leaveStore',[EmployeeLoginController::class,'leaveStore'])->name('leaveStore');

        Route::get('/advance-payment',[EmployeeLoginController::class,'advancePayment'])->name('advance-payment');
        Route::post('/advance-payment-store',[EmployeeLoginController::class,'advancePaymentStore'])->name('advance-payment-store');
        /*  Route::get('/doctorAppointment',[EmployeeLoginController::class,'doctorAppointment'])->name('doctorAppointment');*/
        Route::post('/logout',[EmployeeLoginController::class,'logout'])->name('logout');

    });
});


Route::get('/clear', function() {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');

    return "Cleared!";

});






Route::resource('leaveCategories', App\Http\Controllers\LeaveCategoryController::class);



Route::resource('taxes', App\Http\Controllers\TaxController::class);


Route::resource('taxDetails', App\Http\Controllers\TaxDetailController::class);


Route::resource('employeeSalaries', App\Http\Controllers\EmployeeSalaryController::class);
Route::get('tax/{empId}/{totalA}', [App\Http\Controllers\EmployeeSalaryController::class, 'tax'])->name('tax');


Route::resource('advancePayments', App\Http\Controllers\AdvancePaymentController::class);


Route::resource('advancePaymentDetails', App\Http\Controllers\AdvancePaymentDetailController::class);





Route::resource('bankTransactions', App\Http\Controllers\BankTransactionController::class);


Route::resource('cashHands', App\Http\Controllers\CashHandController::class);


Route::resource('permissions', App\Http\Controllers\PermissionController::class);

Route::get('checkStock/{productID}', function ($productID) {
    $quantity = App\Models\Product::where('id',$productID)->first();
    if ($quantity->qty == 0) {
        // user doesn't exist
        $qty = 'false';
    }
    else{
        $qty = 'true';
    }
    return response()->json($qty);
});
Route::get('checkQuantity/{productID}/{qty}', function ($productID, $qty) {
    $quantity = App\Models\Product::where('id',$productID)->first();
    if ($quantity->qty >= $qty) {
        // user doesn't exist
        $stk = 'True';
    }
    else{
        $stk = 'False';
    }
    return response()->json($stk);
});
