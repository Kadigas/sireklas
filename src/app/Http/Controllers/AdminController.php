<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PDF;

use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\uploadJadwal;
use App\Exports\uploadJadwalExport;
use App\Models\User;
use App\Models\Ruangan;
use App\Models\Petunjuk;
use Illuminate\Console\View\Components\Alert;

class AdminController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $now = Carbon::now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s');
            $ruanganss = Ruangan::all();
            $eventss = Event::query()
            ->where('start', '<=', $now)
            ->where('end', '>=', $now)
            ->get(['room_name', 'floornum']);
            $user = Auth::user();
            $events = Event::count();
            $ruangans = Ruangan::count();
            $lantai = DB::table('ruangans')->distinct('floornum')->orderBy('floornum','asc')->get('floornum');
            $reservasis = Reservasi::count();
            $reservasisTerima = Reservasi::where('status','=',2)->count();
            $reservasisPending = Reservasi::where('status','=',1)->count();
            $reservasisTolak = Reservasi::where('status','=',3)->count();

            $reservasisTerimaChart = Reservasi::where('status','=',2)->whereYear('reservasis.start', 
            Carbon::now()->year)->whereMonth('reservasis.start', Carbon::now()->month)->count();
            $reservasisTolakChart = Reservasi::where('status','=',3)->whereYear('reservasis.start', 
            Carbon::now()->year)->whereMonth('reservasis.start', Carbon::now()->month)->count();
            
            $categories = [];
            $floorcat = [];
            $datas = [];
            $datares = [];
            $datalantai = [];
            
            // dd($lantai);

            foreach($ruanganss as $ru){
                $categories[] = $ru->roomname;
            } //roomname categories
            foreach($lantai as $lt){
                $floorcat[] = 'Lantai'.' '.$lt->floornum;
            } //lantai categories

            // dd($floorcat);
    
            $coba = Ruangan::query()->select('ruangans.roomname',
            DB::raw('COUNT(case when Month(start) = Month(curdate()) AND Year(start) = Year(curdate())  then 1 else null end) as jres'))
            // ->whereYear('reservasis.start', Carbon::now()->year)
            // ->whereMonth('reservasis.start', Carbon::now()->month)
            ->leftJoin('events','events.room_name','ruangans.roomname')
            ->groupBy('events.room_name')
            ->orderBy('ruangans.roomname', 'ASC')
            ->get();

            foreach($coba as $co){
                $datas[] = $co->jres;
            }

            $reservasicoba = Ruangan::query()->select('ruangans.roomname',
            DB::raw('COUNT(case when Month(reservasis.start) = Month(curdate()) AND Year(reservasis.start) = Year(curdate())  then 1 else null end) as jres'))
            // ->whereYear('reservasis.start', Carbon::now()->year)
            // ->whereMonth('reservasis.start', Carbon::now()->month)
            ->leftJoin('reservasis','reservasis.room_name','ruangans.roomname')
            ->groupBy('reservasis.room_name')
            ->orderBy('ruangans.roomname', 'ASC')
            ->get();

            foreach($reservasicoba as $reco){
                $datares[] = $reco->jres;
            }

            $cobalantai = Event::query()->select('events.floornum',
            DB::raw('COUNT(case when Month(start) = Month(curdate()) AND Year(start) = Year(curdate())  then 1 else null end) as jres'))
            // ->leftJoin('events','events.floornum','ruangans.floornum')
            ->groupBy('events.floornum')
            ->orderBy('events.floornum', 'ASC')
            ->get();

            foreach($cobalantai as $lt){
                $datalantai[] =  $lt->jres;
            }

            // dd($datalantai);
            
            // dd($co);
            

            if ($user->role == 'admin'){
                return view('admin.dashboardAdmin',  compact('categories', 'datas','datares','events','reservasis', 'ruangans', 'reservasisTerima', 'reservasisTolak', 'reservasisPending','reservasisTerimaChart', 'reservasisTolakChart', 'ruanganss', 'eventss','datares','datalantai','floorcat'));
            }
        }
        return redirect('/');
    }

    public function testingMap() {
        return view('testingMapReserve');
    }

    public function uploadpetunjuk()
    {
        return view('admin.uploadPetunjuk');
    }

    public function viewClass()
    {
        return view('admin.ruanganIndex');
    }

    public function uploadpdf(Request $request)
    {
        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'required|mimes:pdf|max:4096'
            ]);
            $request->file->store('petunjuk', 'public');
            Petunjuk::create([
                'file_path' => $request->file->hashName()
            ]);
           
            
            return redirect()->back()->with('success', 'petunjuk berhasil diunggah');
        }
        else {
            return redirect()->back()->with(['No file given']);
        }
    }

    public function uploadJadwal()
    {
        return view('admin.uploadJadwal');
    }

    public function fileImportExport()
    {
       return view('file-import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request) 
    {
        Excel::import(new uploadJadwal, $request->file('file')->store('temp'));
        return back();
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExport() 
    {
        return Excel::download(new uploadJadwalExport, 'report-list-reservasi.xlsx');
    }

    
     
}
