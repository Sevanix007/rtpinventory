<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loma extends Model
{

                                protected $table = 'loma';
    protected $primaryKey = 'LomaID'; // <-- aizvieto ar īsto kolonnas nosaukumu
    // public $incrementing = false;       // ja nav AUTO_INCREMENT
    // protected $keyType = 'string';      // ja nav int, bet varchar
      public $timestamps = false;  //Lai nepieprasa created_at un updated_at kolonnas
    //
}
