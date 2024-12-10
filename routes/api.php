<?php

namespace App\Http\Controllers\Api\v1\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\User\AuthController;
use App\Http\Controllers\Api\v1\User\OrderController;
use App\Http\Controllers\Api\v1\User\LastAdSeeController;
use App\Http\Controllers\Api\v1\User\FavouriteController;
use App\Http\Controllers\Api\v1\User\CategoryController;
use App\Http\Controllers\Api\v1\User\AdController;
use App\Http\Controllers\Api\v1\User\SearchController;
use App\Http\Controllers\Api\v1\User\RatingController;
use App\Http\Controllers\Api\v1\User\ContactController;
use App\Http\Controllers\Api\v1\User\BannerController;
use App\Http\Controllers\Api\v1\User\PageController;
use App\Http\Controllers\Api\v1\User\UserAddressController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route unAuth
Route::group(['prefix' => 'v1/user'], function () {

    //---------------- Auth --------------------//
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/banners', [BannerController::class, 'index']);

    //----------------- Products ------------------------------//
    Route::get('/ads', [AdController::class, 'index']); // Done
    Route::get('/ads/{id}', [AdController::class, 'adsDetails']); // Done
    Route::get('/adFeatured', [AdController::class, 'adFeatured']); // Done

    //Category product
    Route::get('/categories/{id}/ads',  [CategoryController::class, 'getAds']); // Done
    Route::get('/categories', [CategoryController::class, 'index']); // Done

     // Search and filter
        Route::post('/ads/search', [SearchController::class, 'search']);

        Route::get('/pages/{type}', [PageController::class,'index']);
        
        Route::get('/sellerProfile/{id}', [AuthController::class, 'sellerProfile']); // Done

    // Auth Route
    Route::group(['middleware' => ['auth:user-api']], function () {

        Route::post('/update_profile', [AuthController::class, 'updateProfile']);
        Route::post('/deleteAccount', [AuthController::class, 'deleteAccount']);
        Route::get('/userProfile', [AuthController::class, 'userProfile']); // Done



        Route::post('/contact-us', [ContactController::class, 'store']);

        //Notification
        Route::get('/notifications', [AuthController::class, 'notifications']);

        //--------------- Favourite ------------------------//
        Route::get('/favourites', [FavouriteController::class, 'index']); // Done
        Route::post('/favourites', [FavouriteController::class, 'store']); // Done

        // For Upload Ads
        Route::get('/categories/{categoryId}/specifications', [CategoryController::class, 'getCategorySpecifications']);
        Route::post('/ads', [AdController::class, 'store']);
        Route::get('/draftAds', [AdController::class, 'draftAds']);





        // Ratings the Ads
        Route::post('/ratings', [RatingController::class, 'store']);
        Route::get('/sellers/{seller_id}/ratings', [AuthController::class, 'getSellerRatings']);

        // Last Ads  see
        Route::post('/ads/last-seen', [LastAdSeeController::class, 'store']);
        Route::get('/lastSeen', [LastAdSeeController::class, 'getLastSeenAds']);

        // new api
         Route::post('/ads/countOfViews', [AdController::class, 'storeCountOfViews']);
         Route::get('/countOfViews', [AdController::class, 'getCountOfViews']);
         Route::get('/canAddAd', [AdController::class, 'canAddAd']);
         Route::get('/user/{user_id}/ratingsCount', [RatingController::class, 'getUserRatingsCount']);
         Route::get('/user/{user_id}/reviews', [RatingController::class, 'getUserReviews']);

          //Address
        Route::get('/addresses', [UserAddressController::class,'index']);
        Route::post('/addresses', [UserAddressController::class,'store']);
        Route::post('/addresses/{address_id}', [UserAddressController::class,'update']);
        Route::delete('/addresses/{id}', [UserAddressController::class,'destroy']);

    });
});
