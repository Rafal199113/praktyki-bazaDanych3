<?php

namespace App\Http\Controllers;

use App\Http\Requests\Account\StoreRequest;
use App\Http\Requests\Account\UpdateRequest;
use App\Models\Account;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{


    public function index()
    {
        $users = Account::all();
        return view('/account/index', ['users' => $users,'currectUser' => Auth::user()]);
    }
    public function create()
    {
        return view('/account/create');
    }
    public function store(StoreRequest $request) : RedirectResponse
    {
        $account = new Account();
        $account->fill($request->all());
        $account->acct_password = Hash::make($request->acct_password);
        $account->save();
        return redirect()->route('account.index');
    }
    public function show(Account $account)
    {
        if(Gate::allows('manage_users',$account)) {
            return view('account/show', ['user' => $account, 'currectUser' => Auth::user()]);
        }
        return abort(403, "Nieautoryzowany dostęp");
    }
    public function edit(Account $account)
    {

      if(Gate::allows('manage_users',$account)){
          return view('account/edit', ['user' => $account, 'currectUser' => Auth::user()]);
       }

       return abort(403, "Nieautoryzowany dostęp");

    }
    public function update(UpdateRequest $request, Account $account): RedirectResponse
    {
        if (Hash::check($request->acct_old_password, $account->acct_password)) {
            $account->fill($request->all());
            $account->acct_password = Hash::make($request->acct_password);
            $account->acct_status = $request->acct_status==="on" ? true : false;
            $account->save();
            return redirect()->route('auth.dashboard', Auth::user());
        }
        return back();
    }
    public function destroy(Account $account)
    {
        $account->delete();
        return redirect()->route('login');
    }
    public function home()
    {
        return redirect()->route('login');
    }
}
