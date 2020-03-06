@extends('admin.layouts.base')
@section('title')
    角色添加
@endsection
@section('custom_css')
    <style>
        .layui-form-item .layui-input-inline{width:1400px;}
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
                        <span class="x-red">*</span>角色名称
                    </label>
                    <div class="layui-input-inline" style="line-height: 38px;">
                        {{$data['info']->name}}
                    </div>
                </div>

                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>角色权限
                    </label>
                    <div class="layui-input-inline" style="line-height: 38px;">
                        @foreach ($data['permission_list'] as $p)
                        <input type="checkbox" name="permissions" title="{{$p->name}}" value="{{$p->id}}" @if(in_array($p->id,$data['permissions'])||empty($data['permissions'])) checked @endif>
                        @endforeach
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <input type="hidden" name="id" value="{{$data['info']->id}}">
                    <button  class="layui-btn" lay-filter="add" lay-submit="">
                        提 交
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

                    var arr = new Array();
                    $("input:checkbox[name='permissions']:checked").each(function(i){
                        arr[i] = $(this).val();
                    });
                    data.field.permissions = arr.join(",");//将数组合并成字符串
                    $.ajax({
                        type: 'POST',
                        url: "{{url('Admin/role/doEditPerm')}}",
                        data: data.field,
                        dataType: 'JSON',
                        success: function (arr) {
                            layer.msg(JSON.stringify(arr.msg), function () {
                                console.log(arr.msg);
                                if (arr.status == 0){
                                    location.href="{{url('Admin/roles')}}";
                                }else{
                                    location.href="{{url('Admin/roles/create')}}";
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