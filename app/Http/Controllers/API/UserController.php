<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth;
use App\Models\Users;
use JWTAuthException;
use DB;
use Auth;
use Illuminate\Routing\UrlGenerator;
use Intervention\Image\ImageManagerStatic as Image;
use Config;
use File;

class UserController extends Controller
{   
    private $users;
    protected $url;
    public function __construct(Users $user,UrlGenerator $url){
        $this->users = $users;
        $this->url = $url;
    }
   
     public function register(Request $request){

        $data = json_decode(file_get_contents('php://input'), true);

        $emailID = DB::table('users')->where(['email'=>$data['email']])->first();
        // email nda cocok
        if(empty($emailID))
        {
            $phoneID = DB::table('users')->where(['phone'=>$data['telp']])->first();
            if(empty($phoneID))
            {
               
            $fileFormat = ".jpg";
            $userPath = 'photo';
            $dir = Config::get('elfinder.dir')[0];
            $files = $dir."/".$userPath;

            $date = date("Y-m-d");
            $time = date("H:i:s");   
            $fileFormat = ".jpg";
            $dates = explode('-',$date);
            $times = explode(':',$time);
            $fileName = $dates[0].$dates[1].$dates[2].$times[0].$times[1].$times[2];

             if($data['photo'] !="")
             { 
                
                 File::makeDirectory($files, 0777, true, true);

                 $fullPath = $dir."/".$userPath."/".$fileName."".$fileFormat;
                 $image = base64_decode($data['photo']);
                 $img = Image::make($image)->save($fullPath, 60);
                      
                 $photoImg = $fullPath;
                 
             }else{
                 $photoImg =  "";
             }




                //phone nda cocok # register
                $users = $this->users->create([
                  'name' => $data['nama_lengkap'],
                  'original_address' => $data['alamat_asal'],
                  'address' => $data['alamat'],
                  'gender' => $data['jenis_kelamin'],
                  'brithday' => $data['tanggal_lahir'],
                  'religion' => $data['agama'],
                  'email' => $data['email'],
                  'phone' => $data['telp'],
                  'type' => 'user',
                  'status' => 1,
                  'photo' => $photoImg,
                  'password' => bcrypt($data['password'])
                ]);

            
               return response()->json(['status'=>true,'message'=>'Register berhasil']);



            }else{

                //phone cocok
                 return response()->json(['status'=>'phone','message'=>'data telp sudah ready']);

            }    

        }else{
            // email cocok
            return response()->json(['status'=>'email','message'=>'data email sudah ready']);

        }    

       
    }
    
   
    public function login(Request $request){

       $credentials = json_decode(file_get_contents('php://input'), true);
        
        $nol = substr($credentials['username'],0,1);
        if($nol =='0')
        {  
          $user = DB::table('users')->where(['phone'=>$credentials['username']])->first();
        }else{
          $user = DB::table('users')->where(['email'=>$credentials['username']])->first();
        }

        if(!empty($user))
        {
            //login by phone 
            $login['email'] =  $user->email;
            $login['password'] =  $credentials['password'];   
                    
        }else{ 
             //login by email    
            $login['email'] =  $credentials['username'];
            $login['password'] =  $credentials['password'];
                
        }  
        
            try {
               if (!$token = JWTAuth::attempt($login))
               {
                    if($nol=="0")
                    {    
                          $status="false";      
                          $message = "phone number does not match";
                       
                    }else{
                         $status="false";     
                         $message = "email does not match";
                    }    
                    return response()->json(['status'=>$status,'message'=>$message]);
                  
               }
            } catch (JWTAuthException $e) {
                return response()->json(['failed_to_create_token'], 500);
            }
        
        if($nol=='0')
        {
          //check validate phone
                if (!Auth::validate(array('phone' => $user->phone,'password' => $credentials['password'])))
                {
                    return response()->json(['status'=>false,'message'=>'password does not match']);

                }else{
                  //login sukses
                     $res = compact('token');
                           $result['success'] = true;
                           $result['token'] = $res['token'];
                           $result['data'] = DB::table('users')->select('id','photo','name','address','phone','transport_type','transport_number','active_period')->where('id',Auth::user()->id)->first();
                            
                            return response()->json($result);

                }  

             
        }else{
             
                if (!Auth::validate(array('email' => $user->email,'password' => $credentials['password'])))
                {
                    return response()->json(['status'=>false,'message'=>'password does not match']);

                }else{
                  //login sukses
                      if($user->status==0){

                          return response()->json(['status'=>false,'message'=>'status not active']);

                        }else{
                            
                           

                           $res = compact('token');
                           $result['success'] = true;
                           $result['token'] = $res['token'];
                           $result['data'] = DB::table('users')->select('id','photo','name','address','phone','transport_type','transport_number','active_period')->where('id',Auth::user()->id)->first();
                            
                            return response()->json($result);
            
                      }
                }  

        }    
             
       
           
    }

    
   public function getAuthUser(Request $request){
        $user = JWTAuth::toUser($request->token);
        return response()->json(['status'=>true,'data' => $user,'message'=>'data user']);
    }

    public function updateprofile(Request $request){
        $data = json_decode(file_get_contents('php://input'), true);
        
        $repo = DB::table('users')->where('id',Auth::user()->id)->first();


            $fileFormat = ".jpg";
            $userPath = 'photo';
            $dir = Config::get('elfinder.dir')[0];
            $files = $dir."/".$userPath;

            $date = date("Y-m-d");
            $time = date("H:i:s");   
            $fileFormat = ".jpg";
            $dates = explode('-',$date);
            $times = explode(':',$time);
            $fileName = $dates[0].$dates[1].$dates[2].$times[0].$times[1].$times[2];

             if($data['photo'] !="")
             { 
                   if($repo->photo !="")
                   {
                      unlink($repo->photo);
                   }

                 File::makeDirectory($files, 0777, true, true);

                 $fullPath = $dir."/".$userPath."/".$fileName."".$fileFormat;
                 $image = base64_decode($data['photo']);
                 $img = Image::make($image)->save($fullPath, 60);
                      
                 $photoImg = $fullPath;
                 
             }else{
                $photoImg =  $repo->photo;
             }
        
        DB::table('users')
        ->where('id',Auth::user()->id)
        ->update([
                 'name' => $data['nama_lengkap'],
                  'original_address' => $data['alamat_asal'],
                  'address' => $data['alamat'],
                  'gender' => $data['jenis_kelamin'],
                  'brithday' => $data['tanggal_lahir'],
                  'religion' => $data['agama'],
                  'email' => $data['email'],
                  'phone' => $data['telp'],
                  'type' => 'user',
                  'status' => 1,
                  'photo' => $photoImg,
                  'password' => bcrypt($data['password'])
                  
                ]);
        
        $repoUpdate = DB::table('users')->where('id',Auth::user()->id)->first();

       return response()->json(['status'=>true,'data'=>$repoUpdate,'message'=>'Update user successfully']);
    }

    public function updatepassword(Request $request){
        $input = json_decode(file_get_contents('php://input'), true);

        if (!Auth::validate(array('email' => Auth::user()->email, 'password' => $input['old_password'])))
        {
            return response()->json(['status'=>false,'message'=>'Old password does not match']);
        }else{

           DB::table('users')
          ->where('id',Auth::user()->id) 
        ->update(['password'=>bcrypt($input['password'])]);
       
        return response()->json(['status'=>true,'message'=>'password update successfully']);

        }

       

        
    } 

}