<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trashcan extends Model
{
    protected $table = 'domacinstva';
    protected $primaryKey = 'sifra';
    public $timestamps = false;
}
