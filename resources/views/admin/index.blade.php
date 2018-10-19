@extends("layouts.main")

@section("content")
    <a href="/admin/add" class="btn btn-info">添加</a>

    <table class="table">
        <tr>
            <th>Id</th>
            <th>author</th>
            <th>intro</th>
            <th>content</th>
            <th>操作</th>
        </tr>
        @foreach($admins as $admin)
            <tr>
                <td>{{$admin->id}}</td>
                <td>{{$admin->author}}</td>
                <td>{{$admin->intro}}</td>
                <td>{{$admin->content}}</td>

                <td>
                    <a href="{{route("admin.edit",$admin->id)}}" class="btn btn-info">编辑</a>
                    <a href="{{route("admin.del",$admin->id)}}" class="btn btn-danger">删除</a>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="pull-right">
        {{$admins->links()}}
    </div>
   @endsection


@extends("layouts._footer")

