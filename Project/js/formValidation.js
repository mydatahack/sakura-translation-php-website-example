/*
Function: alphabet_validation
Input: str (string) - the string to be tested 
Return: true, if the string contains only alphabetic characters. Otherwise, false
*/
function alphabet_validation(str) {
  // setting regular expression with constructor function. The RegExp() object is used.
  var regex = new RegExp("^[a-zA-Z]+$");
  // if match, return true
  return str.match(regex);
}

/*
Function: alphaspace_validation
Input: str (string) - the string to be tested 
Return: true, if the string contains only alphabetic characters and space. Otherwise, false
*/
function alphaspace_validation(str) {
  var regex = new RegExp("^[a-zA-Z ]+$");
  return str.match(regex);
}

/*
Function: email_validation
Input: str (string) - the string to be tested 
Return: true, if the string includes one @ character. Otherwiser, the function will return false.
*/
function email_validation(str) {
  var regex = new RegExp(".+@.+");
  return str.match(regex);
}

/*
Function: company_validation
Input: $str (string) - the string to be tested 
Return: true, if the string contains only alphanumeric characters and space. Otherwise, false
*/

function company_validation(str) {
  var regex = new RegExp("^[a-zA-Z0-9 ]+$");
  return str.match(regex);
}

/* 
Function: number_validation
Input: $str (string) - the string to be tested 
Return: true, if the string contains only alphanumeric characters and space. Otherwise, false
*/

function number_validation(str) {
  var regex = new RegExp("^[0-9]+$");
  return str.match(regex);
}

/* */
// Setting variable valid to true.
var valid = true;
// Creating an array to store all the error messages.
var error = [];

/*
Function: order_validate
What it is for: This function is used to validate fields submitted from the Order Form. All the fields are mandatory except company name and details fields.
                Firstname and lastname fields must only contain alphabetic characters. Company name must only contains alphanumeric characters.
                Email address has to contain @ with leading & trailing characters. Phone & Word count fileds must only contain numbers.
Input: no input. 
Return: The array of error messages stored in the array if the value from any field in the form is not valid. 
        It also makes the variable valid false if the value from any field in the form is not valid. 
*/

function order_validate() {

  // reset the valid variable.
  valid = true;
  // Reset the error message.
  error = ['Please check the error message below: '];
  // Getting the values in the fields form the form and assign it to the variables below.
  var firstname = document.getElementById("firstName").value;
  var lastname = document.getElementById("lastName").value;
  var company = document.getElementById("companyName").value;
  var email = document.getElementById("emailAdd").value;
  var phone = document.getElementById("phone").value;
  var type1 = document.getElementById("field1").checked; // return true if the field 1 is checked.
  var type2 = document.getElementById("field2").checked; // return true if the field 2 is checked.
  var specialisation = document.getElementById("specialisation").value;
  var wordcount = document.getElementById("wordcount").value;


  // if the firstname field is empay, error message will be added to the error message array and the variable valid becomes false..
  if (firstname == '') {
    error.push("Firstname is required.");
    valid = false;
  } else {
    if (!alphabet_validation(firstname)) {
      error.push("Firstname must contain only alphabetic characters.");
      valid = false;
    }
  }
  if (lastname == '') {
    error.push("Lastname is required.");
    valid = false;
  } else {
    if (!alphabet_validation(lastname)) {
      error.push("Lastname must contain only alphabetic characters.");
      valid = false;
    }
  }

  // Company field is not mandatory. If the field is filled, it will check if the value contains only alphanumeric characters.
  // Otherwise, error message is added to the array and valid becomes false.
  if (company != '') {
    if (!company_validation(company)) {
      error.push("Company must contain only alphanumeric characters.")
      valid = false;
    }
  }

  // if the phone field is empay, error message will be added to the error message array and the variable valid becomes false..
  if (phone == '') {
    error.push("Phone is required.");
    valid = false;
  } else {
    // if the filed contains any character apart from numbers, it is not valid and the variable valid becomes false.
    if (!number_validation(phone)) {
      error.push("Phone must contain only numbers.");
      valid = false;
    }
  }

  // if the email field is empay, error message will be added to the error message array and the variable valid becomes false..
  if (email == '') {
    error.push("Email is required.");
    valid = false;
  } else {
    // if the filed doesn't contain @ with leading & trailing alphanumeric characters, it is not valid and the variable valid becomes false.
    if (!email_validation(email)) {
      error.push("Email is not valid.");
      valid = false;
    }
  }

  // if no service type is selected, error message is added to the array and valid becomes false.
  if (!type1 && !type2) {
    error.push("Service Type is required.");
    valid = false;
  }

  // if the word count field is empay, error message will be added to the error message array and the variable valid becomes false..
  if (wordcount == '') {
    error.push("Wordcount is required.");
    valid = false;
  } else {
    if (!number_validation(wordcount)) {
      error.push("Wordcount must contain only numbers.");
      valid = false;
    }
  }

  // if no specialisation is selected, error message is added to the array and valid becomes false.
  if (specialisation == "") {
    error.push("Specialisation is required.");
    valid = false;
  }

} // End of the function

/* 
Function: order_validation_outcome
Input: No input
Return: true, if the variable valid is true. Otherwise return false and push error messages as alert.
        The variable valid is set to ture as default. 
*/
function order_validation_outcome() {

  // Call the order_validate function to validate the form imput.
  order_validate();
  if (valid) {
    // if form inputs are all valid, it can send the form to the form submission page.
    return true;
  } else {
    var error_string = "";
    // Loop error message array and take the value inside the array and concatenate them
    for (var i = 0; i < error.length; i++) {
      // new lines are added while the error messages are concatenated.
      error_string += error[i] + "\n\n";
    }
    // error messages will be displayed in the pop up window.
    alert(error_string);
    // if the variable valid is set to false, the form will not submitted.
    return false;
  }
} // End of the function.

/*
Function: enquiry_validate
What it is for: This function is used to validate fields submitted from the enquiry Forms. All the fields are mandatory.
                The name field must only contain alphabetic characters and space. Text area has to be filled.
                Email address has to contain @ with leading & trailing characters. Phone & Word count fileds must only contain numbers.
Input: no input. 
Return: The array of error messages stored in the array if the value from any field in the form is not valid. 
        It also makes the variable valid false if the value from any field in the form is not valid. 
*/
function enquiry_validate() {

  // reset the valid variable.
  valid = true;
  // Reset the error message.
  error = ['Please check the error message below: '];
  // Getting the values in the fields form the form and assign it to the variables below.
  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  var phone = document.getElementById("phone").value;
  var text = document.getElementById("text").value;

  // if the firstname field is empay, error message will be added to the error message array and the variable valid becomes false..
  if (name == '') {
    error.push("Your name is required.");
    valid = false;
  } else {
    // if the filed contains non-alphabets, it is not valid and the variable valid becomes false.
    if (!alphaspace_validation(name)) {
      error.push("The name field must contain only alphabetic characters (space is allowed if required).");
      valid = false;
    }
  }

  // if the email field is empay, error message will be added to the error message array and the variable valid becomes false..
  if (email == '') {
    error.push("Email is required.");
    valid = false;
  } else {
    // if the filed doesn't contain @ with leading & trailing alphanumeric characters, it is not valid and the variable valid becomes false.
    if (!email_validation(email)) {
      error.push("Email is not valid.");
      valid = false;
    }
  }

  // if the phone field is empay, error message will be added to the error message array and the variable valid becomes false..
  if (phone == '') {
    error.push("Phone is required.");
    valid = false;
  } else {
    // if the filed contains any character apart from numbers, it is not valid and the variable valid becomes false.
    if (!number_validation(phone)) {
      error.push("Phone must contain only numbers.");
      valid = false;
    }
  }

  // Text field is  mandatory. If the field is filled, it makes valid false and add error message to the array.
  // Otherwise, error message is added to the array and valid becomes false.
  if (text == '') {
    error.push("Please enter your enquiry in the text area.");
    valid = false;
  }

} // End of the function

/* 
Function: enquiry_validation_outcome
Input: No input
Return: true, if the variable valid is true. Otherwise return false and push error messages as alert.
        The variable valid is set to ture as default. 
*/
function enquiry_validation_outcome() {

  // Call the enquiry_validate function to validate the form imput.
  enquiry_validate();
  if (valid) {
    // if form inputs are all valid, it can send the form to the form submission page.
    return true;
  } else {
    var error_string = "";
    // Loop error message array and take the value inside the array and concatenate them
    for (var i = 0; i < error.length; i++) {
      // new lines are added while the error messages are concatenated.
      error_string += error[i] + "\n\n";
    }
    // error messages will be displayed in the pop up window.
    alert(error_string);
    // if the variable valid is set to false, the form will not submitted.
    return false;
  }
} // End of the function.

/*
Function: feedback_validate
What it is for: This function is used to validate fields submitted from the feedback Forms. All the fields are mandatory expect the comments field.
Input: no input. 
Return: The array of error messages stored in the array if the value from the mandatory fields are not filled. 
        It also makes the variable valid false if the value from the mandatory fields are not filled. 
*/
function feedback_validate() {

  // reset the valid variable.
  valid = true;
  // Reset the error message.
  error = ['Please check the error message below: '];
  // Getting boolean value according to each radio button is checked or not.
  var q11 = document.getElementById("EJtranslation").checked;
  var q12 = document.getElementById("JEtranslation").checked;
  var q13 = document.getElementById("training").checked;
  var q21 = document.getElementById("RateSatisfied").checked;
  var q22 = document.getElementById("RateUnsatisfied").checked;
  var q23 = document.getElementById("RateNutral").checked;
  var q31 = document.getElementById("likely").checked;
  var q32 = document.getElementById("unlikely").checked;
  var q33 = document.getElementById("notSure").checked;

  // Check if any radio button is ticked in the first question. If not, error message will be added to the array & valid becomes false.
  if (!q11 && !q12 && !q13) {
    error.push("Please select the service type.");
    valid = false;
  }
  // Check ifany radio button is ticked in the second question. If not, error message will be added to the array & valid becomes false.
  if (!q21 && !q22 && !q23) {
    error.push("Please rate our service.");
    valid = false;
  }
  // Check if aany radio button is ticked  in the third question. If not, error message will be added to the array & valid becomes false.
  if (!q31 && !q32 && !q33) {
    error.push("Please rate your recommendation.");
    valid = false;
  }
} // End of the function

/* 
Function: feedback_validation_outcome
Input: No input
Return: true, if the variable valid is true. Otherwise return false and push error messages as alert.
        The variable valid is set to ture as default. 
*/
function feedback_validation_outcome() {

  // Call the feedback_validate function to validate the form imput.
  feedback_validate();
  if (valid) {
    // if form inputs are all valid, it can send the form to the form submission page.
    return true;
  } else {
    var error_string = "";
    // Loop error message array and take the value inside the array and concatenate them
    for (var i = 0; i < error.length; i++) {
      // new lines are added while the error messages are concatenated.
      error_string += error[i] + "\n\n";
    }
    // error messages will be displayed in the pop up window.
    alert(error_string);
    // if the variable valid is set to false, the form will not submitted.
    return false;
  }
} // End of the function.

/*
Function: search_validate
What it is for: This function is used to validate fields submitted from the search Forms. All the fields are mandatory.
Input: no input. 
Return: The array of error messages stored in the array if all fields are not filled. 
        It also makes the variable valid false if all fields are not filled. 
*/
function search_validate() {

  // reset the valid variable.
  valid = true;
  // Reset the error message.
  error = ['Please check the error message below: '];
  // Getting boolean value according to each radio button is checked or not.
  var type1 = document.getElementById("EJtranslation").checked;
  var type2 = document.getElementById("JEtranslation").checked;
  // Getting the value in the service selector field.
  var service = document.getElementById("service").value;

  // Check if any radio button is ticked in the service type selection field. If not, error message will be added to the array & valid becomes false.
  if (!type1 && !type2) {
    error.push("Please select the service type.");
    valid = false;
  }

  // Check if the value in the service specialisation field. If not, error message will be added to the array & valid becomes false.
  if (service == "") {
    error.push("Please select specialisation.");
    valid = false;
  }


} // End of the function

/* 
Function: search_validation_outcome
Input: No input
Return: true, if the variable valid is true. Otherwise return false and push error messages as alert.
        The variable valid is set to ture as default. 
*/
function search_validation_outcome() {

  // Call the search_validate function to validate the form imput.
  search_validate();
  if (valid) {
    // if form inputs are all valid, it can send the form to the form submission page.
    return true;
  } else {
    var error_string = "";
    // Loop error message array and take the value inside the array and concatenate them
    for (var i = 0; i < error.length; i++) {
      // new lines are added while the error messages are concatenated.
      error_string += error[i] + "\n\n";
    }
    // error messages will be displayed in the pop up window.
    alert(error_string);
    // if the variable valid is set to false, the form will not submitted.
    return false;
  }
} // End of the function.
