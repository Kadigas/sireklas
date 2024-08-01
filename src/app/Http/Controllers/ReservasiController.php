<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Reservasi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use App\Models\Ruangan;
use Illuminate\Support\Facades\Auth;

class ReservasiController extends Controller
{
    public function stepOne(Request $request){
        $reservasi = $request->session()->get('reservasi');
        $userLogin = Auth::user();
        return view ('user.reservasi', compact('reservasi', 'userLogin'));
    }

    public function createOne(Request $request)
    {
        $validatedData = $request->validate([
            'fullname' => 'required|max:100',
            'reserverid' => 'required',
            'phone' => 'required|max:12',
            'email' => 'required|email',
        ],
        [
            'fullname.required' => 'Nama tidak boleh kosong!',
            'reserverid.required' => 'NRP tidak boleh kosong!',
            'phone.required' => 'Nomor telepon tidak boleh kosong!',
            'email.required' => 'Email tidak boleh kosong!',
        ]);
  
        if(empty($request->session()->get('reservasi'))){
            $reservasi = new Reservasi();
            $reservasi->fill($validatedData);
            $request->session()->put('reservasi', $reservasi);
        }else{
            $reservasi = $request->session()->get('reservasi');
            $reservasi->fill($validatedData);
            $request->session()->put('reservasi', $reservasi);
        }
  
        return redirect()->route('detailPeminjaman');
    }

    public function selectRoom(Request $request){
        $roomname = $request->roomname;
        dd($roomname);
        return view ('user.reservasi2');
    }
    


    public function stepTwo(Request $request){
        $reservasi = $request->session()->get('reservasi');
        $lantais = Ruangan::select('floornum')->distinct('floornum')->where('id','!=',NULL)->get();
        return view ('user.reservasi2',compact('reservasi','lantais'));
    }


    public function detailPeminjamanAjax(Request $request){
        $datas['ruangan'] = Ruangan::where("floornum", $request->floornum)
        ->get(["roomname"]);
        
        return response()->json($datas);
    }

    public function checkAvailability(Request $request) {
        $start = Carbon::parse($request->start)->format('Y-m-d H:i:s');
        $end = Carbon::parse($request->end)->format('Y-m-d H:i:s');
        $startDate = Carbon::parse($request->start)->format('Y-m-d');
        $endDate = Carbon::parse($request->end)->format('Y-m-d');
    
        $resValidator = Event::query()
            ->where('floornum', $request->floornum)
            ->where(function($query) use ($startDate, $endDate) {
                $query->whereDate('start', $startDate)
                      ->orWhereDate('end', $endDate);
            })
            ->where('start', '<=', $end)
            ->get(['room_name', 'start', 'end']);
    
        $datas['ruangan'] = Ruangan::where("floornum", $request->floornum)
            ->get(["roomname"])
            ->pluck('roomname')
            ->toArray();
    
        foreach ($resValidator as $validator) {
            if (($validator->start <= $start && $start <= $validator->end) ||
                ($validator->start <= $end && $end <= $validator->end) ||
                ($start <= $validator->start && $validator->end <= $end)) {
    
                if (($key = array_search($validator->room_name, $datas['ruangan'])) !== false) {
                    unset($datas['ruangan'][$key]);
                }
                continue;
            }
        }
    
        $datas['ruangan'] = array_values($datas['ruangan']);
    
        return response()->json($datas);
    }


    public function createTwo(Request $request)
    {
       
        $validatedData = $request->validate([
            'floornum' => 'required',
            'room_name' => 'required',
            'start' => 'required',
            'end' => 'required',
        ],
        [
            'floornum.required' => 'Lantai tidak boleh kosong!',
            'room_name.required' => 'Nama ruangan tidak boleh kosong!',
            'start.required' => 'Tanggal dan jam mulai tidak boleh kosong!',
            'end.required' => 'Tanggal dan jam selesai tidak boleh kosong!',
        ]);

        $resValidator = Event::query()
        ->where('floornum', $request->floornum)
        ->where('room_name', $request->room_name)
        ->get(['start', 'end']);

        $start = Carbon::parse($request->start)->format('Y-m-d H:i:s');
        $end = Carbon::parse($request->end)->format('Y-m-d H:i:s');

        foreach ($resValidator as $validator) {
            if (($validator->start <= $start && $start <= $validator->end) ||
                ($validator->start <= $end && $end <= $validator->end) ||
                ($start <= $validator->start && $validator->end <= $end)) {
                return Redirect::back()->withErrors(['msg' => 'Ruang kelas sudah direservasi untuk waktu tersebut!']);
            }
        }

        $reservasi = $request->session()->get('reservasi');
        $reservasi->fill($validatedData);

        $request->session()->put('reservasi', $reservasi);
  
        return redirect()->route('detailKegiatan');
    }

    public function stepThree(Request $request){
        $reservasi = $request->session()->get('reservasi');
        return view ('user.reservasi3',compact('reservasi'));
    }

    public function createThree(Request $request)
    {
        $validatedData = $request->validate([
            'organization' => 'required',
            'pic_position' => 'required',
            'event_name' => 'required',
            'event_category' => 'required',
            'event_description'=> 'required',
        ],
        [
            'organization.required' => 'Nama organisasi tidak boleh kosong!',
            'pic_position.required' => 'Posisi PIC tidak boleh kosong!',
            'event_name.required' => 'Nama event tidak boleh kosong!',
            'event_category.required' => 'Katagori kegiatan tidak boleh kosong!',
            'event_description.required' => 'Deskripsi kegiatan tidak boleh kosong!',
        ]);
  
        $reservasi = $request->session()->get('reservasi');
        $reservasi->fill($validatedData);
        $request->session()->put('reservasi', $reservasi);

        $reservasi->save();
  
        $request->session()->forget('reservasi');
  
        return redirect()->route('confirmed');
    }

    public function confirm(){
        return view ('user.reservasiConfirmed');
    }

    public function listReservasi(Request $request) {
        $data = Reservasi::where([
            ['id', '!=', NULL]
        ])->where(function($query) use ($request){
            $query->where('fullname', 'LIKE', '%' . $request->term . '%');
        })->orderBy('id', 'desc')->paginate(10);
        return view('admin.listReservasi', ['reservasis'=>$data]);
    }

    public function detailReservasi($id) {
        $data = Reservasi::where('id','=',$id)->first();
        $date = Carbon::parse($data->start)->format('l, j F Y');
        $timestart = Carbon::parse($data->start)->format('H:i');
        $timeend = Carbon::parse($data->end)->format('H:i');
        return view('admin.detailReservasi', ['reservasis'=>$data,'date'=>$date,'timestart'=>$timestart,'timeend'=>$timeend]);
    }

    public function terima(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            'room_name' => 'required',
            'event_name' => 'required',
            'floornum' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);
        Reservasi::where('id', $id)->update([
            'status' => $request['status'],
        ]);
        if ($request['status']==2) {
            Event::create([
                'title'		=> $request['event_name'],
                'floornum'	=> $request['floornum'],
                'room_name'	=> $request['room_name'],
                'start'     => $request['start'],
                'end'     => $request['end'],
            ]);
        }

        return redirect()->route('listReservasi')->with('Sukses!','Reservasi telah diubah');
    }

}