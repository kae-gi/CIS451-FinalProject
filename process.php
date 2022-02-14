<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include('connectionData.txt');
$conn = mysqli_connect($server, $user, $pass, $dbname, $port)
or die('Error connecting to MySQL server.');
?>


<html>
<head>
<title>Final Project</title>
</head>
<body bgcolor="HoneyDew">


<?php
$operation_id = $_POST['operation_id'];
if ($operation_id == '1') {
  echo '<h2>Operation 1</h2>';
  process_operation_1a($conn);
  process_operation_1b($conn);
} elseif ($operation_id == '2') {
  echo '<h2>Operation 2</h2>';
  process_operation_2($conn);
} elseif ($operation_id == '3') {
  echo '<h2>Operation 3</h2>';
  process_operation_3($conn);
} elseif ($operation_id == '4') {
  echo '<h2>Operation 4</h2>';
  process_operation_4($conn);
} elseif ($operation_id == '5') {
  echo '<h2>Operation 5</h2>';
  process_operation_5($conn);
} else {
    echo 'Unknown operation';
    die();
}
mysqli_close($conn);
?>


<?php
function process_operation_1a($conn) {
  $html = '';
  $patient_name = $_POST['patient_name'];
  if ($patient_name != "") {
    // this is a small attempt to avoid SQL injection
    // better to use prepared statements
    $query = 'SELECT CONCAT(fname, " ", lname) AS patient_name, CONCAT("$", format(SUM(cost), 2)) AS bill_total FROM patient p JOIN bill b
      USING(patient_id) WHERE "'.$patient_name.'" = CONCAT(fname, " ", lname) GROUP BY patient_id ';
    echo '<hr>';
    echo '<h4>The query (find bill total for patient): </h4>';
    echo $query;
    echo '<hr>';
    $result = mysqli_query($conn, $query)
              or die(mysqli_error($conn));
    $html .= "<pre>";
    while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
        $html .= "\n";
        $html .= "$row[patient_name]  $row[bill_total]";
    }
    $html .= "</pre>";
    mysqli_free_result($result);
    echo '<h4> Result of query: </h4>';
    echo $html;
  }
}

function process_operation_1b($conn) {
  $html = '';
  $patient_name = $_POST['patient_name'];
  if ($patient_name != "") {
    // this is a small attempt to avoid SQL injection
    // better to use prepared statements
    $query = 'SELECT transaction_id, CONCAT("$", format(cost, 2)) AS cost_per, description FROM patient p JOIN bill b USING(patient_id) WHERE "'.$patient_name.'" = CONCAT(fname, " ", lname)';
    echo '<hr>';
    echo '<h4>The query (find transactions that make up bill total): </h4>';
    echo $query;
    echo '<hr>';
    $result = mysqli_query($conn, $query)
              or die(mysqli_error($conn));
    $html .= "<pre>";
    while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
        $html .= "\n";
        $html .= "$row[transaction_id]  $row[cost_per]  $row[description]";
    }
    $html .= "</pre>";
    mysqli_free_result($result);
    echo '<h4> Result of query: </h4>';
    echo $html;
  }
}

function process_operation_2($conn) {
  $html = '';
  $hospital_name = $_POST['hospital_name'];
  $hospital_name = mysqli_real_escape_string($conn, $hospital_name);
  // this is a small attempt to avoid SQL injection
  // better to use prepared statements
  $query = "SELECT fname, lname, room_name, wing FROM patient p JOIN room r USING(room_id) JOIN hospital h USING(hospital_id) WHERE hospital_name = ";
  $query .= "'".$hospital_name."' ORDER BY lname, fname;";
  echo '<hr>';
  echo '<h4>The query (show patients and where they are located for chosen hospital): </h4>';
  echo $query;
  echo '<hr>';
  $result = mysqli_query($conn, $query)
            or die(mysqli_error($conn));
  $html .= "<pre>";
  while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
    {
      $html .= "\n";
      $html .= "$row[wing]  $row[room_name]  $row[fname]  $row[lname]";
    }
  $html .= "</pre>";
  mysqli_free_result($result);
  echo '<h4> Result of query: </h4>';
  echo $html;
}

function process_operation_3($conn) {
  $html = '';
  $hospital_name = $_POST['hospital_name'];
  $hospital_name = mysqli_real_escape_string($conn, $hospital_name);
  // this is a small attempt to avoid SQL injection
  // better to use prepared statements
  $query = "SELECT employee_id, e_fname, e_lname, specialization, hours, nurse_shift, nurse_AssignedWing FROM employee e JOIN scheduledHoursAmt sha USING(employee_id) JOIN nurseRounds nr USING(employee_id) JOIN hospital h USING(hospital_id) WHERE hospital_name = ";
  $query .= "'".$hospital_name."' ORDER BY e_lname, e_fname;";
  echo '<hr>';
  echo '<h4>The query (show nurse employees and their data for chosen hospital): </h4>';
  echo $query;
  echo '<hr>';
  $result = mysqli_query($conn, $query)
            or die(mysqli_error($conn));
  $html .= "<pre>";
  while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
    {
      $html .= "\n";
      $html .= "$row[employee_id]  $row[e_fname]  $row[e_lname]  $row[specialization]  $row[hours]  $row[nurse_shift]  $row[nurse_AssignedWing]";
    }
  $html .= "</pre>";
  mysqli_free_result($result);
  echo '<h4> Result of query: </h4>';
  echo $html;
}

function process_operation_4($conn) {
  $html = '';
  $hospital_name = $_POST['hospital_name'];
  $hospital_name = mysqli_real_escape_string($conn, $hospital_name);
  // this is a small attempt to avoid SQL injection
  // better to use prepared statements
  $query = "SELECT employee_id, e_fname, e_lname, specialization, hours, doc_shift, doc_AssignedWing FROM employee e JOIN scheduledHoursAmt sha USING(employee_id) JOIN doctorRounds nr USING(employee_id) JOIN hospital h USING(hospital_id) WHERE hospital_name = ";
  $query .= "'".$hospital_name."' ORDER BY e_lname, e_fname;";
  echo '<hr>';
  echo '<h4>The query (show nurse employees and their data for chosen hospital): </h4>';
  echo $query;
  echo '<hr>';
  $result = mysqli_query($conn, $query)
            or die(mysqli_error($conn));
  $html .= "<pre>";
  while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
    {
      $html .= "\n";
      $html .= "$row[employee_id]  $row[e_fname]  $row[e_lname]  $row[specialization]  $row[hours]  $row[doc_shift]  $row[doc_AssignedWing]";
    }
  $html .= "</pre>";
  mysqli_free_result($result);
  echo '<h4> Result of query: </h4>';
  echo $html;
}

function process_operation_5($conn) {
  $html = '';
  $patient_name = $_POST['patient_name'];
  if ($patient_name != "") {
    // this is a small attempt to avoid SQL injection
    // better to use prepared statements
    $query = 'SELECT CONCAT(fname, " ", lname) AS patientName, status, results, hospital_name, CONCAT(e_fname, " ", e_lname) AS doctorName FROM patient p JOIN diagnosisResults dr USING(patient_id) JOIN employee e USING(employee_id) JOIN hospital h USING(hospital_id) WHERE "'.$patient_name.'" = CONCAT(fname, " ", lname)';
    echo '<hr>';
    echo '<h4>The query (find patient current status, their diagnosis, and what doctor diagnosed them): </h4>';
    echo $query;
    echo '<hr>';
    $result = mysqli_query($conn, $query)
              or die(mysqli_error($conn));
    $html .= "<pre>";
    while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
        $html .= "\n";
        $html .= "$row[patientName]  $row[status]  $row[results]  $row[hospital_name]  $row[doctorName]";
    }
    $html .= "</pre>";
    mysqli_free_result($result);
    echo '<h4> Result of query: </h4>';
    echo $html;
  }
}


?>


<hr>
<p>
<a href="process.txt" >Contents</a>
of the PHP program that created this page.
</p>
<hr>
<button onclick="location.href='http://ix.cs.uoregon.edu/~kaetlyng/final_project/homePage.html'" type="button">
        Back to Home Page</button>
</body>
</html>
