<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    //
    protected $table = "tour";
    protected $dates = ["expired_at", "deleted_at", "updated_at", "created_at"];

}
