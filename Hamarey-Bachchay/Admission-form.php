<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Student Admission</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
<form action="Admission-form.php" method="post">
	<div class="container">
		<h1> <span>HAMAREY BACHCHEY</span></br>
			STUDENT ADMISSION FORM</h1>
		<h2>Students Information:</h2>
		<div class="student-info">
			<div class="student-name">
				Name : <input  class="student-name" type="text" name="student-name" style="margin-left:87px;" />
			</div>
			<div class="student-dob">
				Date of Birth : <input class="student-dob" type="date" name="student-dob" style="margin-left:10px;" />
			</div>
			<div class="student-gender">
				Gender :
				<select name="student-gender" class="student-gender" style="margin-left:80px;">
					<option value="M" name="student-gender">M</option>
					<option value="F" name="student-gender">F</option>
				</select>
			</div>
			<div class="student-course">
				Course :
				<select name="student-course" class="student-course" style="margin-left:80px;">
					<option value="NULL" name="student-course">None</option>
					<option value="1" name="student-course">Math</option>
				</select>
			</div>
			<div class="student-class">
				Class : <input class="student-class" type="text" name="student-class" placeholder="1 to 10" style="margin-left:60px;" />
			</div>
		</div>
		<h2>Parents Information:</h2>
		<div class="parent-info">
			<div class="mother-info">
				<div class="mother-name">
					Mother Name : <input type="text" name="mother-name" class="mother-name" style="margin-left:30px;">
				</div>
				<div class="mother-contact">
					Mother Contact : <input type="text" class="mother-contact" name="mother-contact">
				</div>
				<div class="mother-cnic">
					Mother CNIC : <input type="text" class="mother-cnic" name="mother-cnic" style="margin-left:29px;">
				</div>
				<div class="mother-email">
					Mother Email : <input type="text" class="mother-email" name="mother-email"
						style="margin-left:20px;">
				</div>
				<div class="mother-address">
					Mother Address : <input type="text" class="mother-address" name="mother-address">
				</div>
			</div>
			<div class="father-info">
				<div class="father-name">
					Father Name : <input type="text" name="father-name" class="father-name" style="margin-left:28px;">
				</div>
				<div class="father-contact">
					Father Contact : <input type="text" class="father-contact" name="father-contact">
				</div>
				<div class="father-cnic">
					Father CNIC : <input type="text" class="father-cnic" name="father-cnic" style="margin-left:29px;">
				</div>
				<div class="father-email">
					Father Email : <input type="text" class="father-email" name="father-email"
						style="margin-left:20px;">
				</div>
				<div class="father-address">
					Father Address : <input type="text" class="father-address" name="father-address">
				</div>
			</div>
		</div>
		<h2>Guardian Information:</h2>
		<div class="guardian-info">

			<div class="guardian-name">
				Guardian Name : <input type="text" class="guardian-name" name="guardian-name" style="margin-left:29px;">
			</div>
			<div class="guardian-contact">
				Guardian Contact : <input type="text" class="guardian-contact" name="guardian-contact">
			</div>
			<div class="guardian-cnic">
				Guardian CNIC : <input type="text" class="guardian-cnic" name="guardian-cnic" style="margin-left:29px;">
			</div>
			<div class="guardian-relation">
				Guardian Relation: <input type="text" class="guardian-relation" name="guardian-relation">
			</div>
			<div class="guardian-gender">
				Guardian Gender :
				<select name="guardian-gender" class="guardian-gender" style="margin-left:18px;">
					<option value="M" name="guardian-gender">M</option>
					<option value="F" name="guardian-gender">F</option>
				</select>
			</div>
		</div>
		<h2>For Staff Only</h2>
		<div class="staff-only">
			<div class="fee-discount">
				Discount : <input type="text" class="fee-discount" name="fee-discount" style="margin-left:40px;">
			</div>
			<div class="fee-final-amount">
				Final Amount : <input type="text" class="fee-final-amount" name="fee-final-amount">
			</div>
			<div class="fee-valid-date">
				Valid Date : <input class="fee-valid-date" type="date" name="fee-valid-date" style="margin-left:20px;" />
			</div>
			<div class="fee-valid-date">
				Due Date : <input class="fee-due-date" type="date" name="fee-due-date" style="margin-left:40px;" />
			</div>
			<div class="fee-fully-paid" style="margin-top: 8px;">
				Fee Fully Paid :
				Yes <input type="checkbox" name="fee-fully-paid-yes" class="fee-fully-paid-yes">
				No <input type="checkbox" name="fee-fully-paid-no" class="fee-fully-paid-no">
			</div>
		</div>
		<input type="submit" value="submit" name="submitbutton" class="button pulse" style="margin-left: 80%;" />
	
	<?php  // creating a database connection 
	
	if ( !empty($_POST['student-name'])) {
			// Put variables and function here
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
		  { echo "</br> Oracle Connection Successful.</br>"; } 
	   else 
		  { die('Could not connect to Oracle: '); } 
		$student_name=$_POST["student-name"];
		$student_name= strtolower($student_name);
		$student_DOB = date('d-m-Y', strtotime($_POST['student-dob']));
		$student_gender=$_POST["student-gender"];
		$class_id=$_POST["student-class"];
		$course=$_POST["student-course"];
		
		// selecting math course
		$q="select courseid from courseoffering where coursename='Math'";
		$queryid=oci_parse($con, $q);
		$r=oci_execute($queryid);
		if ($r){
			while($row = oci_fetch_array($queryid)){
			   $course=$row[0];
			}
		}
		
		$section='A';
		if ($student_gender=='M'){
			$section='A';
		}
		else{
			$section='B';
		}
		$query1="INSERT INTO STUDENT(Name,classid,section,dateofbirth,admission,Gender,courseid) values('".$student_name."','".$class_id."','".$section."',TO_DATE('".$student_DOB."', 'dd/mm/yyyy')".",TO_DATE(sysdate,'dd/mm/yy'),'".$student_gender."','".$course."')";
		$query_id = oci_parse($con, $query1); 		
		$r = oci_execute($query_id); 
		if($r){
			echo "success </br>";
		}
		 else
		 {
			 echo "Record not inserted!</br>";
			 $e = oci_error($query_id);  
			 echo $e['message']."</br>";
		 }
		 $student_id=-1;
		 $query2="select * from student where DATEOFBIRTH=TO_DATE('".$student_DOB."', 'dd/mm/yyyy') AND Gender='".$student_gender."' AND NAME='".$student_name."'";
		$query_id2 = oci_parse($con, $query2); 		
		$r = oci_execute($query_id2); 
		if($r){
			echo "success</br>";
			while($row = oci_fetch_array($query_id2)){
			   $student_id=$row[0];
			}
		}
		 else
		 {
			 echo "Record not inserted!</br>";
			 $e = oci_error($query_id);  
			 echo $e['message']."</br>";
		 }
	
		$query2= "UPDATE STUDENT SET AGE=(SELECT ROUND((SYSDATE-dateofbirth)/365.25) FROM STUDENT where stdid='".$student_id."') WHERE STDID='".$student_id."'";
		$query_id2 = oci_parse($con, $query2); 		
		$r = oci_execute($query_id2); 
		if($r){
			echo "success</br>";
		}
		 else
		 {
			 echo "Record not inserted!</br>";
			 $e = oci_error($query_id);  
			 echo $e['message']."</br>";
		 }
		 
		 
		 
		 $mother_name=$_POST["mother-name"];
		 $mother_contact=$_POST["mother-contact"];
		 $mother_cnic=$_POST["mother-cnic"];
		 $mother_email=$_POST["mother-email"];
		 $mother_address=$_POST["mother-address"];
		 $query3="INSERT INTO CARETAKER(NAME,STDID,PHONENO,CNIC,EMAIL,ADDRESS,RELATION) Values('".$mother_name."',".$student_id.",'".$mother_contact."','".$mother_cnic."','".$mother_email."','".$mother_address."','Mother')";
		 $query_id3 = oci_parse($con, $query3); 		
		$r = oci_execute($query_id3); 
		if($r){
			echo "success</br>";
		}
		 else
		 {
			 echo "Record not inserted!</br>";
			 $e = oci_error($query_id);  
			 echo $e['message']."</br>";
		 }
		  $father_name=$_POST["father-name"];
		 $father_contact=$_POST["father-contact"];
		 $father_cnic=$_POST["father-cnic"];
		 $father_email=$_POST["father-email"];
		 $father_address=$_POST["father-address"];
		 $query4="INSERT INTO CARETAKER(NAME,STDID,PHONENO,CNIC,EMAIL,ADDRESS,RELATION) Values('".$father_name."',".$student_id.",'".$father_contact."','".$father_cnic."','".$father_email."','".$father_address."','Father')";
		 $query_id4 = oci_parse($con, $query4); 		
		$r = oci_execute($query_id4); 
		if($r){
			echo "success</br>";
		}
		 else
		 {
			 echo "Record not inserted!</br>";
			 $e = oci_error($query_id);  
			 echo $e['message']."</br>";
		 }
		 if (empty($_POST["father-name"]) && empty($_POST["mother-name"])){
		  $guardian_name=$_POST["guardian-name"];
		 $guardian_contact=$_POST["guardian-contact"];
		 $guardian_cnic=$_POST["guardian-cnic"];
		 $guardian_email=$_POST["guardian-email"];
		 $guardian_address=$_POST["guardian-address"];
		 $guardian_relation=$_POST["guardian-relation"];
		 $query5="INSERT INTO CARETAKER(NAME,STDID,PHONENO,CNIC,EMAIL,ADDRESS,RELATION) Values('".$guardian_name."',".$student_id.",'".$guardian_contact."','".$guardian_cnic."','".$guardian_email."','".$guardian_address."','".$guardian_relation."')";
		 $query_id5 = oci_parse($con, $query5); 		
		$r = oci_execute($query_id5); 
		if($r){
			echo "success</br>";
		}
		 else
		 {
			 echo "Record not inserted!</br>";
			 $e = oci_error($query_id);  
			 echo $e['message']."</br>";
		 }
		 }
		 $discount=$_POST["fee-discount"];
		 $final_amount=$_POST["fee-final-amount"];
		 $fee_valid_date = date('d-m-Y', strtotime($_POST['fee-valid-date']));
		 $fee_due_date = date('d-m-Y', strtotime($_POST['fee-due-date']));
		 $fee_challan_no=$_POST["fee-challan"];
		// $query6="INSERT INTO FEE (VOUCHER_NO, AMOUNT,Discount,DUEDATE,VALIDDATE)Values('0423',2000,10,TO_DATE('17/12/2015', 'DD/MM/YYYY'),TO_DATE('25/12/2015', 'DD/MM/YYYY'))";
		 $query6="INSERT INTO FEE (STDID, AMOUNT,Discount,DUEDATE,VALIDDATE)Values('".$student_id."',".$final_amount.",".$discount.",TO_DATE('".$fee_due_date."', 'dd/mm/yyyy'),TO_DATE('".$fee_valid_date."', 'dd/mm/yyyy'))";
		  $query_id6 = oci_parse($con, $query6); 		
		$r = oci_execute($query_id6); 
		if($r){
			echo "success</br>";
		}
		 else
		 {
			 echo "Record not inserted!</br>";
			 $e = oci_error($query_id);  
			 echo $e['message']."</br>";
		 }
	}
  
	 
	//INSERT INTO CARETAKER(Name,StdID,Contact,CNIC,Email,Address,Relation) Values(name,stid,con,id,mail,add,”Mother”);
?>
</div>
</form>
<script>
function submit() {
  /*Put all the data posting code here*/
 document.getElementById("Admission-form").reset();
}
</script>
</body>

</html>