@extends('admin.layouts.base')
@section('title')
    会员修改
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
                        <span class="x-red">*</span>会员名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="username" name="username" value="{{$data['info']->username}}" required="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="email" class="layui-form-label">
                        <span class="x-red">*</span>会员邮箱
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="email" name="email" required="" value="{{$data['info']->email}}" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="phone" class="layui-form-label">
                        <span class="x-red">*</span>手机
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="phone" name="phone" required="" value="{{$data['info']->phone}}" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="question" class="layui-form-label">
                        <span class="x-red">*</span>密码问题
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="question" name="question" required="" value="{{$data['info']->question}}" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="answer" class="layui-form-label">
                        <span class="x-red">*</span>密码答案
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="answer" name="answer" required="" value="{{$data['info']->answer}}" autocomplete="off" class="layui-input">
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
                        url: "{{url('Admin/member')}}/{{$data['info']->id}}",
                        data: data.field,
                        dataType: 'JSON',
                        success: function (arr) {
                            layer.msg(JSON.stringify(arr.msg), function () {
                                console.log(arr.msg);
                                if (arr.status == 0){
                                    location.href="{{url('Admin/member')}}";
                                }else{
                                    location.href="{{url('Admin/member')}}/{{$data['info']->id}}/edit";
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