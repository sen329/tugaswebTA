<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usermodel;
use DB;

class Usercontroller extends Controller
{
    protected $user;

    public function __construct(Usermodel $user){
      $this->user = $user;
    }
    //
    public function register(Request $request){
      $user = [
        "name"  => $request->name,
        "email" => $request->email,
        "password" => md5($request->password)
      ];
      $user = $this->user->create($user);

      if($user){
        return "Successfully Created";
      }
      return "failed";
    }

    public function all(){
        $users = $this->user->all();

      return view("all")->with('users',$users);
    }

    public function find($id){
      $user = $this->user->find($id);
      //s$user = $this->user->where("id", "=", $id);

      return $user;
    }

    public function delete($id){
      DB::table('users')->where('id',$id)->delete();
      return redirect('/all');
    }

    public function show($id) {
    $users = DB::select('select * from users where id = ?',[$id]);
    return view('editusers', ['users'=>$users]);
  }

    public function updateUser(Request $request, $id) {
    $newName = $request->input('name');
    $newEmail = $request->input('email');
    $newPassword = md5($request->password);
    DB::update('update users set name = ?, email = ?, password = ? where id = ?', [$newName, $newEmail, $newPassword, $id]);
    return redirect('/all');
  }

}
