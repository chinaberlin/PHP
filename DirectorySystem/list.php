<?php
namespace Kp;

use \DirectoryIterator;
use \LimitIterator;
use \Exception;
use \CallbackFilterIterator;

$path = Request::getQuery(Config::getConfig('urlPathKey'), Config::getConfig('path'));

if (!is_dir($path)) {
    throw new Exception(sprintf('%s路径不存在', $path));
}

$iterator = new DirectoryIterator($path);

$filterIterator = new CallbackFilterIterator($iterator, function ($current) {
    return !in_array($current->getFileName(), ['$RECYCLE.BIN', '.', '..']);
});

$limit = (Request::getQuery(Config::getConfig('urlPageKey'), 1) - 1) * Config::getConfig('pageShow');

$limitIterator = new LimitIterator($filterIterator, $limit, Config::getConfig('pageShow'));

?>
<?php if (iterator_count($limitIterator) > 0): ?>
    <table class="table">
        <tr>
            <th><input type="checkbox"/></th>
            <th>名称</th>
            <th>修改日期</th>
            <th>类型</th>
            <th>大小</th>
        </tr>
        <?php
        /**
         * @var \SplFileInfo $dIterator
         */
        ?>
        <?php foreach ($limitIterator as $dIterator): ?>
            <tr>
                <td>
<<<<<<< HEAD
                    <input type="checkbox" data-path="<?=$dIterator->getPath() . DIRECTORY_SEPARATOR .  iconv('gbk', 'utf-8', $dIterator->getFileName());?>"/>
=======
                    <input type="checkbox" data-path="<?=$dIterator->getPath() . DIRECTORY_SEPARATOR . $dIterator->getFilename();?>"/>
>>>>>>> 553b918ce08d125f4aba6e50ae3722c81771358b
                </td>
                <td>
                    <?php

<<<<<<< HEAD
                    $url = Url::create(['page' => 1, 'path' => $dIterator->getPath() . DIRECTORY_SEPARATOR .  iconv('gbk', 'utf-8', $dIterator->getFileName()) ]);

                    if (!$dIterator->isDir()) {
                        $url = Url::create(['type' => 'file', 'path' => $dIterator->getPath() . DIRECTORY_SEPARATOR .  iconv('gbk', 'utf-8', $dIterator->getFileName())]);
=======
                    $url = Url::create(['page' => 1, 'path' => $dIterator->getPath() . DIRECTORY_SEPARATOR . $dIterator->getFilename()]);

                    if (!$dIterator->isDir()) {
                        $url = Url::create(['type' => 'file', 'path' => $dIterator->getPath() . DIRECTORY_SEPARATOR . $dIterator->getFilename()]);
>>>>>>> 553b918ce08d125f4aba6e50ae3722c81771358b
                    }
                    ?>

                    <a href=" <?= $url ?>">
                        <?php if ($dIterator->isDir()): ?>
                            <i class="glyphicon glyphicon-folder-open"></i>
                        <?php else: ?>
                            <i class="glyphicon glyphicon-file"></i>
                        <?php endif; ?>
                        <?= iconv('gbk', 'utf-8', $dIterator->getFileName()); ?>
                    </a>
                </td>
                <td>
                    <?= date('Y/m/d h:i', $dIterator->getMTime()); ?>
                </td>
                <td>
                    <?= $dIterator->isDir() ? '文件夹' : '文件'; ?>
                </td>
                <td>
                    <?= File::formatSize($dIterator->getSize()); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?= Paginator::show(iterator_count($filterIterator)); ?>

<?php endif; ?>