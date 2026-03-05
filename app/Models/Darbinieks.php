<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Darbinieks extends Model implements Authenticatable
{
    use AuthenticableTrait;

    protected $table = 'darbinieks';

    protected $primaryKey = 'DarbiniekaID';

    public $timestamps = false;

    protected $fillable = [
        'Vards',
        'Uzvards',
        'Email',
        'Parole',
        'LietotajaVards',
    ];

    protected $hidden = [
        'Parole',
    ];
    
    protected function casts(): array
    {
        return [
            'Parole' => 'hashed',
        ];
    }

    public function getAuthPassword()
{
    return $this->Parole;
}
}
