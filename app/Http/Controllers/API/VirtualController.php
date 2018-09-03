<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth;
use App\User;
use JWTAuthException;
use App\Http\Services\VaServer;
use App\Http\Services\VaServices;
use App\Http\Services\VaBilling;
use DB;

class VirtualController extends Controller
{   
    private $user;
    private $VaServer;
    private $VaServices;
    private $VaBilling;
    public function __construct(User $user,VaServices $vaservices,VaBilling $vabilling,VaServer $vaserver)
    {
        
        $this->user = $user;
        $this->server = $vaserver;
        $this->services = $vaservices;
        $this->billing = $vabilling;
       
        //$ip = $this->services->GetIp();

        // if($ip == '202.152.145.37' || $ip == '202.152.145.38' || $ip == '202.152.145.39' || $ip == '180.246.156.172') {
            header('Access-Control-Allow-Origin:*');
        // } else {
        //     header('Access-Control-Allow-Origin:http://poltekkesjogja.cloudapp.net');
        // }
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type');
        error_reporting(0);
     
    }

     public function create_tes(Request $request)
    {
        $this->services->checkMethod($_SERVER['REQUEST_METHOD'], 'POST');

        $billing = array(

                    'trx_id' => $request->trx_id,
                    'virtual_account' => $request->virtual_account,
                    'trx_amount' => $request->trx_amount,
                    'description'   =>  $request->description,
                    'datetime_expired'  => $request->datetime_expired,
                    'customer_email'   => $request->customer_email,
                    'customer_name'   => $request->customer_name,
                    'customer_phone'   => $request->customer_phone
                    
        );

        
        $this->server->create_va_tes($billing);


    }   
   
    public function create_ukt(Request $request)
    {
        $this->services->checkMethod($_SERVER['REQUEST_METHOD'], 'POST');

        $billing = array(

                    'trx_id' => $request->trx_id,
                    'virtual_account' => $request->virtual_account,
                    'trx_amount' => $request->trx_amount,
                    'description'   =>  $request->description,
                    'datetime_expired'  => $request->datetime_expired,
                    'customer_email'   => $request->customer_email,
                    'customer_name'   => $request->customer_name,
                    'customer_phone'   => $request->customer_phone
                    
        );

        
        $this->server->create_va_ukt($billing);


    }


    public function create_pendaftaran(Request $request)
    {
        $this->services->checkMethod($_SERVER['REQUEST_METHOD'], 'POST');

        $billing = array(
                    'trx_id' => $request->trx_id,
                    'virtual_account' => $request->virtual_account,
                    'trx_amount' => $request->trx_amount,
                    'description'   =>  $request->description,
                    'datetime_expired'  => $request->datetime_expired,
                    'customer_email'   =>  $request->customer_email,
                    'customer_name'   => $request->customer_name,
                    'customer_phone'   => $request->customer_phone,
                    'jalur'   => $request->jalur,
                    'nomer_pendaftaran'   => $request->nomer_pendaftaran
        );

        
        $this->server->create_va_pendaftaran($billing);
    }



    public function create_uji_sehat(Request $request)
    {

        $this->services->checkMethod($_SERVER['REQUEST_METHOD'], 'POST');

        $billing = array(
                    'trx_id' => $request->trx_id,
                    'virtual_account' => $request->virtual_account,
                    'trx_amount' => $request->trx_amount,
                    'description'   =>  $request->description,
                    'datetime_expired'  => $request->datetime_expired,
                    'customer_email'   =>  $request->customer_email,
                    'customer_name'   => $request->customer_name,
                    'customer_phone'   => $request->customer_phone,
                    'jalur'   => $request->jalur,
                    'nomer_pendaftaran'   => $request->nomer_pendaftaran
        );

        
        $this->server->create_va_uji_sehat($billing);
    }

    public function create_daftar_ulang(Request $request)
    {

        $this->services->checkMethod($_SERVER['REQUEST_METHOD'], 'POST');

        $billing = array(
                    'trx_id' => $request->trx_id,
                    'virtual_account' => $request->virtual_account,
                    'trx_amount' => $request->trx_amount,
                    'description'   =>  $request->description,
                    'datetime_expired'  => $request->datetime_expired,
                    'customer_email'   =>  $request->customer_email,
                    'customer_name'   => $request->customer_name,
                    'customer_phone'   => $request->customer_phone,
                    'jalur'   => $request->jalur,
                    'nomer_pendaftaran'   => $request->nomer_pendaftaran
        );

        $this->server->create_va_daftar_ulang($billing);
    }



    public function cek_inquiry(Request $request)
    {

       $trx_id = $request->trx_id;
       $type = $request->type;
       // if(isset($request->origin)){
       //     $origin = $request->origin;
       //  }else{
       //      $origin = null;
       //  } 
       $this->server->inquiry($trx_id,$type);
      
    }


     
    
    
}