@extends('admin.layouts.base')
@section('title')
    文章添加
@endsection
@section('custom_css')
    <style>
        .layui-form-item  .layui-form-label{width:100px;}
        .layui-form-item .layui-input-inline{width:600px;}
        .layui-form-item .layui-input-inline input[name=sort_order],input[name=page_num]{width:70px;}
        .layui-form-item .layui-input-inline input[id=upload]{width:400px;float:left;margin-right:5px;}
        .layui-form-item .layui-input-inline .layui-form-select{width:200px;}
        .layui-form-item .layui-upload-button{border:0;background-color:#009688;color:#fff;}
        .layui-upload-icon i{color:#fff;}

    </style>
@endsection
@section('right')
    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form">
                <div class="layui-form-item">
                    <label for="article_fulltitle" class="layui-form-label">
                        <span class="x-red">*</span>文章标题
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="article_fulltitle" name="article_fulltitle" required="" value="{{$data['info']->article_fulltitle}}" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="article_cat_id" class="layui-form-label">
                        <span class="x-red">*</span>所属分类
                    </label>
                    <div class="layui-input-inline">
                        <select name="article_cat_id">
                            @foreach ($data['tree'] as $vo)
                                @if($vo->id==$data['info']->article_cat_id)
                                    <option value="{{$vo->id}}" selected>{{$vo->pre}}{{$vo->name}}</option>
                                    @else
                                    <option value="{{$vo->id}}">{{$vo->pre}}{{$vo->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="layui-form-item">
                    <label for="article_title" class="layui-form-label">
                        文章SEO标题
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="article_title" name="article_title" value="{{$data['info']->article_title}}" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="article_keywords" class="layui-form-label">
                        <span class="x-red"></span>文章关键字
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" name="article_keywords" lay-verify="article_keywords" value="{{$data['info']->article_keywords}}" autocomplete="off" placeholder="请输入标题" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="article_desc" class="layui-form-label">
                        <span class="x-red"></span>文章描述
                    </label>
                    <div class="layui-input-inline">
                        <textarea placeholder="请输入文章描述" name="article_desc" value="{{$data['info']->article_desc}}" class="layui-textarea"></textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="upload" class="layui-form-label">
                        缩略图
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="upload" name="article_thumb" autocomplete="off" value="{{$data['info']->article_thumb}}" placeholder="请上传缩略图" class="layui-input">
                        <div class="layui-box layui-upload-button" style="padding:0 15px;" onclick="weixin({{$data['info']->article_id}})">预览</div>
                        <div id="tong{{$data['info']->article_id}}" style="display: none;">
                            <img src="{{$data['host_root']}}{{$data['info']->article_thumb}}"  style="width: 500px;height: auto">
                        </div>
                        <div class="layui-box layui-upload-button">
                            <input type="file" name="upload" class="layui-upload-file">
                            <span class="layui-upload-icon"><i class="layui-icon"></i>上传图片</span>
                        </div>
                    </div>
                </div>


                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                        文章内容
                    </label>
                    <div class="layui-input-inline">
                        <script id="editor" name="article_content" type="text/plain" style="width:850px;height:300px;">{!! $data['info']->article_content !!}</script>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">推荐</label>
                    <div class="layui-form layui-input-block">

                        <input type="radio" name="article_is_recommend" value="1" title="推荐" @if ($data['info']->article_is_recommend == 1) checked @endif>
                        <input type="radio" name="article_is_recommend" value="0" title="不推荐" @if ($data['info']->article_is_recommend == 0) checked @endif>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">热门</label>
                    <div class="layui-form layui-input-block">
                        <input type="radio" name="article_is_hot" value="1" title="热门" @if ($data['info']->article_is_hot == 1) checked @endif>
                        <input type="radio" name="article_is_hot" value="0" title="不热门" @if ($data['info']->article_is_hot == 0) checked @endif>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">置顶</label>
                    <div class="layui-form layui-input-block">
                        <input type="radio" name="article_is_top" value="1" title="置顶" @if ($data['info']->article_is_top == 1) checked @endif>
                        <input type="radio" name="article_is_top" value="0" title="不置顶" @if ($data['info']->article_is_top == 0) checked @endif>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                        点击数
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="article_click" name="article_click" required="" lay-verify="number"
                               autocomplete="off" value="{{$data['info']->article_click}}" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                        排序号
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="article_sort" name="article_sort" required="" lay-verify="number"
                               autocomplete="off" value="{{$data['info']->article_sort}}" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button  class="layui-btn" lay-filter="edit" lay-submit="">
                        修 改
                    </button>
                    <input type="hidden" name="article_id" value="{{$data['info']->article_id}}">
                    @method('put')
                    {{csrf_field()}}
                </div>
            </form>
            <!-- 右侧内容框架，更改从这里结束 -->
        </div>
    </div>
    <!-- 右侧主体结束 -->
@endsection
@section('custom_script')
    <script type="text/javascript">
        var ue = UE.getEditor('editor');
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
    $(function  () {
        //监听提交
        layui.use(['laydate','form','upload'], function () {
            layui.upload({
                url: "{{url('Admin/art/upload')}}"
                ,success: function(res){
                    if (res.status == 0){
                        $("#upload").val(res.data.article_thumb);
                        var id = "{{$data['info']->article_id}}";
                        var host = "{{$data['host_root']}}";
                        $("#tong"+id+" img").attr('src',host+res.data.article_thumb);
                    }else{
                        layer.msg(res.msg, function () {});
                    }
                }
            });
            var form = layui.form();
            //监听提交
            form.on('submit(edit)', function (data) {
                $.ajax({
                    type: 'POST',
                    url: "{{url('Admin/article')}}/{{$data['info']->article_id}}",
                    data: data.field,
                    dataType: 'JSON',
                    success: function (arr) {
                        layer.msg(JSON.stringify(arr.msg), function () {
                            if (arr.status == 0){
                                location.href="/Admin/article";
                            }else{
                                location.href="/Admin/article/{{$data['info']->article_id}}/edit";
                            }

                        });
                    }
                })
                return false;
            })
        })
    })
</script>
@endsection