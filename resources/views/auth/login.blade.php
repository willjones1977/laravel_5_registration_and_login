@extends('layouts.wrapper')
<!-- resources/views/auth/login.blade.php -->


@section('content')
<div>
    <form method="POST" action="/auth/login">
        {!! csrf_field() !!}
        <div style="width: 250px; float: right; margin-top: 10px">
            <table>
                <tr>
                    <td style="padding: 5px">Email</td>
                    <td><input type="email" name="email" value="{{ old('email') }}"></td>
                </tr>
                <tr>
                    <td style="padding: 5px">Password</td>
                    <td><input type="password" name="password" id="password"></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="text-align: right"><input type="checkbox" name="remember"> Remember Me</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="text-align: right">
                        <button type="submit">
                            Login
                        </button>
                    </td>
                </tr>
            </table>
        </div>

        
    </form>
</div>
@stop