<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Palm extends Model
{
    use HasFactory;

    public function trial()
    {
        return $this->belongsTo(Trial::class);
    }

    public function progeny()
    {
        return $this->belongsTo(Progeny::class);
    }

    public function records()
    {
        return $this->hasMany(Record::class);
    }
}
