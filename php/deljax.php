<?php
	include 'config.php';
	if($_REQUEST['deleted']){	
		$id = mysqli_real_escape_string($db,$_POST['deleted']);
		$qty = mysqli_real_escape_string($db,$_POST['qty']);
		$query = mysqli_query($db,"SELECT * FROM tbl_salesdetails WHERE id='$id'");
		$row = mysqli_fetch_array($query,MYSQLI_ASSOC);
		// $qty1 = intval($row['quantity']);
		$prod = $row['prod_id'];
		// $query2 = mysqli_query($db,"SELECT * FROM tbl_products WHERE prod_id='$prod'");
		// $rows = mysqli_fetch_array($query2,MYSQLI_ASSOC);
		// $qty2 = intval($rows['quantity']);
		// $qty3 = $qty2 + $qty1;
		$sql2 = mysqli_query($db,"UPDATE tbl_products SET quantity=quantity+$qty WHERE prod_id='$prod'");
			if (!$sql2) {
				return false;
			}else{
				$sql = mysqli_query($db,"DELETE FROM tbl_salesdetails WHERE id='$id'");
				if (!$sql) {
					return false;
				}else{
					return true;
				}
			}
	}else if($_REQUEST['updated'])	{
		$price = mysqli_real_escape_string($db,$_POST['updated']);
		$id = mysqli_real_escape_string($db,$_POST['id']);	
		$qty = mysqli_real_escape_string($db,$_POST['qty']);		
		$total = intval($qty)*floatval($price);
		$sql = mysqli_query($db,"UPDATE tbl_salesdetails SET price='$price', amount='$total' WHERE id='$id'");
		if (!$sql) {
			return false;
		}else{
			return true;
		}
	}
?>