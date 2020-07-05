<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Accompanying</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
	<form action="Accompany-form.php" method="post">
    <div class="container-accompany">
        <h1> <span>HAMAREY BACHCHEY</span></br>
            STUDENT ACCOMPANYING FORM</h1>
        <h2>Student Information</h2>
        <div class="student-info">
            <div class="student-id">
                ID : <input type="text" class="student-id" name="student-id" style="margin-left: 30px;">
            </div>
            <div class="student-name">
                Name : <input type="text" class="student-name" name="student-name" style="margin-left: 10px;">
            </div>
            <div class="student-class">
                Class : <input type="text" class="student-class" name="student-class">
            </div>
        </div>
        <h2>Accompanying Guardian Information</h2>
        <div class="accompanying-guardian-info">
            <div class="accompanying-guardian-id">
                ID : <input type="text" class="accomapanying-guardian-id" name="accomapanying-guardian-id"
                    style="margin-left: 45px;">
            </div>
            <div class="accompanying-guardian-name">
                Name : <input type="text" class="accomapanying-guardian-name" name="accomapanying-guardian-name"
                    style="margin-left: 25px;">
            </div>
            <div class="accompanying-guardian-pregnant" style="margin-top: 9px;">
                Pregnant :
                Yes <input type="checkbox" name="accompanying-guardian-pregnant-yes"
                    class="accompanying-guardian-pregnant-yes">
                No <input type="checkbox" name="accompanying-guardian-pregnant-no"
                    class="accompanying-guardian-pregnant-no">
            </div>
            <div class="reason-parent-absence">
                Reason for Parents Absence : <textarea name="reason-parent-absence" class="reason-parent-absence"
                    cols="30" rows="5"></textarea>
            </div>
        </div>
        <input type="submit" value="submit" class="button pulse" style="margin-left: 80%; margin-top: 4px;">
    
	
<?php  // creating a database connection 

	if (!empty($_POST["student-id"])){

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
		 $student_id=$_POST["student-id"];
		 $guardian_id=$_POST["accomapanying-guardian-id"];
		 $guardian_name=$_POST["accomapanying-guardian-name"];
		 $preganent='Yes';
		 if (isset($_POST['accompanying-guardian-pregnant-no'])){
			 $preganent='No';
		 }
		 
		 $Target_ID = $_POST["empno"] ;
		 $q=" insert into accompany_form (stdid,guardian_id,guardian_name,pregnancy_status) values ('".$student_id."','".$guardian_id."','".$guardian_name."','".$preganent."')";
		 $query_id = oci_parse($con, $q); 		
		 $r = oci_execute($query_id); 
		 if ($r){
		 echo "record inserted</br>";
		 }
		 else{
			 echo "record not inserted</br>";
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
 document.getElementById("Accompany-form").reset();
}
</script>
</body>

</html>