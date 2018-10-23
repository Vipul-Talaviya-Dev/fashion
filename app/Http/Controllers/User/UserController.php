<?php

namespace App\Http\Controllers\User;

use Auth;
use Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
    	return view('user.account');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('user.index'));
    }

}
