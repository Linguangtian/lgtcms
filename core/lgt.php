<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/14 0014
 * Time: 17:14
 */
namespace core;

class lgt{
   public static $classMap=array();

    //使用的比较多，所有设置为静态方法比较合理
    public static function run(){
        //通过autoload加载进来的路由算法
        $route=new \core\lib\route();

        $ctrlClass=$route->ctrl;
        $action=$route->action;

        $ctrlfile=APP.'ctrl/'.$ctrlClass.'Ctrl1.php';//控制器路径

        $cltrlClass=MODULE.'ctrl\\'.$ctrlClass.'Ctrl'; //控制器命名空间+类名
        if(is_file($ctrlfile)){
            include $ctrlfile;
            $newCtrl=  new $cltrlClass;
            $newCtrl->$action();

        }else{

         //   throw new \ErrorException('找不到控制器'.$ctrlfile);
           echo ('找不到控制器'.$ctrlfile);die;

        }

        //   p($_GET);
    }




    //自动加载类
    static public function load($class){

        if(isset($classMap[$class])){
            return true;
        }
        $class=str_replace('\\','/',$class);

        $file=LGT.'/'.$class.'.php';

        if(!is_file($file)){
            return false;
        }
        include $file;
        self::$classMap[$class]=$class;



    }


}