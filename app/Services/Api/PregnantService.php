<?php
namespace App\Services\Api;


use App\Models\Pregnant;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class PregnantService
{
    public function __construct()
    {
       
    }
    public function auth(array $credencials) : \Illuminate\Http\JsonResponse
    {
        $pregnantValidator = [
           
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ];
        $validator =  Validator::make($credencials, $pregnantValidator);
        
        if($validator->fails()){
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }
        $pregnant =  Pregnant::where('email', $credencials['email'])->first();

        if (!$pregnant || !Hash::check($credencials['password'], $pregnant->password)) {

            throw  ValidationException::withMessages(
                [
                    'message' => ['Usuário ou senha incorretos']
                ]
            );
        }
        $pregnant->tokens()->delete();
        $token = $pregnant->createToken($credencials['email'])->plainTextToken;

        return response()->json([
            'token' => $token,
            'pregnant' => $pregnant
        ]);
        
    }

    public function register($pregnant): \Illuminate\Http\JsonResponse {

        $pregnantValidator = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pregnants',
            'password' => 'required|string|min:8',
            'type' => 'required|in:pregnant,mother',
        ];
        $validator =  Validator::make($pregnant, $pregnantValidator);
        
        if($validator->fails()){
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }
        $pregnant['password'] = Hash::make($pregnant['password']);  
        $pregnant = Pregnant::create($pregnant);

        return response()->json([
            'pregnant' => $pregnant
        ],201);

    }




}