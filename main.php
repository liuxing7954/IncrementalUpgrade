<?php
include("./path.php");
// mkdir("./WebContent/WEB-INF/mod/ywbl/",0777,true);
$sourcePathArr = [];
$targetPathArr = [];
// echo $base_path;
function getArgs(){
    $path='';
    $res = [];
    while(1){
        $path = trim(fgets(STDIN));
        if($path == 'qqq')
            break;
        $res[] = $path;
    }
    return $res;
}

function getArgsOfFile($path){
    $pathArr = include($path);
    return $pathArr;
}

function readPath($arr,$beforePath,&$res){
    foreach($arr as $k => $v){
        if (is_array($v))
        {
            readPath($v,$beforePath."/".$k,$res);
        }
        if(is_string($v) && $v != ''){
            $res[] = $beforePath."/".$v;
        }
    }
}

function translation($sourcePathArr,$targetPathArr){
    //复制文件，开始打包
    foreach($sourcePathArr as $k=>$v){
        //源文件是否存在
        if(file_exists($v)){
            $parentPath = dirname($targetPathArr[$k]);
            //创建目录
            if(!is_dir($parentPath)){
                if(!mkdir($parentPath,0777,true)){
                    echo $parentPath."==> Make Dir Error\n";
                }
            }
            //复制文件
            if(!copy($v, $targetPathArr[$k])){
                echo $v."==> File Copy Error\n";
            }
        }else{
            echo $v."==> Can't Find File\n";
        }
    }
}

$arr = $pathArr;
readPath($arr,$base_path,$sourcePathArr);
readPath($arr,$target_path,$targetPathArr);
print_r($sourcePathArr);
print_r($targetPathArr);
translation($sourcePathArr,$targetPathArr);
// fwrite(STDOUT,"Please input a argument:\n");
// $pathArgs = getArgs();
// print_r($pathArgs);