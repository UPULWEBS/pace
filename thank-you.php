<?php
//creating a connection to the databse

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pace_web_class";

$con = new mysqli($servername,$username,$password,$dbname);

// Check connection
if (mysqli_connect_errno())
  {

    echo "=============== Failed to connect to MySQL: " . mysqli_connect_error();
    
  } else{
    
    echo "============ connected ============" . "<br>";
    
  }



        //Looping through the records in the data set stored in the $result variable one by one and displaying.

/*
        while($row = mysqli_fetch_assoc($result)){ 
            echo $row["student_id"] . "<br>";
            echo $row["name"] . "<br>";
            echo $row["email"] . "<br>";
        } 
*/

?>
<?php

// Capturing submitted values from the fileds "Name" and "Email"
    $name=$_GET["Name"];
    $email=$_GET["Email"];

//Inserting captured values to the database table student_info"

if(($name!="") && ($email!="")){
 
    $sqlInsertStudentInfo = "INSERT INTO student_info(name, email) VALUES ('" . $name . "','" . $email . "')";

    if ($con->query($sqlInsertStudentInfo) === TRUE) {
      echo "New student " . $name . "'s information inserted successfully";
    } else {
      echo "Error: " . $sqlInsertStudentInfo . "<br>" . $conn->error;
    }  
    
}


// Displaing the values we captured
    //echo "Your name is " . $name;
    //echo "<br>Your email is " . $email;

/*
 1. Connect to the databse by giving the database, username and password
 2. Insert the values to the database
*/

?>

<html>
  <head>

    <link rel="stylesheet" type="text/css" href="styles.css"/>

    <title>Quick Registration</title>
  </head>
  <body>
  <h1>Thank You!</h1>

  <p>
    Thank you for registering with us.
  </p>
      
      <table>
      <tr><th>Student ID</th><th>Name</th><th>Email</th></tr>
<?php
          
        //creating a SQL statement
        $sqlSelectStudentInfo="SELECT student_id, name, email FROM student_info";

        //executing the SQL statement and extracting data. Extracted data stored inside the variable $result
        $result = mysqli_query($con,$sqlSelectStudentInfo);          
          
        //Displaying student information of each student in a new table row
         while($row = mysqli_fetch_assoc($result)){ 
?>
      <tr><td><?php echo $row["student_id"] ?></td><td><?php echo $row["name"] ?></td><td><?php echo $row["email"] ?></td></tr>
<?php
        }        
?>
      </table>

</body>
</html>