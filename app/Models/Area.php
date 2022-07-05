<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $table = 'areas';

    protected $fillable = [
        'name',
        'image',
        'description'
    ];


    public function forage(){

        return $this->belongsTo(Forage::class);
    }

    public function address(){

        return $this->belongsTo(Address::class);
    }

}
