<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parents;

class ParentsController extends Controller
{
    public function call(){
        return Parents::orderBy('id','asc')->get();
    }

    public function update(Request $request){

        $parents = Parents::orderBy('id','asc')->get();
        $index = 0;

        foreach($parents as $parent){
            $parent->name = $request->name[$index];
            $parent->save();

            $index++;
        }

        return redirect()->action('ManageController@showParent')->with('parents_alert','大項目の名称を変更しました。');
    }
}
