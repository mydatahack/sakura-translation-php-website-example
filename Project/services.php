<?php 
// set the page title for header
    define("TITLE", "Sakura Translation | Services");
    define("Style", "style/styleServices.css");
    // setting array for javascript files to load for this page
    $scripts = array('js/serviceDetails.js', 'js/nav.js', 'js/formValidation.js');
   

// include header.php
    include("header.php");
?>
 <main>
        <div class = "container">
            <div id = "imageDiv">
                <img id = "serviceImg" src = "img/translate.jpg" alt = "translate.jpg"/>
            </div>
            <div id = "serviceWords">
                <h2> Our services </h2>
                <p> We offer Japanese-English and English Japanese translation services in Australia. We have a team of dedicated NAATI certified translators who are
                    specialised in each field. We can provide the services over email for your convenience. We can also arrange a translator to work on site for any project or sensitive information.
                </p>
            </div>
        </div>
        
        <div class = "container" >
            
            <h2 id = "specialisation"> Specialisations </h2>
            <div id= "services">
                <ul id = "specialisationList">
                    <li>
                        <h4 onclick = "openClose('tech');">Technical Translation </h4>
                        <p id = "tech" class = "closed"> We can translate any technical documents, including instructions for hardware, software, mechanical equipment, engineering products, and more. </p>
                    </li>   
                    <li>
                        <h4 onclick = "openClose('legal');">Legal Translation </h4>
                        <p id = "legal" class = "closed"> We can translate any legal documents, including contracts, certifications, driver licence and court documents and more.</p>
                    </li>
                    <li>
                        <h4 onclick = "openClose('scientific');" >Scientific Translation</h4>
                        <p id = "scientific" class = "closed"> We can translate any scientific writing, including journal papers, conference synopsis, lab notebooks, and more. </p>
                    </li>
                    <li>
                        <h4 onclick = "openClose('financial');">Financial Translation</h4>
                        <p id = "financial" class = "closed"> We can translate any financial/ accounting documents, including official and unofficial documents.</p>
                    </li>
                    <li>
                        <h4 onclick = "openClose('business');"> Business Translation</h4>
                        <p id = "business" class = "closed"> We can translate any business-related documents, including articles, journal papers, conference presentations, emails.</p>
                    </li>
                    <li>
                        <h4 onclick = "openClose('journalism');">Journalism Translation </h4>
                        <p id = "journalism" class = "closed"> We can translate any news & featured articles. </p>
                    </li>
                    <li>
                        <h4 onclick = "openClose('web');">Website Translation </h4>
                        <p id = "web" class = "closed"> We offer localisation translation to transform your websites to suit the local market. </p>
                    </li>
                    <li>
                        <h4 onclick = "openClose('literary');">Literary Translation </h4>
                        <p id = "literary" class = "closed"> We can translate any fiction and non-fiction writing. </p>
                    </li>
                    <li>
                        <h4 onclick = "openClose('onsite');">On Site Translation </h4>
                        <p id = "onsite" class = "closed"> Our translators can work on site for your project or sensitive documents.  </p>
                    </li>
                </ul>
            </div>  
       </div>
        <div class = "container" >
            <h2> Service Details Search </h2>
            <p> Search the service details with the form below. </p>
            <form id = "serviceQuery" method = "post" action = "submitted_search.php" onsubmit = "return search_validation_outcome();">
                <fieldset>
                  <label><strong> Select service type: </strong></label>
                  <br /><br />
                  <input type = "radio" name = "type" class = "radioButton" id = "EJtranslation" value = "English to Japanese"> English-Japanese Translation Services 
                  <br /><br />
                  <input type = "radio" name = "type" class = "radioButton"  id = "JEtranslation" value = "Japanese to English"> Japanese-English Translation Services 
                  <br /><br />
                  <label for = "service"><strong>Select Specialisation: </strong></label>
                  <select id = "service" name = "service">
                    <option value = "">Please Select Service</option>
                    <option value = "Technical Translation"> Technical Translation</option>
                    <option value = "Legal Translation"> Legal Transaltion </option>
                    <option value = "Scientific Translation"> Scientific Translation </option>
                    <option value = "Financial Translation"> Financial Translation </option>
                    <option value = "Business Translation"> Business Translation </option>
                    <option value = "Journalism Translation"> Journalism Translation </option>
                    <option value = "Website Translation"> Website Translation </option>
                    <option value = "Literary Translation"> Literary Translation </option>
                    <option value = "On Site Translation"> On Site Translation</option>
                  </select>
                  <br /><br />
                  <input type = "submit" name = "submit" id = "submitServiceQuery" value = "Search">
                </fieldset>
            </form>
       </div>
       <p> </P>
 </main>
<?php 
// include footer.php
    include("footer.php");
?> 