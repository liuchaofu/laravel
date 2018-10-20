<?php

namespace App\Http\Controllers;

use App\Models\Good;
use App\Models\Ment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GoodController extends Controller
{
    //显示
    public function index(){
        $goods = Good::all();

        //自动增加1
//        DB::table('goods')->increment('times',1);
        //        DB::table('goods')->increment('votes', 1, ['name' => 'John']);
        return view("good.index",compact("goods"));
    }
    //查看
    public function see($id)
    {
        $goods = Good::find($id);
       //dd($goods);
//        var_dump($goods.attributes);
//        DB::table('goods')->increment('times',1,['id'=>'$id']);
        //增加浏览
        DB::table('goods')->where('id',$id)->increment('times',1);
        return view("good.see",compact("goods"));
    }
    //增
    public function add(Request $request)
    {
        //判断是不是post
        if($request->isMethod("post")){
//            dd($request->post());
            //健壮性
            $this->validate($request,[
                "name"=>"required|max:9|min:3",
                "money"=>"required"
            ]);
            //添加
            if(Good::create($request->post())){
                session()->flash("success","ok");
                return redirect()->route("good.index");
            }
        }
        //显示
        $results = Ment::all();
//        dd($results);
        return view("good.add",compact("results"));

    }
    //改
    public function edit(Request $request,$id)
    {
        $goods = Good::find($id);
//        dd($goods);
        //判断方法
        if($request->isMethod("post")){
            //健壮性
            $this->validate($request,[
                "name"=>"required",
                "money"=>"required",
            ]);

            //方法
            if($goods->update($request->post())){
                return redirect()->route("good.index");
            }
        }

        //显示
        $results = Ment::all();

        return view("good.edit",compact("goods","results"));

    }

    //删
    public function del($id)
    {
        //id
        $goods = Good::findOrFail($id);

        if($goods->delete()){
            return redirect()->route("good.index");
        }

    }


}
