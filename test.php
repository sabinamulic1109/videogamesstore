
<!DOCTYPE html>
<html>
<head>
<title>PHP: Get Values of Multiple Checked Checkboxes</title>
</head>
<body>
<div class="container">
<div class="main">
<h2>PHP: Get Values of Multiple Checked Checkboxes</h2>
<form action="test2.php" method="post">
<label class="heading">Select Your Technical Exposure:</label>
<input type="checkbox" name="check_list[]" value="C/C++"><label>C/C++</label>
<input type="checkbox" name="check_list[]" value="Java"><label>Java</label>
<input type="checkbox" name="check_list[]" value="PHP"><label>PHP</label>
<input type="checkbox" name="check_list[]" value="HTML/CSS"><label>HTML/CSS</label>
<input type="checkbox" name="check_list[]" value="UNIX/LINUX"><label>UNIX/LINUX</label>
<input type="submit" name="submit" Value="Submit"/>
<!----- Including PHP Script ----->
<?php include 'test2.php';?>
</form>
</div>
</div>
</body>
</html>