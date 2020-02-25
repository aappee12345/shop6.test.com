<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台登录-满泽装饰 V1.0</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="{{asset('admin/css/font.css')}}">
	<link rel="stylesheet" href="{{asset('admin/css/xadmin.css')}}">
    <link rel="stylesheet" href="https://cdn.bootcss.com/Swiper/3.4.2/css/swiper.min.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.bootcss.com/Swiper/3.4.2/js/swiper.jquery.min.js"></script>
    <script src="{{asset('admin/lib/layui/layui.js')}}" charset="utf-8"></script>
    <script type="text/javascript" src="{{asset('admin/js/xadmin.js')}}"></script>

</head>
<body>
    <div class="login-logo"><h1>满泽装饰后台管理 V1.0</h1></div>
    <div class="login-box">
        <form class="layui-form layui-form-pane" action="">
            <h3>登录你的帐号</h3>
            <label class="login-title" for="username">帐号</label>
            <div class="layui-form-item">
                <label class="layui-form-label login-form"><i class="iconfont">&#xe6b8;</i></label>
                <div class="layui-input-inline login-inline">
                  <input type="text" name="username" lay-verify="required" placeholder="请输入你的帐号" autocomplete="off" class="layui-input">
                </div>
            </div>
            <label class="login-title" for="password">密码</label>
            <div class="layui-form-item">
                <label class="layui-form-label login-form"><i class="iconfont">&#xe82b;</i></label>
                <div class="layui-input-inline login-inline">
                  <input type="password" name="password" lay-verify="required" placeholder="请输入你的密码" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="form-actions">
{{--                <img src="{{url('Admin/login/captcha')}}" class="bk_validate_code"/>--}}
                <button class="btn btn-warning pull-right" lay-submit lay-filter="login"  type="submit">登录</button>
                <div class="forgot"><a href="#" class="forgot">忘记帐号或者密码</a></div>     
            </div>
            {{csrf_field()}}
        </form>
    </div>

    <script type="text/javascript">
        $(function  () {
            layui.use('form', function(){
              var form = layui.form();
              //监听提交
              form.on('submit(login)', function(data){
                  $.ajax({
                      type:'POST',
                      url:"{{url('Admin/login/index')}}",
                      data:data.field,
                      dataType:'JSON',
                      success:function(arr){
                          layer.msg(JSON.stringify(arr.msg),function(){
                              if (arr.status == 0){
                                  location.href="{{url('Admin/index/index')}}"
                              }else{
                                  location.href="{{url('Admin/login/index')}}"
                              }
                          });
                      }
                  })
                  return false;
              });
            });
        })
    </script>
</body>
</html>