@extends('layouts.wrapper')
<!-- resources/views/auth/register.blade.php -->
@section('content')
    <div style="margin-top: 10px">
        <div style="width: 310px; float: right">
            <form method="POST" action="/auth/register">
                {!! csrf_field() !!}
                <table>
                    <tr>
                        <td style="padding-left: 5px; padding-right: 5px">Name</td>
                        <td><input type="text" name="name" value="{{ old('name') }}"></td>
                    </tr>

                    <tr>
                        <td style="padding-left: 5px; padding-right: 5px">Email</td>
                        <td><input type="email" name="email" value="{{ old('email') }}"></td>
                    </tr>

                    <tr>
                        <td style="padding-left: 5px; padding-right: 5px">Password</td>
                        <td><input type="password" name="password"></td>
                    </tr>

                    <tr>
                        <td style="padding-left: 5px; padding-right: 5px">Confirm Password</td>
                        <td><input type="password" name="password_confirmation"></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td style="text-align: right; height: 35px"><button type="submit">Register</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
@stop