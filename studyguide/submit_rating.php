<?php

include("includes/connect.php");
session_start();

$connect = new PDO("mysql:host=localhost;dbname=student_guide", "root", "");

$book = $_SESSION['Book_ID'];
if(isset($_POST["rating_data"]))
{
	// $servername = 'localhost';
	// $username = 'root';
	// $password = '';
	// $dbname = 'student_guide';

	// $conn=new mysqli($servername,$username,$password,$dbname);

	$currentuserid = $_SESSION['currentuserid'];
	// $_SESSION['Book_ID'] = $_POST["book_id"];

	$user_name = $_SESSION['currentusername'];

	// $user_name =$_POST["user_name"];
	
	$rating_data = $_POST["rating_data"];
	$user_review = $_POST["user_review"];
	$datetime = time();

	// $day = date("l");
	// $date = date("Y/m/d");
	// $time = date("h:i:sa");
	

	$query = "INSERT INTO review_table (Book_ID,userid,user_name, user_rating, user_review, datetime) VALUES ('$book','$currentuserid','$user_name', '$rating_data', '$user_review' , '$datetime')";

	$insert=mysqli_query($conn,$query);

	if($insert){
		echo "Your Review & Rating Successfully Submitted";
	}
	else{
		echo $currentuserid." ".$user_name." ".$Book_ID;
	}

}

if(isset($_POST["action"]))
{
	$average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_user_rating = 0;
	$review_content = array();


	$query = "
	SELECT * FROM review_table where Book_ID ='$book'
	ORDER BY review_id DESC
	";

	$result = $connect->query($query, PDO::FETCH_ASSOC);

	foreach($result as $row)
	{
		$review_content[] = array(
			'user_name'		=>	$row["user_name"],
			'user_review'	=>	$row["user_review"],
			'rating'		=>	$row["user_rating"],
			'datetime'		=>	date('l jS, F Y h:i:s A', $row["datetime"])
		);

		if($row["user_rating"] == '5')
		{
			$five_star_review++;
		}

		if($row["user_rating"] == '4')
		{
			$four_star_review++;
		}

		if($row["user_rating"] == '3')
		{
			$three_star_review++;
		}

		if($row["user_rating"] == '2')
		{
			$two_star_review++;
		}

		if($row["user_rating"] == '1')
		{
			$one_star_review++;
		}

		$total_review++;

		$total_user_rating = $total_user_rating + $row["user_rating"];

	}

	$average_rating = $total_user_rating / $total_review;

	$output = array(
		'average_rating'	=>	number_format($average_rating, 1),
		'total_review'		=>	$total_review,
		'five_star_review'	=>	$five_star_review,
		'four_star_review'	=>	$four_star_review,
		'three_star_review'	=>	$three_star_review,
		'two_star_review'	=>	$two_star_review,
		'one_star_review'	=>	$one_star_review,
		'review_data'		=>	$review_content
	);

	echo json_encode($output);

}



?>