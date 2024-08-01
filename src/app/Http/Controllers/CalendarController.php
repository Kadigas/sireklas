<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Ruangan;

class CalendarController extends Controller
{
    public function index(Request $request)
    {
		$datas['floornum'] = Ruangan::distinct('floornum')->get(["floornum"]);
		// dd($datas);


    	$events = array();
        $schedule = Event::all();
        foreach($schedule as $schedules){
            $events[] =[
				'id' => $schedules->id,
                'title' => $schedules->title,
                'floornum' => $schedules->floornum,
                'room_name' => $schedules->room_name,
                'start' => $schedules->start,
                'end' => $schedules->end,
                
            ];
        }

    	return view('admin.jadwal', $datas, ['event' => $events]);
    }


	public function fetchruangan(Request $request)
    {
        $datas['room_name'] = Ruangan::where("floornum", $request->floornum)
                                ->get(["roomname"]);
  
        return response()->json($datas);
    }

	public function fetchcalendar(Request $request)
    {
        $data = Event::where("room_name", $request->room_name)->get();
		$events  = array();
		foreach($data as $schedules){
            $events[] =[
				'id' => $schedules->id,
                'title' => $schedules->title,
                'floornum' => $schedules->floornum,
                'room_name' => $schedules->room_name,
                'start' => $schedules->start,
                'end' => $schedules->end,
                
            ];
        }
  
        return response()->json(['event'=>$events]);
    }

	public function lantaiSatu(Request $request) 
	{
    	if($request->ajax())
    	{
    		$data = Event::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
					   ->where('lantai', '=', 1)
                       ->get(['id', 'title', 'floornum', 'room_name', 'start', 'end']);
            return response()->json($data);
    	}
    	return view('admin.jadwal');
    }

    public function action(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->type == 'add')
    		{
    			$event = Event::create([
    				'title'		=> $request->title,
					'floornum'	=> $request->floornum,
					'room_name'	=> $request->room_name,
    				'start'		=> $request->start,
    				'end'		=> $request->end
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'update')
    		{
    			$event = Event::find($request->id)->update([
    				'title'		=>	$request->title,
					'floornum'	=> $request->floornum,
					'room_name'	=> $request->room_name,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'delete')
    		{
    			$event = Event::find($request->id)->delete();

    			return response()->json($event);
    		}
    	}
    }
}
