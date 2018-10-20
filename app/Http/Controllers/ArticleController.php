<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //显示
    public function index(){
        $articles=Article::all();

//        $results = DB::select('select * from categories');
//        dd($results);
        return view("article.index",compact("articles"));

    }
    //增加
    public function add(Request $request){

        //判断是不是post
        if($request->isMethod('post')){

//            dd($request->post());
            //验证 ，没通过，自动在本页
            $this->validate($request,[
                "name"=>"required|max:9|min:3",
                "content"=>"required",
                "cate_id"=>"required"
            ]);

            if (Article::create($request->post())) {
                session()->flash("success","添加成功");
                return redirect('/article/index');
            }
        }
        $results=Category::all();

        //显示视图
        return view('article.add',compact("results"));
    }
    //修改
    public function edit(Request $request,$id){
        //找id
        $article = Article::find($id);
        //判断post
        if($request->isMethod("post")){

            //验证 ，没通过，自动在本页
            $this->validate($request,[
                "name"=>"required|max:9|min:3",
                "content"=>"required",

            ]);

//            dd($request->post());
            if ($article->update($request->post())) {
                //跳转
                return redirect()->route("article.index");
            }
        }
        //显示视图
        $results=Category::all();

        return view("article.edit",compact('article',"results"));
    }
    //删除
    public function del($id){
        //有个友好得提示，就是没有得话就直接给你说没有，而不是直接显示程序元看的
        $article = Article::findOrFail($id);
//        dd($article);
        if($article->delete()){
            return redirect()->route("article.index");
        }
    }
}
