<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class History extends Model
{
    protected $connection = "mongodb";
    protected $collection = "history";

    protected $fillable = [
        'idAnggota', 'idBarang', 'keyword'
    ];

}
