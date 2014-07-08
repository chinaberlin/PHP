<?php
namespace kp;
use SplFileObject;
use Exception;


$fileName = Request::getQuery(Config::getConfig('urlPathKey'));

if ($fileName === null) {
    throw new Exception(sprintf('文件%s不存在', $fileName));
}

$splFileObject = new SplFileObject($fileName,'r+');
if(Request::isPost()){
    if($splFileObject->isWritable()){
       $splFileObject->fwrite(Request::getPost('content'));
    }

}



?>
<div class="col-sm-12">
    <a href="#" class="btn btn-danger">返回列表</a>
</div>
<div class="col-sm-12">
    <form method="post">
        <textarea name="content" style="width: 100%;min-height: 500px;"><?php foreach ($splFileObject as $line): ?><?= $line; ?><?php endforeach; ?>
        </textarea>
        <button type="submit" class="btn btn-danger">保存</button>
    </form>
</div>

