
// Classifier Variable
let classifier;
// Model URL
let imageModelURL = 'https://storage.googleapis.com/tm-model/he8kThwHX/model.json';

// Video
let video;
let flippedVideo;
// To store the classification
let label = "";

// Load the model first
function preload() {
  classifier = ml5.imageClassifier(imageModelURL);
}

function setup() {
  createCanvas(320, 260);
  // Create the video
  video = createCapture(VIDEO);
  video.size(320, 240);
  video.hide();

  flippedVideo = ml5.flipImage(video)
  // Start classifying
  classifyVideo();
}

function draw() {
  background(0);
  // Draw the video
  image(flippedVideo, 0, 0);

  // Draw the label
  fill(255);
  textSize(16);
  textAlign(CENTER);
  text(label, width / 2, height - 4);
}

// Get a prediction for the current video frame
function classifyVideo() {
  flippedVideo = ml5.flipImage(video)
  classifier.classify(flippedVideo, gotResult);
}

// When we get a result
function gotResult(error, results) {
  // If there is an error
  if (error) {
    console.error(error);
    return;
  }
  // The results are in an array ordered by confidence.
  // console.log(results[0]);
  label = results[0].label;
  // Classifiy again!
  classifyVideo();
}


//screen

var $focus = $("#focus"),
    $blur = $("#blur"),
    $focusW = $("#focusW"),
    $blurW = $("#blurW");

// rotate element
var tl = new TimelineMax({paused:true,repeat:-1});

tl.to("#box",1.5,{rotation:360, ease:Linear.easeNone});
tl.play(0);


/////////////////////////////////////////
// main visibility API function 
// check if current tab is active or not
var vis = (function(){
    var stateKey, 
        eventKey, 
        keys = {
                hidden: "visibilitychange",
                webkitHidden: "webkitvisibilitychange",
                mozHidden: "mozvisibilitychange",
                msHidden: "msvisibilitychange"
    };
    for (stateKey in keys) {
        if (stateKey in document) {
            eventKey = keys[stateKey];
            break;
        }
    }
    return function(c) {
        if (c) document.addEventListener(eventKey, c);
        return !document[stateKey];
    }
})();


/////////////////////////////////////////
// check if current tab is active or not
vis(function(){
					
    if(vis()){	
        
        // the setTimeout() is used due to a delay 
        // before the tab gains focus again, very important!
	      setTimeout(function(){ 
          
            // tween resume() code goes here	
            tl.resume();
            
            // add remove active class
            TweenMax.set($focus,{className:'+=active'});
            TweenMax.set($blur,{className:'-=active'});
            TweenMax.set($focusW,{className:'-=active'});
            TweenMax.set($blurW,{className:'-=active'});
          
        },300);		
												
    } else {
	
        // tween pause() code goes here	
        tl.pause();
        
        // add remove active class
        TweenMax.set($blur,{className:'+=active'});
        TweenMax.set($focus,{className:'-=active'});
        TweenMax.set($focusW,{className:'-=active'});
        TweenMax.set($blurW,{className:'-=active'});
    }
});


/////////////////////////////////////////
// check if browser window has focus		
var notIE = (document.documentMode === undefined),
    isChromium = window.chrome;
      
if (notIE && !isChromium) {

    // checks for Firefox and other  NON IE Chrome versions
    $(window).on("focusin", function () { 
        
        setTimeout(function(){      
            
            // tween resume() code goes here
            tl.resume();
          
            // add remove active class
            TweenMax.set($focusW,{className:'+=active'});
            TweenMax.set($blurW,{className:'-=active'});
            TweenMax.set($focus,{className:'-=active'});
            TweenMax.set($blur,{className:'-=active'});
          
        },300);

    }).on("focusout", function () {

        // tween pause() code goes here
        tl.pause();
      
        // add remove active class
        TweenMax.set($blurW,{className:'+=active'});
        TweenMax.set($focusW,{className:'-=active'});
        TweenMax.set($focus,{className:'-=active'});
        TweenMax.set($blur,{className:'-=active'});

    });

} else {
    
    // checks for IE and Chromium versions
    if (window.addEventListener) {

        // bind focus event
        window.addEventListener("focus", function (event) {
          
            setTimeout(function(){                 
                 
                 // tween resume() code goes here
                 tl.resume();
              
                 // add remove active class
                 TweenMax.set($focusW,{className:'+=active'});
                 TweenMax.set($blurW,{className:'-=active'});
                 TweenMax.set($focus,{className:'-=active'});
                 TweenMax.set($blur,{className:'-=active'});
              
            },300);

        }, false);

        // bind blur event
        window.addEventListener("blur", function (event) {

            // tween pause() code goes
            tl.pause();
          
            // add remove active class
            TweenMax.set($blurW,{className:'+=active'});
            TweenMax.set($focusW,{className:'-=active'});
            TweenMax.set($focus,{className:'-=active'});
            TweenMax.set($blur,{className:'-=active'});

        }, false);

    } else {

        // bind focus event
        window.attachEvent("focus", function (event) {

            setTimeout(function(){                 

                 // tween resume() code goes here
                 tl.resume();
               
                 // add remove active class
                 TweenMax.set($focusW,{className:'+=active'});
                 TweenMax.set($blurW,{className:'-=active'});
                 TweenMax.set($focus,{className:'-=active'});
                 TweenMax.set($blur,{className:'-=active'});
              
            },300);

        });

        // bind focus event
        window.attachEvent("blur", function (event) {

            // tween pause() code goes here
            tl.pause();
          
            // add remove active class
            TweenMax.set($blurW,{className:'+=active'});
            TweenMax.set($focusW,{className:'-=active'});
            TweenMax.set($focus,{className:'-=active'});
            TweenMax.set($blur,{className:'-=active'});

        });
    }
}