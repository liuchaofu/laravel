<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //显示
    public function index(){
        $categories=Category::all();

        return view("category.index",compact("categories"));
    }
    //增加
    public function add(Request $request){
        //判断是不是post
        if($request->isMethod("post")){
            //健壮性
            $this->validate($request,[
                "name"=>"required|max:8|min:2",
            ]);
            //添加
            if(Category::create($request->post())){
                session()->flash("info","添加成功");
                return redirect()->route("category.index");
            }
        }
        //显示
        return view("category.add");
    }
    //修改
    public function edit(Request $request,$id){

        //获得一条数据
        $category = Category::find($id);
        //判断是不是post
        if($request->isMethod("post")){



            if($category->update($request->post())){
                return redirect()->route("category.index");
            }
        }

        //显示
        $results=Category::all();
//        dd($results);
        return view("category.edit",compact("results"));
    }
    //删除
    public function del($id){
        $category = Category::findOrFail($id);
//        dd($article);
        if($category->delete()){
            return redirect()->route("category.index");
        }
    }
}
