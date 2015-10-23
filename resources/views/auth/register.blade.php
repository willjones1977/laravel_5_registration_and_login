@extends('layouts.wrapper')
<!-- resources/views/auth/register.blade.php -->
@section('content')
    <form method="POST" action="/auth/register">
        {!! csrf_field() !!}
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" value="{{ old('name') }}"></td>
            </tr>

            <tr>
                <td>Email</td>
                <td><input type="email" name="email" value="{{ old('email') }}"></td>
            </tr>

            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>

            <tr>
                <td>Confirm Password</td>
                <td><input type="password" name="password_confirmation"></td>
            </tr>

            <tr>
                <td></td>
                <td style="text-align: right"><button type="submit">Register</button></td>
            </tr>
        </table>
    </form>
@stop