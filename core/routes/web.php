<?php

use App\Events\ChatEvent;
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
    return view('welcome');
});






//Payment IPN
Route::get('/ipnbtc', 'User\DepositController@ipnBchain')->name('ipn.bchain');
Route::get('/ipnblockbtc', 'User\DepositController@blockIpnBtc')->name('ipn.block.btc');
Route::get('/ipnblocklite', 'User\DepositController@blockIpnLite')->name('ipn.block.lite');
Route::get('/ipnblockdog', 'User\DepositController@blockIpnDog')->name('ipn.block.dog');
Route::post('/ipnpaypal', 'User\DepositController@ipnpaypal')->name('ipn.paypal');
Route::post('/ipnperfect', 'User\DepositController@ipnperfect')->name('ipn.perfect');
Route::post('/ipnstripe', 'User\DepositController@ipnstripe')->name('ipn.stripe');
Route::post('/ipnskrill', 'User\DepositController@skrillIPN')->name('ipn.skrill');
Route::post('/ipncoinpaybtc', 'User\DepositController@ipnCoinPayBtc')->name('ipn.coinPay.btc');
Route::post('/ipncoinpayeth', 'User\DepositController@ipnCoinPayEth')->name('ipn.coinPay.eth');
Route::post('/ipncoinpaybch', 'User\DepositController@ipnCoinPayBch')->name('ipn.coinPay.bch');
Route::post('/ipncoinpaydash', 'User\DepositController@ipnCoinPayDash')->name('ipn.coinPay.dash');
Route::post('/ipncoinpaydoge', 'User\DepositController@ipnCoinPayDoge')->name('ipn.coinPay.doge');
Route::post('/ipncoinpayltc', 'User\DepositController@ipnCoinPayLtc')->name('ipn.coinPay.ltc');
Route::post('/ipncoin', 'User\DepositController@ipnCoin')->name('ipn.coinpay');
Route::post('/ipncoingate', 'User\DepositController@ipnCoinGate')->name('ipn.coingate');
//Payment IPN


Route::get('/', 'User\PagesController@home')->name('user.home')->middleware('emailVerification', 'smsVerification', 'bannedUser');
Route::get('/searchResults', 'User\SearchController@searchResults')->name('user.searchResults')->middleware('emailVerification', 'smsVerification', 'bannedUser');
Route::post('/subscriber', 'User\SubscriberController@store')->name('users.subsc.store');
Route::get('/{username}/profile', 'User\ProfileController@profile')->name('users.profile')->middleware('emailVerification', 'smsVerification', 'bannedUser');
Route::get('/fpros', 'User\PagesController@featPros')->name('user.fpros')->middleware('emailVerification', 'smsVerification', 'bannedUser');
// Ad increase route
Route::post('/ad/increaseAdView', 'User\AdController@increaseAdView')->name('ad.increaseAdView');


#=========== User Routes =============#
Route::group(['middleware' => 'guest'], function () {

  Route::get('/login', 'User\LoginController@login')->name('login');
  Route::post('/authenticate', 'User\LoginController@authenticate')->name('user.authenticate');

  Route::get('/register', 'User\RegController@regform')->name('user.regform');
  Route::post('/register', 'User\RegController@register')->name('user.reg');


  // Dynamic Routes
  Route::get('/{slug}/pages', 'User\PagesController@dynamicPage')->name('user.dynamicPage');


  // Contact Routes
  Route::get('/contact', 'User\PagesController@contact')->name('user.contact');
  Route::post('/contact/mail', 'User\PagesController@contactMail')->name('user.contactMail');



  // Password Reset Routes
  Route::get('/showEmailForm', 'User\ForgotPasswordController@showEmailForm')->name('user.showEmailForm');
  Route::post('/sendResetPassMail', 'User\ForgotPasswordController@sendResetPassMail')->name('user.sendResetPassMail');
  Route::get('/reset/{code}', 'User\ForgotPasswordController@resetPasswordForm')->name('user.resetPasswordForm');
  Route::post('/resetPassword', 'User\ForgotPasswordController@resetPassword')->name('user.resetPassword');
});



Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::get('/logout/{id?}', 'User\LoginController@logout')->name('user.logout');



    // profile complete form
    Route::get('/comprofile', 'User\PagesController@comprofile')->name('user.comprofile')->middleware('emailVerification', 'smsVerification', 'bannedUser');
    Route::post('/update/comprofile', 'User\PagesController@upComProfile')->name('user.upComProfile');
    Route::get('/propic', 'User\PagesController@propic')->name('user.propic')->middleware('emailVerification', 'smsVerification', 'bannedUser');
    Route::post('/update/propic', 'User\PagesController@uppropic')->name('user.uppropic');




    // Verification Routes...
    Route::get('/showEmailVerForm', 'User\VerificationController@showEmailVerForm')->name('user.showEmailVerForm');
  	Route::get('/showSmsVerForm', 'User\VerificationController@showSmsVerForm')->name('user.showSmsVerForm');
    Route::post('/checkEmailVerification', 'User\VerificationController@emailVerification')->name('user.checkEmailVerification');
    Route::post('/checkSmsVerification', 'User\VerificationController@smsVerification')->name('user.checkSmsVerification');
  	Route::post('/sendVcode', 'User\VerificationController@sendVcode')->name('user.sendVcode');





	 Route::get('/transactions', 'User\TrxController@trxLog')->name('user.trxLog')->middleware('emailVerification', 'smsVerification', 'bannedUser');



    // Profile Routes
    Route::get('/edit-profile', 'User\ProfileController@edit')->name('users.editProfile')->middleware('emailVerification', 'smsVerification', 'bannedUser');
    Route::post('/update-profile', 'User\ProfileController@update')->name('users.updateProfile');
  	Route::get('/profile/propic', 'User\ProfileController@propic')->name('user.profile.propic')->middleware('emailVerification', 'smsVerification', 'bannedUser');
    Route::get('/change-password', 'User\ProfileController@changePassword')->name('users.editPassword')->middleware('emailVerification', 'smsVerification', 'bannedUser');
  	Route::post('/update-password', 'User\ProfileController@updatePassword')->name('users.updatePassword');






    // All deposit methods...
  	Route::match(['get', 'post'], '/depositMethods', 'User\DepositController@showDepositMethods')->name('users.showDepositMethods')->middleware('emailVerification', 'smsVerification', 'bannedUser');
  	Route::post('/depositDataInsert', 'User\DepositController@depositDataInsert')->name('users.depositDataInsert');
  	Route::get('/deposit-preview', 'User\DepositController@depositPreview')->name('user.deposit.preview');
  	Route::post('/deposit-confirm', 'User\DepositController@depositConfirm')->name('deposit.confirm');




    // Package Routes
    Route::get('/packages', 'User\PackageController@index')->name('package.index')->middleware('emailVerification', 'smsVerification', 'bannedUser');
    Route::post('/package/buy', 'User\PackageController@buy')->name('package.buy');


    // Send Request Routes..
    Route::post('/sendreq', 'User\RequestController@sendreq')->name('user.sendreq');
    Route::get('/requests', 'User\RequestController@requests')->name('user.requests')->middleware('emailVerification', 'smsVerification', 'bannedUser');
    Route::post('/match', 'User\RequestController@match')->name('user.match');




    // Matches Routes...
    Route::get('/matches', 'User\MatchController@matches')->name('user.matches')->middleware('emailVerification', 'smsVerification', 'bannedUser');
    Route::post('/accreq', 'User\PagesController@accreq')->name('user.accreq');
    Route::post('/unfriend', 'User\MatchController@unfriend')->name('user.unfriend');
    Route::post('/report', 'User\MatchController@report')->name('user.report');




    // Chat Routes...
    Route::get('/{uid}/chat', 'User\ChatController@chats')->name('user.chats')->middleware('emailVerification', 'smsVerification', 'bannedUser');
    Route::post('/chat/store', 'User\ChatController@store')->name('user.chats.store');
    Route::get('event', function() {
      event(new ChatEvent);
    })->name('fireevent');



    // Transaction Routes..
	  Route::get('/transactions', 'User\TrxController@trxLog')->name('user.trxLog')->middleware('emailVerification', 'smsVerification', 'bannedUser');
});





#=========== Admin Routes =============#
Route::group(['prefix' => 'admin', 'middleware' => 'guest:admin'], function () {
	Route::get('/','Admin\AdminLoginController@index')->name('admin.loginForm');
	Route::post('/', 'Admin\AdminLoginController@authenticate')->name('admin.login');
});


Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function () {
  Route::get('/dashboard', 'Admin\AdminController@dashboard')->name('admin.dashboard');
	Route::get('/logout', 'Admin\AdminController@logout')->name('admin.logout');



  // Profile Routes

  Route::get('/changePassword', 'Admin\AdminController@changePass')->name('admin.changePass');
  Route::post('/profile/updatePassword', 'Admin\AdminController@updatePassword')->name('admin.updatePassword');
  Route::get('/profile/edit/{adminID}', 'Admin\AdminController@editProfile')->name('admin.editProfile');
	Route::post('/profile/update/{adminID}', 'Admin\AdminController@updateProfile')->name('admin.updateProfile');




  // Website Control Routes...
  Route::get('/generalSetting', 'Admin\GeneralSettingController@GenSetting')->name('admin.GenSetting');
	Route::post('/generalSetting', 'Admin\GeneralSettingController@UpdateGenSetting')->name('admin.UpdateGenSetting');
  Route::get('/EmailSetting', 'Admin\EmailSettingController@index')->name('admin.EmailSetting');
  Route::post('/EmailSetting', 'Admin\EmailSettingController@updateEmailSetting')->name('admin.UpdateEmailSetting');
  Route::get('/SmsSetting', 'Admin\SmsSettingController@index')->name('admin.SmsSetting');
  Route::post('/SmsSetting', 'Admin\SmsSettingController@updateSmsSetting')->name('admin.UpdateSmsSetting');




  // Package Routes
  Route::get('/packages', 'Admin\PackageController@index')->name('admin.package');
  Route::post('/packages/update', 'Admin\PackageController@update')->name('admin.package.update');





  // User management Routes...
	Route::get('/userManagement/allUsers', 'Admin\UserManagementController@allUsers')->name('admin.allUsers');
  Route::get('/userManagement/allUsersSearchResult', 'Admin\UserManagementController@allUsersSearchResult' )->name('admin.allUsersSearchResult');
  Route::get('/userManagement/bannedUsers', 'Admin\UserManagementController@bannedUsers')->name('admin.bannedUsers');
	Route::get('/userManagement/bannedUsersSearchResult', 'Admin\UserManagementController@bannedUsersSearchResult' )->name('admin.bannedUsersSearchResult');
  Route::get('/userManagement/verifiedUsers', 'Admin\UserManagementController@verifiedUsers')->name('admin.verifiedUsers');
  Route::get('/userManagement/verUsersSearchResult', 'Admin\UserManagementController@verUsersSearchResult' )->name('admin.verUsersSearchResult');
  Route::get('/userManagement/mobileUnverifiedUsers', 'Admin\UserManagementController@mobileUnverifiedUsers')->name('admin.mobileUnverifiedUsers');
	Route::get('/userManagement/mobileUnverifiedUsersSearchResult', 'Admin\UserManagementController@mobileUnverifiedUsersSearchResult' )->name('admin.mobileUnverifiedUsersSearchResult');
  Route::get('/userManagement/emailUnverifiedUsers', 'Admin\UserManagementController@emailUnverifiedUsers')->name('admin.emailUnverifiedUsers');
  Route::get('/userManagement/emailUnverifiedUsersSearchResult', 'Admin\UserManagementController@emailUnverifiedUsersSearchResult' )->name('admin.emailUnverifiedUsersSearchResult');
	Route::get('/userManagement/userDetails/{userID}', 'Admin\UserManagementController@userDetails')->name('admin.userDetails');
  Route::post('/userManagement/updateUserDetails', 'Admin\UserManagementController@updateUserDetails')->name('admin.updateUserDetails');
  Route::get('/userManagement/addSubtractBalance/{userID}', 'Admin\UserManagementController@addSubtractBalance')->name('admin.addSubtractBalance');
  Route::post('/userManagement/updateUserBalance', 'Admin\UserManagementController@updateUserBalance')->name('admin.updateUserBalance');
  Route::get('/userManagement/emailToUser/{userID}', 'Admin\UserManagementController@emailToUser')->name('admin.emailToUser');
  Route::post('/userManagement/sendEmailToUser', 'Admin\UserManagementController@sendEmailToUser')->name('admin.sendEmailToUser');
  Route::get('/userManagement/depositLog/{userID}', 'Admin\UserManagementController@depositLog')->name('admin.userManagement.depositLog');
	Route::get('/userManagement/imgs/{userID}', 'Admin\UserManagementController@imgs')->name('admin.userManagement.imgs');
  Route::get('/userManagement/transactions/{userID}', 'Admin\UserManagementController@trxlog')->name('admin.userManagement.trxlog');




  // Subscriber Routes
  Route::get('/userManagement/subscribers', 'Admin\UserManagementController@subscribers')->name('admin.userManagement.subscribers');
	Route::post('/userManagement/mailtosubsc', 'Admin\UserManagementController@mailtosubsc')->name('admin.mailtosubsc');



  // Report Routes
  Route::get('/reports', 'Admin\ReportController@reports')->name('admin.reports');



  // Gateway Routes...
  Route::get('/gateways', 'Admin\GatewayController@index')->name('admin.gateways');
	Route::post('/gateway/update', 'Admin\GatewayController@update')->name('update.gateway');
	Route::post('/gateway/store', 'Admin\GatewayController@store')->name('store.gateway');




  // Menu Manager Routes
  Route::get('/menuManager/index', 'Admin\menuManagerController@index')->name('admin.menuManager.index');
	Route::post('/menuManager/store', 'Admin\menuManagerController@store')->name('admin.menuManager.store');
	Route::get('/menuManager/{menuID}/edit', 'Admin\menuManagerController@edit')->name('admin.menuManager.edit');
	Route::post('/menuManager/{menuID}/update', 'Admin\menuManagerController@update')->name('admin.menuManager.update');
	Route::post('/menuManager/{menuID}/delete', 'Admin\menuManagerController@delete')->name('admin.menuManager.delete');





  // Deposit Routes...
  Route::get('/deposit/pending','Admin\DepositController@pending')->name('admin.deposit.pending');
	Route::get('/deposit/showReceipt', 'Admin\DepositController@showReceipt')->name('admin.deposit.showReceipt');
	Route::post('/deposit/accept', 'Admin\DepositController@accept')->name('admin.deposit.accept');
	Route::post('/deposit/rejectReq','Admin\DepositController@rejectReq')->name('admin.deposit.rejectReq');
	Route::get('/deposit/acceptedRequests','Admin\DepositController@acceptedRequests')->name('admin.deposit.acceptedRequests');
	Route::get('/deposit/depositLog','Admin\DepositController@depositLog')->name('admin.deposit.depositLog');
	Route::get('/deposit/rejectedRequests','Admin\DepositController@rejectedRequests')->name('admin.deposit.rejectedRequests');





  // Interface Control Routes
  Route::get('/interfaceControl/logoIcon/index', 'Admin\InterfaceControl\LogoIconController@index')->name('admin.logoIcon.index');
	Route::post('/interfaceControl/logoIcon/update', 'Admin\InterfaceControl\LogoIconController@update')->name('admin.logoIcon.update');
  Route::get('/interfaceControl/headerText/index', 'Admin\InterfaceControl\HeaderTextController@index')->name('admin.headerText.index');
	Route::post('/interfaceControl/headerText/update', 'Admin\InterfaceControl\HeaderTextController@update')->name('admin.headerText.update');
  Route::get('/interfaceControl/fpro/index', 'Admin\InterfaceControl\FjobController@index')->name('admin.fjob.index');
	Route::post('/interfaceControl/fimg/update', 'Admin\InterfaceControl\FjobController@update')->name('admin.fjob.update');
  Route::get('/interfaceControl/limg/index', 'Admin\InterfaceControl\LjobController@index')->name('admin.ljob.index');
	Route::post('/interfaceControl/limg/update', 'Admin\InterfaceControl\LjobController@update')->name('admin.ljob.update');
  Route::get('/interfaceControl/subsc/index', 'Admin\InterfaceControl\SubscSectionController@index')->name('admin.subsc.index');
  Route::post('/interfaceControl/subsc/update', 'Admin\InterfaceControl\SubscSectionController@update')->name('admin.subsc.update');
  Route::get('/interfaceControl/contact/index', 'Admin\InterfaceControl\ContactController@index')->name('admin.contact.index');
  Route::post('/interfaceControl/contact/update', 'Admin\InterfaceControl\ContactController@update')->name('admin.contact.update');
  Route::get('/interfaceControl/social/index', 'Admin\InterfaceControl\SocialController@index')->name('admin.social.index');
	Route::post('/interfaceControl/social/store', 'Admin\InterfaceControl\SocialController@store')->name('admin.social.store');
  Route::post('/interfaceControl/social/delete', 'Admin\InterfaceControl\SocialController@delete')->name('admin.social.delete');
  Route::get('/interfaceControl/background/index', 'Admin\InterfaceControl\BackgroundImageController@background')->name('admin.background.index');
	Route::post('/interfaceControl/background/update', 'Admin\InterfaceControl\BackgroundImageController@backgroundUpdate')->name('admin.background.update');
  Route::get('/interfaceControl/footer/index', 'Admin\InterfaceControl\FooterController@index')->name('admin.footer.index');
	Route::post('/interfaceControl/footer/update', 'Admin\InterfaceControl\FooterController@update')->name('admin.footer.update');
  Route::get('/interfaceControl/client/index', 'Admin\InterfaceControl\StoryController@index')->name('admin.client.index');
  Route::post('/interfaceControl/story/update', 'Admin\InterfaceControl\StoryController@storyUpdate')->name('admin.story.storyUpdate');
	Route::post('/interfaceControl/storydet/{id}/update', 'Admin\InterfaceControl\StoryController@storydetUpdate')->name('admin.storydet.update');
	Route::post('/interfaceControl/story/store', 'Admin\InterfaceControl\StoryController@storyStore')->name('admin.story.store');
	Route::post('/interfaceControl/story/update/{story}', 'Admin\InterfaceControl\StoryController@storyUpdate')->name('admin.story.update');
	Route::post('/interfaceControl/story/destroy', 'Admin\InterfaceControl\StoryController@storyDestroy')->name('admin.story.destroy');



  // Ad Routes...
  Route::get('/Ad/index', 'Admin\AdController@index')->name('admin.ad.index');
	Route::get('/Ad/create', 'Admin\AdController@create')->name('admin.ad.create');
	Route::post('/Ad/store', 'Admin\AdController@store')->name('admin.ad.store');
	Route::get('/Ad/showImage', 'Admin\AdController@showImage')->name('admin.ad.showImage');
	Route::post('/Ad/delete', 'Admin\AdController@delete')->name('admin.ad.delete');



  // Transactions Route...
  Route::get('/trxlog', 'Admin\TrxController@index')->name('admin.trxLog');

});
