<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function tasks(){
         return auth()->user()->tasks()->get();
    }
    public function createdTasks(){
         return auth()->user()->createdTasks()->get();
    }
    public function projects(){
         return auth()->user()->projects()->get();
    }
    public function roles(){
         return auth()->user()->roles()->get();
    }
    public function messages(){
         return auth()->user()->messages()->get();
    }
}
