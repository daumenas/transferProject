@extends('layouts.master')
@section('content')

    @auth
    <table class="table table-hover">

        <thead>

        <th>name</th>

        <th>email</th>

        <th>bankID</th>

        <th>money</th>


        </thead>

        <tbody>
        @foreach($users as $user)

            <tr>

                <td>{{$user->name}} </td>

                <td>{{$user->email}} </td>

                <td>{{$user->bankID}} </td>

                <td>{{$user->money}} </td>


            </tr>
        @endforeach
        </tbody>
    </table>
        @else
        @if($errors->any())
            <h4>{{$errors->first()}}</h4>
        @endif
    @endauth
@endsection