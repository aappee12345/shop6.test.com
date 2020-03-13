@extends('home.layouts.base')
@section('title')
    新闻动态
@endsection
@section('custom_css')
    <link href="{{asset('home/css/news.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{asset('home/css/app.css')}}">
@endsection
@section('banner')
    <div class="banner" id="headbanner">
        <div class="home-banner">
            <div id="homeBanner">
                <ul class="pic-layer">
                    <li class="current" style="display: list-item;"><a href="#" target="_blank"><img width="1920" height="480" src="{{asset('home/images/76_20151221131245_txcd0.jpg')}}" border="0"></a></li>
                    <li class="" style="display: none;"><a href="#" target="_blank"><img width="1920" height="480" src="{{asset('home/images/76_20151221121221_nxncn.jpg')}}" border="0"></a></li>
                    <li class="" style="display: none;"><a href="#" target="_blank"><img width="1920" height="480" src="{{asset('home/images/76_20151221131256_ztxql.jpg')}}" border="0"></a></li>
                    <li class="" style="display: none;"><a href="#" target="_blank"><img width="1920" height="480" src="{{asset('home/images/76_20151221121230_bm7xp.jpg')}}" border="0"></a></li>
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
    <div class="news clear">
        <div class="left clear">
            <a href="{{url('Home/news/index')}}" class="li1 on" id="l1">全部新闻</a>
            @foreach ($data['newscatelist'] as $nc)
                <a href="{{url('Home/news/index')}}/{{$nc->id}}" class="li1" id="l2">{{$nc->name}}</a>
            @endforeach
        </div>
        <div class="right clear">
            <div class="top"><img src="{{asset('Home/images/news_t.png')}}" width="268" height="55" alt="新闻动态"/></div>

            <div class="content" id="cont1">
                @foreach($data['list'] as $vo)
                    <div class="li3">
                        <div class="up5">
                            <div class="title"><a href="{{url('Home/news/content')}}/{{$vo->article_id}}" target="_self">{{$vo->article_fulltitle}}</a></div>
                            <div class="time">{{$vo->update_time}}</div>
                        </div>
                        <div class="down5"><a href="{{url('Home/news/content')}}/{{$vo->article_id}}" target="_self">{{$vo->article_desc}}</a> <a href="{{url('Home/article/show/$vo->article_id')}}" target="_self">【详细】</a></div>
                    </div>
                @endforeach
            </div>
            {{ $data['list']->links() }}
        </div>
    </div>
    <div class="footline1"></div>
@endsection
