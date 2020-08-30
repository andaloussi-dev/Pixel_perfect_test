<?php

namespace App\Issue;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(User $user)
    {
        return $user->isAdmin();
    }

    public function create(User $user)
    {
        return $user->isAdmin();
    }

    public function show(User $user)
    {
        return $user->isAdmin();
    }
    
    public function destroy($id)
     {
        return $user->isAdmin();
     }
}
