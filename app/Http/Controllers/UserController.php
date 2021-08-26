<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct() {
//        $this->middleware('auth:api');
    }

    public function index()
    {
        $users = User::with('role')->orDerBy('id', 'DESC')->get();
        return response()->json($users);
    }




    public function store(User $user, Request  $request)
    {

    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json('delete success!');
    }
}
