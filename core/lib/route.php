<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/14 0014
 * Time: 17:56
 */
namespace core\lib;

class route{
    public $action='';
    public $ctrl='';

    public function __construct()
    {
        //xx.com/index/index  实现 index->index()
        /* 1、隐藏index.php  正常的网址xx.com/index.php/index/index  隐藏为了美观   http://www.yingshangxin.com/index2/index2
         *
         *2、获取rul参数部分  通过PHP的系统变量$_SERVER['REQUEST_URI']
         * 3、返回对应的控制器和方法
         *
         * */

        if(isset($_SERVER['REQUEST_URI'])&&$_SERVER['REQUEST_URI']!='/'){
            $path=$_SERVER['REQUEST_URI'];
            $pathrr=explode('/',trim($path,'/'));
            if(isset($pathrr['0'])){
                $this->ctrl=$pathrr['0'];
            }
            if(isset($pathrr['1'])){
                $this->action=$pathrr['1'];
            }else{
                $this->action='index';
            }
        }else{
            $this->ctrl='index';
            $this->action='index';
        }

        /*多余的URL作为参数
         *
         * x.com/index/index/id/3
         *
         * */
        $count=count($pathrr);
        unset($pathrr[0]);
        unset($pathrr[1]);
        for($i=2;$i<$count;$i+=2){
            $pathrr[$i+1]=isset($pathrr[$i+1])?$pathrr[$i+1]:'';
            $_GET[$pathrr[$i]]=$pathrr[$i+1];
        }



    }

}