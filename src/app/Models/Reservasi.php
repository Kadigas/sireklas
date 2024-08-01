<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{

    use HasFactory;

    protected $table = 'reservasis';
    protected $guard = 'default';
    protected $casts = ['start'=>'datetime','end'=>'datetime'];

    protected $fillable = [
      'reserverid',
       'fullname',
      'phone',
       'email',
       'floornum',
       'room_name',
       'start',
       'end',
       'organization',
       'pic_position',
       'event_name',
       'event_category',
       'event_description',
       'suratpath',
       'status',
    ];

    public function setdate($value){
        $this->attributes['reservationdate'] = Carbon::createFromFormat('d/m/Y',$value)->format('Y-m-d');
    }

}
