<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/14 0014
 * Time: 16:59
 */
function p($var){
    if(is_bool($var)){
        var_dump($var);

    }elseif(is_null($var)){
        var_dump(null);
    }else {
        echo "<pre style='padding:10px; border:1px red solid;background: #f5f5f5; '>".print_r($var,true)."</pre>";
    }

}