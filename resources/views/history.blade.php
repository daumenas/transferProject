@extends('layouts.master')
@section('content')
    @auth
    <table class="table table-hover">

        <thead>

        <th>FromBankID</th>

        <th>ToBankID</th>

        <th>Money</th>

        <th>Created</th>


        </thead>

        <tbody>
        @foreach($transfer as $userwithTransfer)

            <tr>

                <td>{{$userwithTransfer->FromBankID}} </td>

                <td>{{$userwithTransfer->ToBankID}} </td>

                <td>{{$userwithTransfer->money}} </td>

                <td>{{$userwithTransfer->created_at}} </td>


            </tr>
        @endforeach
        </tbody>
    </table>
    @endauth
@endsection