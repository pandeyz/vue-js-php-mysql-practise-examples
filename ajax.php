<?php
$conn = mysqli_connect('localhost', 'root', '');
mysqli_select_db($conn, 'vue');

$function = $_REQUEST['function'];

if( $function == 'addTask' )
{
	$task = $_REQUEST['task'];

	$addTask = "INSERT INTO todo (task) values ('". $task ."')";
	if( mysqli_query($conn, $addTask) )
	{
		echo 'true';
	}
	else
	{
		echo 'false';
	}
}
else if( $function == 'removeTask' )
{
	$task = $_REQUEST['task'];

	$removeTask = "DELETE FROM todo WHERE task = '". $task . "'";
	if( mysqli_query($conn, $removeTask) )
	{
		echo 'true';
	}
	else
	{
		echo 'false';
	}
}
else if( $function == 'getTasks' )
{
	$getTasks = "SELECT * FROM todo";
	$tasks = mysqli_query($conn, $getTasks);

	$response = array();

	if( mysqli_num_rows( $tasks ) > 0 )
	{
		while( $row = mysqli_fetch_assoc( $tasks ) )
		{
			array_push($response, $row);
		}
	}
	
	echo json_encode( $response );
}

?>