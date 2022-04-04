<?php

use App\Http\Controllers\BadWordController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\CustomerRepController;
use App\Http\Controllers\FeedBackController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerifyController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\WasteCollectorController;
use App\Http\Controllers\WasteController;
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

Route::get('/', [LoginController::class, 'index'])->name('/')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest')->name('login');

Route::prefix('dashboard')->group(function () {
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/home', function () {
            return view('home.index');
        })->name('home');
        // user 
        Route::get('/userdata', [UserController::class, 'userData'])->name('userdata');
        Route::get('/userdata/detailuser/{id}', [UserController::class, 'detailUser'])->name('detailuser');
        Route::get('/userdata/userStratistic/{id}', [UserController::class, 'userStratistic'])->name('userStratistic');

        Route::put('/suspend', [UserController::class, 'suspend'])->name('suspend');
        Route::put('/unsuspend', [UserController::class, 'unSuspend'])->name('unsuspend');
        Route::put('/changerole', [UserController::class, 'changeRole'])->name('changerole');
        Route::delete('/remove', [UserController::class, 'delete'])->name('remove');

        Route::get('/setting', [UserController::class, 'setting'])->name('setting');
        Route::patch('/password', [PasswordController::class, 'update'])->name('password.update');

        // manager
        Route::get('/managerlist', [ManagerController::class, 'managerList'])->name('managerlist');
        Route::get('/managerlist/detailmanager/{id}', [UserController::class, 'detailUser'])->name('detailmanager');
        Route::post('/addmanager', [ManagerController::class, 'addmanager'])->name('addmanager');

        // customer Rep
        Route::get('/customerrepList', [CustomerRepController::class, 'customerRepList'])->name('customerrepList');
        Route::get('/customerrepList/detailcustomerrep/{id}', [UserController::class, 'detailUser'])->name('detailcustomerrep');
        Route::post('/adcustomerrep', [CustomerRepController::class, 'addCustomerRep'])->name('adcustomerrep');

        // waste collector
        Route::get('/wasteCollectorlist', [WasteCollectorController::class, 'wasteCollerctorList'])->name('wasteCollectorlist');
        Route::get('/wasteCollector/detailwasteCollector/{id}', [UserController::class, 'detailUser'])->name('detailwasteCollector');


        // collection
        Route::get('/allCollection', [CollectionController::class, 'allCollection'])->name('allCollection');
        Route::get('/disputeCollection', [CollectionController::class, 'disputeCollection'])->name('disputeCollection');
        Route::put('/disputeCollection/accept', [CollectionController::class, 'accept'])->name('disputeCollection.accept');
        Route::put('/disputeCollection/cencel', [CollectionController::class, 'cencel'])->name('disputeCollection.cencel');
        Route::get('/allCollection/detail/{order_code}', [CollectionController::class, 'allCollectionDetail'])->name('allCollectionDetail');
        Route::get('/disputeCollection/detail/{order_code}', [CollectionController::class, 'allCollectionDetail'])->name('disputeCollectionDetail');

        // news
        Route::get('/allNews', [NewsController::class, 'allNews'])->name('allNews');
        Route::get('/allNews/newsdetail/{slug}', [NewsController::class, 'detailNews'])->name('detailNews');
        Route::get('/allNews/addnews', [NewsController::class, 'addNews'])->name('addNews');
        Route::post('/allNews/storeNews', [NewsController::class, 'storeNews'])->name('storeNews');
        Route::delete('/allNews/deletenews', [NewsController::class, 'deleteNews'])->name('deleteNews');
        Route::get('/allNews/updatenews/{slug}', [NewsController::class, 'updateNews'])->name('updateNews');
        Route::put('/allNews/editenews/{slug}', [NewsController::class, 'editNews'])->name('editNews');

        // verify
        Route::get('/verify', [VerifyController::class, 'Verifylist'])->name('verify');
        Route::get('/verify/detail/{id}', [VerifyController::class, 'verifyDetail'])->name('verifyDetail');
        Route::put('/verify/veryfymember', [VerifyController::class, 'verifyMember'])->name('verifyMember');

        // Order Statistic
        Route::post('/order/statistic', [StatisticController::class, 'orderStatistic'])->name('orderStatistic');
        Route::post('/user/statistic', [StatisticController::class, 'userStatistic'])->name('userStatistic');
        Route::post('/collection/statistic', [StatisticController::class, 'collectionStatistic'])->name('collectionStatistic');

        // default value
        Route::get('/order/defaultorderStatistic', [StatisticController::class, 'defaultorderStatistic'])->name('defaultorderStatistic');
        Route::get('/user/defaultuserStatistic', [StatisticController::class, 'defaultuserStatistic'])->name('defaultuserStatistic');
        Route::get('/collection/defaultcollectionStatistic', [StatisticController::class, 'defaultcollectionStatistic'])->name('defaultcollectionStatistic');


        Route::get('/collectionMade', [StatisticController::class, 'collectionMade'])->name('collectionMade');
        Route::get('/materialRecycled', [StatisticController::class, 'materialRecycled'])->name('materialRecycled');
        Route::get('/treeSaved', [StatisticController::class, 'treeSaved'])->name('treeSaved');

        //wallet
        Route::get('/walletTransactrion', [WalletController::class, 'walletTransactrion'])->name('walletTransactrion');


        // Badword
        Route::get('/badword', [BadWordController::class, 'list'])->name('list');
        Route::post('/badword/add', [BadWordController::class, 'add'])->name('add');
        Route::delete('/badword/delete', [BadWordController::class, 'delete'])->name('delete');

        //feedback
        Route::get('/feedback', [FeedBackController::class, 'index'])->name('feedback');

        //waste
        Route::get('/waste', [WasteController::class, 'index'])->name('wasteList');
        Route::post('/waste/add', [WasteController::class, 'create'])->name('wasteadd');
        Route::put('/waste/update', [WasteController::class, 'update'])->name('wasteupdate');
        Route::delete('/waste/delete', [WasteController::class, 'delete'])->name('wastedelete');



        // pushNotification
        Route::get('/push-notification', [NotificationController::class, 'index'])->name('notificarion.index');
        Route::post('/sendNotification', [NotificationController::class, 'sendNotification'])->name('send.notification');
    });


    Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');
});
