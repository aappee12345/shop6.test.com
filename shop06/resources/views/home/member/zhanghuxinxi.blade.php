@extends('home.layouts.member_base')
@section('title')
会员中心-账户信息
@endsection
@section('position')
    <div class="position">
        <a href="index.html" target="_self">首页</a> >
        <a href="fuwuliucheng.html" target="_self">客户服务</a> >
        <a href="fuwuliucheng.html" target="_self">服务流程</a>
    </div>
@endsection
@section('content')
    <div class="right clear">
        <div class="check">
            <div class="tit">账户查询</div>
            <div class="cont">
                <div class="img"><img src="{{asset('home/images/zhcheck.png')}}" alt="账户查询"></div>
                <div class="right">
                    <div class="up5">
                        <div class="li">账户总余额：¥ 0.00</div>
                        <div class="li">提现结余金额：¥ 0.00</div>
                        <div class="li">可用余额：¥ 0.00</div>
                        <div class="down">
                            <a class="le" href="shouzhimingxi.html">查看账户明细</a>
                            <a class="le" href="zhanghuchongzhi.html">余额不足,立即充值</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cash">
            <div class="tit">提现申请查询</div>
            <div class="cont">
                <img src="{{asset('home/images/tixian.png')}}" alt="提现"/>
                <a href="tixianshenqing.html" class="operate">申请提现</a>
            </div>
        </div>
    </div>
    </div>
    <br>
    <div class="footline1"></div>
@endsection
