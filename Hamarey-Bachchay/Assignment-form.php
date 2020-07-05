<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Class Assignment</title>
</head>

<body>
	<form action="Assignment-form.php" method="post">
    <div class="container-assignment">
        <h1> <span>HAMAREY BACHCHEY</span></br>
            CLASS ASSIGNMENT FORM</h1>
        <div class="assignment-student-id">
            Student ID : <input type="text" class="assignment-student-id" name="assignment-student-id"
                style="margin-left: 50px;">
        </div>
		<div class="assignment-current-class">
            Current class : <input type="text" class="assignment-current-class" name="assignment-current-class">
        </div>
        <div class="assignment-new-class">
            New class : <input type="text" class="assignment-new-class" name="assignment-new-class"
                style="margin-left: 40px;">
        </div>
        <div class="assignment-reason-for-change">
            Reason for change : <textarea name="" id="" cols="30" rows="7"
                class="assignment-reason-for-change"></textarea>
        </div>
        <div class="assignment-approved-by">
            Approved by : <input type="text" class="assignment-approved-by" name="assignment-approved-by"
                style="margin-left: 20px;">
        </div>
        <input type="submit" value="submit" class="button pulse" style="margin-left: 80%; margin-top: 4px;">
    
		
<?php  // creating a database connection 

	if (!empty($_POST["assignment-student-id"])){
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
		  { echo "</br>Oracle Connection Successful.</br>"; } 
	   else 
		  { die('Could not connect to Oracle: '); } 
		 // Delete Data from Employee Table
		 $student_id=$_POST["assignment-student-id"];
		 $current_class=$_POST["assignment-current-class"];
		 $new_class=$_POST["assignment-new-class"];
		 $approved_by=$_POST["assignment-approved-by"];
		$q= "INSERT INTO STUDENT_HISTORY 
    STUDENT_HISTORY(STDID,OLD_CLASS_NO,NEW_CLASS_NO,APPROVED_BY) VALUES('".$student_id."','".$current_class."','".$new_class."','".$approved_by."')";
		 $query_id = oci_parse($con, $q); 		
		 $r = oci_execute($query_id); 
		 if ($r){
		 echo " Success</br>";
		 }
		 else{
		 echo " Failed</br>";
		  $e = oci_error($query_id);  
			 echo $e['message']."</br>";
		 }
		 $q= "UPDATE STUDENT
		SET classid='".$new_class."' where stdid='".$student_id."'";
		 $query_id = oci_parse($con, $q); 		
		 $r = oci_execute($query_id); 
		 if ($r){
		 echo " Success</br>";
		 }
		 else{
		 echo " Failed</br>";
		  $e = oci_error($query_id);  
			 echo $e['message']."</br>";
		 }
		 
	}
?>
</div>
	</form>
	<script>
function submit() {
  /*Put all the data posting code here*/
 document.getElementById("Assignment-form").reset();
}
</script>
</body>

</html>