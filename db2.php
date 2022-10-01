<?php include "connect.php" ?>
<html><head><meta charset="utf-8"></head>
<body>
<form>
<input type="text" name="keyword">
<input type="submit" value="ค้นหา">
</form>
<div style="display:flex">
<?php
$stmt = $pdo->prepare("SELECT * FROM member WHERE name LIKE ?");
if (!empty($_GET)) 
$value = '%' . $_GET["keyword"] . '%'; 
$stmt->bindParam(1, $value); 
$stmt->execute(); 
while ($row = $stmt->fetch()) {
    ?>
<img src="member_photo/<?=$row["username"]?>.jpg" height = 100px>
ชื่อสมาชิก: <?=$row ["name"]?><br>
ที่อยู่: <?=$row ["address"]?><br>
อีเมล: <?=$row ["email"]?><br>

<hr>
<?php } ?>
</body></html>