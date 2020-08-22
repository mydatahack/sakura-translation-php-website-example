<?php
define("TITLE", "Sakura Translation | Home");
define("Style", "style/styleHome.css");
$scripts = array('js/animationHome.js', 'js/formValidation.js');
include("header.php");
?>

<main>
  <div class="container">
    <div id="bodyimg">
      <img src="img/office.jpg" alt="office" id="biimg">
    </div>
    <div id="intro">
      <h2> About Sakura Translation </h2>
      <p> We are specialised in Japanese-English and English-Japanese translator services in Australia.
        Our servies include Technical, Legal, Scientific, Financial, Business, Journalism, Website, and Literary Translations.
        We have worked with a diverse range of clients across many different industries. Our experienced NAATI certified translators can meet any translation requirements.
      </p>
      <p> You can simply submit your document to us and we will provide you with a quote and estimated duration to complete the assignment. </P>
    </div>
  </div>


  <div class="container">
  </div>

  <div class="container">

    <h2 id="helpheading"> How can we help you? </h2>

  </div>
  <div class="container">

    <table id="tableHome">

      <tr>
        <td>
          <a href="services.php"> <img src="img/icons/task.png" alt="task" width=50 height=50> </a>
          <h4> Flexible Translation Services </h4>
          <p> Our team of passionate translators can translate any type of documents. We can find the right translator to translate your document within the required timeframe. </P>
        </td>

        <td>
          <a href="order.php"> <img src="img/icons/worldwide.png" alt="world wide" width=50 height=50> </a>
          <h4> Easy access to the service </h4>
          <p> Our online service makes translations easy and accessible. Upload the document from anywhere and anytime. We will give you a quote within 24 hours. </p>
        </td>
      </tr>
      <tr>
        <td>
          <a href="training.php"> <img src="img/icons/presentation-1.png" alt="presentation" width=50 height=50> </a>
          <h4> Coporate training programs </h4>
          <p> Our innovative corporate training will increase efficiency and productivity in cross-cultural/bilingual environments.

          </p>
        </td>
        <td>

          <a href="contact.php"> <img src="img/icons/phone-call.png" alt="phone call" width=50 height=50> </a>
          <h4> Speak to our operator </h4>
          <p> If you have any questions or urgent requests, you can speak to our operator anytime.</p>
          <p> Call 1300-234-985 </p>
        </td>
      </tr>
    </table>

    <div id="formdiv">
      <form id="contactHome" action="submitted_enquiry.php" method="post" onsubmit="return enquiry_validation_outcome();">
        <table>
          <tr>
            <td>
              <h4> Contact Us Now! </h4>
            </td>
          </tr>
          <tr>
            <td> <input type="text" id="name" name="name" placeholder="Your name"></td>
          </tr>
          <tr>
            <td><input type="text" name="email" id="email" placeholder="Your email address"> </td>
          </tr>
          <tr>
            <td> <input type="text" name="phone" id="phone" placeholder="Your phone number"></td>
          </tr>
          <tr>
            <td> <textarea name="text" id="text" placeholder="Write your enquiry..."></textarea></td>
          </tr>
          <tr>
            <td> <button type="submit" name="submit"> Submit </button> </td>
          </tr>
        </table>
      </form>
    </div>
  </div>
  <div class="container">
  </div>
</main>

<?php include("footer.php"); ?>