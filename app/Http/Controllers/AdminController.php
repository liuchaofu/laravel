<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //显示info
    public function info(){
        return view("admin.info");
    }

    //显示about
    public function about(){
        return view("admin.about");
    }

    //显示
    public function index(){
        //分页数 如果是全部数据就直接all
        $admins = Admin::paginate(2);
        //显示
        return view("admin.index",compact('admins'));
    }

    //增加
    public function add(Request $request){
        //判断是不是post
        if($request->isMethod('post')){
            //验证 ，没通过，自动在本页
            $this->validate($request,[
                "author"=>"required|max:9|min:3",
                "intro"=>"required",
                "content"=>"required"
            ]);
            if (Admin::create($request->post())) {
                session()->flash("success","添加成功");
                return redirect('/admin/index');
            }
        }
        //显示视图
        return view('admin.add');
    }

    //修改
    public function edit(Request $request,$id){
        //找id
        $admin = Admin::find($id);
        //判断post
        if($request->isMethod("post")){
            if ($admin->update($request->post())) {
                //跳转
                return redirect()->route("admin.index");
            }
        }
        //显示视图
        return view("admin.edit",compact('admin'));
    }

    //删除
    public function del($id){
        //有个友好得提示，就是没有得话就直接给你说没有，而不是直接显示程序元看的
        $admin = Admin::findOrFail($id);

        if($admin->delete()){
            return redirect()->route("admin.index");
        }
    }

}
