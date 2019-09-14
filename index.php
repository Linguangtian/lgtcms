<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/14 0014
 * Time: 16:54
 */
define('LGT',realpath('./'));
define('CORE',LGT.'/core/');
define('APP',LGT.'/app/');
define('MODULE','\\app\\');

define('DEBUG',true);

if(DEBUG){
    ini_set('display_errors','On');
}else{
    int_set('display_error','Off');
}

include CORE.'common/function.php';

//核心类
include CORE.'lgt.php';

spl_autoload_register('\core\lgt::load');
core\lgt::run();





ECHO 33;exit;

//自动加载后 在回来执行这个  所以加载文件的命名空间还是要有core
/*$route=new \core\route();
$route->index();*/


//这是个不存在的类







