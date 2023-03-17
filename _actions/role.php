<?php

include('../vendor/autoload.php');
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\Auth;
use Helpers\HTTP;

$table = new UsersTable(new MySQL());
$auth = Auth::check();
$id = $_GET['id'];
$role = $_GET['role'];
$table->changeRole($id, $role);

HTTP::redirect('/admin.php');