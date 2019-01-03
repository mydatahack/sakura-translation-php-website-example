<?php 
// set the page title for header
    define("TITLE", "Sakura Translation | Order");
    define("Style", "style/styleSubmit.css");
    // setting array for javascript files to load for this page
    $scripts = array('js/nav.js', 'js/formValidation.js');
   

// include header.php
    include("header.php");
?>
     <main>
          
        <div class = "container">
            <div class = "formHeading">
                <h2> Translation Service Order Form</h2>
                <p> Please fill out the form below to place an order for our translation services. The price is based on the word count. 
                    Prior to filling out the form, please make sure to check the word count of your original documents.</p>
                <p> Once the form is submitted, we will email you the quote and instructions to send us your document.</P>
            </div>
        </div>
        <div class = "container">
            <form id = "submission" action = "submitted_order.php" method = "post" onsubmit = "return order_validation_outcome();">
                <fieldset>
                    <br />
                    <label for = "firstName"> <strong> First Name* </strong> </label>
                    <br />
                    <input type = "text" name = "firstname" class = "textField2" id = "firstName" placeholder = "First name" />
                    <br /><br />
                    <label for = "lastName"> <strong> Last Name* </strong> </label>
                    <br />
                    <input type = "text" name = "lastname" class = "textField2" id = "lastName" placeholder = "Last name" />
                    <br /><br />
                    <label for = "companyName"> <strong> Company Name </strong> </label>
                    <br />
                    <input type = "text" name = "company" class = "textField2" id = "companyName" placeholder = "Company name"/>
                    <br /><br />
                    <label for = "emailAdd"> <strong> Email Address* </strong> </label>
                    <br />
                    <input type = "text" name = "email" class = "textField2" id = "emailAdd" placeholder = "Email address" />
                    <br /><br />
                    <label for = "phone"> <strong> Contact Number* </strong> </label>
                    <br />
                    <input type = "tel" name = "phone" class = "textField2" id = "phone" placeholder = "Contact number" />
                    <br /><br />
                    <label> <strong> Select service Type* </strong> </label>
                    <br /><br />
                    <input type = "radio" name = "type" class = "radioButton" id = "field1" value = "English to Japanese" checked> English-Japanese Translation
                    <br /><br />
                    <input type = "radio" name = "type" class = "radioButton" id = "field2" value = "Japanese to English"> Japanese-English Translation
                    <br /><br />
                    <label for = "specialisation"> <strong> Choose Specialisation* </strong> </label>
                    <br />
                    <select name = "service" id = "specialisation" class = "textField2" />
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
                    <label for = "wordcount"> <strong> How many words are there in the original document?* </strong> </label>
                    <br />
                    <input type = "text" name = "wordcount" class = "textField2" id = "wordcount" placeholder = "Word count must be a number" />
                    <br /><br />
                    <label for = "details"> <strong> Requirement Details </strong></label>
                    <br />
                    <textarea id = "details" name = "text", placeholder = "Please write your detailed requirements"></textarea>
                    <br /><br />        
                    <button type = "submit" name = "submit">Order Now</button>
                    <br /><br />
                </fieldset>
            </form>  
        </div>
         <div class = "container">
         </div>   
         
    </main>
<?php 
// include footer.php
    include("footer.php");
?> 