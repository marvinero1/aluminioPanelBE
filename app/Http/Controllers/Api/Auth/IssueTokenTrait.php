<?php 

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

trait IssueTokenTrait{

	public function issueToken(Request $request, $grantType, $scope = ""){

		$params = [
    		'grant_type' => $grantType,
    		'client_id' => $this->client->id,
    		'client_secret' => $this->client->secret,    		
    		'scope' => $scope
            // 'scope' => 'place-orders check-status'
    	];

        if($grantType !== 'social'){
            // $params['username'] = $request->username ?: $request->email;
            $params['username'] = $request->email;
        }
        // $params['username'] = $request->username;
    	$request->request->add($params);

    	$proxy = Request::create('oauth/token', 'POST');

		return Route::dispatch($proxy);

		// $val2 = json_decode($val->content());
		
		// if (isset($val2->access_token)) {
		// 	$acces = $val2->access_token;
		// 	$response =  ['access_token' => $acces ];
        // 	return $response;
		// }else{
		// 	dd($val2->access_token);
		// 	return "";
		// }
	}

}