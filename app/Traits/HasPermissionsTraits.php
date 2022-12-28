<?php
namespace App\Traits;
use App\Models\Permission;
use App\Models\Role;
trait HasPermissionsTraits{
    //give permission

    public function getAllPermissions($permissions){
        return Permission::whereIn('slug',$permissions)->get();
    }

    public function hasPermission($permissions){
        return (bool)$this->permissions->where('slug',$permissions->slug)->count();

    }
    public function permissions(){
            return $this->BelongsToMany(Permission::class,'users_permissions');
    }
    public function roles(){
        return $this->BelongsToMany(Role::class,'users_roles');
    }
    //check role

    public function hasRoles(...$roles){
        foreach($roles as $role){
            if($this->roles->contains('slug',$role)){
                return true;
            }
        }
        return false;
    }
    public function hasPermissionTroughRole($permissions){
        foreach($permissions->roles as $role){
        if($this->roles->contains($role)){
                    return true;
            }
        }
        return false;
    }
    public function hasPermissionTo($permissions){
        return $this->hasPermissionTroughRole($permissions) || $this->hasPermission($permissions);
    }
    public function givePermission(...$permissions){
        $permissions=$this->getAllPermissions($permissions);
        if($permissions==null){
            return $this;
        }
        $this->permissions()->saveMany($permissions);
        return $this;
    }

}

?>
