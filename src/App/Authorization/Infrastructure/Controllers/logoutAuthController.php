<?php


namespace Skeleton\App\Authorization\Infrastructure\Controllers;


use App\Http\Controllers\Controller;

class logoutAuthController extends Controller
{
    public function logout()
    {
        auth()->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });

        return response()->json('Logged out successfully', 200);
    }
}
