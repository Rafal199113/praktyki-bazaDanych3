<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
            DB::statement('

            create table account(
                acct_id  serial PRIMARY KEY,
                acct_name varchar (200) NOT NULL ,
                acct_surname varchar (200) NOT NULL ,
                acct_email varchar (200) NOT NULL ,
                acct_password varchar (200) NOT NULL ,
                acct_isadmin  boolean default false,
                acct_status  boolean default true,
                UNIQUE(acct_email)


            )

            ');
    }


    public function down(): void
    {
         DB::statement('
           drop table account
         ');
    }
};
