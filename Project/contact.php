<?php 
// set the page title for header
    define("TITLE", "Sakura Translation | Contact");
    define("Style", "style/styleContact.css");
    // setting array for javascript files to load for this page
    $scripts = array('js/nav.js', 'js/formValidation.js');
   

// include header.php
    include("header.php");
?>
    <main>
      
        <div class = "container">
            <h2 class = "contactHeading"> Contact Details </h2>
            <table id = "contactTable">
               <tr>
                   <th colspan = "2"> Email </th>
                   <td>  <a href = "mailto:enqury@st.com">enqury@st.com </a></td>
               </tr>
               
               <tr>
                   <th rowspan = "2"> Phone </th>
                   <td> From AUS: </td>
                   <td> 1300-234-985  </td>
               </tr>
               <tr>
                   <td> From Overseas: </td>
                   <td> +61-3-5432-4321 </td>
               </tr>
               <tr>
                   <th rowspan = "2"> Address </th>
                   <td> Postal: </td>
                   <td> GPO Box 5673, Melbourne, Australia, 3001 </td>
               </tr>
               <tr>
                   <td> Office: </td>
                   <td> 4th Floor, Deloitte Building, 550 Burke Street, Melbourne </td>
               </tr>
            </table>
            
            <div id = "formdiv">
                    
                    <form id = "contactForm" action = "submitted_enquiry.php" method = "post" onsubmit = "return enquiry_validation_outcome();">
                        <table>
                            <tr>
                                <td> <h4> Contact Us Now! </h4> </td>
                           </tr>
                           <tr>
                               <td> <input  type = "text" id = "name" name = "name" placeholder = "Your name"></td>
                           </tr>
                           <tr>
                               <td><input type = "text" id = "email" name = "email" placeholder = "Your email address"> </td>
                           </tr>
                           <tr>
                               <td> <input type = "text" id = "phone" name = "phone" placeholder = "Your phone number"></td>
                           </tr>
                           <tr>
                               <td> <textarea name = "text" id = "text" placeholder = "Write your enquiry..."></textarea></td>
                           </tr>
                           <tr>
                               <td> <button type = "submit" name = "submit"> Submit </button> </td>
                           </tr>
                         </table>
                    </form>
            </div>
        </div> 
        
        <div class = "container" >
            <h2 class = "contactHeading"> Feedback Form </h2>
            <p id = "feedbackP"> Please give us feedback on our services. </p>
            <form id = "poll" action = "submitted_feedback.php" method = "post" onsubmit = "return feedback_validation_outcome();">
                <fieldset>                   
                     <label><strong> Select the service type you used: </strong></label>
                        <br /><br />
                        <input type = "radio" name = "type" class = "radioButton" id = "EJtranslation" value = "English to Japanese"> English-Japanese Translation 
                        <input type = "radio" name = "type" class = "radioButton"  id = "JEtranslation" value = "Japanese to English"> Japanese-English Translation
                        <input type = "radio" name = "type" class = "radioButton" id = "training" value = "Training Program"> Training
                        <br /><br />
                      <label><strong> How would you rate our service? </strong></label>
                        <br /><br />
                        <input type = "radio" name = "rate" class = "radioButton" id = "RateSatisfied" value = "Satisfied"> Satisfied 
                        <input type = "radio" name = "rate" class = "radioButton"  id = "RateUnsatisfied" value = "Unsatisfied"> Unsatisfied 
                        <input type = "radio" name = "rate" class = "radioButton" id = "RateNutral" value = "Not Sure"> Not Sure
                        <br /><br />
                       <label><strong> Would you recommend us to others? </strong></label>
                        <br /><br />
                        <input type = "radio" name = "recommend" class = "radioButton" id = "likely" value = "Likely"> Likely 
                        <input type = "radio" name = "recommend" class = "radioButton" id = "unlikely" value = "Unlikely" > Unlikely 
                        <input type = "radio" name = "recommend" class = "radioButton"  id = "notSure" value = "Not Sure"> Not Sure 
                        <br /><br />
                        <label for = "comments"><strong> Please let us know how we can improve. </strong></label>
                        <br /><br />
                        <textarea id = "comments" name = "text" placeholder = "Please leave your comments here."></textarea>
                        <br /><br />
                        <button type = "submit" name = "submit"> Submit </button>
                        <br /><br />
                </fieldset>
            </form>
        </div>
        <div class = "container" >
            <h2 class = "contactHeading"> Links </h2>
            <ul id = "links">
                <li><a href = "https://www.naati.com.au/" target = "_blank" title = "NAATI homepage"> National Accreditation Authority for Translators and Interpreters (NAATI)</a></li>
                <li><a href = "http://www.au.emb-japan.go.jp/itprtop_en/index.html" target = "_blank" title = "Embassy of Japan"> Embassy of Japan in Australia </a></li>
                <li><a href = "http://www.dengonnet.net/melbourne/" target = "_blank" title = "Dengon Net"> Dengon Net </a></li>
                
            </ul>
        </div>
        <div class = "container" >
        </div>
       <p> </P>
 </main>
<?php 
// include footer.php
    include("footer.php");
?> 