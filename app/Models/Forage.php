<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forage extends Model
{
    use HasFactory;
    protected $table = 'forages';
   // protected $with = 'areas';
   protected $appends = ['Areass'];


    protected $fillable = [
        'name',
        'image',
        'description'
    ];

    public function areas()
    {
        return $this->hasMany(Area::class);
    }

    public function getAreassAttribute(){
        return Area::where('forage_id', $this->id )->get();
    }
}
