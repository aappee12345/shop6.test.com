@extends('admin.layouts.base')
@section('title')
    文章列表
@endsection
@section('custom_css')
<style>
    input[name=article_sort]{width:50px;color:black;text-align:center;}
    span.recommend,span.hot,span.top{cursor:pointer;}
</style>
@endsection
@section('right')
    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <xblock>
{{--                <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button>--}}
                <a class="layui-btn" href="{{url('Admin/article/create')}}"><i class="layui-icon">&#xe608;</i>添加</a>
                <div class="layui-input-inline">
                    <input type="text" name="key"  placeholder="请输入文章标题" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-input-inline" style="width:80px">
                    <button class="layui-btn" id="search" lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                </div>
                <span class="x-right" style="line-height:40px">共有数据：{{$data['count']}} 条</span>
            </xblock>
            <table class="layui-table">
                <thead>
                <tr>
                    <th width="50"><input type="checkbox" name="" value=""></th>
                    <th width="50">ID</th>
                    <th width="50">排序号</th>
                    <th>文章标题</th>
                    <th width="100">所属分类</th>
                    <th width="300">文章关键字</th>
                    <th width="40">推荐</th>
                    <th width="40">热门</th>
                    <th width="40">置顶</th>
                    <th width="140">发布时间</th>
                    <th width="50">操作</th>
                </tr>
                </thead>
                <tbody>
                @if ($data['list'])
                @foreach($data['list'] as $v)
                <tr>
                    <td><input type="checkbox" value="1" name=""></td>
                    <td >{{$v->article_id}}</td>
                    <td><input type="text" name="article_sort" onchange="changeOrder(this,{{$v->article_id}})" value="{{isset($v->article_sort)?$v->article_sort:0}}"></td>
                    <td>
                        <a href="{{url('Admin/article/'.$v->article_id.'/edit')}}">{{$v->article_fulltitle}}</a>
                            @if (isset($v->article_thumb))
                                <i class="layui-icon" onclick="weixin({{$v->article_id}})">&#xe64a;</i>
                            @endif
                             <div id="tong{{$v->article_id}}" style="display: none;">
                                 <img src="{{$data['host_root']}}{{$v->article_thumb}}"  style="width: 500px;height: auto">
                             </div>
                    </td>
                    <td >{{isset($v->category['name'])?$v->category['name']:'暂无分类'}}</td>
                    <td>{{$v->article_keywords}}</td>
                    <td><span class="recommend" onclick="updateAttr(this,'{{$v->article_id}}','{{$v->article_is_recommend}}','1')">{{$v->article_is_recommend==1?'是':'否'}}</span></td>
                    <td><span class="hot" onclick="updateAttr(this,'{{$v->article_id}}','{{$v->article_is_hot}}','2')">{{$v->article_is_hot==1?'是':'否'}}</span></td>
                    <td><span class="top" onclick="updateAttr(this,'{{$v->article_id}}','{{$v->article_is_top}}','3')">{{$v->article_is_top==1?'是':'否'}}</span></td>
                    <td>{{$v->update_time}}</td>
                    <td class="td-manage">
                        <a title="修改" href="{{url('Admin/article/'.$v->article_id.'/edit')}}" class="ml-5" style="text-decoration:none"><i class="layui-icon">&#xe642;</i></a>
                        <a title="删除" href="javascript:void(0);" onclick="del(this,'{{$v->article_id}}')" style="text-decoration:none"><i class="layui-icon">&#xe640;</i></a>
                    </td>
                </tr>
                @endforeach
                    @else
                    <tr>
                        <td colspan="8" align="center">暂无分类</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <!-- 右侧内容框架，更改从这里结束 -->
        </div>
    </div>
    <!-- 右侧主体结束 -->
@endsection
@section('custom_script')
    <script>
        /*type值：1--推荐 2--热门 3--置顶*/
        function updateAttr(obj,id,value,type){
            $.ajax({
                type: 'POST',
                url: "{{url('Admin/art/updateAttr')}}",
                data: {'_token':'{{csrf_token()}}','article_id':id,'value':value,'type':type},
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 0){
                        if ($(obj).text()=='是'){
                            $(obj).text('否');
                        }else{
                            $(obj).text('是');
                        }
                    }
                }
            })
        }
        function weixin(id) {
            layer.open({
                type: 1,
                title: false,
                closeBtn: 0,
                area: '500px',
                skin: 'layui-layer-nobg', //没有背景色
                shadeClose: true,
                content: $("#tong"+id)
            });
        }
        //批量删除提交
        function delAll () {
            layer.confirm('确认要删除吗？',function(index){
                //捉到所有被选中的，发起异步进行删除
                layer.msg('删除成功', {icon: 1});
            });
        }
        /*删除*/
        function del(obj,id){
            layer.confirm('确认要删除吗？',function(index){
                //发起异步删除数据
                $.ajax({
                    type: 'POST',
                    url: "{{url('Admin/article')}}/"+id,
                    data: {'_method':'DELETE','_token':'{{csrf_token()}}'},
                    dataType: 'JSON',
                    success: function (data) {
                        $(obj).parents("tr").remove();
                        layer.msg(JSON.stringify(data.msg),{icon:1,time:1000});
                    }
                })
            });
        }
        function changeOrder(obj,id){
            var sort_order = $(obj).val();
            $.post("{{url('Admin/art/changeOrder')}}",{'_token':'{{csrf_token()}}','article_id':id,'article_sort':sort_order},function(data){
                var obj = JSON.parse(data);
                layer.msg(JSON.stringify(obj.msg), function () {});
            })
        }
    </script>
@endsection
