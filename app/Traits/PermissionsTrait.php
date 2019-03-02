<?php

namespace App\Traits;

use Spatie\Permission\Models\Permission;

trait PermissionsTrait {
 
  protected static function givePermission($user, $roles)
 {
   return True;
 }

}

?>