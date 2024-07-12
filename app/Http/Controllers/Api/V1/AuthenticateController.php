<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenticateController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = $request->user();

        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'email_verified' => (bool) $user->email_verified_at,
            'updated_at' => $user->updated_at,
        ];
    }
}
