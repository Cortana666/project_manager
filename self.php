<?php
    require_once 'config.php';

    if (!empty($_POST)) {
        if (empty($_POST['name']) || empty($_POST['content'])) {
            echo 'error';
        }

        file_put_contents($config_dir.$_POST['name'].'.conf', $_POST['content']);

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
        <form action="self.php" method="POST">
            名称：<input type="text" name="name"><br/>
            内容：<textarea name="content" cols="30" rows="10"></textarea><br/>
            <input type="submit" value="添加">
        </form>
    </div>
</body>
</html>