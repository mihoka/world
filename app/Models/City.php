<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $table = "city";
    protected $dates = ["expired_at", "deleted_at", "updated_at", "created_at"];
}
