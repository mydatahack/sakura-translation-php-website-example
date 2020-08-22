<?php
define("TITLE", "Order Submission");
define("Style", "style/styleHome.css");
$scripts = array('js/animationHome.js');
include("header.php");
?>

<?php

// setting variables for all the fields for the form.
$firstname = '';
$lastname = '';
$company = '';
$email = '';
$phone = '';
$type = '';
$service = '';
$wordcount = '';
$text = '';

/*
Function: name_validation
Input: $str (string) - the string to be tested 
Return: true, if the string contains only alphabetic characters. Otherwise, false
*/
function name_validation($str)
{
  return preg_match("/^[a-zA-Z]+$/", $str);
}

/*
Function: company_validation
Input: $str (string) - the string to be tested 
Return: true, if the string contains only alphanumeric characters and space. Otherwise, false
*/
function company_validation($str)
{
  return preg_match("/^[a-zA-Z0-9 ]+$/", $str);
}

/*
Function: email_validation
Input: $str (string) - the string to be tested 
Return: true, if the string includes one @ character. Otherwiser, the function will return false.
*/
function email_validation($str)
{
  return preg_match("/.+@.+/", $str);
}

/*
Function: number_validation
Input: $num (string) - the string to be tested 
Return: true, if the string includes numbers. Otherwiser, the function will return false.
*/
function number_validation($num)
{
  return preg_match("/^[0-9 ]+$/", $num);
}

// An array will be used to store error messages.
$error_message = array();

// This value will be used to verify the form submission.
$process = false;

if (isset($_POST["submit"])) {
  // if submit button has been pressed $process becomes true.
  $process = true;
  if (!isset($_POST['firstname']) || trim($_POST['firstname']) === '') {
    // if no value is entered in the firstname field $process becomes false as the field is mandatory.
    $process = false;
    // Produce an error message and add to the error message array.
    $msg = "Firstname must be filled.";
    array_push($error_message, $msg);
  } else {
    // if the value is assigned, the value entered in the name field is assigned to $firstname. Whitespace is trimmed with trim() and html tags are stripped with strip_tags().
    $firstname = strip_tags(trim($_POST['firstname']));
    if (!name_validation($firstname)) {
      // if the firstname fields contains any character except alphabets, it will append the error message to the $error_message array.
      $msg = "Firstname field must only contain alphabetical characters.";
      array_push($error_message, $msg);
      $process = false;
    }
  }
  if (!isset($_POST['lastname']) || trim($_POST['lastname']) === '') {
    // if no value is entered in the lastname field $process becomes false as the field is mandatory.
    $process = false;
    // Produce an error message and add to the error message array.
    $msg = "Lastname must be filled.";
    array_push($error_message, $msg);
  } else {
    // if the value is assigned, the value entered in the lastname field is assigned to $lastname. Whitespace is trimmed with trim() and html tags are stripped with strip_tags().
    $lastname = strip_tags(trim($_POST['lastname']));
    if (!name_validation($lastname)) {
      // if the lastname fields contains any character except alphabets, it will append the error message to the $error_message array.
      $msg = "Lastname field must only contain alphabetical characters.";
      array_push($error_message, $msg);
      $process = false;
    }
  }
  // the above logic is applied for the email, phone and text fields. 
  if (!isset($_POST['email']) || trim($_POST['email']) === '') {
    $process = false;
    // Produce an error message and add to the error message array if no email.
    $msg = "Email must be filled.";
    array_push($error_message, $msg);
  } else {
    $email = strip_tags(trim($_POST['email']));
    if (!email_validation($email)) {
      // email has to contain one @ as explained for the function email_validation(). 
      $msg = "Please enter a valid email address";
      array_push($error_message, $msg);
      $process = false;
    }
  }
  if (!isset($_POST['phone']) || trim($_POST['phone']) === '') {
    $process = false;
    // Produce an error message and add to the error message array if no phone number.
    $msg = "Phone number must be filled.";
    array_push($error_message, $msg);
  } else {
    $phone = strip_tags(trim($_POST['phone']));
    if (!number_validation($phone)) {
      // phone number has to contain only numbers 
      $msg = "Phone number must only contain numbers.";
      array_push($error_message, $msg);
      $process = false;
    }
  }

  // Company field can be empty. If it is empty, no value will be assigned. Otherwise get rid of leading & trailing whitespace and strip html tags.
  if (!isset($_POST['company']) || trim($_POST['company']) === '') {
  } else {
    $company = strip_tags(trim($_POST['company']));
    // Checks if the company name only contains alphanumeric characters and space if applicable. If true, assign company name to the variable.
    if (company_validation($company)) {
    } else {
      // Add error message to the array and $process become false
      $msg = "Company name is only allowed to have alphanumeric characters and space if applicable.";
      array_push($error_message, $msg);
      $process = false;
    }
  }

  // The type field must have a value.
  if (!isset($_POST['type']) || trim($_POST['type']) === '') {
    $process = false;
    // Produce an error message and add to the error message array if no type was selected.
    $msg = "Please choose the direction of translation.";
    array_push($error_message, $msg);
  } else {
    // If there is a avalue type is assigned according to the selected value. 
    $type = strip_tags(trim($_POST['type']));
  }

  // The service field must have a value.
  if (!isset($_POST['service']) || trim($_POST['service']) === '') {
    $process = false;
    // Produce an error message and add to the error message array if no service type was selected.
    $msg = "Please choose the category of translation.";
    array_push($error_message, $msg);
  } else {
    // If there is a value, type is assigned according to the selected value. 
    $service = strip_tags(trim($_POST['service']));
  }
  if (!isset($_POST['wordcount']) || trim($_POST['wordcount']) === '') {
    $process = false;
    // Produce an error message and add to the error message array if no wordcount.
    $msg = "Word count must be filled.";
    array_push($error_message, $msg);
  } else {
    $wordcount = strip_tags(trim($_POST['wordcount']));
    if (!number_validation($wordcount)) {
      // wordcount number has to contain only numbers 
      $msg = "Word count must only contain numbers.";
      array_push($error_message, $msg);
      $process = false;
    }
  }
  // Comment field can be empty. If the field is empty, no value will be assigned. Otherwise get rid of leading & trailing whitespace and strip html tags.
  if (!isset($_POST['text']) || trim($_POST['text']) === '') {
    $text = "";
  } else {
    $text = strip_tags(trim($_POST['text']));
  }
} // end of first if statment


//for checking codes so far 
/* echo $firstname."<br />".$lastname."<br />".$company."<br />".$email."<br />".$phone."<br />".$type."<br />".$service."<br />".$wordcount."<br />".$text."<br />";
print_r($error_message); */

if ($process) {
  // if form is correctly validated. It will insert the enquiry into the database and display successful submission message.$_COOKIE
  // include database connection details.
  include('dbconnect.php');
  // retrieve max id and increment it as id
  $query = "Select Max(ID) As ID From OrderTable";
  $stmt1 = oci_parse($connect, $query);
  // display error message if parsing is unsuccessful.
  if (!$stmt1) {
    echo "SQL String Parsing error";
    exit;
  }
  oci_execute($stmt1);
  oci_fetch($stmt1);
  // Enquiry ID is incremented by 1.
  $new_id = oci_result($stmt1, "ID") + 1;

  // Get product key from the product table by using service type and service name. 
  $query2 = "Select ID From Product Where TYPE = :type And SERVICE = :service";
  $stmt2 = oci_parse($connect, $query2);
  // display error message if parsing is unsuccessful.
  if (!$stmt2) {
    echo "SQL String Parsing error";
    exit;
  }
  // To prevent SQL injection values are assigned by using oci_bind_by_name()
  oci_bind_by_name($stmt2, ':type', $type);
  oci_bind_by_name($stmt2, ':service', $service);
  // Excute the statement and fetch the row.
  oci_execute($stmt2);
  oci_fetch($stmt2);
  // get product ID from the product table and assign it as $productkey. This will be inserted into OrderTable.
  $productkey = oci_result($stmt2, "ID");

  // Create an insert query with placeholders. They will be filled by oci_bind_by_name later.
  $insert_query = "Insert Into OrderTable (ID, FIRSTNAME, LASTNAME, COMPANY, EMAIL, PHONE, PRODUCTKEY, WORDCOUNT, DETAILS) 
                     Values (:new_id, :firstname, :lastname, :company, :email, :phone, :productkey, :wordcount, :text)";

  $result = oci_parse($connect, $insert_query);
  if (!$result) {
    echo "SQL String Parsing error on insert statement.";
    exit;
  }
  // To prevent SQL injection values are assigned by using oci_bind_by_name()
  oci_bind_by_name($result, ':new_id', $new_id);
  oci_bind_by_name($result, ':firstname', $firstname);
  oci_bind_by_name($result, ':lastname', $lastname);
  oci_bind_by_name($result, ':company', $company);
  oci_bind_by_name($result, ':email', $email);
  oci_bind_by_name($result, ':phone', $phone);
  oci_bind_by_name($result, ':productkey', $productkey);
  oci_bind_by_name($result, ':wordcount', $wordcount);
  oci_bind_by_name($result, ':text', $text);
  // Excute the insert statement.
  oci_execute($result);
  oci_close($connect);


  // successful submission message below.
?>
  <main>
    <div class="container">
      <h2> Thank you for your order request. We emailed you a quote and link to upload your document. Please check your email inbox.</h2>
      <p><a href="index.php">Back to home page</a></p>
    </div>
    <div class="container">
    </div>
  </main>
<?php
  // if form is not correctly submitted, it will dispaly error message.
} else { ?>

  <main>
    <div class="container">
      <h2> Sorry! The form needs to be filled again. Please check the error message below. </h2>
      <ul>
        <?php
        // looping the $error_message array to display all the error messages.
        foreach ($error_message as $message) {
          printf("<li>%s</li>", $message);
        }
        ?>
      </ul>
      <p><a href="order.php">Back to the form</a></p>
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