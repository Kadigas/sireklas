<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\Petunjuk;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use App\Models\Ruangan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Its\Sso\OpenIDConnectClient;
use Its\Sso\OpenIDConnectClientException;

class UserController extends Controller
{
    const USED_ROLE = [];

    public function home(){
        $now = Carbon::now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s');
        $ruangans = Ruangan::all();
        $events = Event::query()
        ->where('start', '<=', $now)
        ->where('end', '>=', $now)
        ->get(['room_name', 'floornum']);

        return view('welcome', compact('ruangans', 'events'));
    }

    public function ruanganView(){
        $now = Carbon::now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s');
        $ruangans = Ruangan::all();
        $events = Event::query()
        ->where('start', '<=', $now)
        ->where('end', '>=', $now)
        ->get(['room_name', 'floornum']);

        return view('welcome-cpy', compact('ruangans', 'events'));
    }

    public function lantai4() {
        $now = Carbon::now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s');
        $ruangans = Ruangan::all()->where('floornum', '=', 4);
        $events = Event::query()
        ->where('start', '<=', $now)
        ->where('end', '>=', $now)
        ->where('floornum', '=', 4)
        ->get(['room_name', 'floornum']);

        return view('welcome', compact('ruangans', 'events'));
    }

    public function lantai5() {
        $now = Carbon::now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s');
        $ruangans = Ruangan::all()->where('floornum', '=', 5);
        $events = Event::query()
        ->where('start', '<=', $now)
        ->where('end', '>=', $now)
        ->where('floornum', '=', 5)
        ->get(['room_name', 'floornum']);

        return view('welcome', compact('ruangans', 'events'));
    }


    public function lantai6() {
        $now = Carbon::now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s');
        $ruangans = Ruangan::all()->where('floornum', '=', 6);
        $events = Event::query()
        ->where('start', '<=', $now)
        ->where('end', '>=', $now)
        ->where('floornum', '=', 6)
        ->get(['room_name', 'floornum']);

        return view('welcome', compact('ruangans', 'events'));
    }

    public function lantai7() {
        $now = Carbon::now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s');
        $ruangans = Ruangan::all()->where('floornum', '=', 7);
        $events = Event::query()
        ->where('start', '<=', $now)
        ->where('end', '>=', $now)
        ->where('floornum', '=', 7)
        ->get(['room_name', 'floornum']);

        return view('welcome', compact('ruangans', 'events'));
    }

    public function lantai8() {
        $now = Carbon::now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s');
        $ruangans = Ruangan::all()->where('floornum', '=', 8);
        $events = Event::query()
        ->where('start', '<=', $now)
        ->where('end', '>=', $now)
        ->where('floornum', '=', 8)
        ->get(['room_name', 'floornum']);

        return view('welcome', compact('ruangans', 'events'));
    }

    public function staffDisplay(){
        return view ('user.staffdisplay');
    }

    public function panduan(){
        $petunjuk = Petunjuk::orderBy('id', 'desc')->first();
        return view ('user.panduan',['petunjuk' => $petunjuk]);
    }

    public function jadwal(){
        $datas['floornum'] = Ruangan::distinct('floornum')->get(["floornum"]);
        // dd($datas);
        $events = array();
        $schedule = Event::all();
        foreach($schedule as $schedules){
            $events[] =[
                'title' => $schedules->title,
                'floornum' => $schedules->floornum,
                'room_name' => $schedules->room_name,
                'start' => $schedules->start,
                'end' => $schedules->end,
                
            ];
        }
        // if($request->ajax())
    	// {
    	// 	$data = Event::whereDate('start', '>=', $request->start)
        //                ->whereDate('end',   '<=', $request->end)
        //                ->get(['id', 'title', 'lantai', 'ruangan', 'start', 'end']);
        //     return response()->json($data);
    	// }
        // dd($events);
        return view ('user.jadwal',$datas,['event' => $events]);
    }
    public function jadwalAjax(Request $request){
        if($request->ajax()){
        $room_name = $request->room_name;
        $events = array();
        if($room_name == "Semua"){
        $schedule = Event::All();    
        }else{
        $schedule = Event::where('room_name',$room_name)->get(['title', 'floornum', 'room_name', 'start', 'end']);
        }
        foreach($schedule as $schedules){
            $events[] =[
                'title' => $schedules->title,
                'floornum' => $schedules->floornum,
                'room_name' => $schedules->room_name,
                'start' => $schedules->start,
                'end' => $schedules->end,
                
            ];
        }
        // if($request->ajax())
    	// {
    	// 	$data = Event::whereDate('start', '>=', $request->start)
        //                ->whereDate('end',   '<=', $request->end)
        //                ->get(['id', 'title', 'lantai', 'ruangan', 'start', 'end']);
        //     return response()->json($data);
    	// }
        //  dd($events);
        return response()->json(['event'=>$events]);
        }
    }

    public function fetchruanganUser(Request $request)
    {
        $datas['room_name'] = Ruangan::where("floornum", $request->floornum)
                                ->get(["roomname"]);
  
        return response()->json($datas);
    }

    public function kelasSatu(Request $request) 
	{
    	if($request->ajax())
    	{
    		$data = Event::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
					   ->where('room_name', 'LIKE', $request->kelas)
                       ->get(['id', 'title', 'floornum', 'room_name', 'start', 'end']);
            return response()->json($data);
    	}
    	return view('user.jadwal');
    }

    public function status(Request $request){
        $data = Reservasi::where([
            ['id', '!=', NULL]
        ])->where(function($query) use ($request){
            $query->where('fullname', 'LIKE', '%' . $request->term . '%');
        })->orderBy('id', 'desc')->paginate(10);
        return view('user.status', ['reservasis'=>$data]);
    }


    public function signIn(){
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('home'));
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    // public function login(){
    //     try {
    //         // variable disimpan di config, di file config mengambil variable dari .env agar mudah disesuaikan
    //         // variable di bawah harus sama dengan apa yang diberikan oleh DPTSI, jika ada perubahan harap hubungi
    //         $provider = config('openid.provider'); // antara my.its.ac.id dan dev-my.its.ac.id
    //         $clientId = config('openid.clientId');
    //         $clientSecret = config('openid.clientSecret');
    //         $redirectUri = config('openid.redirectUri');
    //         $scope = config('openid.scope');
    //         $oidc = new OpenIDConnectClient($provider, $clientId, $clientSecret);
    //         $oidc->setRedirectURL($redirectUri);
    //         $oidc->addScope($scope);
    //         // jika pada environment dev, maka set false pada host dan peer verify
    //         if(strtolower(config('app.env')) != 'production' && strtolower(config('app.env')) != 'prod') {
    //             $oidc->setVerifyHost(false);
    //             $oidc->setVerifyPeer(false);
    //         }

    //         $oidc->authenticate(); // Jika tidak ada login session user, akan redirect ke my.its.ac.id/signin
    //         // Jika sudah ada session user maka dilanjutkan mengeksekusi kode di bawahnya
    //         $userInfo = $oidc->requestUserInfo(); // ambil data user berdasarkan scope yang sudah ditentukan di a
    //         $idToken = $oidc->getIdToken(); // ID token digunakan untuk logout session SSO\
    //         // dd($userInfo);
    //         // Apabila aplikasi punya kemampuan untuk create dan update data user yang login
    //         $user = User::updateOrCreate([
    //             'external_id' => $userInfo->sub // sub adalah primary key dari user SSO dengan tip
    //             ], [
    //             'external_id' => $userInfo->sub,
    //             'name' => $userInfo->name,
    //             'username' => $userInfo->reg_id,
    //             'email' => $userInfo->email,
    //             'phone' => $userInfo->phone,
    //             ]);
    //         $user_session = array();
    //         // $user_roles = array();
    //         // foreach ($userInfo->group as $group) {
    //         //     if(in_array($group->group_name, self::USED_ROLE)) {
    //         //         $user_roles[] = [
    //         //         'id' => $group->group_id,
    //         //         'name' => $group->group_name,
    //         //         ];
    //         //     }
    //         // }
    //         // foreach ($userInfo->role as $role) {
    //         //     if(in_array($role->role_name, self::USED_ROLE)) {
    //         //         $user_roles[] = [
    //         //         'id' => $role->role_id,
    //         //         'name' => $role->role_name,
    //         //         'org_id' => $role->org_id,
    //         //         'org_name' => $role->org_name,
    //         //         'client_id' => $role->client_id,
    //         //         ];
    //         //     }
    //         // }
    //         $user_session['id_token'] = $idToken;
    //         // $user_session['user_roles'] = $user_roles;
    //         // $user_session['active_role'] = $user_roles[0];
    //         // user session diset agar bisa dipakai untuk perluan authorization
    //         session([
    //             'auth' => $user_session,
    //         ]);
    //         // Jika kita sudah mendapatkan session OIDC/SSO, maka selanjutnya adalah
    //         // menghubungkan user yang login dengan SSO pada auth bawaan laravel
    //         Auth::login($user);
    //         // setelah itu redirect ke halaman default setelah login berhasil
    //         if ($user->role == 'admin') {
    //             return redirect()->route('dashboardAdmin');
    //         }
    //         return redirect()->route('home');
    //     } 
            
    //     catch (OpenIDConnectClientException $e) {
    //         // Jika gagal login, hapus semua session, termasuk auth bawaan laravel
    //         Auth::logout();
    //         Session::flush();
    //         Session::save();
    //         // if ($e->getMessage() === self::OIDC_ERROR_STATE_UNDETERMINED) {
    //         //     return redirect('expired');
    //         // }
    //         return redirect('error');
    //     }
    // }

    // public function logout() {
    //     try {
    //         // set variable yang dibutuhkan
    //         $provider = config('openid.provider'); // antara my.its.ac.id dan dev-my.its.ac.id
    //         $clientId = config('openid.clientId');
    //         $clientSecret = config('openid.clientSecret');
    //         $redirect = config('openid.redirectLogout');
    //         $oidc = new OpenIDConnectClient($provider, $clientId, $clientSecret);
    //         // set host dan peer verify
    //         if(strtolower(config('app.env')) != 'production' && strtolower(config('app.env')) != 'prod') {
    //             $oidc->setVerifyHost(false);
    //             $oidc->setVerifyPeer(false);
    //         }
    //         $idToken = session('auth.id_token');
    //         Auth::logout();
    //         Session::flush();
    //         Session::save();
    //         $oidc->signOut($idToken, $redirect);
    //         // return redirect()->route('Home::index'); // atau diredirect ke halaman login
    //     } 
        
    //     catch (OpenIDConnectClientException $e) {
    //         // handle error
    //         Auth::logout();
    //         Session::flush();
    //         Session::save();
    //         // if ($e->getMessage() === self::OIDC_ERROR_STATE_UNDETERMINED) {
    //         //     return redirect('expired');
    //         // }
    //         return redirect('error');
    //     }
    // }
}