<?php

namespace App\Http\Controllers;

use App\Constants\HttpResponse;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;


class AuthController extends Controller
{
    /**
     * Register user and create token
     * @param Request $request[name, email, password]
     */
    public function register(AuthRequest $request) :JsonResponse{
        $user = new  User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $response = $this->getUserResponse($user, 'registrado');

        return response()->json($response, Response::HTTP_OK);
    }


    /**
     * Login user and create token
     * @param Request $request
     */
    public function login(Request $request): JsonResponse{
        try{
            $credentials = $request->only('email', 'password');

            if (!auth()->attempt($credentials)) {
                throw new Exception(HttpResponse::CREDENTIAL_INVALID);
            }

            $user = User::where('email', $request->email)->first();
            $response = $this->getUserResponse($user, 'logueado');
            $code = Response::HTTP_OK;

        }catch(Exception $ex){
            $response = [ 'message' => $ex->getMessage() ];
            $code     = Response::HTTP_UNAUTHORIZED;
            Log::error(__METHOD__, [ $ex->getMessage(), $request->email ]);
        }

        return response()->json($response, $code);
    }


    public function getUserResponse($user, $message): array{
        return [
            'message' => "Usuario $message correctamente!",
            'user' => $user,
            'access_token' => $user->createToken('authToken')->plainTextToken
        ];
    }
}
