@extends('home.layouts.base')
@section('title')
    服务流程
@endsection
@section('custom_css')
    <link href="{{asset('home/css/service.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
        <div class="servicetop clear">
            <div class="top"><img src="{{asset('home/images/position.png')}}" width="22" height="18"/></div>
            <div class="position">
                <a href="index.html" target="_self">首页</a> >
                <a href="fuwuliucheng.html" target="_self">客户服务</a> >
                <a href="fuwuliucheng.html" target="_self">服务流程</a>
            </div>
        </div>

        <div class="service clear">
            <div class="left clear">
                <div class="li2">客户服务</div>

                <a href="{{url('Home/custom/index')}}" target="_self"><div class="li1 on" id="l1">服务流程</div></a>
                <a href="{{url('Home/custom/cooper')}}" target="_self"><div class="li1" id="l2">合作案例</div></a>
                <a href="{{url('Home/custom/baozhang')}}" target="_self"><div class="li1" id="l3">客户保障</div></a>
                <a href="{{url('Home/custom/updatePic')}}" target="_self"><div class="li1" id="l4">急速改图</div></a>
                <a href="{{url('Home/custom/huikuan')}}" target="_self"><div class="li1" id="l5">线下汇款</div></a>
                <a href="{{url('Home/custom/guest')}}" target="_self"><div class="li1" id="l6">在线留言</div></a>
            </div>
            <div class="right clear">
                <div class="top">
                    服务流程
                </div>

                <div class="content" id="cont1">
                    <img src="{{asset('home/images/fuwuliucheng.png')}}" width="968" height="1308" alt="服务流程图">
                </div>

            </div>
        </div>
        <script type="text/javascript">
            function clicks(id)
            {
                var nid = "cont"+id;
                $(".li1").removeClass("on");
                $("#l"+id).addClass("on");
                $(".content").hide();
                $("#"+nid).show();
            }
        </script>




        <div class="footline1"></div>

@endsection
@section('custom_script')
    <script type="text/javascript">
        function clicks(id) {
            var nid = "cont"+id;
            $(".li1").removeClass("on");
            $("#l"+id).addClass("on");
            $(".content").hide();
            $("#"+nid).show();
        }
    </script>
@endsection