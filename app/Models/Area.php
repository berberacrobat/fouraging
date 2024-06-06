<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $table = 'areas';

    protected $fillable = [
        'id',
        'name',
        'image',
        'description',
        'address_id'
    ];


    public function forage(){

        return $this->belongsTo(Forage::class);
    }

    public function address(){

        return $this->belongsTo(Address::class);
    }

    /**
     * Get all of the area's Documents.
     */
    public function documents()
    {
        return $this->morphMany('App\Models\Document', 'concerns');
    }

}
