<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
/**
 * Post
 *
 * @mixin Builder
 */
class Account extends Authenticatable
{
    public function getAuthPassword()
    {
        return $this->acct_password;
    }

    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = ['acct_name','acct_surname','acct_email','acct_isadmin','acct_status'];
    protected $table = 'account';
    protected $primaryKey = 'acct_id';
    protected $hidden = [
        'acct_password'
    ];
}
