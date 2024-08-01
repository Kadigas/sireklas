<?php


namespace App\Models;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Schema;

class Petunjuk extends Model
{
    use HasFactory;
    
    protected $guard = 'default';
    protected $primaryKey = 'id';
    protected $table = 'petunjuks';

    protected $fillable = [
        'file_path'
    ];
}