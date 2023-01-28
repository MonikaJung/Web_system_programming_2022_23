<?php
	
	include "db_connection.php";
	mysqli_report(MYSQLI_REPORT_STRICT);

	$polaczenie = $conn;
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$option = 0;
		$name =  "";
		$surname = "";
		$sorting = False;
		$sort_option = '';
		$sort_op = '';
		
		if (isset($_POST['name_f']) && isset($_POST['surname_f']) && $_POST['name_f']!='' && $_POST['surname_f']!='' ){
			$option = 1;
			$name = $_POST['name_f'];
			$surname = $_POST['surname_f'];
		}
		else if (isset($_POST['name_f']) && $_POST['name_f']!=''){
			$option = 2;
			$name = $_POST['name_f'];
		}
		else if (isset($_POST['surname_f']) && $_POST['surname_f']!=''){
			$option = 3;
			$surname = $_POST['surname_f'];
		}
		
		if (isset($_POST['sort']) && $_POST['sort'] != ''){
			$sorting = True;
			$sort_option = " order by " . $_POST['sort'];
			$sort_op = $_POST['sort'];
		}
		
		$name = htmlentities($name, ENT_QUOTES, "UTF-8");
		$surname = htmlentities($surname, ENT_QUOTES, "UTF-8");
	
		$sql = '';
		
		if ($option == 0){
			$comment = "Results for no filter:";
			if ($sorting){
				$sql = sprintf("SELECT email, name, surname FROM users". $sort_option);
				$comment = "Results for no filter (sort by ".$sort_op."):";
			}
			else {
				$sql = sprintf("SELECT email, name, surname FROM users");
			}

		}
		else if ($option == 1){
			$comment = "Results for name '" . $name . "' and surname '" . $surname . "':";
			if ($sorting){
				$sql = sprintf("SELECT email, name, surname FROM users WHERE name='%s' AND surname='%s'". $sort_option,
							mysqli_real_escape_string($polaczenie,$name),
							mysqli_real_escape_string($polaczenie,$surname));
				$comment = "Results for name '" . $name . "' and surname '" . $surname . "' (sort by ".$sort_op."):";
			}
			else {
				$sql = sprintf("SELECT email, name, surname FROM users WHERE name='%s' AND surname='%s'",
							mysqli_real_escape_string($polaczenie,$name),
							mysqli_real_escape_string($polaczenie,$surname));
			}
		}
		else if ($option == 2){
			$comment = "Results for name '" . $name . "':";
			if ($sorting){
				$sql = sprintf("SELECT email, name, surname FROM users WHERE name='%s'". $sort_option,
							mysqli_real_escape_string($polaczenie,$name));
				$comment = "Results for name '" . $name . "' (sort by ".$sort_op."):";
			}
			else {
				$sql = sprintf("SELECT email, name, surname FROM users WHERE name='%s'",
							mysqli_real_escape_string($polaczenie,$name));
			}
		}
		else{
			$comment = "Results for surname '" . $surname . "':";
			if ($sorting){
				$sql = sprintf("SELECT email, name, surname FROM users WHERE surname='%s'". $sort_option,
							mysqli_real_escape_string($polaczenie,$surname));
				$comment = "Results for surname '" . $surname . "' (sort by ".$sort_op."):";
			}
			else {
				$sql = sprintf("SELECT email, name, surname FROM users WHERE surname='%s'",
							mysqli_real_escape_string($polaczenie,$surname));
			}
		}		
	
		if ($rezultat = $polaczenie->query($sql))
		{
			echo $comment;
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{							
				echo "<table border='1'><tr><th>Email</th><th>Name</th><th>Surname</th></tr>";
				
				$i = 0;
				
				while($i < $ilu_userow)
				{
					$i = $i + 1;
					$wiersz = $rezultat->fetch_row();
					printf("<tr>
							<td>%s</td>
							<td>%s</td>
							<td>%s</td>
							</tr>", $wiersz[0], $wiersz[1], $wiersz[2]);
				}
				print("</table>");
				
				unset($_SESSION['blad_tabeli']);
				$rezultat->free_result();
				
			} else {
				
				$_SESSION['blad_tabeli'] = '<span style="color:red">No users in database!</span>';
			}
		}
		
		$polaczenie->close();
	}

?>