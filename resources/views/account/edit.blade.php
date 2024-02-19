
@stack('other-scripts')
@extends('_dashboard')
@section('show.content')
    <div class="container ">
        <form method="POST" action="{{route('account.update',$user->acct_id)}}" name="useForm" id="form">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="nameInput" class="form-label">Imie</label>
                <input type="text" value="{{$user->acct_name}}" class="form-control @error('acct_name') is-invalid @enderror" name="acct_name" id=imie" aria-describedby="name">
                @error('acct_name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="surnameInput" class="form-label">Nazwisko</label>
                <input type="text" value="{{$user->acct_surname}}"  class="form-control @error('name') is-invalid @enderror" name="acct_surname" id="nazwisko" aria-describedby="surname">
                @error('surname')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="emailInput" class="form-label">Email</label>
                <input type="email" value="{{$user->acct_email}}"  class="form-control @error('name') is-invalid @enderror"  name="acct_email"  id="email " aria-describedby="email">
                @error('acct_email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="emailInput" class="form-label">Zmień hasło</label>
                <input type="password"   class="form-control @error('acct_password') is-invalid @enderror"  name="acct_password"  id="new_password" aria-describedby="email">
                @error('acct_password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                @if(Gate::allows('isAdmin'))
                    <div >
                        <input id="isAdmin"  name="acct_status" type="checkbox" {{ $user->acct_status === true ? 'checked' : '' }}>
                        <label for="isAdmin" ></label>
                    </div>
                    <label id="status" >{{ $user->acct_status === true ? 'Konto aktywne' : 'Konto Zablokowane' }}</label>
                @endif
            </div>
            <div class="mb-3">
                <label for="passwordInput" class="form-label">Aby zatwierdzić wprowadź stare hasło</label>
                <input type="password"   class="form-control" name="acct_old_password" id="old_password">
                @error('acct_password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Wyślij</button>
        </form>
    </div>
    <script type="module">
        $(document).ready(function(){
            $("#isAdmin").change(function(){
                if($('#isAdmin').is(':checked')){
                    $("#status").text("Konto aktywne")
                }else{
                    $("#status").text("Konto zablokowane")
                }
            });
        });
    </script>
@stop
