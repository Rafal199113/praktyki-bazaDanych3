@extends('_layout')
@section('content') <div class="container" >

<form method="post" action="{{route('account.store')}}"  name="useForm" id="form">
    @csrf
    <div class="mb-3">
            <label for="nameInput" class="form-label">Imie</label>
            <input type="text" class="form-control @error('acct_name') is-invalid @enderror" name="acct_name" id=imie" aria-describedby="name">
            @error('acct_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="surnameInput" class="form-label">Nazwisko</label>
            <input type="text" class="form-control @error('acct_surname') is-invalid @enderror"  name="acct_surname" id="nazwisko" aria-describedby="surname">
            @error('acct_surname')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="emailInput" class="form-label">Email</label>
            <input type="email" class="form-control @error('acct_email') is-invalid @enderror"  name="acct_email"   id="email " aria-describedby="email">
            @error('acct_email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="passwordInput" class="form-label">Hasło</label>
            <input type="password" class="form-control @error('acct_password') is-invalid @enderror"  name="acct_password" id="password">
            @error('acct_password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="repeat_password_input" class="form-label">Powtórz hasło</label>
            <input type="password" class="form-control" name="password_confirmation" id="repeat_password">

        </div>
    <button type="submit" class="btn btn-primary">Wyślij</button>
    </form>
</div>
@stop
