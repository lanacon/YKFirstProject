<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>shouye</title>
<style type="text/css">
#headerID {
	font-family: Cambria, Hoefler Text, Liberation Serif, Times, Times New Roman, serif;
}
body,td,th {
	color: #63C;
}
body {
	background-color: #0CC;
}
</style>
</head>

<body>
<div class="header" id="headerID">
  <p align="center"><strong><span id="headerID">
    <label><br>
      <br>
    登录管理系统</label>
  &nbsp;</span></strong></p>
  <p align="center">&nbsp;</p>
</div>
<div align="center"> </div>
<div class="div_login" id="div_login_id">
  <p>&nbsp;</p>
  <p align="center">
    <input name="radio_admin" type="radio" id="radio" title="后台" value="后台">
    <label for="radio_admin">登录后台</label>
    <input name="radio_admin" type="radio" id="radio" title="后台" value="后台">
    <label for="radio_admin">前台登录</label>
  </p>
  <p>&nbsp;</p>
</div>
<div class="div_main" id="div_main_id">
  <form id="form1" name="form1" method="post" action="/YKFirstProject/YKWebProject/wish/index.php/Home/Index/handle">
    <p>&nbsp;</p>
    <p align="center">
      用户名:	<input type="text" name="tf_username" id="tf_username_id" align="middle"><br/><br/><br/><br/>
      密码:&nbsp;&nbsp;&nbsp;<input type="text" name="tf_pwd" id="tf_pwd_id" align="middle">

    </p>

    <p align="center">
     <input type="submit" name="btn_login" id="btn_login_id" align="middle" text = "登录"><br/><br/><br/><br/>
    </p>
    <p>&nbsp;</p>
  </form>
</div>

</body>
</html>