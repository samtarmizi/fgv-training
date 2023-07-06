@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Transaction Create') }}</div>

                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Amount</label>
                            <input type="number" step="0.01" name="amount" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>User</label>
                            <select name="user_id" class="form-select" aria-label="Default select example">
                                @foreach($users as $user)
                                <option value="{{ $user->id }}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <a href="{{ route('transactions.index') }}" class="btn btn-light">Back</a>
                            <button type="submit" class="btn btn-primary">Store Transaction</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
