<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>用户登录</title>
<style>
body{background-color:#eee;margin:0;padding:0;}
.box{width:400px;margin:15px;padding:20px;border:1px solid #ccc;background-color:#fff;}
.box h1{font-size:20px;text-align:center;}
.profile-table{margin:0 auto;}
.profile-table th{font-weight:normal;text-align:right;}
.profile-table input[type="text"]{width:180px;border:1px solid #ccc;height:22px;padding-left:4px;}
.profile-table .button{background-color:#0099ff;border:1px solid #0099ff;color:#fff;width:80px;height:25px;margin:0 5px;cursor:pointer;}
.profile-table .td-btn{text-align:center;padding-top:10px;}
.profile-table th,.profile-table td{padding-bottom:10px;}
.profile-table td{font-size:14px;}
.profile-table .desc{width:250px;height:60px;border:1px solid #ccc;}
.profile-table .txttop{vertical-align:top;}
.profile-table select{border:1px solid #ccc;min-width:80px;height:25px;}
.profile-table .description{font-size:13px;width:250px;height:60px;border:1px solid #ccc;}
</style>
</head>
<body>
<div class="box" >
	<h1>编辑个人资料</h1>
	<form method="post" action="register.php">
	<table class="profile-table">
		<tr><th>昵称：</th><td><input type="text" name="username"  /></td></tr>
		<tr><th>性别：</th><td>
			<input type="radio" name="gender" value="男" id="male" <label for="male">男</label>
			<input type="radio" name="gender" value="女" id="female" <label for="female">女</label>
		</td></tr>
		<tr><th>邮箱：</th><td><input type="text" name="email" /></td></tr>
		<tr><th>QQ号：</th><td><input type="text" name="qq"  /></td></tr>
        <tr><th>手机号：</th><td><input type="text" name="phone"  /></td></tr>

        <tr><th>个人主页：</th><td><input type="text" name="url"  /></td></tr>
		<tr><th>所在城市：</th><td>
			<select name="city">
				<option value="未选择">未选择</option>
                <option value="北京">北京</option>
                <option value="上海">上海</option>
                <option value="广州">广州</option>
                <option value="其他">其他</option>
			</select>
		</td></tr>
		<tr><th>语言技能：</th><td>
        <select name="skill">
				<option value="未选择">未选择</option>
                <option value="HTML">HTML</option>
                <option value="JavaScript">JavaScript</option>
                <option value="PHP">PHP</option>
                <option value="C++">C++</option>
			</select>
        </td></tr>
        <tr><th>能否接受加班：</th><td>
            <input type="radio" name="jiaban" value="不能加" > 不能加 
            <input type="radio" name="jiaban" value="能加" >  能加
            <input type="radio" name="jiaban" value="一加更比六加强" checked="checked">  一加更比六加强
        </td></tr>
        <tr><th>对哪些运动感兴趣</th><td>
            <input type="checkbox" name="yundong[]" value="跑步" > 跑步 
            <input type="checkbox" name="yundong[]" value="打球" >  打球
            <input type="checkbox" name="yundong[]" value="健身" >  健身
        </td></tr>
        
		<tr><th class="txttop">自我介绍：</th><td><textarea class="description" name="description"></textarea></td></tr>
		<tr><td colspan="2" class="td-btn">
		<input type="submit" value="保存资料" class="button" />
		<input type="reset" value="重新填写" class="button" />
		</td></tr>
	</table>
	</form>
</div>
</body>
</html>