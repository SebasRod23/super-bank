<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    /**
     * Show the create account page
     * 
     * @param \App\Models\ModelClass
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        return view('account.create');
    }

    /**
     * Create account
     * 
     * @param \App\Models\ModelClass
     * @return \Illuminate\Http\Response
     */
    public function createAccount(Request $req)
    {
        $data = $req->validate([
            'name' => 'required',
        ]);

        Account::create([
            'user_id' => Auth::id(),
            'name' => $data['name'],
        ]);

        return redirect()->route('homepage');
    }

    /**
     * Show the manage account page
     * 
     * @param \App\Models\ModelClass
     * @return \Illuminate\Http\Response
     */
    public function manage($accountId)
    {
        $account = DB::table('accounts')->where('id', $accountId)->first();

        return view('account.manage', ['account' => $account]);
    }

    /**
     * Update selected account
     * 
     * @param \App\Models\ModelClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $accountId)
    {
        $data = $req->validate([
            'name' => 'required',
        ]);
        
        $account = Account::find($accountId);

        $account->name = $data['name'];

        $account->save();

        return view('account.manage', ['account' => $account]);
    }

    /**
     * Delete account
     * 
     * @param \App\Models\ModelClass
     * @return \Illuminate\Http\Response
     */
    public function deleteAccount($accountId)
    {
        $account = Account::find($accountId);
        $account->delete();

        return redirect()->route('homepage');
    }
}
