<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telpa extends Model
{
    //
                                protected $table = 'telpa';
    protected $primaryKey = 'TelpasID'; // <-- aizvieto ar īsto kolonnas nosaukumu
    // public $incrementing = false;       // ja nav AUTO_INCREMENT
    // protected $keyType = 'string';      // ja nav int, bet varchar
      public $timestamps = false;  //Lai nepieprasa created_at un updated_at kolonnas
}
