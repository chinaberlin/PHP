<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-26
 * Time: 下午1:12
 */
namespace KpDirectory;

$path = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'test';

class DirectoryException extends \Exception
{

}

class Directory
{

    public static function createDir($path)
    {
        if (!is_dir($path)) {
            if (!@mkdir($path)) {
                throw new DirectoryException(
                    sprintf('%s文件夹创建失败')
                );
            }
        }
    }

    public static function isDir($path)
    {
        if (!is_dir($path)) {
            throw new DirectoryException(
                sprintf('%s路径不存在', $path)
            );
        }
    }

    public static function copy($fromPath, $toPath, $recursive = false)
    {
        static::isDir($fromPath);

        static::createDir($toPath);

        $r = opendir($fromPath);

        while ($fileOrDirectorName = readdir($r)) {

            if (!in_array($fileOrDirectorName, ['.', '..'])) {

                $childFromPath = $fromPath . DIRECTORY_SEPARATOR . $fileOrDirectorName;
                $childToPath = $toPath . DIRECTORY_SEPARATOR . $fileOrDirectorName;

                if (is_dir($childFromPath)) {
                    if ($recursive) {
                        static::copy($childFromPath, $childToPath, $recursive);
                    }
                } else {
                    copy($childFromPath, $childToPath);
                }
            }
        }

        closedir($r);

    }

    public static function size($path, $recursive = false)
    {

        static::isDir($path);

        $r = opendir($path);

        $size = 0;

        while ($fileOrDirectorName = readdir($r)) {

            if (!in_array($fileOrDirectorName, ['.', '..'])) {
                $childPath = $path . DIRECTORY_SEPARATOR . $fileOrDirectorName;

                if (is_dir($childPath)) {
                    if ($recursive) {
                        $size += static::size($childPath, $recursive);
                    }
                } else {
                    $size += filesize($childPath);
                }
            }
        }

        closedir($r);

        return $size;

    }

}

// 计算文件夹大小
Directory::size($path, true);

// 复制一份个文件夹
Directory::copy($path, dirname(__DIR__) . DIRECTORY_SEPARATOR . 'xxxx', true);