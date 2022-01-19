<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Money;
use App\Models\UserData;
use App\Models\Parents;
use App\Models\Children;

class ManageController extends Controller
{
    public function call(){
        return Money::orderBy('id','asc')->get();
    }
    public function moneyUpdate(Request $request){
        $request->validate([
            'price' => 'required|numeric',
        ]);

        $money = Money::first();
        $money->price = $request->input('price');
        $money->save();

        return redirect()->action('ManageController@showConfig')->with('config_alert','単価設定を更新しました。');
    }
    public function showManage()
    {
        $parents = Parents::orderBy('id','asc')->get();
        $children = Children::orderBy('id','asc')->get();
        return view('manage.home',compact('parents','children'));
    }
    public function showSort()
    {
        $parents = Parents::orderBy('id','asc')->get();
        $children = Children::orderBy('id','asc')->get();
        return view('manage.sort',compact('parents','children'));
    }
    public function showParent()
    {
        $parents = Parents::orderBy('id','asc')->get();
        return view('manage.parent',compact('parents'));
    }
    public function showConfig()
    {
        $money = Money::orderBy('id','asc')->get();
        return view('manage.config',compact('money'));
    }
    public function showContact(){
        $contact = UserData::orderBy('created_at','desc')->get();
        return view('manage.contact',compact('contact'));
    }
    public function showContactDetails($id){
        $contact = UserData::find($id);
        $parents = Parents::orderBy('id','asc')->get();
        return view('manage.contact_details',compact('contact','parents'));
    }
}
