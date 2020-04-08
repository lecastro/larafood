<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name', 'url', 'price', 'description'
    ];

    public function search($filter = null)
    {
        return $this->where('name', 'LIKE', "%{$filter}%")->paginate();
    }

    //recionamento
    public function  delails()
    {
        return $this->hasMany(DetailPlans::class);
    }
}
