<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $guarded = [];
    protected $table = 'plans';

    public function users()
    {
        return $this->hasMany(User::class, 'plan_id');
    }











}
