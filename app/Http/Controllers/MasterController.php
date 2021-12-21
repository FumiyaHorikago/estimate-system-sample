<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterController extends Controller
{
    protected $pC,$cC,$mC,$uC;

    public function __construct(ParentsController $pC,ChildrenController $cC,ManageController $mC,UserDataController $uC,)
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
        return view('home',compact('parents','children'));
    }

    public function showManage()
    {
        $parents = $this->parents->call();
        $children = $this->children->call();
        $children_default = $this->children->call_default();
        $userdata = $this->userdata->call();
        return view('manage.home',compact('parents','children','children_default'));
    }
}
