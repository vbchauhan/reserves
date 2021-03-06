<!-- 
Created by: Siddharth Choksi in May 2010
This file inserts Instructor Information and Book Request #1 into the database once everything has been validated. (Parent File: book_request.php)
-->
<?php  
$professor = 0;
$course1=0;
$request1 = 0;

// Check if Instructor Information already exists in the database
$query = "SELECT p_email FROM professor WHERE p_email = '$p_email'";
$result = @mysqli_query($dbc, $query);
$num = @mysqli_num_rows($result);

// Instructor Record already exists 
if($num == '1')
{
$query = "UPDATE professor SET p_last_name= '$p_last_name', p_first_name = '$p_first_name', p_phone_number = '$p_phone_number', p_university = '$p_university' WHERE p_email = '$p_email' LIMIT 1";
$result = @mysqli_query($dbc, $query);
$professor = 1;
}

// New Instructor Record to be inserted
else
{
$query = "INSERT into professor VALUES('$p_email','$p_last_name','$p_first_name','$p_university','$p_phone_number')";
$result = @mysqli_query($dbc, $query);
	if(mysqli_affected_rows($dbc) == 1) // Professor Record insertion successful
	{$professor = 1;}
}

// Check if Course Information already exists in the database
$query = "SELECT course_no, semester, semester_year FROM course WHERE course_no = '$course_no1' AND semester = '$semester1' AND  semester_year = '$semester_year1'";
$result = @mysqli_query($dbc, $query);
$num = @mysqli_num_rows($result);

if($num != 1)  // New Course Record
{
$query = "INSERT into course(course_no, course_title, semester, semester_year) VALUES('$course_no1', '$course_title1', '$semester1', '$semester_year1')";
$result = @mysqli_query($dbc, $query);
	if(mysqli_affected_rows($dbc) == 1) // Record insertion successful
	{$course1= 1;}
}
else{$course1=1;}

// Function to generate Book Request ID
function b_id()
{
$first = ceil(rand(100000, 999999)); 
$second = ceil(rand(0,100));
$b_id1 = $first+$second;
return $b_id1;
}

// Check if Book Request ID is unique
while($x1 != 1)
{
$b_id1 = b_id();
$query = "SELECT b_id FROM b_request WHERE b_id = '$b_id1'";
$result = @mysqli_query($dbc, $query);
$num = @mysqli_num_rows($result);
if($num != 1)
{$x1 = 1;}
}

// Retrieve Course Id
$query = "SELECT c_id FROM course WHERE course_no = '$course_no1' AND semester = '$semester1' AND  semester_year = '$semester_year1'";
$result = @mysqli_query($dbc, $query);
$row  = @mysqli_fetch_array($result, MYSQLI_NUM);
$c_id1 = $row[0];

// Check if Book Request already Exists 
$query = "SELECT b.b_id, p.p_email 
FROM b_request b, course c, professor p 
WHERE b.b_author = '$b_author1' AND b.b_title = '$b_title1' AND b.b_date_of_pub = '$b_pub_date1' AND b.c_id = '$c_id1' AND b.c_id = c.c_id AND b.p_email = '$p_email' AND b.p_email = p.p_email";
$result = @mysqli_query($dbc, $query);
$num = @mysqli_num_rows($result);
if($num == 1)
{$exists1 = 1;
$request1 = 1;

}

else
{
// Insert Book Request Details
$query = "INSERT into b_request(b_id, b_title, b_author, b_publisher, b_place_of_pub, b_date_of_pub, b_book_edition, b_isbn, b_supply_method, b_notes, b_call_number, b_loan_period, p_email, c_id, b_req_date) VALUES('$b_id1', '$b_title1', '$b_author1', '$b_publisher1', '$b_place_of_pub1', '$b_pub_date1', '$b_edition1', '$b_isbn1', '$b_supply_method1', '$b_notes1', '$b_call_no1', '$b_loan_period1', '$p_email', '$c_id1', '$date')";
$result = @mysqli_query($dbc, $query);

if(mysqli_affected_rows($dbc) == 1) // Record insertion successful
{$request1 = 1;}
}

?>
