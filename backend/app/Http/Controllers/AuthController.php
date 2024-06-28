<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\WeatherService;
use App\Traits\HttpResponses;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use HttpResponses;

    public function __construct(public WeatherService $weatherService)
    {
    }

    public function login(LoginRequest $request)
    {
        try
        {
            if (Auth::attempt($request->only('email', 'password')))
            {
                return response()->json([
                    'access_token' => $request->user()->createToken('token', ['*'], now()->addDay())->plainTextToken,
                ]);
            }
        } catch (Exception $e)
        {
            return response(status: 500);
        }

        return response(status: 403);
    }

    public function register(RegisterRequest $request)
    {
        try
        {

            if (!$request->validated())
            {
                return response(content: $request->errors(), status: 400);
            }

            $user = User::create($request->only('name', 'email') + ['password' => bcrypt($request->password)]);

            return response()->json([
                'access_token' => $user->createToken('token', ['*'], now()->addDay())->plainTextToken,
            ]);
        } catch (Exception $e)
        {
            return response(status: 500);
        }

    }

    public function me(Request $request)
    {
        try
        {

            $weather_data = $this->weatherService->getWeather('Tapejara,RS');

            $userData = $request->user()->only('name', 'email');
            $userData['w_temp'] = $weather_data['temp'] ?? null;
            $userData['w_description'] = $weather_data['description'] ?? null;

            return $userData;
        } catch (Exception $e)
        {
            return response(status: 500);
        }
    }

    public function logout(Request $request)
    {
        try
        {
            $request->user()->currentAccessToken()->delete();

            return response(status: 200);
        } catch (Exception $e)
        {
            return response(status: 500);
        }
    }
}
