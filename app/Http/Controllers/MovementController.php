<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovementController extends Controller
{
    /**
     * Show the create movement page
     * 
     * @param \App\Models\ModelClass
     * @return \Illuminate\Http\Response
     */
    public function create($accountId)
    {
        $account = DB::table('accounts')->where('id', $accountId)->first();
        return view('account.movement.create', ['account' => $account]);
    }

    /**
     * Create movement in db
     * 
     * @param \App\Models\ModelClass
     * @return \Illuminate\Http\Response
     */
    public function createMovement(Request $req, $accountId)
    {
        $data = $req->validate([
            'name' => 'required',
            'amount' => 'required',
            'type' => 'required'
        ]);

        Movement::create([
            'account_id' => (int)$accountId,
            'name' => $data['name'],
            'amount' => floatval($data['amount']),
            'type' => $data['type'],
        ]);
        return redirect()->route('account.manage', ['accountId'=>$accountId]);
    }
}
