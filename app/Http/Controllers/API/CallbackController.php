<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Services\VaCallback;
use App\Http\Services\VaServices;
use App\Http\Services\VaBilling;
use DB;
use Log;
class CallbackController extends Controller
{   
   
    private $VaCallback;
    private $VaServices;
    private $VaBilling;
    public function __construct(VaServices $vaservices,VaBilling $vabilling,VaCallback $vacallback)
    {
        
         $this->callback = $vacallback;
         $this->services = $vaservices;
         $this->billing = $vabilling;
         header('Access-Control-Allow-Origin:*');
         header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
         header('Access-Control-Allow-Headers: Content-Type');
         //log_message('debug', "callback dimulai " . $_SERVER['REMOTE_ADDR']);

        //Log::error('callback dimulai'.$_SERVER['REMOTE_ADDR.');
     
    }
   
    public function callback(Request $request)
    {
        

        $data = file_get_contents('php://input');
        $data_json = json_decode($data, true);

        $this->callback->callback($data_json);

       

    }



   
    
    
}