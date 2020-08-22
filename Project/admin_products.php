<?php
define("TITLE", "Administration | Products");
include("admin_header.php");
?>
<?php
include("dbconnect.php");

// Product information is stored in the product table.
$query1 = "Select * From Product Where Type = 'Japanese to English'";

$query2 = "Select * From Product Where Type = 'English to Japanese'";

$query3 = "Select * From Product Where Type = 'Training Program'";

$stmt1 = oci_parse($connect, $query1);
if (!$stmt1) {
  echo "SQL String Parsing Error";
  exit;
}
$stmt2 = oci_parse($connect, $query2);
if (!$stmt2) {
  echo "SQL String Parsing Error";
  exit;
}
$stmt3 = oci_parse($connect, $query3);
if (!$stmt3) {
  echo "SQL String Parsing Error";
  exit;
}

?>


<main>
  <div class="container">
    <h1 class="mainheader_h2"> Products lists in the database </h1>
    <p class="admin_p"> This page will dispaly all the services/products that Sakura Translation offers.</p>
  </div>
  <div class="container">
    <h2 class="admin_h2"> Japanese to English Translation Services </h2>
    <table class="display_table">
      <tr>
        <th>ID</th>
        <th>Type</th>
        <th>Specialisation</th>
        <th>Description</th>
        <th>Price Information</th>
        <th>Created Date</th>
      </tr>
      <?php
      // Execte SQL and loop rows to insert the data into html table
      oci_execute($stmt1);
      while (oci_fetch($stmt1)) {
        $ID = oci_result($stmt1, "ID");
        $Type = oci_result($stmt1, "TYPE");
        $Service = oci_result($stmt1, "SERVICE");
        $DESCR = oci_result($stmt1, "DESCR");
        $Price = oci_result($stmt1, "PRICE");
        $CreatedDate = oci_result($stmt1, "CREATEDDATE");
        // statement to print html code that include data from the product table in the database.
        printf("<tr>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                         </tr>", $ID, $Type, $Service, $DESCR, $Price, $CreatedDate);
      } // End of while loop


      ?>
    </table>
  </div>
  <div class="container">
    <h2 class="admin_h2"> English to Japanese Translation Services </h2>
    <table class="display_table">
      <tr>
        <th>ID</th>
        <th>Type</th>
        <th>Specialisation</th>
        <th>Description</th>
        <th>Price Information</th>
        <th>Created Date</th>
      </tr>
      <?php
      // Execte SQL and loop rows to insert the data into html table
      oci_execute($stmt2);
      while (oci_fetch($stmt2)) {
        $ID = oci_result($stmt2, "ID");
        $Type = oci_result($stmt2, "TYPE");
        $Service = oci_result($stmt2, "SERVICE");
        $DESCR = oci_result($stmt2, "DESCR");
        $Price = oci_result($stmt2, "PRICE");
        $CreatedDate = oci_result($stmt2, "CREATEDDATE");
        // statement to print html code that include data from the product table in the database.
        printf("<tr>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                         </tr>", $ID, $Type, $Service, $DESCR, $Price, $CreatedDate);
      } // End of while loop


      ?>
    </table>
  </div>
  <div class="container">
    <h2 class="admin_h2"> Training Programs </h2>
    <table class="display_table">
      <tr>
        <th>ID</th>
        <th>Type</th>
        <th>Specialisation</th>
        <th>Description</th>
        <th>Price Information</th>
        <th>Created Date</th>
      </tr>
      <?php
      // Execte SQL and loop rows to insert the data into html table
      oci_execute($stmt3);
      while (oci_fetch($stmt3)) {
        $ID = oci_result($stmt3, "ID");
        $Type = oci_result($stmt3, "TYPE");
        $Service = oci_result($stmt3, "SERVICE");
        $DESCR = oci_result($stmt3, "DESCR");
        $Price = oci_result($stmt3, "PRICE");
        $CreatedDate = oci_result($stmt3, "CREATEDDATE");
        // statement to print html code that include data from the product table in the database.
        printf("<tr>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                         </tr>", $ID, $Type, $Service, $DESCR, $Price, $CreatedDate);
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