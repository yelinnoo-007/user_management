<?php

    include('../vendor/autoload.php');

    use Libs\Database\MySQL;
    use Libs\Database\UsersTable;
    use Helpers\HTTP;   
    
    $data = [
        "name" => $_POST['name'] ?? 'unknow',
        "email" => $_POST['email'] ?? 'unknow',
        "phone" => $_POST['phone'] ?? 'unknow',
        "address" => $_POST['address'] ?? 'unknow',
        "password" => md5($_POST['password']) ,
        "role_id" => 1,
    ];

    $table = new UsersTable(new MySQL);
    if($table){
        $table->insert($data);
        HTTP::redirect('/index.php','registered=ture');
    } else {
        HTTP::redirect('/register.php','error=true');
    }

?>