@extends('home.layouts.base')
@section('title')
首页
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
    <!--首页服务项目-->
    <div class="service">
        <div class="catename1">
            <div class="catetitle">
                <img src="{{asset('home/images/service_t.png')}}" width="315" height="55" alt="服务项目"/>

                <div class="text1">
                    <div class="up1">我们的服务项目</div>
                    <div class="down1">Our service project</div>
                </div>
            </div>
            <div class="more"><a href="service.html" target="_blank"><img src="{{asset('home/images/more_s.png')}}" width="93" height="55" alt="more"/></a></div>
        </div>
        <div class="catelists">
            <div class="catelist1">
                <div class="pic"><a href="#" target="_blank"><img src="{{asset('home/images/service_s.png')}}" width="265" height="270" alt=""></a></div>
                <div class="price">400-800元/张</div>
                <div class="bottom">
                    <div class="left">
                        <div class="title"><a href="#" target="_blank">家装效果图</a></div>
                        <div class="times">成交：88次</div>
                    </div>
                    <a class="right" href="#"><div>立即下单</div></a>
                </div>
            </div>
            <div class="catelist2">
                <div class="pic"><a href="#" target="_blank"><img src="{{asset('home/images/service_s.png')}}" width="265" height="270" alt=""></a></div>
                <div class="price">400-800元/张</div>
                <div class="bottom">
                    <div class="left">
                        <div class="title"><a href="#" target="_blank">家装效果图</a></div>
                        <div class="times">成交：88次</div>
                    </div>
                    <a class="right" href="#"><div>立即下单</div></a>
                </div>
            </div>
            <div class="catelist2">
                <div class="pic"><a href="#" target="_blank"><img src="{{asset('home/images/service_s.png')}}" width="265" height="270" alt=""></a></div>
                <div class="price">400-800元/张</div>
                <div class="bottom">
                    <div class="left">
                        <div class="title"><a href="#" target="_blank">家装效果图</a></div>
                        <div class="times">成交：88次</div>
                    </div>
                    <a class="right" href="#"><div>立即下单</div></a>
                </div>
            </div>
            <div class="catelist2">
                <div class="pic"><a href="#" target="_blank"><img src="{{asset('home/images/service_s.png')}}" width="265" height="270" alt=""></a></div>
                <div class="price">400-800元/张</div>
                <div class="bottom">
                    <div class="left">
                        <div class="title"><a href="#" target="_blank">家装效果图</a></div>
                        <div class="times">成交：88次</div>
                    </div>
                    <a class="right" href="#"><div>立即下单</div></a>
                </div>
            </div>
        </div>
    </div>
    <!--首页作品案例-->
    <div class="works">
        <div class="catename1">
            <div class="catetitle">
                <img src="{{asset('home/images/works_t.png')}}" width="315" height="55" alt="作品案例"/>
                <div class="text1">
                    <div class="up1">我们的作品案例</div>
                    <div class="down1">Our work case</div>
                </div>
            </div>
            <div class="more"><a href="works_all.html" target="_blank"><img src="{{asset('home/images/more_s.png')}}" width="93" height="55" alt="more"/></a></div>
        </div>
        <div class="cate">
            <a id="all" href="#" target="_blank">全部作品</a>&nbsp;&nbsp; &nbsp;| &nbsp;
            <a href="#" target="_blank">家装效果图</a>&nbsp;&nbsp; &nbsp;| &nbsp;
            <a href="#" target="_blank">工装效果图</a>&nbsp;&nbsp; &nbsp;| &nbsp;
            <a href="#" target="_blank">360全景图</a>&nbsp;&nbsp; &nbsp;| &nbsp;
            <a href="#" target="_blank">方案深化图</a>&nbsp;&nbsp; &nbsp;| &nbsp;
            <a href="#" target="_blank">室外表现图</a>
        </div>
        <div class="catelists">
            <div class="catelist1">
                <div class="pic"><a href="#" target="_blank"><img src="{{asset('home/images/service_s.png')}}" width="285" height="290" alt=""></a></div>
                <div class="price"><a href="#">客厅[J1501-0001]</a></div>
            </div>
            <div class="catelist2">
                <div class="pic"><a href="#" target="_blank"><img src="{{asset('home/images/service_s.png')}}" width="285" height="290" alt=""></a></div>
                <div class="price"><a href="#">客厅[J1501-0001]</a></div>
            </div>
            <div class="catelist2">
                <div class="pic"><a href="#" target="_blank"><img src="{{asset('home/images/service_s.png')}}" width="285" height="290" alt=""></a></div>
                <div class="price"><a href="#">客厅[J1501-0001]</a></div>
            </div>
            <div class="catelist2">
                <div class="pic"><a href="#" target="_blank"><img src="{{asset('home/images/service_s.png')}}" width="285" height="290" alt=""></a></div>
                <div class="price"><a href="#">客厅[J1501-0001]</a></div>
            </div>
        </div>
    </div>
    <!--首页交易记录-->
    <div class="order">
        <div class="catename1">
            <div class="catetitle">
                <img src="{{asset('home/images/order_t.png')}}" width="292" height="55" alt="交易记录"/>
                <div class="text1">
                    <div class="up1">我们的近期订单</div>
                    <div class="down1">Short-term order form</div>
                </div>
            </div>
            <div class="more"><a href="#" target="_blank"><img src="{{asset('home/images/more_s.png')}}" width="93" height="55" alt="more"/></a></div>
        </div>
        <table width="1208">
            <tr height="50" bgcolor="#f3f3f3" class="th">
                <th>订单类型</th>
                <th>项目名称</th>
                <th>订单价格</th>
                <th>客户</th>
                <th>成交时间</th>
            </tr>
            <tr height="36" class="td">
                <td>工装效果图</td>
                <td>咖啡厅</td>
                <td class="price">1200</td>
                <td>136*******8</td>
                <td>2016-01-02</td>
            </tr>
            <tr height="36" class="td">
                <td>工装效果图</td>
                <td>咖啡厅</td>
                <td class="price">1200</td>
                <td>136*******8</td>
                <td>2016-01-02</td>
            </tr>
            <tr height="36" class="td">
                <td>工装效果图</td>
                <td>咖啡厅</td>
                <td class="price">1200</td>
                <td>136*******8</td>
                <td>2016-01-02</td>
            </tr>
            <tr height="36" class="td">
                <td>工装效果图</td>
                <td>咖啡厅</td>
                <td class="price">1200</td>
                <td>136*******8</td>
                <td>2016-01-02</td>
            </tr>
            <tr height="36" class="td">
                <td>工装效果图</td>
                <td>咖啡厅</td>
                <td class="price">1200</td>
                <td>136*******8</td>
                <td>2016-01-02</td>
            </tr>
            <tr height="36" class="td">
                <td>工装效果图</td>
                <td>咖啡厅</td>
                <td class="price">1200</td>
                <td>136*******8</td>
                <td>2016-01-02</td>
            </tr>
            <tr height="36" class="td">
                <td>工装效果图</td>
                <td>咖啡厅</td>
                <td class="price">1200</td>
                <td>136*******8</td>
                <td>2016-01-02</td>
            </tr>
            <tr height="36" class="td">
                <td>工装效果图</td>
                <td>咖啡厅</td>
                <td class="price">1200</td>
                <td>136*******8</td>
                <td>2016-01-02</td>
            </tr>
            <tr height="36" class="td">
                <td>工装效果图</td>
                <td>咖啡厅</td>
                <td class="price">1200</td>
                <td>136*******8</td>
                <td>2016-01-02</td>
            </tr>
            <tr height="36" class="td">
                <td>工装效果图</td>
                <td>咖啡厅</td>
                <td class="price">1200</td>
                <td>136*******8</td>
                <td>2016-01-02</td>
            </tr>
        </table>
    </div>
    <!--首页客户评价-->
    <div class="eval">
        <div class="catename1">
            <div class="catetitle">
                <img src="{{asset('home/images/evaluation_t.png')}}" width="292" height="55" alt="客户评价"/>
                <div class="text1">
                    <div class="up1">客户对我们的评价</div>
                    <div class="down1">Customer to our evaluation</div>
                </div>
            </div>
            <div class="more"><a href="#" target="_blank"><img src="{{asset('home/images/more_s.png')}}" width="93" height="55" alt="more"/></a></div>
        </div>

        <div class="catename2">
            <img src="{{asset('home/images/good_t.png')}}" width="211" height="15" alt="好评"/>
        </div>
        <div class="evallists">
            <div class="evallist">
                <div class="up2 clear">
                    <div class="left clear">
                        <div class="tx"><img src="{{asset('home/images/tx.png')}}" width="54" height="54" alt="头像"/></div>
                        <div class="rt">
                            <div class="up3"><div class="tel">136*******8</div><div class="img">好评</div></div>
                            <div class="down3"><span class="s1">非常有耐心</span><span class="s1">水平很棒</span><span class="s2">很耐心，后期处理很棒！感谢啊！</span></div>
                        </div>
                    </div>
                    <div class="right">2015-12-30 14:50</div>
                </div>
                <div class="down2 clear">
                    <div class="score">
                        <div class="sa">
                            <div class="pic">完成质量</div>
                            <div class="tex">5.0分</div>
                        </div>
                        <div class="sa">
                            <div class="pic">工作速度</div>
                            <div class="tex">5.0分</div>
                        </div>
                        <div class="sa">
                            <div class="pic">服务态度</div>
                            <div class="tex">5.0分</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="evallist">
                <div class="up2 clear">
                    <div class="left clear">
                        <div class="tx"><img src="{{asset('home/images/tx.png')}}" width="54" height="54" alt="头像"/></div>
                        <div class="rt">
                            <div class="up3"><div class="tel">136*******8</div><div class="img">好评</div></div>
                            <div class="down3"><span class="s1">非常有耐心</span><span class="s1">水平很棒</span><span class="s2">很耐心，后期处理很棒！感谢啊！</span></div>
                        </div>
                    </div>
                    <div class="right">2015-12-30 14:50</div>
                </div>
                <div class="down2 clear">
                    <div class="score">
                        <div class="sa">
                            <div class="pic">完成质量</div>
                            <div class="tex">5.0分</div>
                        </div>
                        <div class="sa">
                            <div class="pic">工作速度</div>
                            <div class="tex">5.0分</div>
                        </div>
                        <div class="sa">
                            <div class="pic">服务态度</div>
                            <div class="tex">5.0分</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="evallist">
                <div class="up2 clear">
                    <div class="left clear">
                        <div class="tx"><img src="{{asset('home/images/tx.png')}}" width="54" height="54" alt="头像"/></div>
                        <div class="rt">
                            <div class="up3"><div class="tel">136*******8</div><div class="img">好评</div></div>
                            <div class="down3"><span class="s1">非常有耐心</span><span class="s1">水平很棒</span><span class="s2">很耐心，后期处理很棒！感谢啊！</span></div>
                        </div>
                    </div>
                    <div class="right">2015-12-30 14:50</div>
                </div>
                <div class="down2 clear">
                    <div class="score">
                        <div class="sa">
                            <div class="pic">完成质量</div>
                            <div class="tex">5.0分</div>
                        </div>
                        <div class="sa">
                            <div class="pic">工作速度</div>
                            <div class="tex">5.0分</div>
                        </div>
                        <div class="sa">
                            <div class="pic">服务态度</div>
                            <div class="tex">5.0分</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="evallist">
                <div class="up2 clear">
                    <div class="left clear">
                        <div class="tx"><img src="{{asset('home/images/tx.png')}}" width="54" height="54" alt="头像"/></div>
                        <div class="rt">
                            <div class="up3"><div class="tel">136*******8</div><div class="img">好评</div></div>
                            <div class="down3"><span class="s1">非常有耐心</span><span class="s1">水平很棒</span><span class="s2">很耐心，后期处理很棒！感谢啊！</span></div>
                        </div>
                    </div>
                    <div class="right">2015-12-30 14:50</div>
                </div>
                <div class="down2 clear">
                    <div class="score">
                        <div class="sa">
                            <div class="pic">完成质量</div>
                            <div class="tex">5.0分</div>
                        </div>
                        <div class="sa">
                            <div class="pic">工作速度</div>
                            <div class="tex">5.0分</div>
                        </div>
                        <div class="sa">
                            <div class="pic">服务态度</div>
                            <div class="tex">5.0分</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="evallist">
                <div class="up2 clear">
                    <div class="left clear">
                        <div class="tx"><img src="{{asset('home/images/tx.png')}}" width="54" height="54" alt="头像"/></div>
                        <div class="rt">
                            <div class="up3"><div class="tel">136*******8</div><div class="img">好评</div></div>
                            <div class="down3"><span class="s1">非常有耐心</span><span class="s1">水平很棒</span><span class="s2">很耐心，后期处理很棒！感谢啊！</span></div>
                        </div>
                    </div>
                    <div class="right">2015-12-30 14:50</div>
                </div>
                <div class="down2 clear">
                    <div class="score">
                        <div class="sa">
                            <div class="pic">完成质量</div>
                            <div class="tex">5.0分</div>
                        </div>
                        <div class="sa">
                            <div class="pic">工作速度</div>
                            <div class="tex">5.0分</div>
                        </div>
                        <div class="sa">
                            <div class="pic">服务态度</div>
                            <div class="tex">5.0分</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--底部口号-->
        <div class="promise">
            <div class="bz1"><a href="#"><img src="{{asset('home/images/pzbz.png')}}" width="200" height="70" alt="品质保障"/></a></div>
            <div class="bz1"><a href="#"><img src="{{asset('home/images/yxfw.png')}}" width="200" height="70" alt="用心服务"/></a></div>
            <div class="bz1"><a href="#"><img src="{{asset('home/images/yagt.png')}}" width="200" height="70" alt="用爱沟通"/></a></div>
            <div class="bz1"><a href="#"><img src="{{asset('home/images/jyqj.png')}}" width="200" height="70" alt="精益求精"/></a></div>
            <div class="bz2"><a href="#"><img src="{{asset('home/images/dbjy.png')}}" width="200" height="70" alt="担保交易"/></a></div>
        </div>
    </div>
    <div class="footimg"><img src="{{asset('home/images/index_foot.png')}}" width="1210" height="140"></div>
@endsection