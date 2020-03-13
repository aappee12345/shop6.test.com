@extends('admin.layouts.base')
@section('title')
    友情链接分类列表
@endsection
@section('right')
    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <xblock>
                <a class="layui-btn" href="{{url('Admin/link_type/create')}}"><i class="layui-icon">&#xe608;</i>添加</a>
                <span class="x-right" style="line-height:40px">共有数据：{{$data['count']}} 条</span>
            </xblock>
            <table class="layui-table">
                <thead>
                <tr>
                    <th width="50">ID</th>
                    <th>友情链接分类名称</th>
                    <th width="50">操作</th>
                </tr>
                </thead>
                <tbody>
                @if ($data['count'] > 0)
                @foreach($data['list'] as $v)
                <tr>
                    <td >{{$v->id}}</td>
                    <td>
                        <a href="{{url('Admin/link_type/'.$v->id.'/edit')}}">{{$v->name}}</a>
                    </td>
                    <td class="td-manage">
                        <a title="修改" href="{{url('Admin/link_type/'.$v->id.'/edit')}}" class="ml-5" style="text-decoration:none"><i class="layui-icon">&#xe642;</i></a>
                        <a title="删除" href="javascript:void(0);" onclick="del(this,'{{$v->id}}')" style="text-decoration:none"><i class="layui-icon">&#xe640;</i></a>
                    </td>
                </tr>
                @endforeach
                    @else
                    <tr>
                        <td colspan="8" align="center">暂无友情链接分类</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <!-- 右侧内容框架，更改从这里结束 -->
        </div>
    </div>
    <!-- 右侧主体结束 -->
@endsection
@section('custom_script')
    <script>
        /*删除*/
        function del(obj,id){
            layer.confirm('确认要删除吗？',function(index){
                //发起异步删除数据
                $.ajax({
                    type: 'POST',
                    url: "{{url('Admin/link_type')}}/"+id,
                    data: {'_method':'DELETE','_token':'{{csrf_token()}}'},
                    dataType: 'JSON',
                    success: function (data) {
                        $(obj).parents("tr").remove();
                        layer.msg(JSON.stringify(data.msg),{icon:1,time:1000});
                    }
                })
            });
        }
    </script>
@endsection
