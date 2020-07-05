<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Per Class</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<form action="student-class-form.php" method="post">
    <div class="container-student-per-class">
        <h1> <span>HAMAREY BACHCHEY</span></br>
            STUDENT PER CLASS FORM</h1>
			<a href="http://localhost:100/Hamarey-Bachchay/Admission-form.php" style="text-decoration:none;">
			<input type="button" value="ADD +"  name="ADD +" class="button pulse" style="margin-left: 96%;">
			</a>
        <div class="student-search">
            Search <input type="text" class="student-search" name="student-search">
            <select name="student-search-method" class="student-search-method">
                <option value="Name">Name</option>
                <option value="Id">Id</option>
            </select>
            <input type="submit" value="Search" name="search" class="button pulse" style="margin-left: 4%;">
			<input type="submit" value="display students"  name="display students" class="button pulse" style="margin-left: 4%;">
			<input type="submit" value="delete"  name="delete" class="button pulse" style="margin-left: 4%;">
			<a href="http://localhost:100/Hamarey-Bachchay/Edit-form.php" style="text-decoration:none;"> 
			<input type="button" value="insert"  name="insert" class="button pulse" style="margin-left: 4%;">
			</a>
			
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
     
	 
	 if (empty($_POST["student-search"]) && !isset($_POST["search"])){
	  $q="select count(section) from student where classid='1' and section ='A'";
	 $query_id = oci_parse($con, $q); 		
	 $r = oci_execute($query_id); 
	 $total=0;
	  if ($r){
		  while($row = oci_fetch_array($query_id)){
			  $total=$row[0];
		  }
		if ($total!=0){
			echo "</br></br>";
			echo " Class 1A (".$total." total)</br>"; 
		}
	 }
	 else{
		  $e = oci_error($query_id);  
		  echo $e['message']."</br>";
	 }
	 $q=" select * from student where classid='1' and section ='A'" ;
	 $query_id = oci_parse($con, $q); 		
	 $r = oci_execute($query_id); 
	 if ($r){
		while($row = oci_fetch_array($query_id)){
			
			   echo "&nbsp &nbsp &nbsp &nbsp &nbsp ID : ".$row[0]." &nbsp &nbsp &nbsp &nbsp &nbsp Name : ".$row[1],"&nbsp &nbsp &nbsp &nbsp &nbsp Age : ".$row[8]."&nbsp &nbsp &nbsp &nbsp &nbsp Gender : ".$row[5]."</br>";
			}
	 }
	 else{
		  $e = oci_error($query_id);  
		  echo $e['message']."</br>";
	 }
	 
	 
	 $q="select count(section) from student where classid='1' and section ='B'";
	 $query_id = oci_parse($con, $q); 		
	 $r = oci_execute($query_id); 
	 $total=0;
	  if ($r){
		  while($row = oci_fetch_array($query_id)){
			  $total=$row[0];
		  }
		if ($total!=0){
			echo "</br></br>";
			echo " Class 1B (".$total." total)</br>"; 
		}
	 }
	 else{
		  $e = oci_error($query_id);  
		  echo $e['message']."</br>";
	 }
	  $q=" select * from student where classid='1' and section ='B'" ;
	 $query_id = oci_parse($con, $q); 		
	 $r = oci_execute($query_id); 
	 if ($r){
		while($row = oci_fetch_array($query_id)){
			   echo "&nbsp &nbsp &nbsp &nbsp &nbsp ID : ".$row[0]." &nbsp &nbsp &nbsp &nbsp &nbsp Name : ".$row[1],"&nbsp &nbsp &nbsp &nbsp &nbsp Age : ".$row[8]."&nbsp &nbsp &nbsp &nbsp &nbsp Gender : ".$row[5]."</br>";
			}
	 }
	 else{
		  $e = oci_error($query_id);  
		  echo $e['message']."</br>";
	 }
	 
	 
	  $q="select count(section) from student where classid='2' and section ='A'";
	 $query_id = oci_parse($con, $q); 		
	 $r = oci_execute($query_id); 
	 $total=0;
	  if ($r){
		  while($row = oci_fetch_array($query_id)){
			  $total=$row[0];
		  }
		if ($total!=0){
			echo "</br></br>";
			echo " Class 2A (".$total." total)</br>"; 
		}
	 }
	 else{
		  $e = oci_error($query_id);  
		  echo $e['message']."</br>";
	 }
	  $q=" select * from student where classid='2' and section ='A'" ;
	 $query_id = oci_parse($con, $q); 		
	 $r = oci_execute($query_id); 
	 if ($r){
		while($row = oci_fetch_array($query_id)){
			   echo "&nbsp &nbsp &nbsp &nbsp &nbsp ID : ".$row[0]." &nbsp &nbsp &nbsp &nbsp &nbsp Name : ".$row[1],"&nbsp &nbsp &nbsp &nbsp &nbsp Age : ".$row[8]."&nbsp &nbsp &nbsp &nbsp &nbsp Gender : ".$row[5]."</br>";
			}
	 }
	 else{
		  $e = oci_error($query_id);  
		  echo $e['message']."</br>";
	 }
	 
	  $q="select count(section) from student where classid='2' and section ='B'";
	 $query_id = oci_parse($con, $q); 		
	 $r = oci_execute($query_id); 
	 $total=0;
	  if ($r){
		  while($row = oci_fetch_array($query_id)){
			  $total=$row[0];
		  }
		if ($total!=0){
			echo "</br></br>";
			echo " Class 2B (".$total." total)</br>"; 
		}
	 }
	 else{
		  $e = oci_error($query_id);  
		  echo $e['message']."</br>";
	 }
	  $q=" select * from student where classid='2' and section ='B'" ;
	 $query_id = oci_parse($con, $q); 		
	 $r = oci_execute($query_id); 
	 if ($r){
		while($row = oci_fetch_array($query_id)){
		  echo "&nbsp &nbsp &nbsp &nbsp &nbsp ID : ".$row[0]." &nbsp &nbsp &nbsp &nbsp &nbsp Name : ".$row[1],"&nbsp &nbsp &nbsp &nbsp &nbsp Age : ".$row[8]."&nbsp &nbsp &nbsp &nbsp &nbsp Gender : ".$row[5]."</br>";
			}
	 }
	 else{
		  $e = oci_error($query_id);  
		  echo $e['message']."</br>";
	 }
	 
	 
	  $q="select count(section) from student where classid='3' and section ='A'";
	 $query_id = oci_parse($con, $q); 		
	 $r = oci_execute($query_id); 
	 $total=0;
	  if ($r){
		  while($row = oci_fetch_array($query_id)){
			  $total=$row[0];
		  }
		if ($total!=0){
			echo "</br></br>";
			echo " Class 3A (".$total." total)</br>"; 
		}
	 }
	 else{
		  $e = oci_error($query_id);  
		  echo $e['message']."</br>";
	 }
	  $q=" select * from student where classid='3' and section ='A'" ;
	 $query_id = oci_parse($con, $q); 		
	 $r = oci_execute($query_id); 
	 if ($r){
		while($row = oci_fetch_array($query_id)){
			  echo "&nbsp &nbsp &nbsp &nbsp &nbsp ID : ".$row[0]." &nbsp &nbsp &nbsp &nbsp &nbsp Name : ".$row[1],"&nbsp &nbsp &nbsp &nbsp &nbsp Age : ".$row[8]."&nbsp &nbsp &nbsp &nbsp &nbsp Gender : ".$row[5]."</br>";
			}
	 }
	 else{
		  $e = oci_error($query_id);  
		  echo $e['message']."</br>";
	 }
	 
	 
	  $q="select count(section) from student where classid='3' and section ='B'";
	 $query_id = oci_parse($con, $q); 		
	 $r = oci_execute($query_id); 
	 $total=0;
	  if ($r){
		  while($row = oci_fetch_array($query_id)){
			  $total=$row[0];
		  }
		if ($total!=0){
			echo "</br></br>";
			echo " Class 3B (".$total." total)</br>"; 
		}
	 }
	 else{
		  $e = oci_error($query_id);  
		  echo $e['message']."</br>";
	 }
	  $q=" select * from student where classid='3' and section ='B'" ;
	 $query_id = oci_parse($con, $q); 		
	 $r = oci_execute($query_id); 
	 if ($r){
		while($row = oci_fetch_array($query_id)){
			   echo "&nbsp &nbsp &nbsp &nbsp &nbsp ID : ".$row[0]." &nbsp &nbsp &nbsp &nbsp &nbsp Name : ".$row[1],"&nbsp &nbsp &nbsp &nbsp &nbsp Age : ".$row[8]."&nbsp &nbsp &nbsp &nbsp &nbsp Gender : ".$row[5]."</br>";
			}
	 }
	 else{
		  $e = oci_error($query_id);  
		  echo $e['message']."</br>";
	 }
	 
	  $q="select count(section) from student where classid='4' and section ='A'";
	 $query_id = oci_parse($con, $q); 		
	 $r = oci_execute($query_id); 
	 $total=0;
	  if ($r){
		  while($row = oci_fetch_array($query_id)){
			  $total=$row[0];
		  }
		if ($total!=0){
			echo "</br></br>";
			echo " Class 4A (".$total." total)</br>"; 
		}
	 }
	 else{
		  $e = oci_error($query_id);  
		  echo $e['message']."</br>";
	 }
	  $q=" select * from student where classid='4' and section ='A'" ;
	 $query_id = oci_parse($con, $q); 		
	 $r = oci_execute($query_id); 
	 if ($r){
		while($row = oci_fetch_array($query_id)){
			   echo "&nbsp &nbsp &nbsp &nbsp &nbsp ID : ".$row[0]." &nbsp &nbsp &nbsp &nbsp &nbsp Name : ".$row[1],"&nbsp &nbsp &nbsp &nbsp &nbsp Age : ".$row[8]."&nbsp &nbsp &nbsp &nbsp &nbsp Gender : ".$row[5]."</br>";
			}
	 }
	 else{
		  $e = oci_error($query_id);  
		  echo $e['message']."</br>";
	 }
	 
	  $q="select count(section) from student where classid='4' and section ='B'";
	 $query_id = oci_parse($con, $q); 		
	 $r = oci_execute($query_id); 
	 $total=0;
	  if ($r){
		  while($row = oci_fetch_array($query_id)){
			  $total=$row[0];
		  }
		 if ($total!=0){
				echo "</br></br>";
				echo " Class 4B (".$total." total)</br>"; 
		 }
	 }
	 else{
		  $e = oci_error($query_id);  
		  echo $e['message']."</br>";
	 }
	  $q=" select * from student where classid='4' and section ='B'" ;
	 $query_id = oci_parse($con, $q); 		
	 $r = oci_execute($query_id); 
	 if ($r){
		while($row = oci_fetch_array($query_id)){
			   echo "&nbsp &nbsp &nbsp &nbsp &nbsp ID : ".$row[0]." &nbsp &nbsp &nbsp &nbsp &nbsp Name : ".$row[1],"&nbsp &nbsp &nbsp &nbsp &nbsp Age : ".$row[8]."&nbsp &nbsp &nbsp &nbsp &nbsp Gender : ".$row[5]."</br>";
			}
	 }
	 else{
		  $e = oci_error($query_id);  
		  echo $e['message']."</br>";
	 }
	 
	 
	  $q="select count(section) from student where classid='5' and section ='A'";
	 $query_id = oci_parse($con, $q); 		
	 $r = oci_execute($query_id); 
	 $total=0;
	  if ($r){
		  while($row = oci_fetch_array($query_id)){
			  $total=$row[0];
		  }
		  if ($total!=0){
				echo "</br></br>";
				echo " Class 5A (".$total." total)</br>"; 
		  }
	 }
	 else{
		  $e = oci_error($query_id);  
		  echo $e['message']."</br>";
	 }
	  $q=" select * from student where classid='5' and section ='A'" ;
	 $query_id = oci_parse($con, $q); 		
	 $r = oci_execute($query_id); 
	 if ($r){
		while($row = oci_fetch_array($query_id)){
			   echo "&nbsp &nbsp &nbsp &nbsp &nbsp ID : ".$row[0]." &nbsp &nbsp &nbsp &nbsp &nbsp Name : ".$row[1],"&nbsp &nbsp &nbsp &nbsp &nbsp Age : ".$row[8]."&nbsp &nbsp &nbsp &nbsp &nbsp Gender : ".$row[5]."</br>";
			}
	 }
	 else{
		  $e = oci_error($query_id);  
		  echo $e['message']."</br>";
	 }
	 
	  $q="select count(section) from student where classid='5' and section ='B'";
	 $query_id = oci_parse($con, $q); 		
	 $r = oci_execute($query_id); 
	 $total=0;
	  if ($r){
		  while($row = oci_fetch_array($query_id)){
			  $total=$row[0];
		  }
		if ($total!=0){
		echo "</br></br>";
		echo " Class 5B (".$total." total)</br>"; 
		}
	 }
	 else{
		  $e = oci_error($query_id);  
		  echo $e['message']."</br>";
	 }
	  $q=" select * from student where classid='5' and section ='B'" ;
	 $query_id = oci_parse($con, $q); 		
	 $r = oci_execute($query_id); 
	 if ($r){
		while($row = oci_fetch_array($query_id)){
			   echo "&nbsp &nbsp &nbsp &nbsp &nbsp ID : ".$row[0]." &nbsp &nbsp &nbsp &nbsp &nbsp Name : ".$row[1],"&nbsp &nbsp &nbsp &nbsp &nbsp Age : ".$row[8]."&nbsp &nbsp &nbsp &nbsp &nbsp Gender : ".$row[5]."</br>";
			}
	 }
	 else{
		  $e = oci_error($query_id);  
		  echo $e['message']."</br>";
	 }
	 }
	 else{
		 if (isset($_POST["student-search"]) && isset($_POST["delete"])){
			 
		 $student_search=$_POST["student-search"];
			 $student_search=strtolower($student_search);
			 if ($_POST["student-search-method"]=="Name"){
			 $query="delete from student where name='".$student_search."'";
			 $query_id = oci_parse($con, $query); 		
			 $r = oci_execute($query_id); 
			 if ($r){
					echo "</br></br>";
					echo "RECORD DELETED</br>";
			 }
			 else{
				  $e = oci_error($query_id);  
				  echo $e['message']."</br>";
			 }
			 }
			 else{
			 $query="delete from student where stdid='".$student_search."'";
			 $query_id = oci_parse($con, $query); 		
			 $r = oci_execute($query_id); 
			  $flag=0;
			  if ($r){
					echo "</br></br>";
					echo "RECORD DELETED</br>";
			 }
			 else{
				  $e = oci_error($query_id);  
				  echo $e['message']."</br>";
			 }
			 }
		 }

		 else if (isset($_POST["student-search"])){
			 $student_search=$_POST["student-search"];
			 $student_search=strtolower($student_search);
			 if ($_POST["student-search-method"]=="Name"){
			 $query="select * from student where name='".$student_search."'";
			 $query_id = oci_parse($con, $query); 		
			 $r = oci_execute($query_id); 
			 $flag=0;
			 if ($r){
				while($row = oci_fetch_array($query_id)){
					echo "</br></br>";
					$flag=1;
					   echo "&nbsp &nbsp &nbsp &nbsp &nbsp ID : ".$row[0]." &nbsp &nbsp &nbsp &nbsp &nbsp Name : ".$row[1],"&nbsp &nbsp &nbsp &nbsp &nbsp Age : ".$row[8]."&nbsp &nbsp &nbsp &nbsp &nbsp Gender : ".$row[5]."</br>";
						$q="select * from caretaker where stdid='".$row[0]."'";
						$q_id = oci_parse($con, $q); 		
						$f = oci_execute($q_id); 
						 $flag1=0;
						 if ($f){
							while($row1 = oci_fetch_array($q_id)){
								 $flag1=1; 
								   echo "&nbsp &nbsp &nbsp &nbsp &nbsp caretakeID : ".$row1[0]." &nbsp &nbsp &nbsp &nbsp &nbsp Name : ".$row1[1],"&nbsp &nbsp &nbsp &nbsp &nbsp Relation : ".$row1[4]."</br>";
								}
							if ($flag1==0){
								echo "</br> &nbsp &nbsp &nbsp &nbsp  NO Parent RECORD FOUND </br>";
							}
						 }
						 else{
							  $e = oci_error($query_id);  
							  echo $e['message']."</br>";
						 }
						 
					   
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
					echo "</br></br>";
					 $flag=1; 
					   echo "&nbsp &nbsp &nbsp &nbsp &nbsp ID : ".$row[0]." &nbsp &nbsp &nbsp &nbsp &nbsp Name : ".$row[1],"&nbsp &nbsp &nbsp &nbsp &nbsp Age : ".$row[8]."&nbsp &nbsp &nbsp &nbsp &nbsp Gender : ".$row[5]."</br>";
						$q="select * from caretaker where stdid='".$row[0]."'";
						$q_id = oci_parse($con, $q); 		
						$f = oci_execute($q_id); 
						 $flag1=0;
						 if ($f){
							while($row1 = oci_fetch_array($q_id)){
								 $flag1=1; 
								   echo "&nbsp &nbsp &nbsp &nbsp &nbsp caretakeID : ".$row1[0]." &nbsp &nbsp &nbsp &nbsp &nbsp Name : ".$row1[1],"&nbsp &nbsp &nbsp &nbsp &nbsp Relation : ".$row1[4]."</br>";
								}
							if ($flag1==0){
								echo "</br> &nbsp &nbsp &nbsp &nbsp  NO Parent RECORD FOUND </br>";
							}
						 }
						 else{
							  $e = oci_error($query_id);  
							  echo $e['message']."</br>";
						 }
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
</div>
	</form>
	<script>
function submit() {
  /*Put all the data posting code here*/
 document.getElementById("student-class-form").reset();
}
</script>
</body>

</html>