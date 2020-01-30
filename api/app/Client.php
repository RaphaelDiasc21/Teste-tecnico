<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $timestamps = false;
    protected $fillable = ["nome","email","telefone","estado","cidade","data_de_nascimento","plan_id"];

    public function plans()
    {
        return $this->belongsToMany(\App\Plan::class);
    }

    public function setDataDeNascimentoAttribute($data)
    {
        $this->attributes["data_de_nascimento"] = date('Y-d-m',strtotime($data));
    }

    public function getDataDeNascimentoAttribute()
    {
        return date('d/m/Y',strtotime($this->attributes['data_de_nascimento']));
    }
}
