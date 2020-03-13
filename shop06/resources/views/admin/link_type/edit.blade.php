@extends('admin.layouts.base')
@section('title')
    友情链接分类编缉
@endsection
@section('custom_css')
    <style>
        .layui-form-item  .layui-form-label{width:100px;}
        .layui-form-item .layui-input-inline{width:600px;}
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
                        <span class="x-red">*</span>友情链接分类名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="name" name="name" required="" value="{{$data['info']->name}}" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
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
    <script type="text/javascript">
    $(function  () {
        //监听提交
        layui.use(['laydate','form','upload'], function () {
            var form = layui.form();
            //监听提交
            form.on('submit(edit)', function (data) {
                $.ajax({
                    type: 'POST',
                    url: "{{url('Admin/link_type')}}/{{$data['info']->id}}",
                    data: data.field,
                    dataType: 'JSON',
                    success: function (arr) {
                        layer.msg(JSON.stringify(arr.msg), function () {
                            if (arr.status == 0){
                                location.href="/Admin/link_type";
                            }else{
                                location.href="/Admin/link_type/{{$data['info']->id}}/edit";
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