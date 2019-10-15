<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use willvincent\Rateable\Rating;
use Auth;
use Illuminate\Support\Facades\Input;
use App\page_Model;
use App\User;

use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index(){
        
        if(Auth::check() && Auth::user()->is_admin == 1){
            $users = User::all();

            return view('admin.users', compact('users'));
        }
        else{
            return abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){
        if (Auth::check()) {
            $data = array();
            $users = User::all();
            $name = $request->input('name');
            $email = $request->input('email');
            $is_admin = $request->input('is_admin');
            $password = Hash::make($request->input('password'));
            
            $data['name'] = $name;
            $data['email'] = $email;
            $data['is_admin'] = $is_admin;
            $data['password'] = $password;
            foreach ($users as $user) {
                if($user->email == $email){
                    return redirect()->back()->with('msg', 'выберите другую почту');   
                }
            }
            User::create($data);
            return redirect('admin/users')->with('success', 'добавлен новый пользователь');
        }
        else{
            return abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(){
        $users = User::all();
        if(Auth::check()){
            if(Auth::user()->is_admin == '1'){
                return view('admin.userscreate', compact('users'));
            }
            else{
                return back();
            }
        }
        else{
            return abort(404);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        if (Auth::check()) {            
            $user = User::find($id);
            return view('admin.usersedit', compact('user'));
        }
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        if(Auth::check()){

        $user = User::find($id);

        $name = $request->input('name');
        $email = $request->input('email');
        $is_admin = $request->input('is_admin');
        echo "*name://" . $name ."+";
        echo "*email:/" . $email . "+". "*is_admin:". $is_admin ."+";
        $user->name = $name;
        $user->email = $email;
        $user->is_admin = $is_admin;
        $password = $request->input('password');
        if($password){
            $user->password = Hash::make($password);
        }
        $user->save();
        return redirect('admin/users')->with('success2', 'пользователь '. $user->name.' обнавлен');
        }
        else{
            return abort(404);
        }
    }
    public function destroy($id){
        if (Auth::check()) {
            
        $user = User::find($id);
        $user->delete();
        return redirect('admin/users')->with('success3', 'пользователь '. $user->name.' Удален!');
        }
        else{
            return abort(404);
        }
    }
}
