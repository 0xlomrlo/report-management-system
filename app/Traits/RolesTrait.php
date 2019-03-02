<?php

namespace App\Traits;

use Spatie\Permission\Models\Role;

trait RolesTrait {
 
  protected static function giveRole($user, $roles)
 {

  if ($roles) {
    foreach ($roles as $role) {
        $user->assignRole($role);
    } 
}
   return True;
 }

}

?>