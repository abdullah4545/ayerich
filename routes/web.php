<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebviewController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TikitController;
use App\Http\Controllers\FoundtransferController;
use App\Http\Controllers\WithdrewController;
use App\Http\Controllers\RechargeController;
use App\Http\Controllers\FixeddepositController;
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
    return view('webview.content.maincontent');
});
// web view
Route::get('venture/about_us', [WebviewController::class, 'about_us']);
Route::get('venture/contact_us', [WebviewController::class, 'contact_us']);
Route::get('venture/faq', [WebviewController::class, 'faq']);
Route::get('venture/terms_codition', [WebviewController::class, 'terms_codition']);
Route::get('venture/help_center', [WebviewController::class, 'help_center']);
Route::get('venture/company', [WebviewController::class, 'company']);
Route::get('venture/customer_service', [WebviewController::class, 'customer_service']);
Route::get('venture/shopping_guide', [WebviewController::class, 'shopping_guide']);

Route::get('venture/{slug}', [WebviewController::class, 'index']);
Route::get('menu/{slug}', [WebviewController::class, 'menuindex']);
Route::get('product/{slug}', [WebviewController::class, 'productdetails']);
Route::get('products/category/{slug}', [WebviewController::class, 'categoryproduct']);
Route::get('get/products/by-category', [WebviewController::class, 'getcategoryproduct']);
Route::get('get/products/by-subcategory', [WebviewController::class, 'getsubcategoryproduct']);
Route::get('products/sub/category/{slug}', [WebviewController::class, 'subcategoryproduct']);
Route::post('add-to-cart', [CartController::class, 'addtocart']);
Route::post('order-to-cart', [CartController::class, 'ordertocart']);
Route::get('get-cart-content', [CartController::class, 'getcartcontent']);
Route::post('remove-cart', [CartController::class, 'destroy']);
Route::get('update-cart', [CartController::class, 'cartcontent']);
Route::get('get-checkcart-content', [CartController::class, 'getcheckcartcontent']);
Route::get('cart', [CartController::class, 'cart']);
Route::get('checkout', [CartController::class, 'checkout']);
Route::get('payment/methood', [CartController::class, 'payment'])->name('payment.methood');
Route::get('order/complete', [CartController::class, 'complete']);
Route::post('/update-cart', [CartController::class, 'updatecart']);
Route::get('load-cart', [CartController::class, 'loadcart']);
Route::post('press/order', [OrderController::class, 'pressorder']);
Route::post('update/paymentmethood', [OrderController::class, 'updatepaymentmethood']);

Route::get('what-we-offer', [WebviewController::class, 'whatWeOffer']);
Route::get('tms', [WebviewController::class, 'Tms']);
Route::get('affiliate', [WebviewController::class, 'affiliate']);
Route::get('team/work', [WebviewController::class, 'teamWork']);

// shop
Route::get('shops', [WebviewController::class, 'shops']);
Route::get('shop/{id}/product', [WebviewController::class, 'shopproduct']);

// track
Route::get('track-order', [WebviewController::class, 'orderTraking']);
Route::post('track-now', [WebviewController::class, 'orderTrakingNow']);

Route::group(['prefix'=>'user','middleware' => ['auth:web']], function () {
    Route::resource('supporttikits', TikitController::class);
    Route::post('replay/tikit/{id}', [TikitController::class, 'replay']);
    Route::resource('fixeddeposits', FixeddepositController::class);
    Route::get('fixeddeposit', [FixeddepositController::class, 'fixeddepositdata'])->name('fixeddepositdata');
    Route::get('get/bankinfo/{id}', [FixeddepositController::class, 'getdata']);

    Route::resource('withdrews', WithdrewController::class);
    Route::get('withdrewdata', [WithdrewController::class, 'withdrewdata'])->name('withdrewdata');
    Route::resource('recharges', RechargeController::class);
    Route::get('rechargedata', [RechargeController::class, 'rechargedata'])->name('rechargedata');

    // found transfer report
    Route::get('fundtransfer/report', [FoundtransferController::class, 'viewreport'])->name('maindata');
    Route::get('fundtransfer/report/data', [FoundtransferController::class, 'viewreportdata']);
    Route::get('fundtransfer/report/download', [FoundtransferController::class, 'downloadreport']);
    // income report
    Route::get('income/report', [FoundtransferController::class, 'viewincomereport'])->name('mainincomedata');
    Route::get('income/report/data', [FoundtransferController::class, 'viewincomereportdata']);
    Route::get('income/report/download', [FoundtransferController::class, 'downloadincomereport']);


    // found transfer main to myblance
    Route::post('user/foundtransfer/main', [FoundtransferController::class, 'main'])->name('foundtransfermain');
    Route::get('user/foundtransfer/maindata', [FoundtransferController::class, 'maindata'])->name('maindata');


});

Route::group(['middleware' => ['auth:web']], function () {
    Route::get('user/profile', [WebviewController::class, 'profile']);
    Route::post('update/profile', [WebviewController::class, 'updateprofile']);
    Route::get('user/purchase_history', [WebviewController::class, 'orderhistory']);
    Route::get('user/order/details/{id}', [WebviewController::class, 'userorderdetails']);

    Route::get('user/wallets', [WebviewController::class, 'wallets']);

    Route::get('user/shops', [WebviewController::class, 'UserShop']);

    Route::get('user/transfer/income', [WebviewController::class, 'trincome']);
    Route::get('user/transfer/leader-bonus', [WebviewController::class, 'trleader']);
    Route::get('user/transfer/group-bonus', [WebviewController::class, 'trgroup']);

    // found transfer referral bonus
    Route::post('user/foundtransfer/referral', [FoundtransferController::class, 'referral'])->name('foundtransferreferral');
    Route::get('user/foundtransfer/referraldata', [FoundtransferController::class, 'referraldata'])->name('referraldata');
    // found transfer teammate bonus
    Route::post('user/foundtransfer/teammate', [FoundtransferController::class, 'teammate'])->name('foundtransferteammate');
    Route::get('user/foundtransfer/teammatedata', [FoundtransferController::class, 'teammatedata'])->name('teammatedata');
    // found transfer global bonus
    Route::post('user/foundtransfer/global', [FoundtransferController::class, 'global'])->name('foundtransferglobal');
    Route::get('user/foundtransfer/globaldata', [FoundtransferController::class, 'globaldata'])->name('globaldata');
    // found transfer group bonus
    Route::post('user/foundtransfer/group', [FoundtransferController::class, 'group'])->name('foundtransfergroup');
    Route::get('user/foundtransfer/groupdata', [FoundtransferController::class, 'groupdata'])->name('groupdata');
    // found transfer leadership bonus
    Route::post('user/foundtransfer/leadership', [FoundtransferController::class, 'leadership'])->name('foundtransferleadership');
    Route::get('user/foundtransfer/leadershipdata', [FoundtransferController::class, 'leadershipdata'])->name('leadershipdata');
    // found transfer purchase bonus
    Route::post('user/foundtransfer/purchase', [FoundtransferController::class, 'purchase'])->name('foundtransferpurchase');
    Route::get('user/foundtransfer/purchasedata', [FoundtransferController::class, 'purchasedata'])->name('purchasedata');
    // found transfer royalty bonus
    Route::post('user/foundtransfer/royalty', [FoundtransferController::class, 'royalty'])->name('foundtransferroyalty');
    Route::get('user/foundtransfer/royaltydata', [FoundtransferController::class, 'royaltydata'])->name('royaltydata');

    Route::get('user/transfer-found/{slug}', [WebviewController::class, 'transferfound']);

    // amount transfer
    Route::get('user/amount/of/{slug}', [WebviewController::class, 'getamount']);
    Route::get('user/update/rank/request', [WebviewController::class, 'updaterankreq']);

    // referral user
    Route::get('user/referral-user', [WebviewController::class, 'referraluser']);
    Route::get('user/generation', [WebviewController::class, 'generationuser']);
    Route::get('user/see-genology/{id}', [WebviewController::class, 'genology']);

});


Route::get('user/dashboard', function () {
    return view('dashboard');
})->middleware(['auth:web'])->name('dashboard');
require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
