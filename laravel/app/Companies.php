<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
   	protected $fillable = [
        'name', 'email', 'logo', 'website'
    ];

    public function employee()
    {
        return $this->belongsTo('App\Employees', 'companies_id', 'id');
    }
}
