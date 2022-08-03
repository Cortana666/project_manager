<?php
    require_once 'config.php';

    if (!empty($_POST)) {
        if (empty($_POST['name']) || empty($_POST['domain']) || empty($_POST['root'])) {
            echo 'error';
            exit;
        }

        $config_content = 'server {
    listen       80;
    server_name  '.$_POST['domain'].';

    charset utf-8;

    root   '.$_POST['root'].';

    location / {
        index  index.php;
    }

    error_page  404              /404.html;

    error_page   500 502 503 504  /50x.html;
    location = /50x.html {
        root   html;
    }

    location ~ \.php$ {
        fastcgi_pass   127.0.0.1:9000;
        fastcgi_index  index.php;
        fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;
        include        fastcgi_params;
    }
}';

        file_put_contents($config_dir.$_POST['name'].'.conf', $config_content);

        header('Location:index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>项目列表</title>
</head>
<body>
    <div>
        <a href="index.php">返回</a>
    </div>
    <div>
        <form action="add.php" method="POST">
            名称：<input type="text" name="name"><br/>
            域名：<input type="text" name="domain"><br/>
            路径：<input type="text" name="root"><br/>
            <input type="submit" value="添加">
        </form>
    </div>
</body>
</html>