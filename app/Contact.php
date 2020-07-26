<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function index(){

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
    
    public function client(){
        return belongsTo("App\Client","id","clinet_id");
    }
}
