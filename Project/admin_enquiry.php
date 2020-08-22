<?php
// set the page title for header
define("TITLE", "Administration | Enquiry");
// include admin_header.php
include("admin_header.php");
?>
<?php
include("dbconnect.php");

// Cutomer enquiries are stored in the enquiry table.
// Query to select all fileds from the enquiry table
$query = "Select * From Enquiry Order By CREATEDDATE DESC";


// Parsing query. upon failure, error message will appear and exit the code.
$stmt = oci_parse($connect, $query);
if (!$stmt) {
  echo "SQL String Parsing Error";
  exit;
}

?>


<main>
  <div class="container">
    <h1 class="mainheader_h2"> List of enquiries made by customers</h1>
    <p class="admin_p"> This page will dispaly enquiries made by customers through the enquiry forms on the website. </p>
  </div>
  <div class="container">
    <h2 class="admin_h2"> Enquiry Form View </h2>
    <table class="display_table">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Enquiry</th>
        <th>Created Date</th>
      </tr>
      <?php
      // Execte SQL and loop rows to insert the data into html table
      oci_execute($stmt);
      while (oci_fetch($stmt)) {
        $ID = oci_result($stmt, "ID");
        $Name = oci_result($stmt, "NAME");
        $Email = oci_result($stmt, "EMAIL");
        $Phone = oci_result($stmt, "PHONE");
        $Enquiry = oci_result($stmt, "ENQURY");
        $CreatedDate = oci_result($stmt, "CREATEDDATE");
        // statement to print html code that include data from the enquiry table in the database.
        printf("<tr>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                         </tr>", $ID, $Name, $Email, $Phone, $Enquiry, $CreatedDate);
      } // End of while loop
      oci_close($connect);
      ?>
    </table>
  </div>
  <div class="container">
  </div>
</main>
<?php
// include admin_footer.php
include("admin_footer.php");
?>