<?php 
    // set the page title for header
    define("TITLE", "Administration | Order");
    // include admin_header.php
    include("admin_header.php");
?>
<?php
include("dbconnect.php"); 

// Orders are stored in the order table.
// Query to select all fileds from the order table.
$query = "Select * From OrderTable Order By CREATEDDATE DESC";


// Parsing query. upon failure, error message will appear and exit the code.
$stmt = oci_parse($connect, $query);
if(!$stmt) {
        echo "SQL String Parsing Error";
        exit;
}

?>


<main>
    <div class = "container">
        <h1 class = "mainheader_h2"> Order List</h1>
        <p class = "admin_p"> This page will dispaly all the orders placed by customers through the enquiry forms on the website. </p>
    </div>
    <div class = "container">
        <h2 class = "admin_h2"> Order View </h2>
        <table class = "display_table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Company</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Product Key</th>
                <th>Word Count</th>
                <th>Details</th>
                <th>Created Date</th>
             </tr>
             <?php 
             // Execte SQL and loop rows to insert the data into html table
             oci_execute($stmt);
             while(oci_fetch($stmt)){
                 $ID = oci_result($stmt, "ID");
                 $Name = oci_result($stmt, "FIRSTNAME")." ".oci_result($stmt, "LASTNAME");
                 $Company = oci_result($stmt, "COMPANY");
                 $Email = oci_result($stmt, "EMAIL");
                 $Phone = oci_result($stmt, "PHONE");
                 $ProductKey = oci_result($stmt, "PRODUCTKEY");
                 $Wordcount = oci_result($stmt, "WORDCOUNT");
                 $Details = oci_result($stmt, "DETAILS");
                 $CreatedDate = oci_result($stmt, "CREATEDDATE");
                 // statement to print html code that include data from the enquiry table in the database.
                 printf("<tr>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                         </tr>",$ID,$Name,$Company,$Email,$Phone,$ProductKey,$Wordcount,$Details,$CreatedDate);
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