<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Children;

class ChildrenController extends Controller
{
    public function call(){
        return Children::orderBy('order','asc')->get();
    }

    public function amount(){
        return Children::where('prefix','amount')->count();
    }


    public function store(Request $request){

        $request->session()->forget('children');

        $request->validate([
            'title' => 'required|max:50',
            'text' => 'required|max:255',
            'image' => 'required|image',
            'coefficient' => 'lt:100|gt:0|numeric',
            'parent_prefix' => 'required',
        ]);

        if ($file = $request->file('image')) {
            $fileName = time() . '_' . $file->getClientOriginalName();
            $target_path = public_path('uploads/');
            $file->move($target_path, $fileName);
        } else {
            $fileName = "";
        }

        $latest = Children::orderBy('created_at','desc')->first();
        $order = $latest->id + 1;

        $child = new Children;
        $child->title = $request->input('title');
        $child->text = $request->input('text');
        $child->file_name = $fileName;
        $child->coefficient = $request->input('coefficient');
        $child->prefix = $request->input('parent_prefix');
        $child->order = $order;
        $child->save();

        return redirect()->action('ManageController@showManage')->with('child_status','小項目を追加しました。');
    }

    public function update(Request $request){

        if($request->has('destroy')){
            return $this->destroy($request->input('target'));
        }

        $request->session()->put('children', 'edit');

        $request->validate([
            'target' => 'required',
            'edittitle' => 'required|max:50',
            'edittext' => 'required|max:255',
            'editimage' => 'image',
            'editcoefficient' => 'lt:100|gt:0|numeric',
            'editparent_prefix' => 'required',
        ]);


        if ($file = $request->file('editimage')) {
            $fileName = time() . '_' . $file->getClientOriginalName();
            $target_path = public_path('uploads/');
            $file->move($target_path, $fileName);
        } else {
            $fileName = $request->input('beforeFileName');
        }

        $child =Children::find($request->input('target'));
        $child->title = $request->input('edittitle');
        $child->text = $request->input('edittext');
        $child->file_name = $fileName;
        $child->coefficient = $request->input('editcoefficient');
        $child->prefix = $request->input('editparent_prefix');
        $child->save();

        $request->session()->forget('children');

        return redirect()->action('ManageController@showManage')->with('child_status','小項目を更新しました。');
    }

    public function order(Request $request){

        $order = json_decode($request->json,true);
        $count = 1;
        $status = true;

        foreach($order as $id){
            $child = Children::find($id);
            $child->order = $count;
            $child->save();

            if(!$child->save()){
                $status=false;
            }

            $count ++;
        }
        return json_encode($status);
    }

    public function destroy($id){
        Children::destroy($id);
        return redirect()->action('ManageController@showManage')->with('child_alert','小項目を削除しました。');
    }
    public function getChild($id){
        $child = Children::find($id);
        return $child;
    }
    public function getChildren($prefix){
        $children= Children::where('prefix',$prefix)->get();
        return $children;
    }
    public function choiceChildren(Request $request){
        $decode = json_decode($request->json);
        $idArray = $decode[0];
        $children = array();
        $dataset = array();
        foreach($idArray as $id){
            $child = Children::find($id);
            array_push($dataset, ['title'=>$child->title,'coefficient'=>$child->coefficient,'prefix'=>$child->prefix]);
        }
        return $dataset;
    }
}
