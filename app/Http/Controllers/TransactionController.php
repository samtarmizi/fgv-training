<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        // query all transaction from tables 'transactions' using Transaction model
        $transactions = Transaction::all();

        // return view with transactions data
        // return view resources/views/transactions/index.blade.php
        return view('transactions.index', compact('transactions'));

    }
}
