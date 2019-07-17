<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'companies_id', 'email', 'phone'
    ];

    public function companion()
    {
        return $this->hasOne('App\Companies', 'id', 'companies_id');
    }
}
