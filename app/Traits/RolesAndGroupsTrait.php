<?php

namespace App\Traits;

use App\Group;

trait RolesAndGroupsTrait {
 
  protected static function giveRole($user, $roles){
    if ($roles) {
      foreach ($roles as $role){
        $user->assignRole($role);
      }
    }
    return True;
  }
  

 protected static function giveGroup($user, $groupsID){
  if ($groupsID) {
    foreach ($groupsID as $groupID){
      $group = Group::find($groupID);
      $user->assignGroup($group);
    }
  }
  return True;
}

}
