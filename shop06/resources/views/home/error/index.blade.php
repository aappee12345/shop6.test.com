@extends('home.layouts.base')
@section('title')
    系统信息
@endsection
@section('content')
    <div class="blank"></div>
    <div class="block">
        <div class="box">
            <div class="box_1">
                <h3><span>系统信息</span></h3>
                <div class="boxCenterList RelaArticle" align="center">
                    <div style="margin:20px auto;">
                        <p style="font-size: 14px; font-weight:bold; color: red;">{{$data}}</p>
                        <div class="blank"></div>
                        <p><a href="/index.php?operator=log">返回登录</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blank5"></div>
    <div class="blank"></div>
@endsection

