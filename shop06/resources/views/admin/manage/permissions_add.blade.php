@extends('admin.layouts.base')
@section('title')
    权限添加
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
                    <label for="name" class="layui-form-label">
                        <span class="x-red">*</span>权限名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="name" name="name" required="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="route_name" class="layui-form-label">
                        <span class="x-red">*</span>路由名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="route_name" name="route_name" required="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <input type="hidden" id="guard_name" name="guard_name" required="" value="Admin" autocomplete="off" class="layui-input">
                    <button  class="layui-btn" lay-filter="add" lay-submit="">
                        增 加
                    </button>
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
                form.on('submit(add)', function (data) {
                    $.ajax({
                        type: 'POST',
                        url: "{{url('Admin/permissions')}}",
                        data: data.field,
                        dataType: 'JSON',
                        success: function (arr) {
                            layer.msg(JSON.stringify(arr.msg), function () {
                                console.log(arr.msg);
                                if (arr.status == 0){
                                    location.href="{{url('Admin/permissions')}}";
                                }else{
                                    location.href="{{url('Admin/permissions/create')}}";
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