<?php 
    // session_start();
    //phân tích uri thành controller và action
    $uris = explode("/",$_SERVER["REQUEST_URI"]);
    $controller =$uris[1]??"";
    $actions = explode("?",$uris[2]??"");
    $action = $actions[0]??"";
    $controller = $controller==""?"home":$controller;
    $action = $action==""?"index":$action;

    //Xử lí router(điều hướng)
    // chặn các action và controller không được phép
    // nguoidung,chucnang

    $routers = 
    [
        "customer" => 
        [
            "name" => "customer",
            "action" =>[
                "xoa"=>[
                    "name"=>"delete"
                ],
                "danhsach"=>[
                    "name"=>"list"
                ],
                "luu"=>[
                    "name"=>"addOrEdit"
                ],
                "thuchienluu"=>[
                    "name"=>"save"
                ]
            ]
        ],
        "user" => 
        [
            "name" => "user",
            "action" =>[
                "xoa"=>[
                    "name"=>"delete"
                ],
                "danhsach"=>[
                    "name"=>"list"
                ],
                "luu"=>[
                    "name"=>"addOrEdit"
                ],
                "thuchienluu"=>[
                    "name"=>"save"
                ]
            ]
        ]
    ];

    if(isset($routers[$controller])){ 
        $actions = $routers[$controller]["action"];
        $controller = $routers[$controller]["name"];
        if(isset($actions[$action])){
            $action =$actions[$action]["name"];
        }else{
            return;
        }
    }else{
        return;
    }
    //thiết lập thư mục include
    set_include_path(
        get_include_path()
        . PATH_SEPARATOR . "D:/Nitro-Tech-Asia/web-php-3/controller"
        . PATH_SEPARATOR . "D:/Nitro-Tech-Asia/web-php-3/view"
        . PATH_SEPARATOR . "D:/Nitro-Tech-Asia/web-php-3/model"
        . PATH_SEPARATOR . "D:/Nitro-Tech-Asia/web-php-3/util"
    );

    //nhúng controller
    require_once($controller."Controller.php");

    //Gọi action
    $controllerName = $controller."Controller";
    $actionName = $action."Action";

    require_once("layout.php");
    

