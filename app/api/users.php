<?php

//displays all records of users
$app->get('/api/users',function() {

	require_once('dbconnect.php');

	$query = "SELECT * FROM user ORDER BY user_id";
	$result = $mysqli->query($query);

	while ($row = $result->fetch_assoc()) {
		$data[] = $row;
	}

	if (isset($data)) {
		header('Content-Type: application/json');
		echo json_encode($data);
	}
});

//displays a single user
$app->get('/api/users/{id}', function($request){

	require_once('dbconnect.php');
	$id = $request->getAttribute('id');

	$query = "SELECT * FROM user WHERE user_id=$id";
	$result = $mysqli->query($query);

	$data[] = $result->fetch_assoc();
	header('Content-Type: application/json');
	echo json_encode($data);
});

//creates a new record of a user
$app->post('/api/users', function($request){

	require_once('dbconnect.php');

	$query = "INSERT INTO user (first_name, middle_name, last_name) VALUES (?,?,?)";
	$stmt = $mysqli->prepare($query);
	$stmt->bind_param("sss", $first_name, $middle_name, $last_name);

	$first_name = $request->getParsedBody()['first_name'];
	$middle_name = $request->getParsedBody()['middle_name'];
	$last_name = $request->getParsedBody()['last_name'];
	
	$stmt->execute();
});

//updates a record of a user
$app->put('/api/users/{id}', function($request) {

	require_once('dbconnect.php');
	$id = $request->getAttribute('id');

	$query = "UPDATE user SET first_name = ?, middle_name = ?, last_name = ? WHERE user.user_id = $id";
	$stmt = $mysqli->prepare($query);
	$stmt->bind_param("sss", $first_name, $middle_name, $last_name);

	$first_name = $request->getParsedBody()['first_name'];
	$middle_name = $request->getParsedBody()['middle_name'];
	$last_name = $request->getParsedBody()['last_name'];

	$stmt->execute();
});

//deletes a record from the database
$app->delete('/api/users/{id}', function($request) {

	require_once('dbconnect.php');
	$id = $request->getAttribute('id');

	$query = "DELETE FROM user WHERE user.user_id = $id";
	$result = $mysqli->query($query);
});

?>

