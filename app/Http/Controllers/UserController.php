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




    public function create(User $user, Request  $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:6',
            'role' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson());
        }

        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));

        return response()->json([
            'message' => 'User successfully registered'
        ]);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        $data = [
        'message' => 'delete success!',
            'users' => User::with('role')->orderBy('id', 'DESC')->get()
        ];
        return response()->json($data);
    }

    public function update($id) {

    }
}
