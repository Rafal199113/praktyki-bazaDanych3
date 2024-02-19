@extends('_layout')
@section('content')
    <div class="container-fluid ">
        <div class="container-fluid">
            <div class="row">
                <div class="p-2 col-6 w-25">
                    <div class="w-50" >
                        <a href="{{route('auth.dashboard',$currectUser->acct_id)}}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                            <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                            <span class="fs-4 text-center w-auto" >Dashboard</span>
                        </a>
                        <h4 class="text-center">{{$currectUser->acct_name}} {{$currectUser->acct_surname}} </h4>
                        <hr>
                        <ul class="nav nav-pills flex-column  bg-transparent  mb-auto">
                            <li class="nav-item d-flex">
                                @if(Gate::allows('isAdmin'))
                                    <a href="{{route('account.index')}}" class="nav-link active h-25" aria-current="page">
                                        Zarządzaj użytkownikami
                                    </a>
                                @endif
                            </li>
                            <li class="nav-item" >
                                <div class="dropdown-center mt-3">
                                    <button class="btn btn-secondary dropdown-toggle "  type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"  class="bi bi-person" viewBox="0 0 16 16">
                                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                                        </svg>
                                        Twój profil użytkownika
                                    </button>
                                    <ul class="dropdown-menu w-auto">
                                        <li><a class="dropdown-item" href="{{route('account.show', $currectUser->acct_id)}}">Wyświetl</a></li>
                                        <li><a class="dropdown-item" href="{{route('account.edit', $currectUser->acct_id)}}">Edytuj</a></li>
                                        <li>
                                            <form class="w-100 dropdown-item " action="{{ route('account.destroy', $currectUser->acct_id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"  class="btn btn-danger w-100">
                                                    Usuń konto
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li >
                                <form   class="mt-3 d-flex" method="get" action="{{route('auth.logout')}}">
                                    @csrf
                                    <button type="submit" class="btn btn-warning">Wyloguj sie</button>
                                </form>
                            </li>
                        </ul>
                        <hr>
                    </div>
                </div>
                <div class="col p-2  w-100">
                    @yield('index.content')
                    @yield('show.content')
                    @yield('edit.content')
                </div>
            </div>
        </div>
@stop
