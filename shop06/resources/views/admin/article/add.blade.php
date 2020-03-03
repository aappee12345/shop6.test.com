@extends('admin.layouts.base')
@section('title')
    文章添加
@endsection
@section('custom_css')
    <style>
        .layui-form-item  .layui-form-label{width:100px;}
        .layui-form-item .layui-input-inline{width:500px;}
        .layui-form-item .layui-input-inline input[name=sort_order],input[name=page_num]{width:70px;}
        .layui-form-item .layui-input-inline input[id=upload]{width:370px;float:left;margin-right:5px;}
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
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>文章标题
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="article_fulltitle" name="article_fulltitle" required="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="article_cat_id" class="layui-form-label">
                        <span class="x-red">*</span>所属分类
                    </label>
                    <div class="layui-input-inline">
                        <select name="article_cat_id">
                            @foreach ($data['tree'] as $vo)
                            <option value="{{$vo->id}}">{{$vo->pre}}{{$vo->name}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="layui-form-item">
                    <label for="article_title" class="layui-form-label">
                        SEO标题
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="article_title" name="article_title" placeholder="请输入SEO标题" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="article_keywords" class="layui-form-label">
                        <span class="x-red"></span>SEO关键字
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" name="article_keywords" lay-verify="article_keywords" autocomplete="off" placeholder="请输入SEO关键字" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="article_desc" class="layui-form-label">
                        <span class="x-red"></span>SEO描述
                    </label>
                    <div class="layui-input-inline">
                        <textarea placeholder="请输入SEO描述" name="article_desc" class="layui-textarea"></textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="upload" class="layui-form-label">
                        缩略图
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="upload" name="article_thumb" autocomplete="off" placeholder="请上传缩略图" class="layui-input">
                        <div class="layui-box layui-upload-button">
                            <input type="file" name="upload" class="layui-upload-file">
                            <span class="layui-upload-icon"><i class="layui-icon"></i>上传图片</span>
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="article_content" class="layui-form-label">
                        文章内容
                    </label>
                    <div class="layui-input-inline">
                        <script id="editor" name="article_content" type="text/plain" style="width:850px;height:300px;"></script>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">推荐</label>
                    <div class="layui-form layui-input-block">
                        <input type="radio" name="article_is_recommend" value="1" title="推荐">
                        <input type="radio" name="article_is_recommend" value="0" title="不推荐" checked>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">热门</label>
                    <div class="layui-form layui-input-block">
                        <input type="radio" name="article_is_hot" value="1" title="热门">
                        <input type="radio" name="article_is_hot" value="0" title="不热门" checked>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">置顶</label>
                    <div class="layui-form layui-input-block">
                        <input type="radio" name="article_is_top" value="1" title="置顶">
                        <input type="radio" name="article_is_top" value="0" title="不置顶" checked>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="article_click" class="layui-form-label">
                        点击数
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="article_click" name="article_click" required="" lay-verify="number"
                               autocomplete="off" value="50" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="article_sort" class="layui-form-label">
                        排序号
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="article_sort" name="article_sort" required="" lay-verify="number"
                               autocomplete="off" value="50" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button  class="layui-btn" lay-filter="add" lay-submit="">
                        增 加
                    </button>
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
    </script>
<script>
    $(function  () {
        //监听提交
        layui.use(['laydate','form','upload'], function () {
            layui.upload({
                url: "{{url('Admin/art/upload')}}"
                ,success: function(res){
                    if (res.status == 0){
                        $("#upload").val(res.data.article_thumb);
                    }else{
                        layer.msg(res.msg, function () {});
                    }
                }
            });
            var form = layui.form();
            //监听提交
            form.on('submit(add)', function (data) {
                $.ajax({
                    type: 'POST',
                    url: "{{url('Admin/article')}}",
                    data: data.field,
                    dataType: 'JSON',
                    success: function (arr) {
                        layer.msg(JSON.stringify(arr.msg), function () {
                            console.log(arr.msg);
                            if (arr.status == 0){
                                location.href="{{url('Admin/article')}}";
                            }else{
                                location.href="{{url('Admin/article/create')}}";
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