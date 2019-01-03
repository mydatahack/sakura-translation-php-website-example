// Makes a list of images in the image folders
var images = ['img/office.jpg', 'img/office 2.jpg', 'img/translate 1.jpg', 'img/translate 2.jpg']

// For indexing images
var counter = 1;

// When the home page is loaded, it will activate the navigation text color and animation 
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
      // starting animation Loop  
      startLoop();   
};

/*
Function: changeImage
Input: no input. 
Return: In the home page section, the image will be changed every 3 seconds. This function loops images in the images array.
        Image will be retrieved from the array according the incrementing index. Index will increment until the length of the list minus 1 and drops to 0. 
*/
      
function changeImage(){
    var target = document.getElementById("biimg");
    target.src = images[counter];
    if(counter < images.length-1){
        counter += 1;
    } else{
        counter = 0;
        }
    
    // function changeImage() will be called every 3.5 second.
    id = setTimeout(changeImage, 3500);
}

/*
Function: startLoop
Input: no input. 
Return: Call changeImage function every 3.5 seconds. 
*/
function startLoop(){
    id = setTimeout(changeImage, 3500);
}