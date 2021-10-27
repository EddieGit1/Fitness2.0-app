<?php

namespace App\Http\Controllers;

use App\Models\BlogItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::user()->id;
        $blogs = BlogItem::where('user_id', $id)->get();

        $userId = Auth::user()->id;
        $role = DB::table('role_user')
            ->where('user_id', $userId)->first();

        $roleId = $role->role_id;

        return view('home', ['blogs' => $blogs, 'role' => $roleId]);
    }
}
