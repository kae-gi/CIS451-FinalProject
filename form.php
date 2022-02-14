<?php
    // remove when turning in... show me my errors
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    // end
    include('connectionData.txt');
    $conn = mysqli_connect($server, $user, $pass, $dbname, $port)
    or die('Error connecting to MySQL server.');
?>


<html>
<head>
<title>Final Project</title>
</head>
<body bgcolor="HoneyDew">
<h3>Connecting to hospitalmgmt using MySQL/PHP</h3>
<hr>


<?php
$operation_id = $_GET['operation_id'];
if ($operation_id == '1') {
  echo '<h2>Operation 1</h2>';
  echo '<p>Please select a patient name.</p>';
  show_operation_1($conn);
} elseif ($operation_id == '2') {
  echo '<h2>Operation 2</h2>';
  echo '<p>Please select a hospital name.</p>';
  show_operation_2($conn);
} elseif ($operation_id == '3') {
  echo '<h2>Operation 3</h2>';
  echo '<p>Please select a hospital name.</p>';
  show_operation_3($conn);
} elseif ($operation_id == '4') {
  echo '<h2>Operation 4</h2>';
  echo '<p>Please select a hospital name.</p>';
  show_operation_4($conn);
} elseif ($operation_id == '5') {
  echo '<h2>Operation 5</h2>';
  show_operation_5($conn);
} else {
    echo 'Unknown operation';
    die();
}
?>

<?php
function show_operation_1($conn) {
  $query = "SELECT fname, lname FROM patient";
  $result = mysqli_query($conn, $query)
            or die(mysqli_error($conn));
  $html = '<form action="process.php" method="POST">';
  $html .= '<select name="patient_name">';
  $html .= "<pre>";
  while($row = $result->fetch_assoc()) {
      $patient_name = $row['fname'].' '.$row['lname'];
      $html .= "<option value='$patient_name'>$patient_name</option>";
    }
  $html .= "</pre>";
  mysqli_free_result($result);
  mysqli_close($conn);
  $html .= '</select>';
  $html .= '<input type="hidden" name="operation_id" value="1">';
  $html .= '<input type="submit" value="submit">';
  $html .= '</form>';
  echo $html;
}

function show_operation_2($conn) {
  $query = "SELECT hospital_name FROM hospital";
  $result = mysqli_query($conn, $query)
            or die(mysqli_error($conn));
  $html = '<form action="process.php" method="POST">';
  $html .= '<select name="hospital_name">';
  $html .= "<pre>";
  while($row = $result->fetch_assoc()) {
      $hospital_name = $row['hospital_name'];
      $html .= "<option value='$hospital_name'>$hospital_name</option>";
    }
  $html .= "</pre>";
  mysqli_free_result($result);
  mysqli_close($conn);
  $html .= '</select>';
  $html .= '<input type="hidden" name="operation_id" value="2">';
  $html .= '<input type="submit" value="submit">';
  $html .= '</form>';
  echo $html;
}

function show_operation_3($conn) {
  $query = "SELECT hospital_name FROM hospital";
  $result = mysqli_query($conn, $query)
            or die(mysqli_error($conn));
  $html = '<form action="process.php" method="POST">';
  $html .= '<select name="hospital_name">';
  $html .= "<pre>";
  while($row = $result->fetch_assoc()) {
      $hospital_name = $row['hospital_name'];
      $html .= "<option value='$hospital_name'>$hospital_name</option>";
    }
  $html .= "</pre>";
  mysqli_free_result($result);
  mysqli_close($conn);
  $html .= '</select>';
  $html .= '<input type="hidden" name="operation_id" value="3">';
  $html .= '<input type="submit" value="submit">';
  $html .= '</form>';
  echo $html;
}

function show_operation_4($conn) {
  $query = "SELECT hospital_name FROM hospital";
  $result = mysqli_query($conn, $query)
            or die(mysqli_error($conn));
  $html = '<form action="process.php" method="POST">';
  $html .= '<select name="hospital_name">';
  $html .= "<pre>";
  while($row = $result->fetch_assoc()) {
      $hospital_name = $row['hospital_name'];
      $html .= "<option value='$hospital_name'>$hospital_name</option>";
    }
  $html .= "</pre>";
  mysqli_free_result($result);
  mysqli_close($conn);
  $html .= '</select>';
  $html .= '<input type="hidden" name="operation_id" value="4">';
  $html .= '<input type="submit" value="submit">';
  $html .= '</form>';
  echo $html;
}

function show_operation_5($conn) {
  $query = "SELECT fname, lname FROM patient";
  $result = mysqli_query($conn, $query)
            or die(mysqli_error($conn));
  $html = '<form action="process.php" method="POST">';
  $html .= '<select name="patient_name">';
  $html .= "<pre>";
  while($row = $result->fetch_assoc()) {
      $patient_name = $row['fname'].' '.$row['lname'];
      $html .= "<option value='$patient_name'>$patient_name</option>";
    }
  $html .= "</pre>";
  mysqli_free_result($result);
  mysqli_close($conn);
  $html .= '</select>';
  $html .= '<input type="hidden" name="operation_id" value="5">';
  $html .= '<input type="submit" value="submit">';
  $html .= '</form>';
  echo $html;
}

?>


<hr>
<p>
<a href="manuOrders.txt" >Contents</a>
of this page.
</p>
<p>
<a href="manuOrdersItems.txt" >Contents</a>
of the PHP page that gets called.
(And the <a href="connectionData.txt" >connection data</a>,
kept separately for security reasons.)
</p>
<hr>
<button onclick="location.href='http://ix.cs.uoregon.edu/~kaetlyng/final_project/homePage.html'" type="button">
        Back to Home Page</button>
</body>
</html>
