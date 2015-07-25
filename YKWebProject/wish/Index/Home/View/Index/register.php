<?php require_once('Connections/conn.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "myform")) {
  $insertSQL = sprintf("INSERT INTO users (user_name, user_pwd, user_email) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['user_name'], "text"),
                       GetSQLValueString($_POST['user_password'], "text"),
                       GetSQLValueString($_POST['user_email'], "text"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());

  $insertGoTo = "/xuexikaifa/index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_conn, $conn);
$query_Recordset1 = "SELECT * FROM users";
$Recordset1 = mysql_query($query_Recordset1, $conn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>WEB前端攻略-注册页面</title>
<link rel="shortcut icon" href="favicon.ico">
<link rel="Bookmark" href="favicon.ico">
<link rel="stylesheet" type="text/css" href="style/style.css">
<script src="js/jquery-1.11.3.min.js"></script>
</head>

<body>
<div class="login-Page">
  <h1><img src="images/logo.jpg" title="WEB前端攻略" width="100"></h1>
  <div class="login-main-Page">
    <form method="POST" name="myform" id="myform" action="<?php echo $editFormAction; ?>">
      <h2>注册WEB前端攻略账户</h2>
      <div class="loginList">
        <div class="loginListRow">
          <input type="text" class="inputText input_error" placeholder="账号" name="user_name">
        </div>
        <div class="loginListRow">
          <input type="password" class="inputText" placeholder="设置密码" name="user_password">
        </div>
        <div class="loginListRow">
          <input type="password" class="inputText" placeholder="确认密码" name="user_password2">
        </div>
      	<div class="loginListRow">
          <input type="text" class="inputText" placeholder="邮箱" name="user_email">
        </div>
        <input type="button" class="btn" value="立即注册" id="register_btn">
      </div>
      <p class="c_20ABFC">已有WEB前端账号?&nbsp;&nbsp;<a href='javascript:;' class="c_20ABFC">立即登陆</a></p>
      <input type="hidden" name="MM_insert" value="myform">
    </form>
  </div>
  <div class="copy">© 2014 tuweia.cn 沪ICP备13031870号-1</div>
</div>
<script>
$(function(){ 
	$("#register_btn").click(function(){
		if($("input[name='user_name']").val() == ""){
			$("input[name='user_name']").focus();
			alert("账号不能为空");
		}else if($("input[name='user_password']").val() == ""){
			$("input[name='user_password']").focus();
			alert("设置密码不能为空");
		}else if($("input[name='user_password2']").val() == ""){ 
			$("input[name='user_password2']").focus();
			alert("确认密码不能为空");
		}else if($("input[name='user_password']").val() == $("input[name='user_password2']").val()){ 
			alert("两次密码输入不一致");
		}else{
		 	$("#myform").submit();
		}
	})
})
</script>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
