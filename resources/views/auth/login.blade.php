@extends('layouts.wrapper')
<!-- resources/views/auth/login.blade.php -->


@section('content')
<form method="POST" action="/auth/login">
    {!! csrf_field() !!}
    <table>
        <tr>
            <td>Email</td>
            <td><input type="email" name="email" value="{{ old('email') }}"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" id="password"></td>
        </tr>
    </table>

    <div>
        <input type="checkbox" name="remember"> Remember Me
    </div>
    <div>
        <button type="submit">Login</button>
    </div>
</form>
@stop