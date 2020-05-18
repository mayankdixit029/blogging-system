<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ProcessResponseTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class AuthController extends Controller
{
    use ProcessResponseTrait;

    public function login(Request $request)
    {


        $http = new \GuzzleHttp\Client;

        $response = $http->post('http://localhost:8000/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' =>2,
                'client_secret' => 'LKzcNpXNA8K9IxMmiu2lJWX54yj471KBBfZMdg2X',
                'username' => 'user@app.com',
                'password' => 'password',
                'scope' => '*',
            ],
        ]);
        
        return json_decode((string) $response->getBody(), true);


    }

   
    public function logout()
    {
        $this->revokeToken(Auth::user()->tokens);

        return $this->processResponse(null,'success','Logged out successfully!');
    }

    public function register(Request $request)
    {
        return 'register';
    }

    //revoke tokens
    public function revokeToken($tokens)
    {
        foreach($tokens as $token)
        {
            $token->revoke();
        }
    }
}