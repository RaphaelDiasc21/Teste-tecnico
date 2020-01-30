<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    public $timestamps = false;
    protected $fillable = ["nome","mensalidade"];

    public function plans()
    {
        return $this->belongsToMany(\App\Client::class);
    }
}
