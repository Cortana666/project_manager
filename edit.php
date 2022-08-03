<?php
    require_once 'config.php';

    if (!empty($_GET)) {
        if (empty($_GET['name'])) {
            echo 'error';
            exit;
        }

        $content = file_get_contents($config_dir.$_GET['name']);
    } else if (!empty($_POST)) {
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
        <form action="edit.php" method="POST">
            名称：<input type="text" name="name" value="<?php echo str_replace('.conf', '', $_GET['name']); ?>"><br/>
            内容：<textarea name="content" cols="180" rows="60"><?php echo $content; ?></textarea><br/>
            <input type="submit" value="修改">
        </form>
    </div>
</body>
</html>