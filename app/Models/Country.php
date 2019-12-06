<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Simple search by name
     *
     * @param [type] $query
     * @param string $search
     * @return $query
     */
    public function scopeSearch($query, string $search)
    {
        return $query->where('name', 'ilike', "%$search%");
    }
}
