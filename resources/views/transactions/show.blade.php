@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Transaction Show') }}</div>

                <div class="card-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $transaction->name }}" readonly>
                        </div>

                        <div class="form-group">
                            <label>Amount</label>
                            <input type="number" name="amount" class="form-control" value="{{ $transaction->amount }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>QR Code</label>
                            <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl={{ route('transactions.show', $transaction) }}">
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
