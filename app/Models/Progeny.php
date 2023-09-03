<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progeny extends Model
{
    use HasFactory;

    public function palms()
    {
        return $this->hasMany(Palm::class);
    }

}
