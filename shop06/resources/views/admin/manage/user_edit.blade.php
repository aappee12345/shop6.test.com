@extends('admin.layouts.base')
@section('title')
    用户修改
@endsection
@section('custom_css')
    <style>
        .layui-form-item .layui-input-inline{width:500px;}
        .layui-form-item .layui-input-inline input[name=sort_order],input[name=page_num]{width:70px;}
        .layui-form-item .layui-input-inline .layui-form-select{width:200px;}
    </style>
@endsection
@section('right')
    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form">
                <div class="layui-form-item">
                    <label for="username" class="layui-form-label">
                        <span class="x-red">*</span>用户名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="username" name="username" value="{{$data['info']->username}}" required="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="email" class="layui-form-label">
                        <span class="x-red">*</span>用户邮箱
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="email" name="email" required="" value="{{$data['info']->email}}" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>所属角色
                    </label>
                    <div class="layui-input-inline">
                        <select name="role_id">
                            @foreach ($data['roles_list'] as $vo)
                                @if($vo->id==$data['info']->rolesUser->role_id)
                                    <option value="{{$vo->id}}" selected>{{$vo->name}}</option>
                                @else
                                    <option value="{{$vo->id}}">{{$vo->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label for="layui-btn" class="layui-form-label">
                    </label>
                    <button  class="layui-btn" lay-filter="edit" lay-submit="">
                        修 改
                    </button>
                    @method('put')
                    {{csrf_field()}}
                </div>
            </form>
            <!-- 右侧内容框架，更改从这里结束 -->
        </div>
    </div>
    <!-- 右侧主体结束 -->
@endsection
@section('custom_script')
    <script>
        $(function  () {
            //监听提交
            layui.use('form', function () {
                var form = layui.form();
                //监听提交
                form.on('submit(edit)', function (data) {
                    $.ajax({
                        type: 'POST',
                        url: "{{url('Admin/users')}}/{{$data['info']->id}}",
                        data: data.field,
                        dataType: 'JSON',
                        success: function (arr) {
                            layer.msg(JSON.stringify(arr.msg), function () {
                                console.log(arr.msg);
                                if (arr.status == 0){
                                    location.href="{{url('Admin/users')}}";
                                }else{
                                    location.href="{{url('Admin/users')}}/{{$data['info']->id}}/edit";
                                }

                            });
                        }
                    })
                    return false;
                })
            })
        })
    </script>
@endsection