<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function getPathAttribute(){
        return asset("api/getSingleCategory/$this->slug");
    }
}
