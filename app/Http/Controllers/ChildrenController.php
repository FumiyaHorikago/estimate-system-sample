<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Children;

class ChildrenController extends Controller
{
    public function call(){
        return Children::orderBy('order','asc')->get();
    }
    public function call_default(){
        return Children::orderBy('order','asc')->where('parent_id',1)->get();
    }

    public function store(Request $request){

        $request->session()->forget('children');

        $request->validate([
            'title' => 'required|max:50',
            'text' => 'required|max:255',
            'image' => 'required|image',
            'coefficient' => 'lt:100|gt:0|numeric',
            'parent_id' => 'required',
        ]);

        if ($file = $request->file('image')) {
            $fileName = time() . '_' . $file->getClientOriginalName();
            $target_path = public_path('uploads/');
            $file->move($target_path, $fileName);
        } else {
            $fileName = "";
        }

        $child = new Children;
        $child->title = $request->input('title');
        $child->text = $request->input('text');
        $child->file_name = $fileName;
        $child->coefficient = $request->input('coefficient');
        $child->parent_id = $request->input('parent_id');
        $child->save();

        return redirect()->action('MasterController@showManage')->with('child_status','小項目を追加しました。');
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
            'editparent_id' => 'required',
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
        $child->parent_id = $request->input('editparent_id');
        $child->save();

        $request->session()->forget('children');

        return redirect()->action('MasterController@showManage')->with('child_status','小項目を更新しました。');
    }

    public function order(Request $request){

        $order = $request->input('child_id');
        $count = 1;

        foreach($order as $id){
            $child = Children::find($id);
            $child->order = $count;
            $child->save();

            $count ++;
        }
        return redirect()->action('MasterController@showManage')->with('child_status','並び順を反映しました。');
    }

    public function destroy($id){
        Children::destroy($id);
        return redirect()->action('MasterController@showManage')->with('child_alert','小項目を削除しました。');
    }
    public function getChild($id){
        $child = Children::find($id);
        return $child;
    }
    public function getChildren($id){
        $children= Children::where('parent_id',$id)->get();
        return $children;
    }
}
