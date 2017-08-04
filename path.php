<?php
date_default_timezone_set("Asia/Shanghai");
$DirName = date("Ymd", time()); 
//目标文件路径
$target_path = './java-module-'.$DirName.'-002';
//源文件路径前缀
$base_path = 'D:\System\Doc\CODE\ZZJG\otc';

$modArr = [
    "ywbl"=>[
        "ktfezh_lc.jsp",
    ],
    "zxzf"=>[
        'stdltable_zjzhgl.jsp',
        "zjzhgl_xz.jsp",
    ],
];

$resArr = [
    "otcV2"=>[
        "js"=>[
            "zxzf"=>[
                "stdltable.js",
            ],
            "ywbl"=>[
                "stdltable.js",
            ],
            
        ],
    ]
];

//最终使用路径数组
$pathArr = [
    "WebContent"=>[
        "WEB-INF"=>[
            "mod"=>$modArr,
        ],
        "res"=>$resArr,
    ]
];