<?php

namespace App\Http\Controllers;

use App\Models\Password;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function create(Request $request){
        $formFields = $request->validate([
            'platform_name' => 'required',
            'platform_website' => 'required',
            'platform_description' => ['required', 'min:50'],
            'password' => ['required', 'min:6'],
        ]);

        $formFields['user_id'] = auth()->id();
        Password::create($formFields);
    }
}
