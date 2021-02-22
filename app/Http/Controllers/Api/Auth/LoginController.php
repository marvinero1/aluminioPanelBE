<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Client;
use App\Models\User;
use Lcobucci\JWT\Parser;

class LoginController extends Controller
{

    use IssueTokenTrait;

	private $client;

	public function __construct(){
		$this->client = Client::find(3);
        
	}

    public function login(Request $request){

    	$this->validate($request, [
            'email' => 'required|email|exists:users,email',
            // 'username' => 'required|exists:users,username',
    		'password' => 'required'
    	]);
        $user = User::where('email', $request->email)->whereIn('rol', ['user','empresa'])->first();;
        //dd($user);
        if($user){
            $token = $user->createToken('laravel')->accessToken;
            $request->email = $user->email;
            $request->remember_token = $token;
            
            // if ($user->email_verified_at) {
                return $this->issueToken($request, 'password');

            // }else{
            //     return response(['code' => 403, 'message' => 'Su dirección de correo electrónico no está verificada.'], 403);
            // }    
        }else{
            return response(['code' => 403, 'message' => 'Error credenciales no válidas.'], 403);
        }
        
    }

    public function refresh(Request $request){
    	$this->validate($request, [
    		'refresh_token' => 'required'
    	]);

    	return $this->issueToken($request, 'refresh_token');

    }


    public function logout (Request $request) {

        $token = $request->user()->token();
        $token->revoke();
    
        // $response = 'You have been succesfully logged out!';
        // return response($response, 200);
        return response(['code' => 200, 'message' => 'Has salido exitosamente'], 200);
    }

    public function viewd(){
        dd("dddd");
    }
}
