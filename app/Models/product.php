<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $guarded = [
        'id'
    ];
    public function category()
    {
        return $this->belongsTo(category::class, 'id_category');
    }
}
