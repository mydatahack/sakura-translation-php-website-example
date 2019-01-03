<?php 
// set the page title for header
    define("TITLE", "Enquiry Submission");
    define("Style", "style/styleHome.css");
    // setting array for javascript files to load for this page
    $scripts = array('js/animationHome.js');
   

// include header.php
    include("header.php");
?>

<?php 

// setting variables for all the fields for the form.
$name = '';
$email = '';
$phone = '';
$text = '';

/*
Function: name_validation
Input: $str (string) - the string to be tested 
Return: true, if the string contains only alphabetic characters (space is allowed). Otherwise, false
*/

function name_validation($str){
    // used regular expression match to find only alphabetic characters and space if applicable.
    return preg_match("/^[a-zA-Z ]+$/", $str);
    
}

/*
Function: email_validation
Input: $str (string) - the string to be tested 
Return: true, if the string includes one @ character. Otherwiser, the function will return false.
*/

function email_validation($str){
    // used regular expression match to find @ in the string.
    return preg_match("/.+@.+/", $str);
}

/*
Function: phone_validation
Input: $num (string) - the string to be tested 
Return: true, if the string includes numbers. Otherwiser, the function will return false.
*/

function phone_validation($num){
    // used regular expression to find only numbers.
    return preg_match("/^[0-9]+$/", $num);
}
 
// An array will be used to store error messages.
$error_message = array();

// This value will be used to verify the form submission.
$process= false;

if(isset($_POST["submit"])){
    // if submit button has been pressed $process becomes true.
    $process = true;
    if(!isset($_POST['name']) || trim($_POST['name']) === ''){
        // if no value is entered in the name field $process becomes false as the field is mandatory.
        $process = false;
        // Produce an error message and add to the error message array.
        $msg = "Name must be filled.";
        array_push($error_message, $msg);
    } else {
        // if the value is assigned, the value entered in the name field is assigned to $name. Whitespace is trimmed with trim() and html tags are stripped with strip_tags().
        $name = strip_tags(trim($_POST['name']));
        if(!name_validation($name)){
            // if the name fields contains any character except alphabets, it will append the error message to the $error_message array.
            $msg = "Name field must only contain alphabets. A space between name is allowed.";
            array_push($error_message, $msg);
            $process = false;
        }
    }
    // the above logic is applied for the email, phone and text fields. 
    if(!isset($_POST['email']) || trim($_POST['email']) === ''){
        $process = false;
        // Produce an error message and add to the error message array if no email.
        $msg = "Email must be filled.";
        array_push($error_message, $msg);
    } else {
        $email = strip_tags(trim($_POST['email']));
        if(!email_validation($email)){
            // email has to contain one @ as explained for the function email_validation(). 
            $msg = "Please enter a valid email address";
            array_push($error_message, $msg);
            $process = false;
        }
    }
    if(!isset($_POST['phone']) || trim($_POST['phone']) === ''){
        $process = false;
        // Produce an error message and add to the error message array if no phone number.
        $msg = "Phone number must be filled.";
        array_push($error_message, $msg);
    } else {
        $phone = strip_tags(trim($_POST['phone']));
        if(!phone_validation($phone)){
            // email has to contain one @ as explained for the function email_validation(). 
            $msg = "Phone number must only contain numbers.";
            array_push($error_message, $msg);
            $process = false;
        }
    }
    
    if(!isset($_POST['text']) || trim($_POST['text']) === ''){
        $process = false;
        // Produce an error message and add to the error message array if no phone number.
        $msg = "Text area must be filled.";
        array_push($error_message, $msg);
    } else {
        // strip white space & html tags for the text field.
        $text = strip_tags(trim($_POST['text']));
        }   
} // end of first if statment

/*
//for checking codes so far 
echo $name."<br />".$email."<br />".$phone."<br />".$text."<br />";
print_r($error_message);
print_r($scripts);
*/


if($process) {
// if form is correctly validated. It will insert the enquiry into the database and display successful submission message.$_COOKIE
// include database connection details.
include('dbconnect.php'); 
// retrieve max id and increment it as id
    $query = "Select Max(ID) As ID From Enquiry";
    $stmt1 = oci_parse($connect, $query);
    // echo $query;
    if(!$stmt1){
        echo "SQL String Parsing error";
        exit;
    }
    oci_execute($stmt1); 
    oci_fetch($stmt1);
    // Enquiry ID is incremented by 1.
    $new_id = oci_result($stmt1, "ID") + 1;
    
    // Create an insert query with placeholders. They will be filled by oci_bind_by_name later.
    $insert_query = "Insert Into Enquiry (ID, NAME, EMAIL, PHONE, ENQURY) Values (:new_id, :name, :email, :phone, :text)";
    
    $result = oci_parse($connect, $insert_query);
    if(!$result){
        echo "SQL String Parsing error on insert statement.";
        exit;
    }
    // To prevent SQL injection values are assigned by using oci_bind_by_name()
    oci_bind_by_name($result,':new_id', $new_id);
    oci_bind_by_name($result,':name', $name);
    oci_bind_by_name($result,':email', $email);
    oci_bind_by_name($result,':phone', $phone);
    oci_bind_by_name($result,':text', $text);
    // Excute the insert statement.
    oci_execute($result); 
    oci_close($connect);
   
    
// successful submission message below.
?>
   <main>
        <div class = "container" >
                <h2> Thank you for your enquiry! We will get back to you within 24 hours.</h2>
                <p><a href = "index.php">Back to home page</a></p>
        </div>
        <div class = "container" >
        </div>
   </main>
<?php 
// if form is not correctly submitted, it will dispaly error message.
} else { ?>

   <main>
        <div class = "container" >
                <h2> Sorry! The form needs to be filled again. Please check the error message below. </h2>
                <ul>
                <?php 
                // looping the $error_message array to display all the error messages.
                    foreach($error_message as $message){
                        printf("<li>%s</li>", $message);
                    }
                ?>
                </ul>
                <p><a href = "index.php">Back to the form</a></p>
        </div>
        <div class = "container" >
        </div>
   </main>

<?php 
} // end of the else clause (for incorrect form submission).    
?>


<?php 
// include footer.php
    include("footer.php");
?> 