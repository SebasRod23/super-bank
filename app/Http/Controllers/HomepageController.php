<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    public function index() {
        $accounts = DB::table('accounts')->where('user_id', Auth::id())->get();

        return view('homepage.index', ['accounts' => $accounts]);
    }
}