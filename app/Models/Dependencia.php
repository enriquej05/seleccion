<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    use HasFactory;
    protected $table = 'dependencia';

    protected $fillable = [
        'iIdDependencia',
        'vDependencia',
        'vNombreCorto',
        'iActivo',
        'iIdComite',
    ];

    public function activities()
    {
        return $this->hasMany(Actividad::class,'iIdDependencia','iIdDependencia')->with('activityDetails');
    }
}
