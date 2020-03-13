@extends('admin.layouts.base')
@section('title')
    会员列表
@endsection
@section('custom_css')
    <style>
        input[name=sort_order]{width:50px;color:black;text-align:center;}
    </style>
@endsection
@section('right')
    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <xblock class="layui-clear">
                <form class="layui-form xbs" action="" style="float:left;width:500px;">
                            <div class="layui-input-inline">
                                <input type="text" name="key"  placeholder="请输入会员名" value="{{$data['key']}}" autocomplete="off" class="layui-input">
                            </div>
                            <div class="layui-input-inline" style="width:80px">
                                <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                            </div>
                </form>
                {{--                <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button>--}}
                <span class="x-right" style="line-height:40px">共有数据：{{$data['count']??'0'}} 条</span>
            </xblock>
            <table class="layui-table">
                <thead>
                <tr>
                    <th width="50"><input type="checkbox" name="" value=""></th>
                    <th width="50">ID</th>
                    <th>会员名称</th>
                    <th width="200">邮箱</th>
                    <th width="50">操作</th>
                </tr>
                </thead>
                <tbody>
                @if (isset($data['member_list']) && (!empty($data['member_list'])))
                    @foreach($data['member_list'] as $v)
                        <tr>
                            <td><input type="checkbox" value="1" name=""></td>
                            <td >{{$v->id}}</td>
                            <td><a href="{{url('Admin/member/'.$v->id.'/edit')}}">{{$v->username}}</a></td>
                            <td class="td-manage" align="center">
                                {{$v->email}}
                            </td>
                            <td class="td-manage">
                                <a title="修改" href="{{url('Admin/member/'.$v->id.'/edit')}}" class="ml-5" style="text-decoration:none"><i class="layui-icon">&#xe642;</i></a>
                                <a title="删除" href="javascript:void(0);" onclick="del(this,'{{$v->id}}')" style="text-decoration:none"><i class="layui-icon">&#xe640;</i></a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8" align="center">暂无角色</td>
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
        //批量删除提交
        function delAll () {
            layer.confirm('确认要删除吗？',function(index){
                //捉到所有被选中的，发起异步进行删除
                layer.msg('删除成功', {icon: 1});
            });
        }
        /*删除*/
        function del(obj,id){
            layer.confirm('确认要删除吗？',function(index){
                //发起异步删除数据
                $.ajax({
                    type: 'POST',
                    url: "{{url('Admin/member')}}/"+id,
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
