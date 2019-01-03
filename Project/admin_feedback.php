<?php 
// set the page title for header
    define("TITLE", "Administration | Feedback");
    // include admin_header.php
    include("admin_header.php");
?>
<?php
include("dbconnect.php"); 

// Product information is stored in the product table. Query results are ordered by created data in descending order first,
// then ID in decending order (necessary to make it look good as the first 10 records are inserted through SQL insert statement. Without this, ID aren't orderd.)
// Query to select Japanese to English translation products
$query1 = "Select * From Feedback Where Type = 'Japanese to English' Order By CREATEDDATE DESC, ID DESC";
// Query to select English to Japanese translation products
$query2 = "Select * From Feedback Where Type = 'English to Japanese' Order By CREATEDDATE DESC, ID DESC";
// Query to select Training programs
$query3 = "Select * From Feedback Where Type = 'Training Program' Order By CREATEDDATE DESC, ID DESC";

// Parsing query. upon failure, error message will appear and exit the code.
$stmt1 = oci_parse($connect, $query1);
if(!$stmt1) {
        echo "SQL String Parsing Error";
        exit;
}
$stmt2 = oci_parse($connect, $query2);
if(!$stmt2) {
        echo "SQL String Parsing Error";
        exit;
}
$stmt3 = oci_parse($connect, $query3);
if(!$stmt3) {
        echo "SQL String Parsing Error";
        exit;
}

// setting variables for satisfaction rate and assigning 0 
$jeq1_rate = 0; // variable for satisfaction rate for Q1 for Japanese English translation
$jeq2_rate = 0; // variable for satisfaction rate for Q2 for Japanese English translation
$ejq1_rate = 0; // variable for satisfaction rate for Q1 for English Japanese translation
$ejq2_rate = 0; // variable for satisfaction rate for Q2 for English Japanese translation
$ctq1_rate = 0; // variable for satisfaction rate for Q1 for Corporate Training
$ctq2_rate = 0; // variable for satisfaction rate for Q2 for Corporate Training

oci_execute($stmt1);
while(oci_fetch($stmt1)){
    // if Q1 is satisfied add 1 to the variable. This will give the toal number of satisfied.
    if(oci_result($stmt1, "Q1") === "Satisfied"){
        $jeq1_rate += 1;
    }
    // if Q1 is satisfied add 1 to the variable. This will giev the total number of likely.
    if(oci_result($stmt1, "Q2") === "Likely"){
        $jeq2_rate += 1;
    }
}

// get the toal number of records by oci_num_row for Japanese English translation. 
// Then, the total number of satisfied is divided by the total number of records & the total number of likely is divided by the total number of records.
// Times 100 to get the percentage and used floor to get rid of decimal places. 
$jeq1_rate = floor(($jeq1_rate/oci_num_rows($stmt1))*100);
$jeq2_rate = floor(($jeq2_rate/oci_num_rows($stmt1))*100);

/* These are used to check if the code above is working.
echo oci_num_rows($stmt1)."<br />";
echo $jeq1_rate."<br />";
echo $jeq2_rate;
*/

// the same process will be repeated for other feedback satisfaction scores. Below codes are just the repeat of the above.
oci_execute($stmt2);
while(oci_fetch($stmt2)){
    if(oci_result($stmt2, "Q1") === "Satisfied"){
        $ejq1_rate += 1;
    }
    if(oci_result($stmt2, "Q2") === "Likely"){
        $ejq2_rate += 1;
    }
}
$ejq1_rate = floor(($ejq1_rate/oci_num_rows($stmt2))*100);
$ejq2_rate = floor(($ejq2_rate/oci_num_rows($stmt2))*100);

// The same code repeated for Corporate training.
oci_execute($stmt3);
while(oci_fetch($stmt3)){
    if(oci_result($stmt3, "Q1") === "Satisfied"){
        $ctq1_rate += 1;
    }
    if(oci_result($stmt3, "Q2") === "Likely"){
        $ctq2_rate += 1;
    }
}
$ctq1_rate  = floor(($ctq1_rate/oci_num_rows($stmt3))*100);
$ctq2_rate = floor(($ctq2_rate/oci_num_rows($stmt3))*100);
?>


<main>
    <div class = "container">
        <h1 class = "mainheader_h2"> Feedback Summary</h1>
        <p class = "admin_p"> Feedback satisfaction rate for Question 1 (How would you rate our service?) is calculated by total number of 'Satisfied' divided by total response number. </p>
        <p class = "admin_p"> Feedback satisfaction rate for Question 2 (Would you recommend us to others?) is calculated by total number of 'Likely' divided by total response number. </p>
    </div>
    <div class = "container">
        <table class = "display_table">
            <tr>
                <td id = "noBGColor"></td>
                <th>Q1 Satisfaction Rate</th>
                <th>Q2 Recommndation Rate</th>
            </tr>
            <tr>
                <th> Japanese-English Translation </th>
                <td><?php echo $jeq1_rate."%" /*to print the calculated number in the table row*/?></td>
                <td><?php echo $jeq2_rate."%" /*to print the calculated number in the table row*/?></td>
            <tr>
            <tr>
                <th> English-Japanese Translation </th>
                <td><?php echo $ejq1_rate."%" /*to print the calculated number in the table row*/?></td>
                <td><?php echo $ejq2_rate."%" /*to print the calculated number in the table row*/?></td>
            <tr>
            <tr>
                <th>Corporate Training</th>
                <td><?php echo $ctq1_rate."%" /*to print the calculated number in the table row*/?></td>
                <td><?php echo $ctq2_rate."%" /*to print the calculated number in the table row*/?></td>
            <tr>
        </table>     
    </div>
    <div class = "container">
        <h1 class = "mainheader_h2"> Feedback Details</h1>
        <p class = "admin_p"> Below will display all the feedback from the customers. </p>
       
    </div>
    <div class = "container">
        <h2 class = "admin_h2"> Japanese to English Translation Services </h2>
        <table class = "display_table">
            <tr>
                <th>ID</th>
                <th>Type</th>
                <th>Q1</th>
                <th>Q2</th>
                <th>Comments</th>
                <th>Created Date</th>
             </tr>
             <?php 
             // Execte SQL and loop rows to insert the data into html table
             oci_execute($stmt1);
             while(oci_fetch($stmt1)){
                 $ID = oci_result($stmt1, "ID");
                 $Type = oci_result($stmt1, "TYPE");
                 $Q1 = oci_result($stmt1, "Q1");
                 $Q2 = oci_result($stmt1, "Q2");
                 $Comments= oci_result($stmt1, "COMMENTTEXT");
                 $CreatedDate = oci_result($stmt1, "CREATEDDATE");
                 // statement to print html code that include data from the product table in the database.
                 printf("<tr>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                         </tr>",$ID,$Type,$Q1,$Q2,$Comments,$CreatedDate);
             } // End of while loop
             ?> 
        </table>
    </div>
     <div class = "container">
        <h2 class = "admin_h2"> English to Japanese Translation Services </h2>
        <table class = "display_table">
            <tr>
                <th>ID</th>
                <th>Type</th>
                <th>Q1</th>
                <th>Q2</th>
                <th>Comments</th>
                <th>Created Date</th>
             </tr>
             <?php 
              // Execte SQL and loop rows to insert the data into html table
             oci_execute($stmt2);
             while(oci_fetch($stmt2)){
                 $ID = oci_result($stmt2, "ID");
                 $Type = oci_result($stmt2, "TYPE");
                 $Q1 = oci_result($stmt2, "Q1");
                 $Q2 = oci_result($stmt2, "Q2");
                 $Comments= oci_result($stmt2, "COMMENTTEXT");
                 $CreatedDate = oci_result($stmt2, "CREATEDDATE");
                 // statement to print html code that include data from the product table in the database.
                 printf("<tr>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                         </tr>",$ID,$Type,$Q1,$Q2,$Comments,$CreatedDate);
             } // End of while loop
             ?> 
        </table>
    </div>
     <div class = "container">
        <h2 class = "admin_h2"> Training Programs </h2>
        <table class = "display_table">
            <tr>
                <th>ID</th>
                <th>Type</th>
                <th>Q1</th>
                <th>Q2</th>
                <th>Comments</th>
                <th>Created Date</th>
             </tr>
             <?php 
             // Execte SQL and loop rows to insert the data into html table
             oci_execute($stmt3);
             while(oci_fetch($stmt3)){
                 $ID = oci_result($stmt3, "ID");
                 $Type = oci_result($stmt3, "TYPE");
                 $Q1 = oci_result($stmt3, "Q1");
                 $Q2 = oci_result($stmt3, "Q2");
                 $Comments= oci_result($stmt3, "COMMENTTEXT");
                 $CreatedDate = oci_result($stmt3, "CREATEDDATE");
                 // statement to print html code that include data from the product table in the database.
                 printf("<tr>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                         </tr>",$ID,$Type,$Q1,$Q2,$Comments,$CreatedDate);
             } // End of while loop
             
             oci_close($connect);
             ?> 
        </table>
    </div>
    <div class = "container">
    </div>
</main>
<?php 
// include admin_footer.php
    include("admin_footer.php");
?> 