<?php
namespace App\Http\Controllers\Admin;

use App\Http\Common\ConstConfig;
use App\Http\Common\RequestValidate;
use App\Http\Common\ReturnType;
use App\Http\Common\ServerResponse;
use App\Http\Model\ArticleModel;
use App\Http\Model\CategoryModel;
use App\Http\Requests\ArticleRequest;
use App\Tool\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends CommonController
{
    private $category;
    private $article;

    public function __construct(){
        parent::__construct();
        $this->category = new CategoryModel();
        $this->article = new ArticleModel();
    }
    /**
     * 文章列表
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cid = $request->input('cid');
        $data['list'] = $list = ArticleModel::getArticleList($cid,ConstConfig::getPageNum()->ADMIN_PAGE_NUM);
        $data['count'] = $list->count();
        $data['host_root'] = ConstConfig::getFtpInfo()->HOST.ConstConfig::getFtpInfo()->ROOT;
        return ReturnType::returnCode($data,ConstConfig::getReturnType()->HOME_HTML,'admin.article.index');
    }

    /**
     * 文章添加页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['tree'] = $tree = $this->category->tree();
        return ReturnType::returnCode($data,$this->getReturnType(),'admin.article.add');
    }

    /**
     * 处理文章添加
     */
    public function store(ArticleRequest $request)
    {
        $article = ArticleModel::create($request->except('_token','upload'));
        if ($article==null) return ServerResponse::createByErrorMessage('添加失败');
        return ServerResponse::createBySuccessMessage('添加成功');
    }

    /**
     * 编缉文章页面
     */
    public function edit($id)
    {
        if (!RequestValidate::checkGetParam($id)) return ServerResponse::createByErrorMessage('参数错误');
        $data['tree'] = $this->category->tree();
        $data['info'] = ArticleModel::find($id);
        $data['host_root'] = ConstConfig::getFtpInfo()->HOST.ConstConfig::getFtpInfo()->ROOT;
        if ($data['info']==null){
            return ServerResponse::createByErrorMessage('参数ID错误，该分类不存在');
        }
        return ReturnType::returnCode($data,$this->getReturnType(),'admin.article.edit');
    }

    /**
     * 处理文章修改
     * @param ArticleRequest $request
     * @param $article_id
     * @return false|string
     */
    public function update(ArticleRequest $request,$article_id)
    {
        $thumb = ArticleModel::where('article_id',$article_id)->get('article_thumb')[0]->article_thumb;
        if ($thumb!=$request->input('article_thumb')) UploadFile::deleteFile($request,$article_id);/*若有新上传缩略图，则删除原缩略图*/
        $res = ArticleModel::where('article_id',$article_id)->update($request->except('_token','_method','upload'));/*更新文章*/
        if ($res > 0) return ServerResponse::createBySuccessMessage('修改成功');
        return ServerResponse::createByErrorMessage('修改失败');
    }

    /**
     * 文章删除
     */
    public function destroy($id){
        return $this->commonDelete($this->article->getTable(),$id);
    }

    /**
     * 上传缩略图
     * @param Request $request
     * @return false|string
     */
    public function upload(Request $request){
        UploadFile::upload($request,'article/');/*执行此方法后，如果未传文件则isError返回真*/
        if (UploadFile::isError()){
            return ServerResponse::createByErrorMessage(UploadFile::getMsg());
        }
        $path = UploadFile::getPath();/*获取文件的FTP文件夹地址*/
        $data['article_thumb'] = $path;
        return ServerResponse::createBySuccessData($data,'上传成功');
    }

    /**
     * 修改排序号
     * @param Request $request
     * @return false|string
     */
    public function changeOrder(Request $request){
        return $this->commonChangeField($request,$this->article->getTable(),$this->article->getPrimaryKey(),$this->article->getOrderField());
    }

    /**
     * 修改推荐、热门、置顶
     *
     */
    public function updateAttr(Request $request){
        $type = $request->input('type');
        $fieldType = ['1' => 'article_is_recommend', '2' => 'article_is_hot', '3' => 'article_is_top'];
        return $this->commonUpdateAttr($request,$this->article->getTable(),$this->article->getPrimaryKey(),$fieldType[$type],abs($request->input('value')-1));
    }
}
