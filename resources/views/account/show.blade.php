@extends('_dashboard')
@section('show.content')
<div class="container"><div class="row">
        <div class="col">
        <div class="col">
            <table class="table">
                <tbody>
                <tr>
                    <td>Imie:</td>
                    <td>{{$user->acct_name}}</td>
                </tr>
                <tr>
                    <td>Nazwisko:</td>
                    <td>{{$user->acct_surname}}</td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>{{$user->acct_email}}</td>
                </tr>
                <tr>
                    <td >Status konta:</td>
                    @if($user->acct_status)
                        <td>  <button type="button" class="btn btn-success">Konto aktywne</button></td>
                    @else
                        <td>  <button type="button" class="btn btn-danger">Konto zablokowane</button></td>
                    @endif
                </tr>
                </tbody>
            </table>
        </div>
        </div>
</div>
</div>
@stop
