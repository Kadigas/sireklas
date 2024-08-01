<?php

namespace App\Imports;

use App\Models\Event;
use Maatwebsite\Excel\Concerns\ToModel;

class uploadJadwal implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $unixDate = ($row[3] - 25569) * 86400;
        $date =  gmdate("Y-m-d H:i:s", $unixDate);
        $newDate = gmdate('Y-m-d H:i:s', strtotime($date. ' + 3 hours'));
        // $test = date('Y-m-d H:i:s', strtotime(' + 3 hours'));
        // $unixDate2 = ($row[4] - 25569) * 86400;
        // $date2 =  gmdate("Y-m-d H:i:s", $unixDate2);
        return new Event([
            'title'         => $row[0],
            'floornum'      => $row[1],
            'room_name'     => $row[2],
            'start'         => $date,
            'end'           => $newDate,
        ]);
    }
}
