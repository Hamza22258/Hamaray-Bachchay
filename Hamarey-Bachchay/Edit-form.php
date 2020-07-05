<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Student Edit</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<form action="Edit-form.php" method="post">
	<div class="container">
<h1> <span>HAMAREY BACHCHEY</span></br>
			STUDENT Edit FORM</h1>

		 <div class="student-search">
            Search <input type="text" class="student-search" name="student-search">
            <select name="student-search-method" class="student-search-method">
                <option value="Name">Name</option>
                <option value="Id">Id</option>
            </select>
            <input type="submit" value="Search" name="search" class="button pulse" style="margin-left: 4%;">
        </div>	
		</br>
<?php  // creating a database connection 


		$db_sid = 
	   "(DESCRIPTION =
		(ADDRESS = (PROTOCOL = TCP)(HOST = DESKTOP-S8O356N)(PORT = 1521))
		(CONNECT_DATA =
		  (SERVER = DEDICATED)
		  (SERVICE_NAME = hamza)
		)
	  )";            // Your oracle SID, can be found in tnsnames.ora  ((oraclebase)\app\Your_username\product\11.2.0\dbhome_1\NETWORK\ADMIN) 
	  
	   $db_user = "scott";   // Oracle username e.g "scott"
	   $db_pass = "ochika123";    // Password for user e.g "1234"
	   $con = oci_connect($db_user,$db_pass,$db_sid);
		$stdid;$name;$age;$gender;$class;
	   if($con) 
		  { 
	  //echo "</br>Oracle Connection Successful.</br>"; 
	  } 
	   else 
		  { die('Could not connect to Oracle: '); } 
	   if (!empty($_POST["student-search"]) && isset($_POST["search"])){
		   if (isset($_POST["student-search"])){
			 $student_search=$_POST["student-search"];
			 $student_search=strtolower($student_search);
			 if ($_POST["student-search-method"]=="Name"){
			 $query="select * from student where name='".$student_search."'";
			 $query_id = oci_parse($con, $query); 		
			 $r = oci_execute($query_id); 
			 $flag=0;
			 if ($r){
				while($row = oci_fetch_array($query_id)){
					$flag=1;
					   $stdid=$row[0];
					   $name=$row[1];
					   $age=$row[8];
					   $gender=$row[5];
					   $class=$row[2];
					   break;
					   }
				if ($flag==0){
					echo "</br> NO RECORD FOUND </br>";
				}
			 }
			 else{
				  $e = oci_error($query_id);  
				  echo $e['message']."</br>";
			 }
			 }
			 else{
			 $query="select * from student where stdid='".$student_search."'";
			 $query_id = oci_parse($con, $query); 		
			 $r = oci_execute($query_id); 
			  $flag=0;
			 if ($r){
				while($row = oci_fetch_array($query_id)){
					  $flag=1; 
					  $stdid=$row[0];
					  $name=$row[1];
					  $age=$row[8];
					  $gender=$row[5];
					  $class=$row[2];
					  break;
					   }
				if ($flag==0){
					echo "</br> NO RECORD FOUND </br>";
				}
			 }
			 else{
				  $e = oci_error($query_id);  
				  echo $e['message']."</br>";
			 }
			 }
		 }
	   }
?>
		<h2>Students Information:</h2>
		<div class="student-info">
			<div class="student-name">
				Name : <input  class="student-name" type="text" name="student-name" style="margin-left:40px;" value="<?PHP echo $name; ?>"/>
			</div>
			<div class="student-age">
				Age : <input class="student-dob" type="text" name="student-dob" style="margin-left:50px;" value="<?PHP echo $age; ?>" />
			</div>
			<div class="student-gender">
				Gender : <input name="student-gender" class="student-gender" style="margin-left:20px;" value="<?PHP echo $gender; ?>">
			</div>
			<div class="student-class">
				Class : <input class="student-class" type="text" name="student-class" placeholder="1 to 10" style="margin-left:30px;" value="<?PHP echo $class; ?>"/>
			</div>
			<input class="button pulse" class="myinput" name="update" type="submit" value="Update the Record" style="margin-left:30%; margin-top:15px;"/>
			<input class="button pulse" class="myinput" name="stdid" value="<?PHP echo $stdid; ?>" style="display:none;"/>
		</div>
<?php  // creating a database connection 


		$db_sid = 
	   "(DESCRIPTION =
		(ADDRESS = (PROTOCOL = TCP)(HOST = DESKTOP-S8O356N)(PORT = 1521))
		(CONNECT_DATA =
		  (SERVER = DEDICATED)
		  (SERVICE_NAME = hamza)
		)
	  )";            // Your oracle SID, can be found in tnsnames.ora  ((oraclebase)\app\Your_username\product\11.2.0\dbhome_1\NETWORK\ADMIN) 
	  
	   $db_user = "scott";   // Oracle username e.g "scott"
	   $db_pass = "ochika123";    // Password for user e.g "1234"
	   $con = oci_connect($db_user,$db_pass,$db_sid);
	   if($con) 
		  { 
	  //echo "</br>Oracle Connection Successful.</br>"; 
	  } 
	   else 
		  { die('Could not connect to Oracle: '); } 
	   if ( isset($_POST["update"])){
		$student_name=$_POST["student-name"];
		$student_name= strtolower($student_name);
		$student_gender=$_POST["student-gender"];
		$class_id=$_POST["student-class"];
		$student_age=$_POST["student-age"];
		$stdid=$_POST["stdid"];
		$q="update student set name='".$student_name."',age='".$student_age."', classid='".$class_id."', gender='".$student_gender."'  where stdid='".$stdid."'";
		$query_id = oci_parse($con, $q); 		
		$r = oci_execute($query_id); 
		if ($r){
			echo "</br> RECORD UPDATED </br>"; 
		}
		else{
			echo "</br> RECORD NOT UPDATED </br>"; 
			$e = oci_error($query_id);  
			echo $e['message']."</br>";
		}
	   }
?>
		</div>
</form>

</body>
	<script>
function submit() {
  /*Put all the data posting code here*/
 document.getElementById("Edit-form").reset();
}
</script>
</html>