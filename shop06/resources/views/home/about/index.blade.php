@extends('home.layouts.base')
@section('title')
    关注我们
@endsection
@section('custom_css')
    <link href="{{asset('home/css/about.css')}}" rel="stylesheet" type="text/css"/>
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
    <div class="ours clear">
        <div class="left clear">
            @foreach ($data['aboutcatelist'] as $ac)
                <a href="{{url('Home/about/index')}}/{{$ac->id}}" class="li1">{{$ac->name}}</a>
            @endforeach
        </div>
        <div class="right clear">
            <div class="top"><img src="{{asset('home/images/ours.png')}}" width="266" height="55" alt="关注我们"/></div>

            <div class="content" id="cont1">
                <div class="img"><img src="{{asset('home/images/our_about.png')}}" width="966" height="286" alt="关注我们(图)"/></div>
                <div class="cont">
                    {!! $data['info']->article_content??'资料录入中...' !!}
                </div>
            </div>
        </div>
    </div>
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