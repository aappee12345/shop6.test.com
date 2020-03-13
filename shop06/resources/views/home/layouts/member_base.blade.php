<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>@yield('title')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="{{asset('home/css/reset.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('home/css/head.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('home/css/main.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('home/css/index_gs.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('home/css/member.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('home/css/foot.css')}}" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="{{asset('home/js/jquery-1.7.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('home/js/index.js')}}"></script>
    @yield('custom_css')
</head>
<body onload="load()">
<!--头部开始-->
<div id="wrap">
    <div class="header clear">
        <div class="head">
            <div class="welcome">满泽装饰效果图欢迎您！</div>
            @if (Session::get(\App\Http\Common\ConstConfig::getSessionKey()->WEB) == null)
                <div class="reg" id="register"><a href="javascript:void(0)">我要注册</a></div>
                <div class="reg" id="logs" style="width:40px;text-align:center;">
                    <a href="javascript:void(0)">登录</a>
                    <!--接口登录-->
                    <div onmouseover="showlogin()"  onmouseout="hidelogin()"><a href="/alipaylogin/alipayapi.php" id="zfblogin" style="width:115px;position:absolute;top:40px;left:0px;background:#fff;display:none;"><img style="float:left;" src="{{asset('home/images/zfb-login.png')}}"><span style="float:left;display:block;margin-top:-10px;">支付宝账号登录</span></a></div>
                    <div onmouseover="showlogin()"  onmouseout="hidelogin()"><a href="/alipaylogin/alipayapi.php" id="qqlogin" style="width:115px;position:absolute;top:63px;left:0px;background:#fff;display:none;"><img style="float:left;" src="{{asset('home/images/qq-login.png')}}"><span style="float:left;display:block;margin-top:-10px;">QQ账号登录</span></a></div>
                </div>
                <div class="log"><img src="{{asset('home/images/log.png')}}" onmouseover="showlogin()" onmouseout="hidelogin()"></div>
            @else
                <div class="reg"><a href="{{url('Home/member/index')}}">个人中心</a></div>
            @endif
            <div class="rmb"><img src="{{asset('home/images/rmb.png')}}"></div>
            <div class="reg"><a href="javascript:void(0)" onclick="scans();">扫码支付</a></div>
            <div class="rmb"><img src="{{asset('home/images/kehu.png')}}"></div>
            <div class="reg"><a href="javascript:void(0)" onclick="pin();">客户点评</a></div>
            <div class="pic_r">
                <img src="{{asset('home/images/save_s.png')}}" onmouseover="sjscanshow();" onmouseout="sjscanhide()">
                <div class="sjscan"><img src="{{asset('home/images/sjscan.png')}}"></div>
            </div>
            <div class="pic_r">
                <img src="{{asset('home/images/weixin_s.png')}}" onmouseover="wxscanshow();" onmouseout="wxscanhide()">
                <div class="wxscan"><img src="{{asset('home/images/wxscan.png')}}"></div>
            </div>
            <div class="pic_r">
                <img src="{{asset('home/images/zfb_s.png')}}" onmouseover="zfscanshow();" onmouseout="zfscanhide()">
                <div class="zfscan"><img src="{{asset('home/images/zfscan.png')}}"></div>
            </div>
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
                    <a href="#" target="_blank">客厅效果图</a> |
                    <a href="#" target="_blank">餐厅效果图</a> |
                    <a href="#" target="_blank">主卧效果图</a> |
                    <a href="#" target="_blank">大厅效果图</a> |
                    <a href="#" target="_blank">会议室效果图</a>
                </div>
            </div>
        </div>
        <div class="or">或者</div>
        <div class="ordol"><img src="{{asset('home/images/ordol.png')}}"></div>
        <div id="dbzf">
            <div class="up"><a href="#" target="_blank"><img src="{{asset('home/images/dbjyzf_s.png')}}"/></a></div>
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
                <a href="javascript:void(0)" class="fl">
                    作品案例分类
                    <img src="{{asset('home/images/alcate_head.png')}}">
                </a>
                <i class="sj"></i>
                <!--左侧商品分类-->
                <div class="map_con_wrap dn" id="topnav_con" style="display:none;">
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
                <li id="Menu1">
                    <a href="{{url('Home/index/index')}}" target="_blank">首 页</a>
                </li>
                <li id="Menu2">
                    <a href="{{url('Home/custom/index')}}" target="_blank">客户服务</a>
                </li>
                <li class="cur" id="Menu3">
                    <a href="{{url('Home/member/index')}}" target="_blank">会员中心</a>
                </li>
                <li id="Menu4">
                    <a href="{{url('Home/about/index')}}" target="_blank">关注我们</a>
                </li>
                <li id="Menu5">
                    <a href="{{url('Home/news/index')}}" target="_blank">新闻动态</a>
                </li>
            </ul>
        </div>
    </div>
    <!--分类导航-->
    <div class="clear">
    </div>
    <script type="text/javascript"></script>
    <div class="index-right-menu">
        <div id="logs" style="width:35px;height:76px;margin-left:40px;margin-top:44px;"><a href="#"><img class="zxddimg" src="{{asset('home/images/zxddw-off.png')}}" onmouseover="changezxdd()" onmouseout="changezxddfff()"></a></div>
        <div style="width:35px;height:76px;margin-left:40px;margin-top:34px;" id="smzfdiv">
            <a href="javascript:void(0)">
                <img class="smzfimg" src="{{asset('home/images/smzfw-off.png')}}" id="zxdd" onmouseover="changesmzf()" onmouseout="changesmzffff()">
                <img id="smzf-right" src="{{asset('home/images/smzfw-left.png')}}"/>
            </a>
        </div>
        <div style="width:35px;height:76px;margin-left:40px;margin-top:39px;" id="khdpdiv">
            <a href="user.php?act=order_list">
                <img  class="khdpimg" onmouseover="changekhdp()" onmouseout="changekhdpfff()" src="{{asset('home/images/khdpw-off.png')}}">
            </a>
        </div>
        <div style="width:35px;height:76px;margin-left:40px;margin-top:223px;">
            <a href="#" onmouseover="showgzh()" onmouseout="hidegzh()">
                <img id="gzh" src="{{asset('home/images/wxgzh_off.png')}}">
            </a>
        </div>
        <div id="gzhpic" style="width:35px;height:76px;position:absolute;left:-87px;top:455px;display:none;">
            <img style="border:1px solid #000;" src="{{asset('home/images/wxgzh.png')}}"/>
        </div>
        <div style="margin-top:-643px;margin-left:40px;">
            <a href="/">
                <img src="{{asset('home/images/right-logo.png')}}">
            </a>
        </div>
    </div>
    <div class="index-right-kfqq">
        <div style="width:35px;height:65px;" id="BizQQWPA"><img onmouseover="lxfs()" onmouseout="hidelxfs()" src="{{asset('home/images/qqw.png')}}"></div>
        <div style="width:35px;height:45px;"><a href="#"><img src="{{asset('home/images/topw.png')}}"></a></div>
        <div class="lxfss" style="margin-left:-158px;margin-top:-110px;display:none;"><img src="{{asset('home/images/yblxfs.png')}}"></div>
    </div>
    <!--头部结束-->
@yield('banner')
    <div class="servicetop clear">
        <div class="top"><img src="{{asset('home/images/position.png')}}" width="22" height="18"/></div>
        @yield('position')
    </div>
    <div class="member clear">
        <div class="left clear">
            <div class="li2" onclick="clicks('1')">账户管理</div>
            <a href="{{url('Home/member/info')}}" target="_self"><div class="li1 li11">账户信息</div></a>
            <a href="zhanghuchongzhi.html" target="_self"><div class="li1 li11">账户充值</div></a>
            <a href="shouzhimingxi.html" target="_self"><div class="li1 li11">收支明细</div></a>
            <a href="mycard.html" target="_self"><div class="li1 li11">我的银行卡</div></a>
            <a href="tixianshenqing.html" target="_self"><div class="li1 li11">提现申请</div></a>
            <a href="myjifen.html" target="_self"><div class="li1 li11">我的积分</div></a>
            <a href="sendjifen.html" target="_self"><div class="li1 li11">预存送积分</div></a>
            <div class="li2" onclick="clicks('2')">订单管理</div>
            <a href="mydingdan.html" target="_self"><div class="li1 li21">我的订单</div></a>
            <a href="mydianping.html" target="_self"><div class="li1 li21">我的点评</div></a>
            <a href="fapiaoshenqing.html" target="_self"><div class="li1 li21">发票申请</div></a>
            <div class="li2" onclick="clicks('3')">资料管理</div>
            <a href="jibenziliao.html" target="_self"><div class="li1 li31">基本资料</div></a>
            <a href="mimaguanli.html" target="_self"><div class="li1 li31">密码管理</div></a>
            <a href="zhanghaobangding.html" target="_self"><div class="li1 li31">账号绑定</div></a>
            <a href="xiaoxizhongxin.html" target="_self"><div class="li1 li31">消息中心</div></a>
            <div class="li2" onclick="clicks('4')">我的特权</div>
            <a href="myrecommend.html" target="_self"><div class="li1 li41">我的推荐</div></a>
            <a href="viptequan.html" target="_self"><div class="li1 li41">VIP特权</div></a>
            <a href="sviptequan.html" target="_self"><div class="li1 li41">SVIP特权</div></a>
            <a href="gongsiyuejie.html" target="_self"><div class="li1 li41">公司月结</div></a>
        </div>
@yield('content')
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
<div id="login" class="tach">
    <div id="login_in">
        <div class="title">用户登录</div>
        <form name="formLogin" action="{{url('Home/member/login')}}" method="post">
            <table>
                <tr height="50">
                    <td align="right">手机号码：</td>
                    <td id="logphone"><input class="input" type="text" name="username" id="logusername"/><strong style="color:red;"> * </strong><span style="color:#ccc;font-size:12px;">请输入正确的手机号，只能输入11位数字</span></td>
                </tr>
                <tr height="50">
                    <td align="right">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：</td>
                    <td id="logpass"><input class="input" type="password" name="password" id="logpassword"/><strong style="color:red;"> * </strong><span style="color:#ccc;font-size:12px;">密码不能为空，且在6-30个字符之间</span></td>
                </tr>
                <tr height="40">
                    <td></td>
                    <td><a href="user.php?act=qpassword_name">我忘记密码了，点击这里找回密码？</a></td>
                </tr>
                <tr height="50">
                    <td></td>
                    <td id="register">
                        <input type="hidden" name="act" value="act_login">
                        <input type="hidden" name="back_act" value="">
                        <input class="doLog" type="submit" value="立即登录"/>
                        <a class="toReg" href="javascript:void(0)">我要注册</a>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><span id="wrong" style="color:red;margin-left:70px;"></span></td>
                </tr>
            </table>
            @csrf
        </form>
        <div class="text">其他登錄方式</div>
        <div class="selLog">
            <a href="/qq_login.php"><img class="img" alt="" width="169" height="38" src="{{asset('home/images/qqLog.png')}}"></a>
            <a href="/alipaylogin/alipayapi.php"><img alt="" width="169" height="38" src="{{asset('home/images/zfbLog.png')}}"></a>
        </div>
        <div id="close"></div>
    </div>
</div>
<script></script>
<div id="regs" class="tach" >
    <div id="regs_in">
        <div class="title">新用户注册</div>
        <form name="formReg" id="formReg" action="{{url('Home/member/registor')}}" method="post">
            <table>
                <tr height="50">
                    <td align="right">手机号码：</td>
                    <td id="phone">
                        <input class="input" type="text" name="username" id="username" value="" />
                        <strong style="color:red;"> * </strong>
                        <span style="color:#ccc;">请输入正确的手机号，只能输入11位数字</span>
                    </td>
                </tr>
                <tr height="50">
                    <td align="right">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：</td>
                    <td id="pass"><input class="input" type="password" name="password" id="password" onkeyup="checkIntensity(this.value)"/><strong style="color:red;"> * </strong><span style="color:#ccc;">密码不能为空，且在6-30个字符之间</span></td>
                </tr>
                <tr height="10">
                    <td></td>
                    <td>
                        <table width="252" style="margin-top:0;">
                            <tr>
                                <td width="33%" style="border-right:4px solid #fff;border-bottom:4px solid #DADADA;" id="pwd_lower"></td>
                                <td width="33%" style="border-right:4px solid #fff;border-bottom:4px solid #DADADA;" id="pwd_middle"></td>
                                <td width="33%" style="border-bottom:4px solid #DADADA;" id="pwd_high"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr height="50">
                    <td align="right">姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：</td>
                    <td id="real"><input class="input" type="text" name="realname" id="realname" /><strong style="color:red;"> * </strong><span style="color:#ccc;">请输入全名，且在2-30个字符之间</span></td>
                </tr>
                <tr height="50">
                    <td align="right">QQ号码：</td>
                    <td id="q"><input class="input" type="text" name="qq" id="qq"/><strong style="color:red;"> * </strong><span style="color:#ccc;">请输入正确的QQ号码，以方便联系</span></td>
                </tr>
                <tr height="40">
                    <td></td>
                    <td id="logs"><span>已有会员账号？可以</span><a class="toLog" href="javascript:void(0)">直接登录!</a></td>
                </tr>
            </table>
            <div class="textReg">其他登錄方式</div>
            <div class="selLog">
                <a href="/qq_login.php"><img class="img" alt="" width="169" height="38" src="{{asset('home/images/qqLog.png')}}"></a>
                <a href="/alipaylogin/alipayapi.php"><img alt="" width="169" height="38" src="{{asset('home/images/zfbLog.png')}}"></a>
            </div>
            <div class="doReg">
                <input type="hidden" name="back_act" value=""/>
                <input type="hidden" name="act" value="act_register"/>
                <input type="hidden" name="regUserId" value=""/>
                <input type="submit" value="立即注册">
            </div>
            @csrf
            <div class="check"><input type="checkbox" checked name="agreement" value="1"/>本人已阅读、理解并同意本站的<a href="/article.php?id=36" target="_blank">《会员协议》</a></div>
        </form>
        <div id="regclose"></div>

    </div>
</div>
<script></script>
<div id="caseDetail" class="tach changeb caseDetail">
    <div id="caseDetail_in" class="changeb">
        <style type="text/css">
            li{
                list-style: none;
            }
            li img{
                display: block;
                margin: 0 auto;
            }
            .wrap{
                width:100%;
                margin:0;
                background: #fefefe;
            }
            .hiSlider{
                overflow: hidden;
                width: 100%;
                background: #eee;
            }
            .hiSlider-item{
                float: left;
            }
        </style>
        <div class="wrap changeb">
            <div class="hiSlider-wrap changeb" style="overflow: hidden; position: relative; width:100%;overflow:hidden">
                <ul class="hiSlider hiSlider1 changeb" style="padding-left:0px;width:100%;overflow:hidden;background-color:#ffffff">
                </ul>
                <span class="preva" onmouseover="prevshow()" onmouseout="prevhide()" onclick="prev()" style="display:block;width:450px;height:100%; position: absolute;z-index: 5;
    top: 0;left:0;"><div class="hiSlider-btn-prev">prev</div></span>
                <span class="nexta" onmouseover="nextshow()" onmouseout="nexthide()" onclick="next()" style="display:block;width:450px;height:100%; position: absolute;z-index: 5;
    top: 0;right:0;"><div class="hiSlider-btn-next">next</div></span>
            </div>
        </div>
        <div id="caseDown" style="position:absolute;width:922px;height:95px;display:none;">
            <div style="width:100%;height:38px;background:#f0f0f0;">
                <div class="tops t1">效果图ID：[J201502-0001]</div>
                <div class="tops t2">
                    <div class="bshare-custom">
                        <div class="bsPromo bsPromo1"></div>
                        <a title="分享到QQ空间" class="bshare-qzone"></a>
                        <a title="分享到新浪微博" class="bshare-sinaminiblog"></a>
                        <a title="分享到人人网" class="bshare-renren"></a>
                        <a title="分享到腾讯微博" class="bshare-qqmb"></a>
                        <a title="分享到网易微博" class="bshare-neteasemb"></a>
                        <a title="分享到微信" class="bshare-weixin" href="javascript:void(0);"></a>
                        <a title="分享到百度空间" class="bshare-baiduhi" href="javascript:void(0);"></a>
                        <a title="分享到开心网" class="bshare-kaixin001" href="javascript:void(0);"></a>
                        <a title="分享到新浪Qing" class="bshare-sinaqing" href="javascript:void(0);"></a>
                        <a title="分享到豆瓣" class="bshare-douban" href="javascript:void(0);"></a>
                        <a title="分享到QQ好友" class="bshare-qqim" href="javascript:void(0);"></a>
                        <a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a>
                        <span class="BSHARE_COUNT bshare-share-count" style="float: none;">46.1K</span>
                    </div>
                    <script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/button.js#style=-1&amp;uuid=&amp;pophcol=1&amp;lang=zh"></script>
                    <a class="bshareDiv" onclick="javascript:return false;"></a>
                    <script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script>
                </div>
                <div class="tops t3">
                    扫一扫下载原图
                </div>
                <div class="tops t4">
                    <img src="{{asset('home/images/ewm1.png')}}" width="37" height="38"/>
                </div>
            </div>
            <div style="width:100%;height:58px;background:#fff;">
                <div class="downs d1">
                    <a href="javascript:void(0);">
                        <img src="{{asset('home/images/download.png')}}" width="130" height="35"/>
                    </a>
                </div>
                <div class="downs d2">需要积分：<span>100</span>点（<a href="/article.php?id=37" target="_blank">如何获得积分?</a>）</div>
                <div class="downs d3">大小：<span>2.8</span>MB</div>
                <div class="downs d4">格式：<span>JPG</span></div>
                <div class="downs d5">下载次数：<span>10</span></div>
                <div class="downs d6"><span id="currentImg">1</span>/<span id="totalImg">628</span> Image</div>
            </div>
            <div id="ewmimg" style="position:absolute;top:0;right:0"><img src="{{asset('home/images/ewm.png')}}" width="96" height="96"/></div>
        </div>
        <div id="caseDetailClose"></div>
        <script>
            //初次点击下图后，减去相应积分
            function sub(sn,src)
            {
                $.ajax({
                    type: "get",
                    url: "goods.php?act=downloadImg&sn="+sn+"&src="+src,
                    dataType: "json",
                    success: function(msg){
                        var url = msg.url;
                        //跳转
                        window.location.href=url;
                    },
                });
            }
            function showgzh()
            {
                $("#gzh").attr('src','{{asset('home/images/wxgzh_on.png')}}');
                $("#gzhpic").show();
            }
            function hidegzh()
            {
                $("#gzh").attr('src',"{{asset('home/images/wxgzh_off.png')}}");
                $("#gzhpic").hide();
            }
            function regi()
            {
                //初始化
                var pageW = $(window).width();
                var pageH = $(window).height();
                var pW = document.body.clientWidth;
                var pH = document.body.clientHeight;
                /*让所有层消失*/
                $("#login").hide();
                $("#regs").hide();
                $("#orderOnline").hide();
                $("#orderConfirm").hide();
                $("#regs").show();
                $(".screen").show();
                var bleft = pageW/2-$("#regs").width()/2;
                //找到垂直居中的位置
                var btop = pageH/2-$("#regs").height()/2;
                $("#regs").css({"left":bleft,"top":btop});
                //设置遮罩层的大小
                $(".screen").css({'width':pW,"height":pH});
                //相册切换
                load();
            }
            function logi()
            {
                //初始化
                var pageW = $(window).width();
                var pageH = $(window).height();
                var pW = document.body.clientWidth;
                var pH = document.body.clientHeight;
                /*让所有层消失*/
                $("#login").hide();
                $("#regs").hide();
                $("#orderOnline").hide();
                $("#orderConfirm").hide();
                $("#login").show();
                $(".screen").show();
                var bleft = pageW/2-$("#login").width()/2;
                //找到垂直居中的位置
                var btop = pageH/2-$("#login").height()/2;
                $("#login").css({"left":bleft,"top":btop});
                //设置遮罩层的大小
                $(".screen").css({'width':pW,"height":pH});
                $("#wrong").text("用户名或密码不正确");
                //相册切换
                load();
            }
            function orderi(str)
            {
                var tz = '';
                if (str == 'pr') {tz = '请填写总价格';}
                if (str == 'wu') {tz = '请选择服务类型';}
                if (str == 'prgs') {tz = '总价格格式不正确';}
                if (str == 'nu') {tz = '请填写制图数量';}
                if (str == 'nugs') {tz = '制图数量格式不正确';}
                if (str == 'xm') {tz = '请填写项目名称';}
                if (str == 'ti') {tz = '请按格式填写对图时间';}
                if (str == 'xy') {tz = '请勾选同意协议';}
                $("#tishi").text(tz);
                zxddall();
                //相册切换
                load();
            }
            function zxddone(price,gname)
            {
                //初始化
                var pageW = $(window).width();
                var pageH = $(window).height();
                var pW = document.body.clientWidth;
                var pH = document.body.clientHeight;
                var reg = /\d+/g;
                var ms = price.match(reg);
                var min = ms[0];
                var max = ms[1];
                $("#ybg").val(min);
                if (min!=''&&max!='')
                {
                    $("#min").val(min);
                    $("#max").val(max);
                }
                var count = $("#sercate select option").length;

                for (var i=0;i<count;i++)
                {
                    if ($("#sercate select option").eq(i).text()==gname)
                    {
                        $("#sercate select option").eq(i).attr("selected","selected");
                    }
                }
                /*让所有层消失*/
                $("#login").hide();
                $("#regs").hide();
                $("#orderOnline").hide();
                $("#orderConfirm").hide();
                $("#orderOnline").show();
                $(".screen").show();
                var bleft = pageW/2-$("#orderOnline").width()/2;
                //找到垂直居中的位置
                var btop = pageH/2-$("#orderOnline").height()/2;
                $("#orderOnline").css({"left":bleft,"top":btop});
                //设置遮罩层的大小
                $(".screen").css({'width':pW,"height":pH,"background":'black',"opacity":'0',"filter":'alpha(opacity=0)'});
            }
            function zxddall()
            {
                //初始化
                var pageW = $(window).width();
                var pageH = $(window).height();
                var pW = document.body.clientWidth;
                var pH = document.body.clientHeight;
                /*让所有层消失*/
                $("#login").hide();
                $("#regs").hide();
                $("#orderOnline").hide();
                $("#orderConfirm").hide();
                $("#orderOnline").show();
                $(".screen").show();
                var bleft = pageW/2-$("#orderOnline").width()/2;
                //找到垂直居中的位置
                var btop = pageH/2-$("#orderOnline").height()/2;
                $("#orderOnline").css({"left":bleft,"top":btop});
                //设置遮罩层的大小
                $(".screen").css({'width':pW,"height":pH,"background":'black',"opacity":'0',"filter":'alpha(opacity=0)'});
            }
            function scans()
            {
                var pageW = $(window).width();
                var pageH = $(window).height();
                var pW = document.body.clientWidth;
                var pH = document.body.clientHeight;
                /*让所有层消失*/
                $("#login").hide();
                $("#regs").hide();
                $("#orderOnline").hide();
                $("#orderConfirm").hide();
                $("#regs").hide();
                $("#selup").hide();
                $("#orderol_up").hide();
                $("#scansOnline").show();
                $(".screen").show();
                //取消默认行为
                var bleft = pageW/2-$("#scansOnline").width()/2;
                //找到垂直居中的位置
                var btop = pageH/2-$("#scansOnline").height()/2;
                $("#scansOnline").css({"left":bleft,"top":btop});
                //设置遮罩层的大小
                $(".screen").css({'width':pW,"height":pH});
            }
        </script>
    </div>
</div>
<div class="screen"></div>
<script></script>
<div id="orderOnline" class="tach">
    <div id="orderOnline_in">
        <div class="title">在线订单 <img src="{{asset('home/images/li0.png')}}"/> <span>已经洽谈好订单相关事宜，可以直接在此下单，即可担保交易</span></div>
        <form name="formOrderOnline"id ="the"  action="flow.php" method="post" onsubmit="checkSubmit()">
            <table>
                <tr height="50">
                    <td align="right">服务项目：</td>
                    <td class="error_o" id="sercate" style="position:relative;" size="1">
                        <select name="ser_cate" onchange="changecate()">
                            <option data-price="500" value="23">家装效果图</option>
                            <option data-price="600" value="24">工装效果图</option>
                            <option data-price="1200" value="25">360全景图</option>
                            <option data-price="800" value="27">室外表现图</option>
                            <option data-price="1200" value="26">方案深化图</option>
                        </select>
                        <span class="error_o">请选择需要做的服务类型</span>
                    </td>
                </tr>
                <tr height="50">
                    <td align="right" class="on">总价格：</td>
                    <td class="error_o" style="position:relative;"><input class="input" onblur="prichange()" id="ybg" type="text" name="price" value="500" style="color:#e9101b;"/><span class="error_o on">(元)请输入洽谈好的制作费总价格</span>
                        <img onclick="priup()" style="position:absolute;left:254px;top:7px;" src="{{asset('home/images/numberup.png')}}"/>
                        <img onclick="pridown()" style="position:absolute;left:254px;top:26px;" src="{{asset('home/images/numberdown.png')}}"/>
                    </td>
                </tr>
                <tr height="50">
                    <td align="right">制图数量：</td>
                    <td class="error_o" style="position:relative;"><input class="input" id="zbg" type="text" name="number" value="1"/><span class="error_o">(张)请输入洽谈好的制图总数量</span>
                        <img onclick="numup()" style="position:absolute;left:254px;top:7px;" src="{{asset('home/images/numberup.png')}}"/>
                        <img onclick="numdown()" style="position:absolute;left:254px;top:26px;" src="{{asset('home/images/numberdown.png')}}"/>
                    </td>
                </tr>
                <script>
                    function prichange() {
                        var ybg = $("#ybg").val();
                        var min = $("#min").val();
                        var max = $("#max").val()?$("#max").val():'-1';
                        if (parseInt(ybg)<=0) {
                            ybg=0;
                            $("#ybg").val(ybg);
                        }
                        if (max!=0) {
                            if (parseInt(ybg)>=parseInt(max)) {
                                $("#ybg").val(ybg);
                            }
                        }
                    }
                    function priup() {
                        var ybg = $("#ybg").val();
                        var min = $("#min").val();
                        var max = $("#max").val()?$("#max").val():'0';
                        ybg = parseInt(ybg)+parseInt(50);
                        if (max!=0) {
                            if (ybg>=max) {
                                //ybg=max;
                            }
                        }
                        $("#ybg").val(ybg);
                    }
                    function pridown() {
                        var ybg = $("#ybg").val();
                        ybg = parseInt(ybg)-parseInt(50);
                        var min = $("#min").val();
                        var max = $("#max").val();
                        if (ybg<=0) {
                            ybg=0;
                        }
                        $("#ybg").val(ybg);
                    }
                    function numup() {
                        var zbg = $("#zbg").val();
                        zbg = parseInt(zbg)+parseInt(1);
                        $("#zbg").val(zbg);
                    }
                    function numdown() {
                        var zbg = $("#zbg").val();
                        zbg = parseInt(zbg)-parseInt(1);
                        if (zbg<=1) {
                            zbg=1;
                        }
                        $("#zbg").val(zbg);
                    }
                </script>
                <style>
                    #probg{width:270px;}
                    .seldtsj{position:absolute;left:375px;top:300px;background:#f9f9f9;width:210px;height:auto;border:1px solid #f5d2ba;display:none;z-index:100000;}
                    .selym{width:210px;height:24px;padding-top:3px;overflow:hidden;}
                    .selym>.prev{float:left;width:30px;text-align:center;height:22px;line-height:22px;}
                    .selym>.year{float:left;width:70px;text-align:center;height:18px;font-size:9px;line-heigth:18px;color:#000;background:#fff;}
                    .selym>.month{float:left;margin-left:10px;width:70px;text-align:center;height:18px;color:#000;font-size:9px;line-heigth:18px;background:#fff;}
                    .selym>.next{float:right;width:30px;text-align:center;height:22px;line-height:22px;}
                    .selweek{height:26px;}
                    .selweek .ds{float:left;width:30px;height:26px;line-height:26px;text-align:center;}
                    .seldate{width:auto;height:auto;}
                    .seldate .co{width:29px;height:25px;line-height:26px;float:left;text-align:center;cursor:pointer;border-right:1px solid #f0f0f0;border-bottom:1px solid #f0f0f0;}
                </style>
                <tr height="50">
                    <td align="right">项目名称：</td>
                    <td class="error_o"><input class="input" id="probg" type="text" name="proname" /><span class="error_o">请输入所需制图的项目名称</span></td>
                </tr>
                <tr height="95">
                    <td align="right">订单说明：</td>
                    <td class="error_o"><textarea class="detail" style="width:272px;" name="detail" cols="37" rows="4" placeholder="(选填)"></textarea><span class="error_o">请简单备注下您的制图需求</span></td>
                </tr>
                <tr height="50">
                    <td align="right">对图时间：</td>
                    <td class="error_o">
                        <input id="inputtime" class="seldtsj1" onclick="showorhide()" onfocus="this.blur()" style="width:272px;height:37px;border:1px solid #bfbfbf;background: url({{asset('home/images/date.png')}}) no-repeat right #fff;" value="" type="text" name="confirm_time" autocomplete="off"/>
                        <script>
                            //获取当前日期
                            var d = new Date();
                            var thisyear = d.getFullYear();
                            var thismonth = d.getMonth()+1;
                            var thisday = d.getDate()+2;
                            if (thismonth<10)
                            {
                                thismonth = "0"+thismonth;
                            }
                            if (thisday<10)
                            {
                                thisday = "0"+thisday;
                            }
                            var dates = thisyear+'-'+thismonth+'-'+thisday;
                            $("#inputtime").val(dates);
                        </script>
                        <div class="seldtsj">
                            <div class="selym" onclick="showselt()">
                                <div class="prev" id="prevmonth">«</div>
                                <div class="year" id="currentyear">2017</div>
                                <div class="month" id="currentmonth">1</div>
                                <div class="next" id="nextmonth">»</div>
                            </div>
                            <div class="selweek" onclick="showselt()">
                                <div class="ds">日</div>
                                <div class="ds">一</div>
                                <div class="ds">二</div>
                                <div class="ds">三</div>
                                <div class="ds">四</div>
                                <div class="ds">五</div>
                                <div class="ds">六</div>
                            </div>
                            <div class="seldate" onclick="hideparent()">
                                <div class="li clear">
                                    <div class="co"></div>
                                    <div class="co">1</div>
                                    <div class="co">2</div>
                                    <div class="co">3</div>
                                    <div class="co">4</div>
                                    <div class="co">5</div>
                                    <div class="co">6</div>
                                    <div class="co">7</div>
                                    <div class="co">8</div>
                                    <div class="co">9</div>
                                    <div class="co">10</div>
                                    <div class="co">11</div>
                                    <div class="co">12</div>
                                    <div class="co">13</div>
                                    <div class="co">14</div>
                                    <div class="co">15</div>
                                    <div class="co">16</div>
                                    <div class="co">17</div>
                                    <div class="co">18</div>
                                    <div class="co">19</div>
                                    <div class="co">20</div>
                                    <div class="co">21</div>
                                    <div class="co">22</div>
                                    <div class="co">23</div>
                                    <div class="co">24</div>
                                    <div class="co">25</div>
                                    <div class="co">26</div>
                                    <div class="co">27</div>
                                    <div class="co">28</div>
                                    <div class="co">29</div>
                                    <div class="co">30</div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr height="30">
                    <td> </td>
                    <td><img src="{{asset('home/images/tishi.png')}}" id="tsimg" style="display:none;"/> <span id="tishi" style="color:red;display:block;margin-top:-19px;margin-left:20px;"></span></td>
                </tr>
            </table>
            <div class="doDone">
                <input type="hidden" name="back_act" value=""/>
                <input type="hidden" name="step" value="over_done"/>
                <input type="hidden" id="min" value="400"/>
                <input type="hidden" id="max" value=""/>
                <input type="submit" id="submit" value="提交订单">
            </div>
            <div class="check"><input type="checkbox" checked name="agreement" value="1"/>本人已阅读、理解并同意本站的<a href="/article.php?id=36" target="_blank">《会员协议》</a></div>
        </form>
        <script>
            function showselt()
            {
                $(".seldtsj").show();
            }
            function hideselt()
            {
                $(".seldtsj").hide();
            }
            function hideparent()
            {
                $(".seldtsj").hide();
            }
            var flag = false;
            function checkSubmit(){
                if (flag == true)
                {
                    e.preventDefault();
                }
                alert(1);
                flag = true;
            }
        </script>

        <script src="{{asset('home/js/wnl.js')}}"></script>
        <script>
            function coover(e)
            {
                $(".co").css({"background":"#fff","color":"#333"});
                $(e).css({"background":"#ff9900","color":"#fff"});
            }
        </script>
        <div id="orderOnlineClose"></div>
    </div>
</div>
<script></script>
<div id="scansOnline" class="tach">
    <div id="scansOnline_in">
        <img src="{{asset('home/images/scans.png')}}"/>
        <div id="scansClose"></div>
    </div>
</div>
<div id="orderConfirm" class="tach">
    <div id="orderConfirm_in">
        <div class="title">确认订单</div>
        <div class="table clear">
            <div class="td td1">手机号码</div>
            <div class="td td2">服务项目</div>
            <div class="td td3">总价格</div>
            <div class="td td4">制图数量</div>
            <div class="td td5">对图时间</div>
            <div class="td td6">下单时间</div>
        </div>
        <div class="table1 clear">
            <div class="td td1" id="user_name"></div>
            <div class="td td2" id="cat_name"></div>
            <div class="td td3" id="goods_amount">元</div>
            <div class="td td4" id="goods_number">张</div>
            <div class="td td5" id="duitu_time"></div>
            <div class="td td6" id="add_time"></div>
        </div>
        <div class="table">
            <div class="td td1">订单编号</div>
            <div class="td td7">项目名称</div>
            <div class="td td8">订单说明</div>
        </div>
        <div class="table1">
            <div class="td td1" id="order_sn"></div>
            <div class="td td7" id="proname"></div>
            <div class="td td8" id="detail"></div>
        </div>
        <div class="select clear">
            <div class="sels1s on" id="sels1s1" onclick="showCont('1')">在线支付</div>
            <div class="sels1s" id="sels1s4" onclick="showCont('4')">信用额度支付</div>
            <div class="sels1s" id="sels1s2" onclick="showCont('2')">账户余额支付</div>
            <div class="sels1s" id="sels1s3" onclick="showCont('3')">扫码线下支付</div>
        </div>
        <form name="formOrderConfirmZx" method="post" onsubmit="return doitzx()">
            <div class="cont" id="cont1">
                <div class="zfb clear">
                    <input style="display:block;float:left;margin-left:10px;margin-right:5px;" type="radio" checked name="zx_type" value="/wxpay/example/wxpayapi"/>
                    <img style="display:block;float:left;" src="{{asset('home/images/qrdd_wx.png')}}" width="142" height="31" alt=""/>
                    <input style="display:block;float:left;margin-left:10px;margin-right:5px;" type="radio" name="zx_type" value="/zfpay/alipayapi"/>
                    <img style="display:block;float:left;" src="{{asset('home/images/qrdd_zfb.png')}}" width="142" height="31" alt=""/>
                </div>
                <div class="checkup">
                    <input type="checkbox" disabled=true id="zx_check" name="bx_check" value="1"/>
                    <div class="text">
                        <span>成品图修改险：甲方(业主)对成品图的意见，可修改到满意为止</span>
                        <img src="{{asset('home/images/mess_img.png')}}" title="含因方案变化导致的效果图重做"/>
                        <a href="article.php?id=40" target="_blank">[?]</a>
                        <span class="price" id="zx_safe">¥0.00</span>
                    </div>
                </div>
                <div class="checkdown">
                    <input type="checkbox" disabled id="zx_jf_check" name="jf_check" value="1" />
                    <div class="text">
                        <span>使用积分：</span>
                        <input class="jf" type="text" name="price" id="zxprice" value=""/>
                        <span>点</span>
                        <span class="sprice" id="zxsprice">¥0.00</span>
                        <div class="t">
                            <span class="tex">实付款：</span>
                            <span class="bprice" id="zxshifu">¥1</span>
                        </div>
                    </div>
                </div>
                <div class="sm">
                    <div class="l tex">(可用<span id="zxky"></span>点)</div>
                    <div class="r" id="zxjifen"><span class="tex">点评后可获得积分：</span><span id="zxjf">1</span>点</div>
                </div>
                <div class="an">
                    <input type="submit" value="担保交易支付"/>
                </div>
                <div class="check">
                    <input type="checkbox" checked name="agreement" value="1"/>
                    本人已阅读、理解并同意本站的<a href="/article.php?id=38" target="_blank">《担保支付服务协议》</a>
                    <a href="/article.php?id=39" target="_blank">《满泽装饰制图服务合同》</a>
                    <input type="hidden" name="step" value="over_confirm"/>
                    <input type="hidden" id="zxjf_end" name="zxjf" value=""/>
                    <input type="hidden" name="zxjifen" id="zxjifeni" value=""/>
                    <input type="hidden" name="order_sn" id="zxsni" value=""/>
                    <input type="hidden" name="pronamewx" id="xmmc" value=""/>
                </div>
            </div>
        </form>
        <form name="formOrderConfirm" action="flow.php" method="post">
            <div class="cont" id="cont2">
                <div class="zfb">
                    <div class="ye">
                        <img src="{{asset('home/images/yezf_notice.png')}}" width="26" height="26" alt=""/>
                        <span class="b">账户余额：<b class="b" id="b">元.</b></span>
                        <b class="r" id="yuebuzu">账户余额不足</b>
                        <b class="b" id="jianyi">，建议你选择在线支付方式，或</b>
                        <a href="user.php?act=account_log" class="r" id="cz"><b>立即充值</b></a>

                    </div>
                    <div class="notice">
                        <span class="g">【重要提示】充值成功后，</span>
                        <span class="r">系统不会自动结算该订单</span>
                        <span class="g">。请您登陆会员中心，对未付款订单进行结算。</span>
                    </div>
                </div>
                <div class="checkup">
                    <input type="checkbox" disabled=true id="ye_check" name="bx_check" value="1"/>
                    <div class="text">
                        <span>成品图修改险：甲方(业主)对成品图的意见，可修改到满意为止</span>
                        <img src="{{asset('home/images/mess_img.png')}}" title="含因方案变化导致的效果图重做"/>
                        <a href="article.php?id=40" target="_blank">[?]</a>
                        <span class="price" id="ye_safe">¥0.00</span>
                    </div>
                </div>
                <div class="checkdown">
                    <input type="checkbox" id="ye_jf_check" disabled name="jf_check" value="1"/>
                    <div class="text">
                        <span>使用积分：</span>
                        <input class="jf" type="text" name="price" id="yeprice" value=""/>
                        <span>点</span>
                        <span class="sprice" id="yesprice">¥0.00</span>
                        <div class="t">
                            <span class="tex">实付款：</span>
                            <span class="bprice" id="yeshifu">¥</span>
                        </div>
                    </div>
                </div>
                <div class="sm">
                    <div class="l tex">(可用<span id="yeky"></span>点)</div>
                    <div class="r" id="yejifen"><span class="tex">点评后可获得积分：</span><span id="yejf">1</span>点</div>
                </div>
                <div class="an">
                    <input type="submit" class="" value="账户余额支付"/>

                </div>
                <div class="check">
                    <input type="checkbox" checked name="agreement" value="1"/>本人已阅读、理解并签署本站的
                    <a href="/article.php?id=39" target="_blank">《满泽装饰制图服务合同》</a>
                    <input type="hidden" name="step" value="over_confirm"/>
                    <input type="hidden" id="yejf_end" name="yejf" value=""/>
                    <input type="hidden" name="yejifen" id="yejifeni" value="1"/>
                    <input type="hidden" name="order_sn" id="yesni" value=""/>
                </div>
            </div>
        </form>
        <form name="formOrderConfirm" action="flow.php" method="post">
            <div class="cont clear" id="cont3">
                <div class="left">
                    <div class="scan clear">
                        <img src="{{asset('home/images/yezf_notice.png')}}" width="26" height="26" alt=""/>
                        <span>请扫描右边的支付宝或者微信二维码，输入以下金额直接付款。</span>
                    </div>
                    <div class="zf">
                        <span class="b" style="font-size:14px;">或者</span>
                        <a class="r" href="/article.php?id=49" target="_blank"><b>银行转账</b></a>
                        <span class="b" style="font-size:14px;">支付成功后，请联系客服人员告知转账人姓名后台确定。</span>
                    </div>
                    <div class="checkup">
                        <input type="checkbox" disabled=true id="sm_check" name="bx_check" value="1"/>
                        <div class="text">
                            <span>成品图修改险：甲方(业主)对成品图的意见，可修改到满意为止</span>
                            <img src="{{asset('home/images/mess_img.png')}}" title="含因方案变化导致的效果图重做"/>
                            <a href="article.php?id=40" target="_blank">[?]</a>
                            <span class="price" id="sm_safe">¥0.00</span>
                        </div>
                    </div>
                    <div class="checkdown">
                        <input type="checkbox" id="sm_jf_check" disabled name="jf_check" value="1"/>
                        <div class="text">
                            <span>使用积分：</span>
                            <input class="jf" type="text" name="price" id="smprice" value=""/>
                            <span>点</span>
                            <span class="sprice" id="smsprice">¥0.00</span>
                            <div class="t">
                                <span class="tex">实付款：</span>
                                <span class="bprice" id="smshifu">¥</span>
                            </div>
                        </div>
                    </div>
                    <div class="sm">
                        <div class="l tex">(可用<span id="smky"></span>点)</div>
                        <div class="r" id="smjifen"><span class="tex">点评后可获得积分：</span><span id="smjf">1</span>点</div>
                    </div>
                    <div class="an">
                        <input type="button" id="un" class="un" value="扫码支付成功"/>
                    </div>
                    <div class="check">
                        <input type="checkbox" checked name="agreement" value="1"/>本人已阅读、理解并签署本站的
                        <a href="/article.php?id=39" target="_blank">《满泽装饰制图服务合同》</a>
                        <input type="hidden" name="step" value="over_confirm"/>
                        <input type="hidden" id="smjf_end" name="smjf" value=""/>
                        <input type="hidden" name="smjifen" id="smjifeni" value=""/>
                        <input type="hidden" name="order_sn" id="smsni" value=""/>
                    </div>
                </div>
                <div class="right">
                    <div class="zfbs">
                        <img src="{{asset('home/images/zfb_scan.png')}}"/>
                    </div>
                    <div class="wxs">
                        <img src="{{asset('home/images/weixin_scan.png')}}"/>
                    </div>
                </div>
            </div>
        </form>
        <form name="formOrderConfirm" action="flow.php" method="post">
            <div class="cont" id="cont4">
                <div class="zfb xyzfb" id="xyzfb11" style="display:none">
                    <div class="ye">
                        <img src="{{asset('home/images/yezf_notice.png')}}" width="26" height="26" alt=""/>
                        <span class="b">尊敬的VIP老客户，欢迎使用您的信用额度支付，您的信用额度为：<a href="javascript:void(0)" class="r" style="text-decoration:none;">¥<b></b></a></span>
                    </div>
                    <div class="notice" style="color:#000;">
                        <span class="g" style="color:#000;">该支付方式仅限于每次制作一张效果图使用，超出数量或者限额，请使用</span><b>在线支付</b><span class="g">功能</span>
                    </div>
                </div>
                <div class="zfb xyzfb" id="xyzfb12" style="display:block">
                    <div class="ye">
                        <img src="{{asset('home/images/yezf_notice.png')}}" width="26" height="26" alt=""/>
                        <span class="b">请登录会员中心完善<a href="user.php?act=profile" class="r"><b>基本资料</b></a></span>
                    </div>
                    <div class="notice">
                        <span class="g">该支付方式只支持VIP老客户使用，新客户前期合作时间范围内无法使用该支付功能。</span>
                    </div>
                </div>
                <div class="zfb xyzfb" id="xyzfb13" style="display:none;">
                    <div class="ye">
                        <img src="{{asset('home/images/yezf_notice.png')}}" width="26" height="26" alt=""/>
                        <span class="b">尊敬的VIP老客户，欢迎使用您的信用额度支付，请<a href="user.php?act=order_list&ordertype=0" class="r" target="_blank"><b>立即结款</b></a>上一张订单后再使用</span>
                    </div>
                    <div class="notice">
                        <span class="g">该支付方式只支持VIP老客户使用，新客户前期合作时间范围内无法使用该支付功能。</span>
                    </div>
                </div>
                <div class="checkup">
                    <input type="checkbox" disabled="true" name="bx_check" value="1"/>
                    <div class="text">
                        <span>成品图修改险：甲方(业主)对成品图的意见，可修改到满意为止</span>
                        <img src="{{asset('home/images/mess_img.png')}}" title="含因方案变化导致的效果图重做"/>
                        <a href="/article.php?id=39" target="_blank">[?]</a>
                        <span class="price" id="xy_safe">¥0.00</span>
                    </div>
                </div>
                <div class="checkdown">
                    <input type="checkbox" disabled="true" name="bx_check" value="1"/>
                    <div class="text">
                        <span>使用积分：</span>
                        <input class="jf" disabled="true" type="text" name="price" value=""/>
                        <span>点</span>
                        <span class="sprice">¥0.00</span>
                        <div class="t">
                            <span class="tex">实付款：</span>
                            <span class="bprice" id="xyshifu">¥</span>
                        </div>
                    </div>
                </div>
                <div class="sm">
                    <div class="l tex" style="width:312px;text-indent:136px;">(信用额度支付方式无法使用积分)</div>
                    <div class="r" id="xyjifen" style="width:244px;margin-left:17px;"><span style="color:#666;">点评后可获得积分：</span>1点</div>
                </div>
                <div class="an1">
                    <input type="submit" id="un" class="" value="提交订单"/>
                </div>
                <div class="check">
                    <input type="checkbox" checked name="agreement" value="1"/>本人已阅读、理解并签署本站的
                    <a href="/article.php?id=39" target="_blank">《满泽装饰制图服务合同》</a>
                    <input type="hidden" name="xyjifen" id="xyjifeni" value=""/>
                    <input type="hidden" name="order_sn" id="xysni" value=""/>
                    <input type="hidden" name="number" id="number" value=""/>
                    <input type="hidden" name="credit_line" id="credit_line" value=""/>
                    <input type="hidden" name="step" value="over_confirm"/>
                </div>
            </div>
        </form>
        <a href="index.php" target="_self"><div id="orderConfirmClose"></div></a>
    </div>
</div>

<div id="orderConfirm1" class="tach" style="display:none;" >
    <div id="orderConfirm1_in">
        <div class="title">立即结款</div>
        <div class="table clear">
            <div class="td td1">手机号码</div>
            <div class="td td2">服务项目</div>
            <div class="td td3">总价格</div>
            <div class="td td4">制图数量</div>
            <div class="td td5">对图时间</div>
            <div class="td td6">下单时间</div>
        </div>
        <div class="table1 clear">
            <div class="td td1" id="suser_name"></div>
            <div class="td td2" id="scat_name"></div>
            <div class="td td3" id="sgoods_amount">元</div>
            <div class="td td4" id="sgoods_number">张</div>
            <div class="td td5" id="sduitu_time"></div>
            <div class="td td6" id="sadd_time"></div>
        </div>
        <div class="table">
            <div class="td td1">订单编号</div>
            <div class="td td7">项目名称</div>
            <div class="td td8">订单说明</div>
        </div>
        <div class="table1">
            <div class="td td1" id="sorder_sn"></div>
            <div class="td td7" id="sproname"></div>
            <div class="td td8" id="sdetail"></div>
        </div>
        <div class="select clear">
            <div class="sels1s1 on" id="sels1s11" onclick="showCont1('1')">在线支付</div>
            <div class="sels1s1" id="sels1s13" onclick="showCont1('3')">扫码线下支付</div>
            <div class="sels1s1" id="sels1s13" style="background:#fff;border-bottom:1px solid #e9101b"></div>
            <div class="sels1s1" id="sels1s14" style="background:#fff;border-bottom:1px solid #e9101b"></div>
        </div>
        <form name="formOrderConfirmWx" method="post" onsubmit="return doit()">
            <div class="cont1" id="cont11">
                <div class="zfb clear">
                    <input style="display:block;float:left;margin-left:10px;margin-right:5px;" type="radio" checked name="wx_type" value="/wxpay/example/wxpayapi"/>
                    <img style="display:block;float:left;" src="{{asset('home/images/qrdd_wx.png')}}" width="142" height="31" alt=""/>
                    <input style="display:block;float:left;margin-left:10px;margin-right:5px;" type="radio" name="wx_type" value="/zfpay/alipayapi"/>
                    <img style="display:block;float:left;" src="{{asset('home/images/qrdd_zfb.png')}}" width="142" height="31" alt=""/>
                </div>
                <div class="checkdown">
                    <div class="text">
                        <div class="t" style="margin-top:30px;margin-left:-20px;">
                            <span class="tex">实付款：</span>
                            <span class="bprice" id="szxshifu">¥0.00</span>
                        </div>
                    </div>
                </div>
                <div class="sm" style="margin-top:40px;margin-left:5px;border-bottom:0;">
                    <div class="l" id="szxjifen"><span class="tex">点评后可获得积分：</span><span id="szxjf">0</span>点</div>
                </div>
                <div class="an">
                    <input type="submit" readonly=true value="立即支付"/>
                </div>
                <div class="check">
                    <input type="hidden" name="step" value="over_confirm"/>
                    <input type="hidden" id="szxjf_end" name="zxjf" value=""/>
                    <input type="hidden" name="zxjifen" id="szxjifeni" value=""/>
                    <input type="hidden" name="order_sn" id="szxsni" value=""/>
                    <input type="hidden" name="pronamewx" id="sxmmc" value=""/>
                    <input type="hidden" name="is_xy" value="1"/>
                </div>
            </div>
        </form>
        <form name="formOrderConfirm" action="flow.php" method="post">
            <div class="cont1 clear" id="cont13">
                <div class="left">
                    <div class="scan clear">
                        <img src="{{asset('home/images/yezf_notice.png')}}" width="26" height="26" alt=""/>
                        <span>请扫描右边的支付宝或者微信二维码，输入以下金额直接付款。</span>
                    </div>
                    <div class="zf">
                        <span class="b" style="font-size:14px;">或者</span>
                        <a class="r" href="/article.php?id=49" target="_blank"><b>银行转账</b></a>
                        <span class="b" style="font-size:14px;">支付成功后，请联系客服人员告知转账人姓名后台确定。</span>
                    </div>
                    <div class="checkdown">
                        <div class="text">
                            <div class="t" style="margin-top:30px;margin-left:-20px;">
                                <span class="tex">实付款：</span>
                                <span class="bprice" id="ssmshifu">¥0.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="sm" style="margin-top:40px;margin-left:-20px;border-bottom:0;">
                        <div class="l" id="ssmjifen" style="text-indent:50px;"><span class="tex">点评后可获得积分：</span><span id="ssmjf">1</span>点</div>
                    </div>
                    <div class="an">
                        <input type="button" id="un" class="un" value="扫码支付成功"/>
                    </div>
                    <div class="check">
                        <input type="hidden" name="step" value="over_confirm"/>
                        <input type="hidden" id="ssmjf_end" name="smjf" value=""/>
                        <input type="hidden" name="smjifen" id="ssmjifeni" value=""/>
                        <input type="hidden" name="order_sn" id="ssmsni" value=""/>
                        <input type="hidden" name="is_xy" value="1"/>
                    </div>
                </div>
                <div class="right">
                    <div class="zfbs">
                        <img src="{{asset('home/images/zfb_scan.png')}}"/>
                    </div>
                    <div class="wxs">
                        <img src="{{asset('home/images/weixin_scan.png')}}"/>
                    </div>
                </div>
            </div>
        </form>
        <a href="user.php?act=order_list&ordertype=-1" target="_self"><div id="orderConfirm1Close"></div></a>
    </div>
</div>
<script>
    //验证提交
    var fm = document.forms['formReg'];
    fm.onsubmit = function(evt){
        //让所有的表单元素触发验证
        for(var i=0;i<fm.elements.length;i++){
            fm.elements[i].focus();
            fm.elements[i].blur();
        }
        //判断fm下所有的span当中是否包含class为error
        if ($("#phone").attr("class")=='error'||$("#qq").attr("class")=='error'||$("#real").attr("class")=='error'||$("#pass").attr("class")=='error')
        {
            //阻止默认行为
            var e = evt || window.event;
            typeof e.preventDefault=='undefined'?e.returnValue=false:e.preventDefault();
            return;
        }
    }

        function clicks(id) {
            $(".li1").hide();
            $(".li"+id+"1").show();
        }
        function shows() {
            $(".mmi img.sm1").attr("src","images/sm2.png");
            $(".mmi img.sm3").show();
        }
        function hides() {
            $(".mmi img.sm1").attr("src","images/sm1.png");
            $(".mmi img.sm3").hide();
        }
    </script>
<script type="text/javascript" src="{{asset('home/js/common.js')}}"></script>
<script charset="utf-8" type="text/javascript" src="http://wpa.b.qq.com/cgi/wpa.php?key=XzgwMDAyMjE3OF80MzA2MTZfODAwMDIyMTc4Xw"></script>
<script charset="utf-8" type="text/javascript" src="http://wpa.b.qq.com/cgi/wpa.php?key=XzgwMDAyMjE3OF80MzIxNjhfODAwMDIyMTc4Xw"></script>
@yield('custom_script')
</body>
</html>