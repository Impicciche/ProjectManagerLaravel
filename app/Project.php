<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    private $title;
    private $description;
    private $status;
    
    public function userResponsable(){
        return belongsTo("App\User","id","responsable_id");
    }

    public function messages(){
        return hasMany("App\Message","project_id","id");
    }
    public function tasks(){
        return hasMany("App\Task","project_id","id");
    }
    public function client(){
        return belongsTo("App\Client","id","client_id");
    }
}
