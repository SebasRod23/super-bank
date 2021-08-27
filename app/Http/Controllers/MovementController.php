<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use App\Models\Account;
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

        $movement = Movement::create([
            'account_id' => (int)$accountId,
            'name' => $data['name'],
            'amount' => $data['type'] == "1" ? floatval($data['amount']): -floatval($data['amount']),
            'type' => $data['type'],
        ]);

        $this->updateBalance($accountId, $movement['amount']);

        return redirect()->route('account.manage', ['accountId'=>$accountId]);
    }

    /**
     * Show the create movement page
     * 
     * @param \App\Models\ModelClass
     * @return \Illuminate\Http\Response
     */
    public function edit($accountId, $movementId)
    {
        $movement = DB::table('movements')->where([['id', $movementId], ['account_id', $accountId]])->first();
        return view('account.movement.edit', ['accountId' => $accountId, 'movement'=>$movement]);
    }

    /**
     * Edit movement in db
     * 
     * @param \App\Models\ModelClass
     * @return \Illuminate\Http\Response
     */
    public function editMovement(Request $req, $accountId, $movementId)
    {
        $data = $req->validate([
            'name' => 'required',
            'amount' => 'required',
            'type' => 'required'
        ]);
        
        $movement = Movement::find($movementId);

        $this->updateBalance($accountId, -$movement['amount']);

        $movement->name = $data['name'];
        $movement->amount = $data['amount'];
        $movement->type = $data['type'];

        $movement->save();

        $this->updateBalance($accountId, $movement['amount']);

        return redirect()->route('account.manage', ['accountId'=>$accountId]);
    }

    /**
     * Update the account's balance in the db
     * 
     * @param \App\Models\ModelClass
     * @return \Illuminate\Http\Response
     */
    private function updateBalance($accountId, $amount)
    {
        $account = Account::find($accountId);
        $account->balance = $account->balance + $amount;
        $account->save();
    }
}
