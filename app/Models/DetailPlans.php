<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPlans extends Model
{
    protected $table = "details_plan";

    //relaciomento
    public function plan()
    {
        return $this->belongsTo(plan::class);
    }
}
