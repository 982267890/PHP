<?php
header('content-type:text/html;charset=utf-8');

//引入表单验证函数库
require 'check_form.lib.php';

//假设PHP程序收到了用户注册表单
//演示正确的输入isset($_POST['pass']) ? $_POST['pass'] : ''
try{
		$flag=0;
		isset ($_POST['username'])?$_POST['username']:$flag=1 ;
		isset ($_POST['gender'])?$_POST['gender']:$flag=1;
		isset($_POST['email'])?$_POST['email']:$flag=1;
		isset($_POST['phone'])?$_POST['phone']:$flag=1;
		isset ($_POST['qq'])?$_POST['qq']:$flag=1;
		isset($_POST['url'])?$_POST['url']:$flag=1;
		isset($_POST['jiaban'])?$_POST['jiaban']:$flag=1;
		isset($_POST['yundong'])?$_POST['yundong']:$flag=1;
		isset($_POST['skill'])?$_POST['skill']:$flag=1;
		isset($_POST['city'])?$_POST['city']:$flag=1;
		if($flag==1){
			throw new Exception();
		}
		if(($_POST['skill'])=="未选择" or($_POST['city'])=="未选择" ){
			throw new Exception();
		}
}catch(Exception $e){
	echo "信息填写不完整";
	echo '<a href="login.php">返回</a>';
	die();
}

$data = array(
	'username' => $_POST['username'],
	'email' => $_POST['email'],
	'qq' => $_POST['qq'],
	'url' => $_POST['url'],
	'phone'=>$_POST['phone'],
);
//演示错误的输入
// $data = array(
// 	'username' => '1',
// 	'password' => '1',
// 	'email' => 'xiaomingcom',
// );
//为每个字段定义不同的验证函数
$validate = array(
	'username' => 'checkUsername',
	'email' => 'checkEmail',
	'qq' => 'checkQQ',
	'phone'=>'checkPhone',
	'url' => 'checkURL',
);

//$error数组保存验证失败时的错误信息
$error = array();

//循环验证每个字段，保存错误信息
foreach($validate as $k=>$v){
	//运用可变函数，实现不同字段调用不同函数
	$result = $v($data[$k]);
	if($result !== true){
		$error[] = $result;
	}
}
//如果$error数组为空，说明没有错误
if(empty($error)){
	require 'mysql.php';
	die('表单验证成功');
}

//运行到此处说明表单验证失败

//加载HTML模板文件
define('APP','itcast');
require 'register_error_html.php';