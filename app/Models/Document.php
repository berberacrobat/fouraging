<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function concerns()    {
        return $this->morphTo();
    }

    public function getToStringAttribute(){

        return $this->id;
    }

}
