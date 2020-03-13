@extends('home.layouts.base')
@section('title')
    服务流程
@endsection
@section('custom_css')
    <link href="{{asset('home/css/service.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="togethertop clear">
        <div class="top"><img src="images/position.png" width="22" height="18"/></div>
        <div class="position"><a href="../index.html" target="_self">首页</a> > <a href="fuwuliucheng.html" target="_self">客户服务</a> > <a href="hezuoanli.html" target="_self">合作案例</a></div>
    </div>

    <div class="together clear">
        <div class="left clear">
            <div class="li2">客户服务</div>
            <a href="{{url('Home/custom/index')}}" target="_self"><div class="li1" id="l1">服务流程</div></a>
            <a href="{{url('Home/custom/cooper')}}" target="_self"><div class="li1 on" id="l2">合作案例</div></a>
            <a href="{{url('Home/custom/baozhang')}}" target="_self"><div class="li1" id="l3">客户保障</div></a>
            <a href="{{url('Home/custom/updatePic')}}" target="_self"><div class="li1" id="l4">急速改图</div></a>
            <a href="{{url('Home/custom/huikuan')}}" target="_self"><div class="li1" id="l5">线下汇款</div></a>
            <a href="{{url('Home/custom/guest')}}" target="_self"><div class="li1" id="l6">在线留言</div></a>
        </div>
        <div class="right clear">
            <div class="top">
                合作案例
            </div>

            <div class="content clear" id="cont1">
                <div class="img"><a href="hezuoanli_content.html" target="_self"><img src="images/cases.png" width="193" height="120" alt="合作案例"/></a></div>
                <div class="img"><a href="hezuoanli_content.html" target="_self"><img src="images/cases.png" width="193" height="120" alt="合作案例"/></a></div>
                <div class="img"><a href="hezuoanli_content.html" target="_self"><img src="images/cases.png" width="193" height="120" alt="合作案例"/></a></div>
                <div class="img"><a href="hezuoanli_content.html" target="_self"><img src="images/cases.png" width="193" height="120" alt="合作案例"/></a></div>
                <div class="img"><a href="hezuoanli_content.html" target="_self"><img src="images/cases.png" width="193" height="120" alt="合作案例"/></a></div>
                <div class="img"><a href="hezuoanli_content.html" target="_self"><img src="images/cases.png" width="193" height="120" alt="合作案例"/></a></div>
                <div class="img"><a href="hezuoanli_content.html" target="_self"><img src="images/cases.png" width="193" height="120" alt="合作案例"/></a></div>
                <div class="img"><a href="hezuoanli_content.html" target="_self"><img src="images/cases.png" width="193" height="120" alt="合作案例"/></a></div>
                <div class="img"><a href="hezuoanli_content.html" target="_self"><img src="images/cases.png" width="193" height="120" alt="合作案例"/></a></div>
                <div class="img"><a href="hezuoanli_content.html" target="_self"><img src="images/cases.png" width="193" height="120" alt="合作案例"/></a></div>
            </div>
        </div>
    </div>

    <div class="footline1"></div>
@endsection