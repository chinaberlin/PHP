<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-26
 * Time: 上午10:37
 */
namespace Kp\Db;


use Kp\Db\Sql\Update;

class DbException extends \Exception{

}


class Db implements DbInterface{

    public function __construct(){
        //$conn = mysql_connect(xxx);

        try{

            $a = 0;
            $b = 10;

            if($a === 0){
                throw new \Exception('$a 不能等于0');
            }

            throw new DbException('$b 不能等于10');

        }catch (DbException $e){
            echo $e->getMessage();
        }catch (\Exception $e){
            echo $e->getMessage();
        }

    }

    public function setUpdate(Update $update){

    }
}