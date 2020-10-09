<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    //
    protected $table = "travel";
    protected $dates = ["expired_at", "deleted_at", "updated_at", "created_at"];

}
