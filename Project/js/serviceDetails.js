/*
Function: openClose
Input: id as string 
Return: Change class name to "open" if the element is clicked and its class name is "closed".
        Change class name to "closed" if the element is clicked and its class name is "open".
*/

function openClose(id){
    
    var element = document.getElementById(id);
    console.log(element.className)
    if(element.className == "closed"){
        element.className = "open"
       
    }
    
    else if(element.className == "open"){
        element.className = "closed"
    }
}

