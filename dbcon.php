<?php

$server = "localhost:3307";
$user = "root";
$password = "";
$db = "fsdproject";

$con = mysqli_connect($server,$user,$password,$db);

if($con){
	?>
	<script>
		alert("Connection Successful");
	</script>

	<?php
}else{

	?>
	<script>
		alert("No Connection");
	</script>

	<?php

}


?>