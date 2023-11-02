<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'name',
        'guard_name',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/permissions/' . $this->getKey());
    }

    public static function getPermissionList()
    {
        return Permission::all()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->name
                ];
            });
    }
}
