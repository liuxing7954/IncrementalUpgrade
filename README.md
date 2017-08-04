### 项目结构

![image.png](http://upload-images.jianshu.io/upload_images/3111012-e52f00141a5e01c5.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
### 配置文件--path.php

![image.png](http://upload-images.jianshu.io/upload_images/3111012-d2d84da8ba657e8b.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

> $pathArr这个就是总数组，只要有php的基础就能看到这个配置文件。在这个多维关联数组中， 如果值对应的还是数组，就说明这个键是目录的名字，如果对应的是字符串，说明此字符串是文件的名字。

###运行过程

![image.png](http://upload-images.jianshu.io/upload_images/3111012-c2ef98713d6ffe9a.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
### 程序实现
```
//这个方法是用递归的方式读取配置文件的数组
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
//这个方法就是吧两个数组里的路径进行转移
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
```
### 运行结果

![image.png](http://upload-images.jianshu.io/upload_images/3111012-03684c84d1cb9ddd.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)


### 下载地址
https://github.com/liuxing7954/IncrementalUpgrade.git