<?php
define("TITLE", "Search Results");
define("Style", "style/styleHome.css");
$scripts = array('js/animationHome.js');
include("header.php");
?>

<?php

// setting variables for all the fields for the form.
$type = '';
$service = '';

// An array will be used to store error messages.
$error_message = array();

// This value will be used to verify the form submission.
$process = false;

if (isset($_POST["submit"])) {
  // if submit button has been pressed $process becomes true.
  $process = true;
  if (!isset($_POST['type']) || trim($_POST['type']) === '') {
    // If no service type is selected, $process becomes false
    $process = false;
    // Produce an error message and add to the error message array.
    $msg = "Please select service type.";
    array_push($error_message, $msg);
  } else {
    // if the value is assigned, the value entered in the name field is assigned to $name. Leading and trailling whitespace is trimmed with trim() and html tags are stripped with strip_tags().
    $type = strip_tags(trim($_POST['type']));
  }

  // If no service name is selected, $process becomes false
  if (!isset($_POST['service']) || trim($_POST['service']) === '') {
    // if no service type is selected $process becomes false
    $process = false;
    // Produce an error message and add to the error message array.
    $msg = "Please select service name.";
    array_push($error_message, $msg);
  } else {
    // if the value is assigned, the value entered in the name field is assigned to $name. Leading and trailling whitespace is trimmed with trim() and html tags are stripped with strip_tags().
    $service = strip_tags(trim($_POST['service']));
  }
} // end of first if statment

/*
//for checking codes so far 
echo $type."<br />".$service."<br />";
print_r($error_message);
*/


if ($process) {
  // if form is correctly validated. It will insert the enquiry into the database and display successful submission message.$_COOKIE
  // include database connection details.
  include('dbconnect.php');
  // Create a select query with placeholders based on the selected type and service from the product table. They will be filled by oci_bind_by_name later.
  $query = "Select * From Product Where TYPE = :type And SERVICE = :service";
  $stmt1 = oci_parse($connect, $query);
  // echo $query;
  if (!$stmt1) {
    echo "SQL String Parsing error";
    exit;
  }
  // To prevent SQL injection values are assigned by using oci_bind_by_name()
  oci_bind_by_name($stmt1, ':type', $type);
  oci_bind_by_name($stmt1, ':service', $service);
  // successful submission message below.
?>
  <main>
    <div class="container">
      <h2> Thank you for search submission. Your search results are below:</h2>
    </div>
    <div class="container">
      <table>
        <?php
        // Execte SQL and loop rows to insert the data into html table
        oci_execute($stmt1);
        while (oci_fetch($stmt1)) {
          $type = oci_result($stmt1, "TYPE");
          $service = oci_result($stmt1, "SERVICE");
          $details = oci_result($stmt1, "DESCR");
          $price = oci_result($stmt1, "PRICE");

          // statement to display product information with html codes from the Product table in the database.
          printf("<tr><th><strong>Service Type: </strong></th><td>%s</td><tr>
                        <tr><th><strong>Specialisation: </strong></th><td>%s</td><tr>
                        <tr><th><strong>Service Description: </strong></th><td>%s</td><tr>
                        <tr><th><strong>Price Information: </strong></th><td>%s</td><tr>", $type, $service, $details, $price);
        } // end of while loop.
        oci_close($connect);
        ?>
      </table>
    </div>
    <div class="container">
      <p><a href="services.php">Go back</a></p>
    </div>
  </main>
<?php
  // if form is not correctly submitted, it will dispaly error message.
} else { ?>

  <main>
    <div class="container">
      <h2> Sorry! The search request wasn't valid. Please check the error message below and refill the form. </h2>
      <ul>
        <?php
        // looping the $error_message array to display all the error messages.
        foreach ($error_message as $message) {
          printf("<li>%s</li>", $message);
        }
        ?>
      </ul>
      <p><a href="services.php">Back to the form</a></p>
    </div>
    <div class="container">
    </div>
  </main>

<?php
} // end of the else clause (for incorrect form submission).    
?>


<?php
include("footer.php");
?>