<?php 
// set the page title for header
    define("TITLE", "Feedback Submission");
    define("Style", "style/styleHome.css");
    // setting array for javascript files to load for this page
    $scripts = array('js/animationHome.js');
   

// include header.php
    include("header.php");
?>

<?php 

// setting variables for all the fields for the form.

$type = '';
$rate = '';
$recommend = '';
$text = '';

// An array will be used to store error messages.
$error_message = array();

// This value will be used to verify the form submission.
$process= false;

if(isset($_POST["submit"])){
    // if submit button has been pressed $process becomes true.
    $process = true;
    // The service type field must have a value.
    if(!isset($_POST['type']) || trim($_POST['type']) === ''){
        $process = false;
        // Produce an error message and add to the error message array if no type was selected.
        $msg = "Please choose the service type.";
        array_push($error_message, $msg);
    } else {
        // If there is a avalue type is assigned according to the selected value. 
        $type = strip_tags(trim($_POST['type']));
    }
    
    // The answer for question 1 must have a value.
    if(!isset($_POST['rate']) || trim($_POST['rate']) === ''){
        $process = false;
        // Produce an error message and add to the error message array if no rate was selected.
        $msg = "Please make sure to rate our service.";
        array_push($error_message, $msg);
    } else {
        // If there is a value, rating for question 1 is assigned according to the selected value. 
        $rate = strip_tags(trim($_POST['rate']));
    }
    
    // The answer for question 2 must have a value.
    if(!isset($_POST['recommend']) || trim($_POST['recommend']) === ''){
        $process = false;
        // Produce an error message and add to the error message array if no rate was selected.
        $msg = "Please make sure to fill out the second question.";
        array_push($error_message, $msg);
    } else {
        // If there is a value, rating for question 1 is assigned according to the selected value. 
        $recommend = strip_tags(trim($_POST['recommend']));
    }
    
    // Comment field can be empty. If the field is empty, assign "No comments". Otherwise get rid of leading & trailing whitespace and strip html tags.
    if(!isset($_POST['text']) || trim($_POST['text']) === ''){
        $text = '';
    }
        else{
            $text = strip_tags(trim($_POST['text']));
        }

} // end of first if statment


//for checking codes so far 
/* echo $type."<br />".$rate."<br />".$recommend."<br />".$text."<br />";
print_r($error_message); */

if($process) {
// if form is correctly validated. It will insert the enquiry into the database and display successful submission message.$_COOKIE
// include database connection details.
include('dbconnect.php'); 
// retrieve max id (primary key) in the feedback table and increment it by 1 as a new id
    $query = "Select Max(ID) As ID From Feedback";
    $stmt1 = oci_parse($connect, $query);
    // display error message if parsing is unsuccessful.
    if(!$stmt1){
        echo "SQL String Parsing error";
        exit;
    }
    oci_execute($stmt1); 
    oci_fetch($stmt1);
    // Enquiry ID is incremented by 1.
    $new_id = oci_result($stmt1, "ID") + 1;
    

    // Create an insert query with placeholders. They will be filled by oci_bind_by_name later.
    $insert_query = "Insert Into Feedback (ID, TYPE, Q1, Q2, COMMENTTEXT) 
                     Values (:new_id, :type, :rate, :recommend, :text)";
    
    $result = oci_parse($connect, $insert_query);
    if(!$result){
        echo "SQL String Parsing error on insert statement.";
        exit;
    }
    // To prevent SQL injection values are assigned by using oci_bind_by_name()
    oci_bind_by_name($result,':new_id', $new_id);
    oci_bind_by_name($result,':type', $type);
    oci_bind_by_name($result,':rate', $rate);
    oci_bind_by_name($result,':recommend', $recommend);
    oci_bind_by_name($result,':text', $text);

    // Excute the insert statement.
    oci_execute($result); 
    oci_close($connect);

// successful submission message below.
?>
   <main>
        <div class = "container" >
                <h2> Thank you for your feedback!</h2>
                <p><a href = "contact.php">Go back</a></p>
        </div>
        <div class = "container" >
        </div>
   </main>
<?php 
// if form is not correctly submitted, it will dispaly error message.
} else { ?>

   <main>
        <div class = "container" >
                <h2> Sorry! Please fill out all the mandatory fields before submission </h2>
                <ul>
                <?php 
                // looping the $error_message array to display all the error messages.
                    foreach($error_message as $message){
                        printf("<li>%s</li>", $message);
                    }
                ?>
                </ul>
                <p><a href = "contact.php">Back to the form</a></p>
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