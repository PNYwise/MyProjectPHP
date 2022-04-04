<?php

use App\Http\Controllers\Api\Admin\BadWordController;
use App\Http\Controllers\Api\Admin\CollectionController;
use App\Http\Controllers\Api\Admin\CustomerRepController;
use App\Http\Controllers\Api\Admin\FeedBackController;
use App\Http\Controllers\Api\Admin\ManagerController;
use App\Http\Controllers\Api\Admin\NewsController;
use App\Http\Controllers\Api\Admin\NotificationController;
use App\Http\Controllers\Api\Admin\StatisticController;
use App\Http\Controllers\Api\Admin\UserController;
use App\Http\Controllers\Api\Admin\VerifyController;
use App\Http\Controllers\Api\Admin\WalletController;
use App\Http\Controllers\Api\Admin\WasteCollectorController;
use App\Http\Controllers\Api\Beever\BeeverController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\PaymentController as ApiPaymentController;
use App\Http\Controllers\Api\SocialMediaLoginController;
use App\Http\Controllers\Api\User\UserController as UserUserController;
use App\Http\Controllers\Api\WasteCollector\WasteCollectorController as WasteCollectorWasteCollectorController;
use App\Http\Controllers\PublicPagesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/bad', function () {
    return response()->json([
        "success" => 0,
        "massage" => "Unauthorised",
    ], 401);
})->name('bad');

Route::get('public/news', [NewsController::class, 'allNews']);
route::get('public/news/{slug}', [PublicPagesController::class, 'news']);
Route::post('/register', [LoginController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);

Route::post('/login/facebook', [SocialMediaLoginController::class, 'facebookLogin']);
Route::post('/login/google', [SocialMediaLoginController::class, 'googleLogin']);


Route::middleware('auth:api')->group(function () {
    Route::middleware('apiadmin')->group(function () {
        Route::get('/userdata', [UserController::class, 'userData']);
        // user 
        Route::get('/userdata/detail/{id}', [UserController::class, 'detailUser']);
        Route::get('/userdata/userStratistic/{id}', [UserController::class, 'userStratistic']);

        Route::put('/suspend', [UserController::class, 'suspend']);
        Route::put('/unsuspend', [UserController::class, 'unSuspend']);
        Route::put('/changerole', [UserController::class, 'changeRole']);
        Route::delete('/remove', [UserController::class, 'delete']);

        // manager
        Route::get('/manager', [ManagerController::class, 'managerList']);
        Route::get('/manager/detail/{id}', [UserController::class, 'detailUser']);
        Route::post('/manager/add', [ManagerController::class, 'addmanager']);


        // customer Rep
        Route::get('/customerrep', [CustomerRepController::class, 'customerRepList']);
        Route::get('/customerrep/detail/{id}', [UserController::class, 'detailUser']);
        Route::post('/customerrep/add', [CustomerRepController::class, 'addCustomerRep']);

        // waste collector
        Route::get('/wasteCollector', [WasteCollectorController::class, 'wasteCollerctorList']);
        Route::get('/wasteCollector/detail/{id}', [UserController::class, 'detailUser']);

        // collection
        Route::get('/collection', [CollectionController::class, 'allCollection']);
        Route::get('/disputeCollection', [CollectionController::class, 'disputeCollection']);
        Route::get('/collection/detail/{order_code}', [CollectionController::class, 'allCollectionDetail']);
        Route::get('/disputeCollection/detail/{order_code}', [CollectionController::class, 'allCollectionDetail']);

        // news
        Route::get('/news', [NewsController::class, 'allNews']);
        Route::get('/news/detail/{slug}', [NewsController::class, 'detailNews']);
        Route::post('/news/store', [NewsController::class, 'storeNews']);
        Route::delete('/news/delete', [NewsController::class, 'deleteNews']);
        Route::put('/news/edit/{slug}', [NewsController::class, 'editNews']);

        // verify
        Route::get('/verify', [VerifyController::class, 'Verifylist']);
        Route::get('/verify/detail/{id}', [VerifyController::class, 'verifyDetail']);
        Route::put('/verify/member', [VerifyController::class, 'verifyMember']);

        //Statistic
        Route::post('/order/statistic', [StatisticController::class, 'orderStatistic']);
        Route::post('/user/statistic', [StatisticController::class, 'userStatistic']);
        Route::post('/collection/statistic', [StatisticController::class, 'collectionStatistic']);

        //Default Statistic
        Route::get('/order/statistic/default', [StatisticController::class, 'defaultorderStatistic']);
        Route::get('/user/Statistic/default', [StatisticController::class, 'defaultuserStatistic']);
        Route::get('/collection/statistic/default', [StatisticController::class, 'defaultcollectionStatistic']);



        //wallet
        Route::get('/wallet/transactrion', [WalletController::class, 'walletTransactrion']);


        // Badword
        Route::get('/badword', [BadWordController::class, 'list']);
        Route::post('/badword/add', [BadWordController::class, 'add']);
        Route::delete('/badword/delete', [BadWordController::class, 'delete']);

        //feedback
        Route::get('/feedback', [FeedBackController::class, 'index']);

        // pushNotification
        Route::post('/sendNotification', [NotificationController::class, 'sendNotification']);
    });

    Route::middleware('beever')->group(function () {
        Route::get('/beever/get', [BeeverController::class, 'getBeeverAuth']);

        //update location and status
        Route::patch('/beever/update/location', [BeeverController::class, 'updateLocation']);


        Route::patch('/beever/collection/accept', [BeeverController::class, 'acceptOrder']);
        Route::post('/beever/collection/confirm', [BeeverController::class, 'confirmedOrder']);
    });

    Route::middleware('wastecollector')->group(function () {
        Route::get('/wastecollector/collection/history', [WasteCollectorWasteCollectorController::class, 'collectionHistory']);
        Route::get('/wastecollector/collection/{orderCode}', [WasteCollectorWasteCollectorController::class, 'getCollectionByOrderCode']);
    });

    // create collection
    Route::post('/userdata/collection', [UserUserController::class, 'collection']);
    Route::patch('/userdata/collection/accept', [UserUserController::class, 'acceptOrder']);

    Route::get('/userdata/get', [UserUserController::class, 'getUserAuth']);
    Route::put('/userdata/update', [UserUserController::class, 'update']);
    Route::post('/userdata/update/image', [UserUserController::class, 'updateImage']);
    Route::put('/userdata/update/socialmedia', [UserUserController::class, 'socialMediaUpdate']);
    Route::put('/userdata/update/device-token', [UserUserController::class, 'deviceTokenUpdate']);
    Route::put('/userdata/update/latlong', [UserUserController::class, 'latLongUpdate']);
    Route::post('/userdata/change-role-to-beever', [UserUserController::class, 'changeRoleToBeever']);

    // collection
    Route::get('/userdata/collection/history', [UserUserController::class, 'collectionHistory']);
    Route::get('/userdata/collection/history/detail/{orderCode}', [UserUserController::class, 'detailCollectionHistory']);

    Route::get('/userdata/waste/list', [UserUserController::class, 'wasteList']);

    //find beever
    Route::post('/userdata/find/beever', [UserUserController::class, 'findBeever']);

    // feedback
    Route::post('/userdata/feedback', [UserUserController::class, 'giveFeedback']);

    // rate
    Route::post('/userdata/rate', [UserUserController::class, 'rate']);

    //cenceling order
    Route::put('/userdata/cenceling', [UserUserController::class, 'cancelOrder']);

    //data display
    Route::get('/collectionMade', [StatisticController::class, 'collectionMade']);
    Route::get('/materialRecycled', [StatisticController::class, 'materialRecycled']);
    Route::get('/treeSaved', [StatisticController::class, 'treeSaved']);


    // Xendit
    route::get('/xendit/va/list', [ApiPaymentController::class, 'getListVA']);
    route::post('/xendit/va/invoice', [ApiPaymentController::class, 'createVA']);
    route::get('/xendit/disbursement/list', [ApiPaymentController::class, 'getListDisbursements']);
    route::post('/xendit/disbursement/invoice', [ApiPaymentController::class, 'createDisbursement']);

    Route::post('/logout', [LoginController::class, 'logout']);
});
// callback
Route::get('/auth/callback', [SocialMediaLoginController::class, 'googleLogin']);
route::post('/xendit/va/callback', [ApiPaymentController::class, 'callbackVA']);
route::post('/xendit/disbursement/callback', [ApiPaymentController::class, 'callbackDisbursement']);
