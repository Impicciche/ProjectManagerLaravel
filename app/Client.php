<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Client;

class Client extends Model
{
    
    
    public function index(){
        return Client::all();
    }

    public function store(){

    }

    public function create(){
        
    }

    public function update(){

    }

    public function destroy(){

    }

    public function show(){

    }

    public function edit(){

    }

    public function projects(){
        return hasMany("App\Project","client_id","id");
    }
    public function contacts(){
        return hasMany("App\Contact","client_id","id");
    }
}
