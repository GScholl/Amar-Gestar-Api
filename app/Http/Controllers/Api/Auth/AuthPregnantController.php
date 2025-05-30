<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Services\Api\PregnantService;
use App\Http\Controllers\Controller;


class AuthPregnantController extends Controller
{

    private PregnantService $pregnantService;
    public function __construct(PregnantService $pregnantService)
    {
        $this->pregnantService =  $pregnantService;
        
    }

    public function auth(Request $request){
        $credencials = $request->only(['email', 'password', 'device_token']);

        return $this->pregnantService->auth($credencials);

        
    }
    public function register(Request $request){
        $data = $request->all();
   
        return $this->pregnantService->register($data);
    }   
}
