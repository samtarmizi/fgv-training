@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Transaction Dashboard') }}</div>

                <div class="card-body">
                   Total Transactions: {{ $transactions->count() }}
                   <br>
                   Total Amount Transactions: RM{{ $transactions->sum('amount') }}
                   <br>
                   Average Amount Transaction: RM{{ number_format($transactions->avg('amount'),2) }}
                   <br>
                   Maximum Amount Transactions: RM{{ $transactions->max('amount') }}
                   <br>
                   Minimum Amount Transactions: RM{{ $transactions->min('amount') }}

                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Transaction Index') }}</div>

                <div class="card-body">
                    <form method="GET" action="">
                        <div class="input-group">
                            <input type="text" name="keyword" class="form-control" value="{{ request()->get('keyword') }}"/>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <a href="{{ route('transactions.create') }}" class="btn btn-primary">
                        Create New Transaction
                    </a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Amount</th>
                            <th scope="col">User</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $key => $transaction)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $transaction->name }}</td>
                            <td>RM {{ $transaction->amount }}</td>
                            <td>{{ $transaction->user->name }}</td>
                            <td>
                                <a href="{{ route('transactions.show', $transaction) }}" 
                                    class="btn btn-primary">
                                    Show
                                </a>
                                <a href="{{ route('transactions.edit', $transaction) }}" 
                                    class="btn btn-success">
                                    Edit
                                </a>
                                <a href="{{ route('transactions.delete', $transaction) }}" 
                                    class="btn btn-danger"
                                    onclick="return confirm('Are you sure?')"
                                    >
                                    Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
