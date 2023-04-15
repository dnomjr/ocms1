<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Rainlab\User\Controllers\AuthController;
use RainLab\User\Models\User;
use RainLab\User\Facades\Auth;
    

Route::post('api/login', function (Request $request)
{
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials))
    {
        $user = Auth::getUser();
        return response()->json(['user' => $user]);
    }
    else
    {
        return response()->json(['error' => 'Invalid credentials'], 401);
    }
})->middleware('api');
?>