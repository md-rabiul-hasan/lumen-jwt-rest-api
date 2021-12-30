<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
     /**
     * Instantiate a new UserController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get the authenticated User.
     *
     * @return Response
     */
    public function profile()
    {
        $user = DB::table('users')->where('id', Auth::user()->id)->first();
        $data = [
            "status" => 200,
            "success" => true,
            "message" => "User fetching successfully",
            "data" => [
                "name" => $user->name
            ] 
        ];
        return response()->json($data);
    }


}
