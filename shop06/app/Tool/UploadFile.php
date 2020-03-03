<?php
namespace App\Tool;

use App\Http\Model\ArticleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadFile
{
    private static $flag;
    private static $msg;
    private static $path;

    public static function getPath(){
        return self::$path;
    }
    public static function setPath($path){
        self::$path = $path;
    }
    public static function getMsg(){
        return self::$msg;
    }
    public static function setMsg($msg){
        self::$msg = $msg;
    }
    public static function getFlag(){
        return self::$flag;
    }
    public static function setFlag($flag){
        self::$flag = $flag;
    }
    public static function isError(){
        return self::getFlag() == false;
    }

    /**
     * 缩略图上传
     * @param Request $request
     * @param $dir
     */
    public static function upload(Request $request,$dir){
        if ($request->hasFile('upload') && $request->file('upload')->isValid())
        {
            $file = $request->file('upload');
            $ext = $file->getClientOriginalExtension();/*扩展名*/
            $realPath = $file->getRealPath();/*临时绝对路径*/
            $fileName = date('YmdHis') . uniqid() . '.' . $ext;
            $bool = Storage::disk('ftp')->put($dir.$fileName, file_get_contents($realPath));
            if ($bool){
                self::setFlag($bool);
                self::setMsg('上传成功');
                self::setPath($dir.$fileName);
            }else{
                self::setFlag($bool);
                self::setMsg('上传失败');
                self::setPath('');
            }
        }else{
            self::setFlag(false);
            self::setMsg('无效文件');
        }
    }

    /**
     * 删除缩略图
     * @param $request
     * @param $article_id
     */
    public static function deleteFile($request,$article_id){
        $thumb = ArticleModel::where('article_id',$article_id)->get('article_thumb')[0]->article_thumb;
        if ($thumb!=$request->input('article_thumb')) {
            $disk = Storage::disk('ftp');
            if (isset($thumb)){
                @$disk->delete($thumb);
            }
        }

    }
}