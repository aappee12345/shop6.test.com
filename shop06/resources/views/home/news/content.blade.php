@extends('home.layouts.base')
@section('title')
    新闻动态-文章标题
@endsection
@section('custom_css')
    <link href="{{asset('home/css/news.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('banner')
    <div class="banner" id="headbanner">
        <div class="home-banner">
            <div id="homeBanner">
                <ul class="pic-layer">
                    <li class="current" style="display: list-item;"><a href="#" target="_self"><img width="1920" height="480" src="{{asset('home/images/76_20151221131245_txcd0.jpg')}}" border="0"></a></li>
                    <li class="" style="display: none;"><a href="#" target="_self"><img width="1920" height="480" src="{{asset('home/images/76_20151221121221_nxncn.jpg')}}" border="0"></a></li>
                    <li class="" style="display: none;"><a href="#" target="_self"><img width="1920" height="480" src="{{asset('home/images/76_20151221131256_ztxql.jpg')}}" border="0"></a></li>
                    <li class="" style="display: none;"><a href="#" target="_self"><img width="1920" height="480" src="{{asset('home/images/76_20151221121230_bm7xp.jpg')}}" border="0"></a></li>
                </ul>
                <div class="indexBtn-holder">
                    <a class="indexBtn-bkg">
                        <span class="indexBtn current"></span>
                        <span class="indexBtn"></span>
                        <span class="indexBtn"></span>
                        <span class="indexBtn"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="newsc clear">
        <div class="left clear">
            <a href="{{url('Home/news/index')}}" class="li1" id="l1">全部新闻</a>
            @foreach ($data['newscatelist'] as $nc)
                <a href="{{url('Home/news/index')}}/{{$nc->id}}" class="li1" id="l2">{{$nc->name}}</a>
            @endforeach
        </div>
        <div class="right clear">
            <div class="top"><img src="{{asset('home/images/news_t.png')}}" width="268" height="55" alt="新闻动态"/></div>

            <div class="content" id="cont1">
                <h2>{{$data['info']->article_fulltitle}}</h2>
                <div class="time">{{$data['info']->update_time}}</div>
                {!! $data['info']->article_content !!}
                <div class="line1"><img src="{{asset('home/images/fgx.png')}}" width="893" height="10" alt="分割线"/></div>
                <div class="prev">上一篇：<a href="#" target="_self">***</a></div>
                <div class="prev">下一篇：<a href="#" target="_self">***</a></div>
            </div>
        </div>
    </div>


    <div class="footline1"></div>
@endsection

