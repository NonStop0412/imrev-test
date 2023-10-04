<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'email'
    ];

    public function companies()
    {
        return $this->belongsToMany('App\Models\Company', 'companies_rel_clients');
    }
}
