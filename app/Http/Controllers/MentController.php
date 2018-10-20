<?php

namespace App\Http\Controllers;

use App\Models\Ment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MentController extends Controller
{
    //显示
    public function index()
    {
        $ments = Ment::all();


        return view("ment.index",compact("ments"));
    }
    //增加
    public function add(Request $request)
    {
        //判断是不是post
        if($request->isMethod("post")){
            if(Ment::create($request->post())){
                session()->flash("info","ok");
                return redirect()->route("ment.index");
            }
        }
        //显示
        return view("ment.add");
    }
    //修改
    public function edit(Request $request,$id)
    {
        //找到单个
        $ment = Ment::find($id);
        //判断是不是post
        if($request->isMethod("post")){
            if($ment->update($request->post())){
                session()->flash("info","odk");
                return redirect()->route("ment.index");
            }
        }
        //显示
        $results = Ment::all();

        return view("ment.edit",compact("results"));

    }
    //删除
    public function del($id)
    {
        //找到id
        $ments = Ment::findOrFail($id);
        if($ments->delete()){
            return redirect()->route("ment.index");
        }
    }
}
