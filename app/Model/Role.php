<?php

namespace App;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    //
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'display_name', 'description'];
    public function user()
{
    return $this->belongsToMany(User::class);
}
}
