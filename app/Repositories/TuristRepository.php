<?php

namespace App\Repositories;

use App\User;

class TuristRepository
{
 
  public function forUser(User $user)
  {
    return $user->turist()->get();
  }
}