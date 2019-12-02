@extends('layouts.master')
@section('content')
    @auth
    <div class="container">
        <div class="card mt-5 ml-auto mr-auto">
            <div class="card-header"><h3>Transfer</h3></div>

            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
            <div class="card-body">
                <form action="{{ route('createTransfer') }}" enctype="multipart/form-data" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="money">Amount</label>
                        <input class="form-control" type="number" name="money" id="money">
                        @if($errors->has('money'))
                            <div class="alert alert-danger mt-1">
                                {{ $errors->first('money') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="description">ToBankID</label>
                        <input type="name" class="form-control" name="ToBankID"
                                  id="ToBankID">{{ old('ToBankID') }}</input>
                        @if($errors->has('ToBankID'))
                            <div class="alert alert-danger mt-1">
                                {{ $errors->first('ToBankID') }}
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>

        </div>
    </div>
    @endauth
@endsection