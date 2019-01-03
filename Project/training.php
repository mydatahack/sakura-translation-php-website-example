<?php 
// set the page title for header
    define("TITLE", "Sakura Translation | Training");
    define("Style", "style/styleTraining.css");
    // setting array for javascript files to load for this page
    $scripts = array('js/nav.js');
   

// include header.php
    include("header.php");
?>
     <main>
        <div class = "container">
            <div id = "imageDiv">
                <img id = "trainingImg" src = "img/training.jpg" alt = "training.jpg"/>
            </div>
            <div id = "trainingWords">
                <h2> Corporate Training Programs </h2>
                <p> We offer a range of training programs that prepare Australian companies to work efficiently in the Japanese business environments. 
                    We can also customise our training programs to suite your busines situations. 
                </p>
                <p>
                    Our experienced trainers bring expertise in Japanese business culture and prepares your company to work efficiently with Japanese clients.
                </p>
                <p> If you are interested in our programs, please contact us. </p>
            </div>
        </div>
        <div class = "container" >
        </div>
        <div class = "container" >
            <h2 id = "programs"> Programs </h2>
             <table id = "program">
                 <tr>
                     <td> <h4> Leadership Program </h4>
                          <p> Our 3-day leadership programs will prepare you to become an effective leader in multi-cultural teams. </p>
                          
                     </td>
                     <td> <h4> Business Negotiation </h4>
                          <p> Our 2-day business negotiation program will improve your negotiation skills with Japnanese clients. </p>
                     </td>
                  </tr>
                  <tr>
                      <td> <h4> Business Conversation </h4>
                           <p> The program aims to improve your Japanese business conversation skills that will help you to communicate effectively with Japanese clients.
                               It consists of 5 sessions. 
                           </p>
                      </td>
                      <td> <h4> Business Culture </h4>
                           <p> You will learn the idiocincracies of Japanese business culture. This program is for 2 days. Understanding Japanese business culture will increase productivity working with Japanes clients. </p>
                      </td> 
                  </tr>
                  <tr>
                      <td> <h4> Business Letter Writing </h4>
                           <p> 
                               Do you need to improve your Japanese business wrting skills? This program will help you to sharpen your Japanese writing skills for effective Japanese email & letter writing. 
                               It consists of 5 sessions.
                           </p>
                      </td>
                      <td> <h4> Customised Training Programs </h4>
                           <p> We can offer customised training programs. We can tailor our programs to what you request. We are happy to work with you to develop your custom training programs. </p>
                      
                      </td>
                  </tr>
             
             </table>
       </div>
       <div class = "container" >
        </div>
        <div class = "container" >
            <form id = "serviceQuery">
                 <!-- insert service query form -->
            </form>
       </div>
       <p> </P>
 </main>
<?php 
// include footer.php
    include("footer.php");
?> 