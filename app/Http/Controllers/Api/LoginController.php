<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Device;

class LoginController extends Controller
{
    public function login(Request $request){
        $this->validateLogin($request);

        $device = Device::where('userAgent', '=', $request->userAgent)->first();

        if (!isset($device)) {
            $device = Device::create([
                'userAgent' => $request->userAgent,
            ]);
        }

        $device->tokens()->delete();

        return response()->json([
            "message" => "Login successful",
            "token" => $device->createToken($request->userAgent)->plainTextToken,
        ], 200);
    }

    private function validateLogin(Request $request){
        $this->validate($request, [
            'userAgent' => 'required',
        ]);
    }
}
