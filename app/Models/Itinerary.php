<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    //
    protected $table = "itinerary";
    protected $dates = ["expired_at", "deleted_at", "updated_at", "created_at"];

}
