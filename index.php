<?php
    $project = [];
    $config_dir = '/etc/nginx/conf.d/';
    // $config_dir = '/usr/local/etc/nginx/servers/';
    $config = scandir($config_dir);
    foreach ($config as $config_name) {
        if (in_array($config_name, ['.', '..'])) {
            continue;
        }

        $config_content = file_get_contents($config_dir.$config_name);
        preg_match('/server_name +([a-zA-Z0-9._\/]+);/', $config_content, $domain);
        preg_match('/root +([a-zA-Z0-9._\/]+);/', $config_content, $root);

        $project[] = [
            'name' => $config_name,
            'domain' => $domain[1],
            'root' => $root[1]
        ];
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
        <a href="add.php">添加模板项目</a>
        <a href="add.php">添加自定义项目</a>
    </div>
    <div>
        <table border="1">
            <tr>
                <th>名称</th>
                <th>域名</th>
                <th>路径</th>
                <th>操作</th>
            </tr>
            <?php foreach ($project as $value) { ?>
            <tr>
                <td><?php echo $value['name']; ?></td>
                <td><?php echo $value['domain']; ?></td>
                <td><?php echo $value['root']; ?></td>
                <td><a href="delete.php?name=<?php echo $value['name']; ?>">删除</a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>