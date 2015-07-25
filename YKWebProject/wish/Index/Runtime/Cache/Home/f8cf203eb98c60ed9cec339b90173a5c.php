<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>µÇÂ½</title>
</head>

<body bgcolor="#333366">

<div class="form" id="formID" align="center">
<form id="form1" name="form1" method='post' action="<?php echo U('handle');?>">
<p><input type="text" value="abc" name='username' id='username'/> </p>
 <p><input type="text" value = "abcd" name='content' id='content'/></p>
  <p><input type="submit" value = "abcc" /></p>
</form>
</div>

<div align='center'>
	<?php if(is_array($wish)): foreach($wish as $key=>$v): ?><p> 
			<label><?php echo ($v["name"]); ?></label>
			<label><?php echo ($v["content"]); ?></label>
			<label><?php echo (date('y-m-d H',$v["time"])); ?></label>
		</p><?php endforeach; endif; ?>
</div>

</body>
</html>