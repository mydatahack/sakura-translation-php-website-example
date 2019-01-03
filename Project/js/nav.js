window.onload = function(){
    
    // Get a list of elements for navigation link
    var class_name = document.getElementById('nav').getElementsByTagName('a');
    
    // Get the length of the list
    var len = class_name.length;
    
    // Loop the list to find the current URL and change the text color of the nav bar which corresponds to the current page.
    for (var i = 0; i < len; i++){
         if(class_name[i].href.substring(class_name[i].href.length - 9, class_name[i].href.length) == document.URL.substring(document.URL.length -9, document.URL.length)){
             class_name[i].style.color= "#ff9999";
         } else{  
            class_name[i].style.color = "white";
         }
    }   
};

