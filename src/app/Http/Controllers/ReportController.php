<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Reservasi;
use Illuminate\Support\Facades\DB;
use App\Models\Ruangan;
use Carbon\Carbon;


class ReportController extends Controller
{
    public function index() {
        $now = Carbon::now()->timezone('Asia/Jakarta')->format('F');
        // if($now > 06){
        // dd($now);
        // }
        $ruangans = Ruangan::all();
        $categories = [];
        $datas = [];
        

        foreach($ruangans as $ru){
            $categories[] = $ru->roomname;
        }

        $occ_tables = Ruangan::query()->select('ruangans.roomname','ruangans.floornum',
            DB::raw('COUNT(case when Month(start) = Month(curdate()) AND Year(start) = Year(curdate())  then 1 else null end) as pemakaian'),
            DB::raw('cast((COUNT(case when Month(start) = Month(curdate()) AND Year(start) = Year(curdate())  then 1 else null end)/100*100) as DECIMAL(5, 2))as rata_okupansi')) // assume 20 days of usage per room and 07-17 work time usage
            // ->whereYear('reservasis.start', Carbon::now()->year)
            // ->whereMonth('reservasis.start', Carbon::now()->month)
            ->leftJoin('events','events.room_name','ruangans.roomname')
            ->groupBy('events.room_name')
            ->orderBy('ruangans.roomname', 'ASC')
            ->get();

        // dd($occ_table);

        // dd($categories);
        // $data[] = Ruangan::query()->select(
        //     DB::raw('count(reservasis.reservationid) as jres')
        // )->leftJoin('reservasis','reservasis.roomname','ruangans.roomname')
        // ->groupBy('reservasis.roomname')
        // ->orderBy('ruangans.roomname', 'ASC')
        // ->get();
        $coba = Ruangan::query()->select('ruangans.roomname',
        DB::raw('COUNT(case when Year(start) = Year(curdate()) AND MONTH(start) = MONTH(curdate()) then 1 else null end) as jres'))
        // ->whereYear('reservasis.start', Carbon::now()->year)
        // ->whereMonth('reservasis.start', Carbon::now()->month)
        ->leftJoin('reservasis','reservasis.room_name','ruangans.roomname')
        ->groupBy('reservasis.room_name')
        ->orderBy('ruangans.roomname', 'ASC')
        ->get();

    foreach($coba as $co){
        $datas[] = $co->jres;
    }

    $reservasisTerima[] = Reservasi::where('status','=',2)->count();
    // dd($reservasisTerima);
    $reservasisPending[] = Reservasi::where('status','=',1)->count();
    $reservasisTolak[] = Reservasi::where('status','=',3)->count();

        // dd($datas);

        return view('admin.reportPage', compact('categories', 'datas','now','reservasisTerima','reservasisPending','reservasisTolak','occ_tables'));
    }

    public function month()
    {
        $datas = [];
        $rooms = [];
        $occ_tables = Ruangan::query()->select('ruangans.roomname','ruangans.floornum',
        DB::raw('COUNT(case when Month(start) = Month(curdate()) AND Year(start) = Year(curdate()) then 1 else null end) as pemakaian'),)
        ->leftJoin('events','events.room_name','ruangans.roomname')
        ->groupBy('events.room_name')
        ->orderBy('ruangans.roomname', 'ASC')
        ->get();

        foreach($occ_tables as $co){
            $rooms[] = $co->roomname;
        }
       
        foreach($occ_tables as $co){
            $datas[] = $co->pemakaian;
        }

        return view('admin.reportPageMonth',compact('occ_tables','datas','rooms'));
    }

    public function week()
    {
        $datas = [];
        $rooms = [];
        $occ_tables = Ruangan::query()->select('ruangans.roomname','ruangans.floornum',
        DB::raw('COUNT(case when  WEEK(start) = WEEK(curdate()) AND Month(start) = Month(curdate()) AND Year(start) = Year(curdate())  then 1 else null end) as pemakaian'),
        DB::raw('cast((COUNT(case when WEEK(start) = WEEK(curdate()) AND Month(start) = Month(curdate()) AND Year(start) = Year(curdate())  then 1 else null end)/25 )as DECIMAL(5, 2))as rata_okupansi')) // assume 20 days of usage per room and 07-17 work time usage
        // ->whereYear('reservasis.start', Carbon::now()->year)
        // ->whereMonth('reservasis.start', Carbon::now()->month)
        ->leftJoin('events','events.room_name','ruangans.roomname')
        ->groupBy('events.room_name')
        ->orderBy('rata_okupansi', 'DESC')
        ->get();

        foreach($occ_tables as $co){
            $rooms[] = $co->roomname;
        }
       
        foreach($occ_tables as $co){
            $datas[] = $co->rata_okupansi;
        }

        return view('admin.reportPageWeek',compact('occ_tables','datas','rooms'));
    }
    public function Semester()
    {
        $now = Carbon::now()->timezone('Asia/Jakarta')->format('F');
        // dd($now);
        if($now <= 06){
        $datas = [];
        $rooms = [];
        $occ_tables = Ruangan::query()->select('ruangans.roomname','ruangans.floornum',
        DB::raw('COUNT(case when MONTH(start) BETWEEN 01 and 06 AND Year(start) = Year(curdate())  then 1 else null end) as pemakaian'),
        DB::raw('cast((COUNT(case when MONTH(start) BETWEEN 01 and 06  AND Month(start) = Month(curdate()) AND Year(start) = Year(curdate())  then 1 else null end)/400*100)as DECIMAL(10, 2))as rata_okupansi')) // assume 20 days of usage per room and 07-17 work time usage
        // ->whereYear('reservasis.start', Carbon::now()->year)
        // ->whereMonth('reservasis.start', Carbon::now()->month)
        ->leftJoin('events','events.room_name','ruangans.roomname')
        ->groupBy('events.room_name')
        ->orderBy('rata_okupansi', 'DESC')
        ->get();

        foreach($occ_tables as $co){
            $rooms[] = $co->roomname;
        }
       
        foreach($occ_tables as $co){
            $datas[] = $co->rata_okupansi;
        }

        }

        if($now > 06){
            $datas = [];
            $rooms = [];
            $occ_tables = Ruangan::query()->select('ruangans.roomname','ruangans.floornum',
            DB::raw('COUNT(case when MONTH(start) BETWEEN 06 and 12 AND Year(start) = Year(curdate())  then 1 else null end) as pemakaian'),
            DB::raw('cast((COUNT(case when MONTH(start) BETWEEN 06 and 12 AND Year(start) = Year(curdate())  then 1 else null end)/400*100)as DECIMAL(5, 2))as rata_okupansi')) // assume 20 days of usage per room and 07-17 work time usage
            // ->whereYear('reservasis.start', Carbon::now()->year)
            // ->whereMonth('reservasis.start', Carbon::now()->month)
            ->leftJoin('events','events.room_name','ruangans.roomname')
            ->groupBy('events.room_name')
            ->orderBy('rata_okupansi', 'DESC')
            ->get();
    
            foreach($occ_tables as $co){
                $rooms[] = $co->roomname;
            }
           
            foreach($occ_tables as $co){
                $datas[] = $co->rata_okupansi;
            }
    
            }

        return view('admin.reportPageSemester',compact('occ_tables','datas','rooms'));
    }
}
