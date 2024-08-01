<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $guard = 'default';
    protected $primaryKey = 'id';
    protected $table = 'staffs';

    protected $fillable = [
        'user_id', 'ruangan_id'
    ];

    public function ruangan(){
        return $this->belongsTo(Ruangan::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
