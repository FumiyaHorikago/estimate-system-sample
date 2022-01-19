<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserData;

class MasterController extends Controller
{
    protected $pC,$cC,$mC,$uC,$moC;

    public function __construct(ParentsController $pC,ChildrenController $cC,ManageController $mC,UserDataController $uC)
    {
        $this->parents = $pC;
        $this->children = $cC;
        $this->manage = $mC;
        $this->userdata = $uC;
    }

    public function index()
    {
        $parents = $this->parents->call();
        $children = $this->children->call();
        $money = $this->manage->call();

        $amount = $this->children->amount();


        return view('home',compact('parents','children','amount','money'));
    }
    public function getEstimateData(Request $request){
        $request->session()->put('estimate',$request->all());
        return redirect()->action('MasterController@showContact');
    }
    public function showContact()
    {
        $session = session('estimate');

        if(!$session){
            return redirect()->action('MasterController@index');
        }

        return view('contact',compact('session'));
    }
    public function sendContactData(Request $request)
    {
        $input = $request->all();

        if($request->has('back')){
            return redirect()->action('MasterController@index')->withInput($input);
        }

        $request->validate([
            'name'=> ['required','string','max:255'],
            'tel'=> ['required','regex:/^0{1}\d{9,10}$/','max:12'],
            'mail' => ['required', 'string', 'email', 'max:255',],
            'comment'=> ['required'],
            'format' => ['required'],
            'living' => ['required'],
            'dining' => ['required'],
            'amount' => ['required'],
            'tatami' => ['required'],
            'type' => ['required'],
            'closet' => ['required'],
            'price' => ['required'],
        ]);

        $request->session()->put('estimate',$request->all());

        return redirect()->action('MasterController@showConfirm');
    }
    public function showConfirm(){
        $session = session('estimate');

        if(!$session){
            return redirect()->action('MasterController@index');
        }

        return view('confirm',compact('session'));
    }
    public function storeContactData(Request $request)
    {
        $input = $request->all();

        if($request->has('back')){
            return redirect()->action('MasterController@showContact')->withInput($input);
        }

        $request->validate([
            'name'=> ['required','string','max:255'],
            'tel'=> ['required','regex:/^0{1}\d{9,10}$/','max:12'],
            'mail' => ['required', 'string', 'email', 'max:255'],
            'comment'=> ['required'],
            'format' => ['required'],
            'living' => ['required'],
            'dining' => ['required'],
            'amount' => ['required'],
            'tatami' => ['required'],
            'type' => ['required'],
            'closet' => ['required'],
            'price' => ['required'],
        ]);

        $choices = [];
        $parents = [
            'format',
            'living',
            'dining',
            'amount',
            'tatami',
            'type',
            'closet',
        ];

        foreach($parents as $parent){
            $choices+=[$parent => $request->input($parent)];
        }


        $data = new UserData();
        $data->name = $request->input('name');
        $data->email = $request->input('mail');
        $data->tel = $request->input('tel');
        $data->comment = $request->input('comment');
        $data->choices = $choices;
        $data->amount = $request->input('price');
        $data->save();

        return redirect()->action('MasterController@showComplete');
    }
    public function showComplete(){
        if(!session('estimate')){
            return redirect()->action('MasterController@index');
        }
        session()->forget('estimate');
        return view('complete');
    }
}
