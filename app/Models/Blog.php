<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{

    public  function  __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        Carbon::setLocale('tr');
    }

}
