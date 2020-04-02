<?php

//设定字符集
header('Content-Type:text/html;charset=utf-8');

//连接数据库，设置字符集，选择数据库
$conn = mysqli_connect('localhost', 'root', '12345qq') or die('数据库连接失败！');
mysqli_query($conn, 'set names utf8');
mysqli_query($conn, 'use `php`') or die('php数据库不存在！');



//判断是否有表单提交
if (!empty($_POST)) {

    //当有表单提交时，收集表单数据，保存到数据库中

    //显示接收到的表单数据
    var_dump($_POST);

    //指定需要接收的表单字段

    $fields = array('username', 'gender', 'email', 'phone', 'qq', 'url', 'city', 'skill', 'jiaban', 'yundong', 'description');
    //根据程序中定义好的表单字段收集$_POST数据
    foreach ($fields as $v) {
        //$save_data保存收集到的表单数据，不存在的字段填充空字符串
        
        $save_data[$v] = isset($_POST[$v]) ? $_POST[$v] : '';
    }

    //复选框处理
    $result = "";
    foreach ($_POST['yundong'] as $i) {
        $result .= $i;
    }
    $save_data['yundong'] = $result;
    $sql = "select * from `userinfo` where username=" ."\"". $save_data['username']."\"";
    echo $sql;
    //执行SQL语句，获取结果集
    $res = mysqli_query($conn, $sql);
    if (!$res) {
        $sql = "insert into `userinfo`(username , gender , email , phone,qq , url , city , skill , yundong , jiaban ,description )  values (";
        foreach ($save_data as $k => $v) {
            $sql .= "\"$v \"";
            if ($k != 'description') {
                $sql .= ",";
            }else{
                $sql.=")";
            }
        }
        echo $sql;
        //执行SQL语句
        $rst = mysqli_query($conn, $sql);
        die(mysqli_connect_error());
        echo $rst;
    }
    //定义员工数组，用以保存员工信息
    $emp_info = array();

    //遍历结果集，获取每位员工的详细数据
    while ($row = mysqli_fetch_assoc($res)) {
        $emp_info[] = $row;
    }
    //通过循环数组，自动拼接SQL语句，保存到数据库中
    $sql = 'update `userinfo` set ';
    foreach ($save_data as $k => $v) {
        $sql .= "$k='" . mysqli_real_escape_string($conn, $v) . "',"; //拼接每个字段的SQL语句，并对值进行SQL安全转义
    }
  
    $sql = preg_replace('#.$#i', '', $sql);
    echo "独的".$sql;
    $rst = mysqli_query($conn, $sql);

    //输出执行结果和调试信息
    echo $rst ? "保存成功：$sql" : "保存失败：$sql<br>" . mysqli_error($conn);
    die();
}

//执行到此处表示没有表单提交，程序将根据id查询用户信息并显示到表单里

//根据指定id查询用户信息
$sql = "select `username`,`gender`,`email`,`qq`,`url`,`city`,`skill`,`description` from `userinfo` where `username`=".$save_data['username'];
$rst = mysqli_query($conn, $sql);

if (!$rst) die(mysqli_error($conn));

//$data保存查询到的用户信息
$data = mysqli_fetch_assoc($rst);

//判断是否查询到数据
if (!$data) {
    die('没有找到ID为' . $id . '的用户信息！');
}

//将skill字段通过“,”分隔符转换为数组
$data['skill'] = explode(',', $data['skill']);

//显示查询出的数据
//var_dump($data);

//加载HTML模板文件
define('APP', 'itcast');
require 'profile_html.php';
