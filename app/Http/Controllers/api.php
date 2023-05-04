<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\UserFormController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PincodesController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\AccessoriesController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\labourController;
use App\Http\Controllers\JobLaboursController;
use App\Http\Controllers\LabourTypeController;  
use App\Http\Controllers\Labour_qtyController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\PickupController;
use App\Http\Controllers\JobSparesController;
use App\Http\Controllers\SentOffersController;
use App\Http\Controllers\SparesTypeController;
use App\Http\Controllers\SpareController;
use App\Http\Controllers\Spare_qtyController;
use App\Http\Controllers\VehiclesController;
use App\Http\Controllers\VehiclesBrandsController;
use App\Http\Controllers\VehiclesModelsController;
use App\Http\Controllers\OtpTokenController;
use App\Http\Controllers\CustomerPaymentController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\TechnitiansController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MultipleImageController;
use App\Http\Controllers\Pdf1Controller;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\FCMController;
use App\Http\Controllers\NotificationController;


Route::post('/adminNotification',[NotificationController::class,'SendPushNotification']);

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

// Customer BikeJuntion User Form Routes
Route::post('/registerUser',[UserFormController::class,'newRegister']);
Route::post('/LoginUser',[UserFormController::class,'LoginUser']);


// forget Password
Route::post('forgetPassword',[UserFormController::class,'forgetPassword']);

// BikeJunction Labour Routes
Route::post('/addLabour',[labourController::class,'createLabour']);
Route::get('/readLabour',[labourController::class,'allLabour']);
Route::get('/readLabour/{id}',[labourController::class,'idLabour']);
Route::post('/updateLabour/{id}',[labourController::class,'updateLabour']);
Route::post('/deleteLabour/{id}',[labourController::class,'deleteLabour']);
Route::get('/readLabourbyType/{id}',[labourController::class,'typeLabour']);

//BikeJunction Offer Routes
Route::post('/addOffer',[OfferController::class,'createOffer']);
Route::get('/readOffer',[OfferController::class,'giveOffer']);
Route::get('/readOffer/{id}',[OfferController::class,'idOffer']);
Route::post('/updateOffer/{id}',[OfferController::class,'updateOffer']);
Route::post('/deleteOffer/{id}',[OfferController::class,'deleteOffer']);
Route::get('/ReadOfferByBranchId/{id}',[OfferController::class,'ReadOfferByBranchId']);


// BikeJunction Invoice Routes
Route::post('/createInvoice',[InvoiceController::class,'createInvoice']);
Route::get('/readInvoice',[InvoiceController::class,'giveInvoice']);
Route::get('/readInvoice/{id}',[InvoiceController::class,'idInvoice']);
Route::post('/updateInvoice/{id}',[InvoiceController::class,'updateInvoice']);
Route::post('/deleteInvoice/{id}',[InvoiceController::class,'deleteInvoice']);
Route::post('/MakeInvoice',[InvoiceController::class,'MakeInvoice']);
Route::post('/PaymentProof/{id}',[InvoiceController::class,'PaymentProof']);
Route::get('/getPayPfoor/{id}',[InvoiceController::class,'getPayPfoor']);
Route::get('/getInvoiceByContact/{id}',[InvoiceController::class,'getInvoiceByContact']);
Route::delete('/DeletePayProof/{id}',[InvoiceController::class,'DeletePayProof']);
Route::post('/PendingAmount/{id}',[InvoiceController::class,'PendingAmount']);
Route::post('/UpdatePendingAmount/{id}',[InvoiceController::class,'UpdatePendingAmount']);
Route::get('/PendingAmountByBranch/{id}',[InvoiceController::class,'PendingAmountByBranch']);
Route::post('/updPendAmount/{id}',[InvoiceController::class,'updPendAmount']);
Route::post('/getTotalBranchAmount/{id}',[InvoiceController::class,'getTotalBranchAmount']);
Route::post('/getTotalBranchAmt',[InvoiceController::class,'getTotalBranchAmt']);
Route::get('/TotalBranchPendingAmount',[InvoiceController::class,'TotalBranchPendingAmount']);


// BikeJunction Available Pincodes
Route::post('/createPincode',[PincodesController::class,'enterPincodes']);
Route::get('/readPincode',[PincodesController::class,'AvailablePincodes']);
Route::get('/readPincode/{id}',[PincodesController::class,'getPincodesById']);
Route::post('/updatePincode/{id}',[PincodesController::class,'updatePincode']);
Route::post('/deletePincode/{id}',[PincodesController::class,'deletePincode']);
Route::post('/getNearBranch/{id}',[PincodesController::class,'getNearBranch']);
Route::get('/getPincodeByBranchId/{id}',[PincodesController::class,'getPincodeByBranchId']);

// BikeJunction Feedback Routes
Route::post('/createFeedback',[FeedbackController::class,'addFeedback']);
Route::get('/readFeedback',[FeedbackController::class,'giveFeedback']);
Route::get('/readFeedback/{id}',[FeedbackController::class,'IdFeedback']);
Route::post('/updateFeedback/{id}',[FeedbackController::class,'updateFeedback']);
Route::post('/deleteFeedback/{id}',[FeedbackController::class,'deleteFeedback']);
Route::get('/feedbackByJobId/{id}',[FeedbackController::class,'feedbackByJobId']);

// BikeJunction Accessories Routes
Route::post('/createAccessories',[AccessoriesController::class,'addAccessories']);
Route::get('/readAccessories',[AccessoriesController::class,'availableAccessories']);
Route::get('/readAccessories/{id}',[AccessoriesController::class,'getAccessoriesById']);
Route::post('/updateAccessories/{id}',[AccessoriesController::class,'updateAccessories']);
Route::post('/deleteAccessories/{id}',[AccessoriesController::class,'deleteAccessories']);

// BikeJunction Branch Routes
Route::post('/addBranch',[BranchController::class,'addBranch']);
Route::post('/LoginBranch',[BranchController::class,'LoginBranch']);
Route::get('/ReadBranch',[BranchController::class,'giveBranch']);
Route::get('/ReadBranch/{id}',[BranchController::class,'IdBranch']);
Route::post('/updateBranch/{id}',[BranchController::class,'updateBranch']);
Route::post('/deleteBranch/{id}',[BranchController::class,'deleteBranch']);
Route::post('/ReadBranchByPincode/{pincode}',[BranchController::class,'ReadBranchByPincode']);
Route::get('/getfcm_tokenById/{id}',[BranchController::class,'getfcm_tokenById']);
Route::get('/getfcm_tokenByNumber/{number}',[BranchController::class,'getfcm_tokenByNumber']);
Route::get('/readBranchName',[BranchController::class,'readBranchName']);
    
// BikeJunction Customer Routes
Route::post('/registerCustomer',[CustomerController::class,'addCustomer']);
Route::post('/LoginCustomer',[CustomerController::class,'LoginCustomer']);
Route::post('/LoginByNumber',[CustomerController::class,'LoginByNumber']);
Route::get('/LogoutCustomer/{id}',[CustomerController::class,'LogoutCustomer']);
Route::get('/ReadCustomer',[CustomerController::class,'readCustomer']);
Route::get('/ReadCustomer/{id}',[CustomerController::class,'ReadCustomerById']);
Route::post('/updateCustomer/{id}',[CustomerController::class,'updateCustomer']);
Route::post('/deleteCustomer/{id}',[CustomerController::class,'deleteCustomer']);
Route::post('/getCustomerByNumber/{mobile}',[CustomerController::class,'getCustomerByNumber']);
Route::get('/getfcm_codeByCustId/{id}',[CustomerController::class,'getfcm_codeByCustId']);
Route::get('/getfcm_codeByCustnum/{num}',[CustomerController::class,'getfcm_codeByCustnum']);
Route::get('/getamtByCustId/{id}',[CustomerController::class,'getamtById']);
Route::get('/getamtByCustNum/{num}',[CustomerController::class,'getamtByNum']);

// BikeJunction Article Routes
Route::post('/createArticle',[ArticleController::class,'createArticle']);
Route::get('/ReadArticle',[ArticleController::class,'ReadArticle']);
Route::get('/ReadArticle/{id}',[ArticleController::class,'ReadArticleById']);
Route::post('/updateArticle/{id}',[ArticleController::class,'updateArticle']);
Route::post('/deleteArticle/{id}',[ArticleController::class,'deleteArticle']);

// BikeJunction Job Routes
Route::post('/createJob',[JobController::class,'createJob']);
Route::get('/readJob',[JobController::class,'readJob']);
Route::get('/readJob/{id}',[JobController::class,'readJobById']);
Route::post('/updateJob/{id}',[JobController::class,'updateJob']);
Route::post('/deleteJob/{id}',[JobController::class,'deleteJob']);
Route::post('/putJob',[JobController::class,'insertdata']);
Route::post('/labourDiscount',[JobController::class,'labourDiscount']);
Route::post('/SpareDiscount',[JobController::class,'SpareDiscount']);
Route::post('/DeleteLabour',[JobController::class,'DeleteLabour']);
Route::post('/DeleteSpare',[JobController::class,'DeleteSpare']);
Route::get('/jobHistoryByVehicleNo/{id}',[JobController::class,'jobHistoryByVehicleNo']);
Route::post('/setJobStatus/{id}',[JobController::class,'setJobStatus']);
Route::get('/getAllActive',[JobController::class,'getAllActive']);
Route::get('/getAllInActive',[JobController::class,'getAllInActive']);


// BikeJunction JobLabours Routes
Route::post('/createJobLabours',[JobLaboursController::class,'createJobLabours']);
Route::get('/readJobLabours',[JobLaboursController::class,'readJobLabours']);
Route::get('/readJobLabours/{id}',[JobLaboursController::class,'readJobLaboursById']);
Route::post('/updateJobLabours/{id}',[JobLaboursController::class,'updateJobLabours']);
Route::post('/setStatusLabourByJobId/{id}',[JobLaboursController::class,'setStatusLabourByJobId']);
Route::post('/deleteJobLabours/{id}',[JobLaboursController::class,'deleteJobLabours']);
Route::post('/updateJobLabourPrice/{id}',[JobLaboursController::class,'updateJobLabourPrice']);
Route::post('/BulkJobLaboursUpdate/{job_id}',[JobLaboursController::class,'BulkJobLaboursUpdate']);
Route::post('/newJobLabourEntry',[JobLaboursController::class,'newJobLabourEntry']);


// BikeJunction LabourType Routes
Route::post('/createLabourType',[LabourTypeController::class,'createLabourType']);
Route::get('/readLabourType',[LabourTypeController::class,'readLabourType']);
Route::get('/readLabourType/{id}',[LabourTypeController::class,'readLabourTypeById']);
Route::post('/updateLabourType/{id}',[LabourTypeController::class,'updateLabourType']);
Route::post('/deleteLabourType/{id}',[LabourTypeController::class,'deleteLabourType']);

// BikeJunction Labour qty Routes
Route::post('/createLabourqty',[Labour_qtyController::class,'createLabourqty']);
Route::get('/readLabourqty',[Labour_qtyController::class,'readLabourqty']);
Route::get('/readLabourqty/{id}',[Labour_qtyController::class,'readLabourqtyById']);
Route::post('/updateLabourqty/{id}',[Labour_qtyController::class,'updateLabourqty']);
Route::post('/deleteLabourqty/{id}',[Labour_qtyController::class,'deleteLabourqty']);

// BikeJunction Payments Routes
Route::post('/createPayment',[PaymentsController::class,'addPayment']);
Route::get('/readPayment',[PaymentsController::class,'givePayment']);
Route::get('/readPayment/{id}',[PaymentsController::class,'readPaymentById']);
Route::post('/updatePayment/{id}',[PaymentsController::class,'updatePayment']);
Route::post('/deletePayment/{id}',[PaymentsController::class,'deletePayment']);

// BikeJunction Pickup Routes
Route::post('/createPickup',[PickupController::class,'addPickup']);
Route::get('/readPickup',[PickupController::class,'readPickup']);
Route::get('/readPickup/{id}',[PickupController::class,'readPickupById']);
Route::post('/updatePickup/{id}',[PickupController::class,'updatePickup']);
Route::post('/deletePickup/{id}',[PickupController::class,'deletePickup']);
Route::post('/checkPickup',[PickupController::class,'checkPickup']);
Route::get('/readPickupByCustomerId/{id}',[PickupController::class,'readPickupByCustomerId']);

// BikaJunction Job Spares Routes
Route::post('/createJobSpares',[JobSparesController::class,'createJobSpares']);
Route::get('/readJobSpares',[JobSparesController::class,'readJobSpares']);
Route::get('/readJobSpares/{id}',[JobSparesController::class,'readJobSparesById']);
Route::post('/updateJobSpares/{id}',[JobSparesController::class,'updateJobSpares']);
Route::post('/deleteJobSpares/{id}',[JobSparesController::class,'deleteJobSpares']);
Route::post('/updateJobSparePrice/{id}',[JobSparesController::class,'updateJobSparePrice']);
Route::post('/BulkJobSpareUpdate/{job_id}',[JobSparesController::class,'BulkJobSpareUpdate']);
Route::post('/newJobSpareEntry',[JobSparesController::class,'newJobSpareEntry']);


//  BikeJunction Sent Offers Routes
Route::post('/createSentOffers',[SentOffersController::class,'createSentOffers']);
Route::get('/readSentOffers',[SentOffersController::class,'readSentOffers']);
Route::get('/readSentOffers/{id}',[SentOffersController::class,'readSentOffersById']);
Route::post('/updateSentOffers/{id}',[SentOffersController::class,'updateSentOffers']);
Route::post('/deleteSentOffers/{id}',[SentOffersController::class,'deleteSentOffers']);
    
// BikeJunction Spares Type Routes
Route::post('/createSparesType',[SparesTypeController::class,'createSparesType']);
Route::get('/readSparesType',[SparesTypeController::class,'readSparesType']);
Route::get('/readSparesType/{id}',[SparesTypeController::class,'readSparesTypeById']);
Route::post('/updateSparesType/{id}',[SparesTypeController::class,'updateSparesType']);
Route::post('/deleteSparesType/{id}',[SparesTypeController::class,'deleteSparesType']);

// BikeJunction Spare Routes
Route::post('/createSpare',[SpareController::class,'createSpare']);
Route::get('/readSpare',[SpareController::class,'readSpare']);
Route::get('/readSpare/{id}',[SpareController::class,'readSpareById']);
Route::post('/updateSpare/{id}',[SpareController::class,'updateSpare']);
Route::post('/deleteSpare/{id}',[SpareController::class,'deleteSpare']);
Route::get('/readSpareType/{id}',[SpareController::class,'readSpareByType']);
Route::get('/readSparePaginate/{id}',[SpareController::class,'index']);

// BikeJunction  Spare quantity Routes
Route::post('/createSpare_qty',[Spare_qtyController::class,'createSpare_qty']);
Route::get('/readSpare_qty',[Spare_qtyController::class,'readSpare_qty']);
Route::get('/readSpare_qty/{id}',[Spare_qtyController::class,'readSpare_qtyById']);
Route::post('/updateSpare_qty/{id}',[Spare_qtyController::class,'updateSpare_qty']);
Route::post('/deleteSpare_qty/{id}',[Spare_qtyController::class,'deleteSpare_qty']);

// BikeJunction Vehicles Routes
Route::post('/createVehicles',[VehiclesController::class,'addVehicles']);
Route::get('/readVehicles',[VehiclesController::class,'readVehicles']);
Route::get('/readVehicles/{id}',[VehiclesController::class,'readVehiclesById']);
Route::post('/updateVehicles/{id}',[VehiclesController::class,'updateVehicles']);
Route::post('/deleteVehicles/{id}',[VehiclesController::class,'deleteVehicles']);
Route::post('/readData/{veh_num}',[VehiclesController::class,'readData']);


// BikeJunction Vehicles brand Routes
Route::post('/createVehiclesBrand',[VehiclesBrandsController::class,'addVehiclesBrand']);
Route::get('/readVehiclesBrand',[VehiclesBrandsController::class,'readVehiclesBrand']);
Route::get('/readVehiclesBrand/{id}',[VehiclesBrandsController::class,'readVehiclesBrandById']);
Route::post('/updateVehiclesBrand/{id}',[VehiclesBrandsController::class,'updateVehiclesBrand']);
Route::post('/deleteVehiclesBrand/{id}',[VehiclesBrandsController::class,'deleteVehiclesBrand']);

// BikeJunction Vehicles Models Routes
Route::post('/createVehiclesModels',[VehiclesModelsController::class,'addVehiclesModels']);
Route::get('/readVehiclesModels',[VehiclesModelsController::class,'readVehiclesModels']);
Route::get('/readVehiclesModels/{id}',[VehiclesModelsController::class,'readVehiclesModelsById']);
Route::post('/updateVehiclesModels/{id}',[VehiclesModelsController::class,'updateVehiclesModels']);
Route::post('/deleteVehiclesModels/{id}',[VehiclesModelsController::class,'deleteVehiclesModels']);
Route::get('/readVehicleModelByBrandId/{id}',[VehiclesModelsController::class,'readVehicleModelByBrandId']);

// BikeJunction Otp Token Routes
Route::post('/createOtpToken',[OtpTokenController::class,'addOtpToken']);
Route::get('/readOtpToken',[OtpTokenController::class,'readOtpToken']);
Route::get('/readOtpToken/{id}',[OtpTokenController::class,'readOtpTokenById']);
Route::post('/updateOtpToken/{id}',[OtpTokenController::class,'updateOtpToken']);
Route::post('/deleteOtpToken/{id}',[OtpTokenController::class,'deleteOtpToken']);

// BikeJunction Customer Payment Routes
Route::post('/getCustomerPaymentsByMobile',[CustomerPaymentController::class,'getCustomerPaymentsByMobile']);
Route::post('/getinvoiceIdbyJobId',[CustomerPaymentController::class,'getinvoiceIdbyJobId']);

// BikeJunction Reports Routes
Route::get('/getUpiID',[ReportsController::class,'getUpiID']);
Route::get('/getpickupByCustomerid/{id}',[ReportsController::class,'getpickupByCustomerid']);
Route::get('/readvehiclesByCustomerid/{id}',[ReportsController::class,'getvehiclesByCustomerid']);


// BikeJunction technitians Routes
Route::post('createTechnitian',[TechnitiansController::class,'addTechnitian']);
Route::get('readTechnitian',[TechnitiansController::class,'readTechnitian']);
Route::get('readTechnitian/{id}',[TechnitiansController::class,'allTechnitianById']);
Route::post('updateTechnitian/{id}',[TechnitiansController::class,'updateTechnitian']);
Route::post('deleteTechnitian/{id}',[TechnitiansController::class,'deleteTechnitian']);

//Customer Address 
Route::post('/createAddress',[AddressController::class,'addAddress']);
Route::get('/readAddress',[AddressController::class,'readAddress']);
Route::get('/readAddress/{id}',[AddressController::class,'readAddressById']);
Route::post('/updateAddress/{id}',[AddressController::class,'updateAddress']);

//FCM Notifications
Route::post('/addFCMCustomer',[FCMController::class,'addFCMCustomer']);
Route::post('/addFCMBranch',[FCMController::class,'addFCMBranch']);


// BikeJunction Single Image uploads Routes
Route::post('/addImage',[ImageController::class,'addImage']);

// BikeJunction Multiple Image uploads Routes
Route::post('/addMultipleImage',[MultipleImageController::class,'addMultipleImage']);


// pdf view page
Route::get('/genpdf/{id}',[InvoiceController::class,'generatepdf']);

// Api call by branch id
Route::get('/readJobByBranchId/{id}',[JobController::class,'readJobByBranchId']);
Route::get('/readJobByBranchIdActive/{id}',[JobController::class,'readJobByBranchIdActive']);
Route::get('/readJobByBranchIdInActive/{id}',[JobController::class,'readJobByBranchIdInActive']);
Route::get('/getpickupByBranchid/{id}',[PickupController::class,'getpickupByBranchid']);
Route::get('/getAllJobsByBid/{id}',[ReportsController::class,'getAllJobsByBid']);
Route::get('/getAllInvoicesByBid/{id}',[ReportsController::class,'getAllInvoicesByBid']);
Route::get('/getAllVehiclesByBid/{id}',[ReportsController::class,'getAllVehiclesByBid']);
Route::get('/getAllCustomersByBid/{id}',[ReportsController::class,'getAllCustomersByBid']);

// All types Cache delete
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    $exitCode = Artisan::call('optimize');
    return 'Routes cache cleared';
});
Route::get('/config-cache', function() {    
    $exitCode = Artisan::call('config:cache');
    return 'Config cache cleared';
});
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return 'Application cache cleared';
});
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('optimize');
    return 'View cache cleared';
});
Route::get('/helper ', function() {
    $exitCode = Artisan::call(' composer dump-autoload');
    return 'helper library created successfully';
});

Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    try{

        Artisan::call("optimize");
        return 'Routes cache cleared';
    }catch(Exception $e){
        return response()->json(['error'=>$e->getMessage()],200);
    }
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
