<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'foundation_year',
        'description'
    ];

    public function clients()
    {
        return $this->belongsToMany('App\Models\Client', 'companies_rel_clients');
    }
}
