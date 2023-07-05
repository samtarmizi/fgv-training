<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        // check if keyword exist
        if($request->keyword != null){
            // query using keyword only

            $user = auth()->user();
            $transactions = $user->transactions()
                                ->orWhere('name', 'LIKE', "%$request->keyword%")
                                ->orWhere('amount', 'LIKE', "%$request->keyword%")
                                ->paginate();
        }
        else{
            //query current user -> transactions()
            $user = auth()->user();
            // query all transaction from tables 'transactions' using Transaction model
            // $transactions = Transaction::paginate();
            $transactions = $user->transactions()->paginate();
        }
        
        // return view with transactions data
        // return view resources/views/transactions/index.blade.php
        return view('transactions.index', compact('transactions'));

    }

    public function create()
    {
        // return view resources/views/transactions/create.blade.php
        return view('transactions.create');
    }

    public function store(Request $request)
    {
        //store to table transactions using Transaction model
        $transaction = new Transaction();
        $transaction->name = $request->name;
        $transaction->amount = $request->amount;
        $transaction->user_id = auth()->user()->id;
        $transaction->save();

        // return redirect to transactions index page
        return redirect()->to('/transactions');
    }

    public function show(Transaction $transaction)
    {
        $this->authorize($transaction);
        
        return view('transactions.show', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }

    public function update(Transaction $transaction, Request $request)
    {
        // POPO Plain Old PHP Object
        $transaction->name = $request->name;
        $transaction->amount = $request->amount;
        $transaction->save();

        return redirect()->route('transactions.index');

    }

    public function delete(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index');
    }
}
