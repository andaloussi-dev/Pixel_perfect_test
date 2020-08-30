<?php

namespace App\Admin\Repositories;
use App\issue\Issue;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
class AdminRepository {

// get all issues ordered by the date 
    public function all(){
        return Issue::orderBy('created_at')->get();
    }
// show an Issue

    public function show($id){
     return Issue::find($id) ?? null;
    }

// update an issue 

    public function update($data,$id){
        Issue::find($id)->update($data);
    }

// delete an issue

    public function delete($id){     
        Issue::find($id)->delete();
    }
}
 