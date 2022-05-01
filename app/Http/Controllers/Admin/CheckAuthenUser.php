<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Jetstream\HasTeams;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class CheckAuthenUser extends Controller
{
    //use HasTeams;
    public function index(User $user){
          $id = Auth::user()->id;
          $x =  $user->find($id)->currentTeam->name;
          dd($x);
        return view('Admin.dashboard');
    }
}
