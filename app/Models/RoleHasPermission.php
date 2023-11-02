<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleHasPermission extends Model
{
    protected $fillable = [
        'permission_id',
        'role_id',

    ];


    protected $dates = [];
    public $timestamps = false;

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/role-has-permissions/' . $this->getKey());
    }

    /* ************************ Relations ************************* */

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }

    public static function getRolePermissionList($role_id)
    {
        return RoleHasPermission::where('role_id', $role_id)
        ->with('permission')
        ->get()
        ->map(function($item){
            return [
                'id' => $item->permission->id,
                'name' => $item->permission->name
            ];
        });
    }
}
