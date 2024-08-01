<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

    protected $guard = 'default';
    protected $primaryKey = 'id';
    protected $table = 'ruangans';

    protected $fillable = [
        'building',
        'roomname',    
        'floornum',
        'capacity',
        'description',
        'picture',
    ];

    public function staff(){
        return $this->hasOne(Staff::class);
    }
}
