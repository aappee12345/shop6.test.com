<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>新闻动态</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="{{asset('home/css/reset.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('home/css/head.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('home/css/news.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('home/css/foot.css')}}" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="{{asset('home/js/jquery-1.7.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('home/js/common.js')}}"></script>
</head>
<body>
<!--头部开始-->
<div id="wrap">
    <div class="header clear">
        <div class="head">
            <div class="welcome">满泽装饰效果图欢迎您！</div>
            <div class="reg"><a href="javascript:void(0)" onclick="reg();">我要注册</a></div>
            <div class="reg"><a href="javascript:void(0)" onclick="log();">登录</a></div>
            <div class="log"><img src="{{asset('home/images/log.png')}}" onclick="show();"></div>
            <div class="rmb"><img src="{{asset('home/images/log.png')}}images/rmb.png"></div>
            <div class="reg"><a href="javascript:void(0)" onclick="scans();">扫码支付</a></div>
            <div class="rmb"><img src="{{asset('home/images/log.png')}}images/kehu.png"></div>
            <div class="reg"><a href="javascript:void(0)" onclick="pin();">客户点评</a></div>
            <div class="pic_r"><img src="{{asset('home/images/houtai_s.png')}}" onclick="show();"></div>
            <div class="pic_r"><img src="{{asset('home/images/save_s.png')}}" onclick="show();"></div>
            <div class="pic_r"><img src="{{asset('home/images/weixin_s.png')}}" onclick="show();"></div>
            <div class="pic_r"><img src="{{asset('home/images/zfb_s.png')}}" onclick="show();"></div>
        </div>

    </div>
    <div class="logo">
        <div id="logo"><img src="{{asset('home/images/logo.png')}}"/></div>
        <div class="search">
            <div>
                <input class="up" name="key" type="text" value=""/>
                <input id="search" type="submit" value="搜 索"/>

            </div>
            <div id="down">
                <div class="cate">
                    <a href="#" target="_self">客厅效果图</a> |
                    <a href="#" target="_self">餐厅效果图</a> |
                    <a href="#" target="_self">主卧效果图</a> |
                    <a href="#" target="_self">大厅效果图</a> |
                    <a href="#" target="_self">会议室效果图</a>
                </div>
            </div>
        </div>
        <div class="or">或者</div>
        <div class="ordol"><img src="{{asset('home/images/ordol.png')}}"></div>
        <div id="dbzf">
            <div class="up"><a href="#" target="_self"><img src="{{asset('home/images/dbjyzf_s.png')}}"/></a></div>
            <div class="down">服务热线：023-6292-2838</div>
        </div>
    </div>
    <style>
        .map_con_wrap{ z-index:9999; position:absolute; background:#FFF;width:229px; height:auto; top:40px;left:0; display: block;border-right:3px solid #000;}
        .map_con_wrap1{ z-index:9999; position:absolute; background:#FFF;width:229px; height:auto; top:40px;left:0; display: none;}
    </style>
    <!--分类导航-->
    <div class="menu_b">
        <div class="w1200">
            <div class="nav_btn" id="topnav_btn">
                <a href="javascript:void(0)" class="fl" target="_self">作品案例分类</a>
                <i class="sj"></i>
                <!--左侧商品分类-->
                <div class="map_con_wrap dn" id="topnav_con">
                    <ul>
                        <li class="map_left_li active">
                            <div class="list_t">
                                <a href="#"><span>家装效果图</span></a>
                            </div>
                        </li>
                        <li class="map_left_li">
                            <div class="list_t">
                                <a href="#"><span>工装效果图</span></a>
                            </div>
                        </li>
                        <li class="map_left_li">
                            <div class="list_t">
                                <a href="#"><span>360全景图</span></a>
                            </div>
                        </li>
                        <li class="map_left_li">
                            <div class="list_t">
                                <a href="#"><span>方案深化图</span></a>
                            </div>
                        </li>
                        <li class="map_left_li">
                            <div class="list_t">
                                <a href=""><span>室外表现图</span></a>
                            </div>
                        </li>
                    </ul>
                </div>
                <!--左侧商品分类 end-->
            </div>
            <ul class="menu">
                <li class="cur" id="Menu1">
                    <a href="index.html" target="_self">首 页</a>
                </li>
                <li id="Menu2">
                    <a href="./customerservice/fuwuliucheng.html" target="_self">客户服务</a>
                </li>
                <li id="Menu3">
                    <a href="member/member_center.html" target="_self">会员中心</a>
                </li>
                <li id="Menu4">
                    <a href="gongsijianjie.html" target="_self">关注我们</a>
                </li>
                <li id="Menu5">
                    <a href="news.html" target="_self">新闻动态</a>
                </li>
            </ul>
        </div>
    </div>
    <!--分类导航-->
    <div class="clear">
    </div>
    <!--头部结束-->
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

    <div class="newsc clear">
        <div class="left clear">
            <div class="li1 on" id="l1" onclick="clicks('1');">全部新闻</div>
            <div class="li1" id="l2" onclick="clicks('2');">公司动态</div>
            <div class="li1" id="l3" onclick="clicks('3');">招聘信息</div>
            <div class="li1" id="l4" onclick="clicks('4');">行业新闻</div>
        </div>
        <div class="right clear">
            <div class="top"><img src="{{asset('home/images/news_t.png')}}" width="268" height="55" alt="新闻动态"/></div>

            <div class="content" id="cont1">
                <h2>效果图</h2>
                <div class="time">2015-04-13 10:23:52</div>
                <p>sdjflsdfjldsjfa尽量少带附近类似的纠纷的数量</p>
                <div class="line1"><img src="{{asset('home/images/fgx.png')}}" width="893" height="10" alt="分割线"/></div>
                <div class="prev">上一篇：<a href="#" target="_self">***</a></div>
                <div class="prev">下一篇：<a href="#" target="_self">***</a></div>
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
    <!--尾部开始-->
    <div class="footer">
        <div class="single">
            <div class="about">
                <div class="title">新手指南</div>
                <div class="stitle"><a href="zixunredian.html">咨询热点</a></div>
                <div class="stitle"><a href="#">会员介绍</a></div>
                <div class="stitle"><a href="#">积分介绍</a></div>
            </div>
            <div class="about">
                <div class="title">交易保障</div>
                <div class="stitle"><a href="#">担保交易</a></div>
                <div class="stitle"><a href="#">客户保障</a></div>
                <div class="stitle"><a href="#">急速改图</a></div>
            </div>
            <div class="about">
                <div class="title">会员中心</div>
                <div class="stitle"><a href="#">我的点评</a></div>
                <div class="stitle"><a href="#">我的积分</a></div>
                <div class="stitle"><a href="#">我的订单</a></div>
            </div>
            <div class="about">
                <div class="title">关注我们</div>
                <div class="stitle"><a href="#">公司简介</a></div>
                <div class="stitle"><a href="#">公司资质</a></div>
                <div class="stitle"><a href="#">在线客服</a></div>
            </div>
            <div class="about1">
                <div class="up4">重庆满泽装饰设计有限公司</div>
                <div class="up5">TEL：023-6292-2838</div>
                <div class="down4">136-1823-7979/6832/6833/1789</div>
                <div class="down4">周一至周六9:00-20:00</div>
            </div>
        </div>
    </div>
    <div class="footer1">
        <div class="copy">Copyright @ 重庆满泽装饰设计有限公司 WWW.WWCAD.COM 版权所有并保留所有权利 ICP备案证书号：渝ICP备15012273号</div>
        <div class="bottom">
            <img src="{{asset('home/images/zfb_f.png')}}" width="128" height="47" alt="支付宝"/>
            <img src="{{asset('home/images/zxw_f.png')}}" width="128" height="47" alt="征信网"/>
            <img src="{{asset('home/images/zxwz_f.png')}}" width="128" height="47" alt="征信网站"/>
            <img src="{{asset('home/images/360_f.png')}}" width="128" height="47" alt="360网站"/>
        </div>
    </div>
</div>
</body>
</html>