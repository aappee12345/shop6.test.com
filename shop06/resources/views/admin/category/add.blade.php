@extends('admin.layouts.base')
@section('title')
    分类添加
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
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>分类名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="name" name="name" required="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        <span class="x-red">*</span>父级分类
                    </label>
                    <div class="layui-input-inline">
                        <select name="parent_id">
                            <option value="">顶级分类</option>
                            @foreach ($data['tree'] as $vo)
                            <option value="{{$vo->id}}">{{$vo->pre}}{{$vo->name}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        分类标题
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="title" name="title"
                               autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red"></span>分类关键字
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" name="keywords" lay-verify="keywords" autocomplete="off" placeholder="请输入标题" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red"></span>分类描述
                    </label>
                    <div class="layui-input-inline">
                        <textarea placeholder="请输入分类描述" name="description" class="layui-textarea"></textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                        排序号
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="sort_order" name="sort_order" required="" lay-verify="number"
                               autocomplete="off" value="50" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
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
                    url: "{{url('Admin/category')}}",
                    data: data.field,
                    dataType: 'JSON',
                    success: function (arr) {
                        layer.msg(JSON.stringify(arr.msg), function () {
                            console.log(arr.msg);
                            if (arr.status == 0){
                                location.href="{{url('Admin/category')}}";
                            }else{
                                location.href="{{url('Admin/category/create')}}";
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