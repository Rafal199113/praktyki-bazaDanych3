<?php

namespace App\Policies;

use App\Models\Account;
use Illuminate\Auth\Access\Response;

class ProductPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Account $account): bool
    {
        dd("cycki");
    }

    /**
     * Determine whether the user can view the model.
     * @param Account $account
     * @param Account $accountt
     * @return bool
     */
    public function view(Account $account, Account $accountt): bool
    {

        return false;

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Account $account): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Account $account, Account $accountt): bool
    {
          return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Account $account, Account $accountt): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Account $account, Account $accountt): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Account $account, Account $accountt): bool
    {
        //
    }
}
