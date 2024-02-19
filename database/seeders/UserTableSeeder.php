<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Create a new user instance after a valid registration.
     *
     *
     * @return Account
     */
    public function run(): void
    {
        $account = new Account();
        $account->acct_name="Zdzisiek";
        $account->acct_surname="sfdsfds";
        $account->acct_email="Zdzisiek@asis.pl";
        $account->acct_password=Hash::make("qwerty");
        $account->acct_isadmin=false;
        $account->acct_status=true;
        $account->save();

        $account = new Account();
        $account->acct_name="Tomek";
        $account->acct_surname="Pawlak";
        $account->acct_email="Tomek@asis.pl";
        $account->acct_password=Hash::make("qwerty");
        $account->acct_isadmin=true;
        $account->acct_status=true;
        $account->save();

        $account = new Account();
        $account->acct_name="Rafal";
        $account->acct_surname="Sieczkowski";
        $account->acct_email="Rafal@asis.pl";
        $account->acct_password=Hash::make("qwerty");
        $account->acct_isadmin=true;
        $account->acct_status=true;
        $account->save();
    }
}
