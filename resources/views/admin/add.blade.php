@extends("layouts.main")
@section("title","文章添加")
@section("content")
    <form class="form-horizontal" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="author" class="col-sm-2 control-label">author</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="author" placeholder="作者" name="author" value="{{old("author")}}">
            </div>
        </div>

        <div class="form-group">
            <label for="intro" class="col-sm-2 control-label">intro</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="intro" placeholder="介绍" name="intro" value="{{old("intro")}}">
            </div>
        </div>

        <div class="form-group">
            <label for="content" class="col-sm-2 control-label">content</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="content" placeholder="内容" name="content" value="{{old("content")}}">
            </div>
        </div>




        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-info">添加</button>
            </div>
        </div>
    </form>




   @endsection

@extends("layouts._footer")