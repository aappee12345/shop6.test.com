@extends('admin.layouts.base')
@section('title')
    密码修改
@endsection
@section('right')
    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form" action="">
                <div class="layui-form-item">
                    <label for="L_pass" class="layui-form-label">
                        <span class="x-red">*</span>原密码
                    </label>
                    <div class="layui-input-inline">
                        <input type="password" id="L_password" name="password" required="" lay-verify="pass"
                               autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">

                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_pass" class="layui-form-label">
                        <span class="x-red">*</span>新密码
                    </label>
                    <div class="layui-input-inline">
                        <input type="password" id="L_new_pass" name="newPass" required="" lay-verify="newPass"
                               autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        6到16个字符
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="newPass_confirmation" class="layui-form-label">
                        <span class="x-red">*</span>确认密码
                    </label>
                    <div class="layui-input-inline">
                        <input type="password" id="newPass_confirmation" name="newPass_confirmation" required="" lay-verify="newPass_confirmation"
                               autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        再次输入新密码
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button  class="layui-btn"  lay-submit lay-filter="update" type="submit">
                        确 认
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
            form.on('submit(update)', function (data) {
                $.ajax({
                    type: 'POST',
                    url: "{{url('Admin/user/do_update_pwd')}}",
                    data: data.field,
                    dataType: 'JSON',
                    success: function (arr) {
                        layer.msg(JSON.stringify(arr.msg), function () {
                            if (arr.status == 0){
                                location.href="{{url('Admin/index/index')}}";
                            }else{
                                location.href="{{url('Admin/user/update_pwd')}}";
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
