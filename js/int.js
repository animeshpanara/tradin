$(document).ready(function(){
//slider 
  var slides=1;
  var interval;
  startInterval();

  function startInterval(){
    interval=setInterval(function(){
      $("#slideul").animate({'margin-left':'-=100%'},1000,function(){
        slides++;
        if(slides==8)
        {
          slides=1;
          $("#slideul").css("margin-left","0px");
        }
      });
    },7000);
  };

  $("#slider").mouseenter(function(){
    clearInterval(interval);
  });

  $("#slider").mouseleave(function(){
    startInterval();
  });
//slider end

//buy effects
  $(".buyimg3,.buyimg4").show("scale",1000);
//devs

  $(".vdmwrap").hide();
  $(".akswrap").hide();

  $(".vdmImg").mouseenter(function(){
    $(".vdmwrap").fadeIn();
    $(".devslinks").animate({'top':'70px'},500);
  });

  $(".vdmwrap").mouseleave(function(){
    $(".vdmwrap").fadeOut("slow");
    $(".devslinks").animate({'top':'-50px'},500);
  });

  $(".aksImg").mouseenter(function(){
    $(".akswrap").fadeIn("slow");
    $(".devslinks1").animate({'top':'70px'},500);
  });

  $(".akswrap").mouseleave(function(){
    $(".akswrap").fadeOut("slow");
    $(".devslinks1").animate({'top':'-50px'},500);
  });

  //aboutus
  $(".inactiveUpper").click(function(){
    $(".inactiveUpper").css("background-color","#1DA1F1")
    $(".activeUpper").css("background-color","#bec2c3");
  });

  $(".activeUpper").click(function(){
    $(".activeUpper").css("background-color","#1DA1F1")
    $(".inactiveUpper").css("background-color","#bec2c3");
  });

  //mobile int

  $("#bars").click(function(){
    $(".mobmenubar").show("slide",700);
  });

  $("#arrowback").click(function(){
    $(".mobmenubar").hide("slide",700);
  });

  //menubar

  $(".loggedDiv").click(function(){
    $(".drop,.dropParent").fadeToggle("slow");
  }); 

   $(".dropParent").click(function(){
    $(".drop,.dropParent").fadeOut("slow");
  }); 

});

function profileLoad(input){
   var path=input.value;
   var ext=path.slice(-3);
   if((ext==="jpg" || ext==="png"))
   {
      if (input.files[0].size<=1024*1024*5) {
        if(input.files && input.files[0])
        {
          var reader=new FileReader();
          reader.onload=function(e){
            document.getElementById('userProfilePic').src=e.target.result;
          }
          reader.readAsDataURL(input.files[0]);
        }
      }
      else
      {
        alert("Selected Photo should be less than 5MB size")
      }
   }
   else
   {
     alert("Select Photo in jpg or png format");
   }
}

var uploaded = 0;
function uploadImgSell(imgValue){
  var path=imgValue.value;
  var ext=path.slice(-3);
  if((ext==="jpg" || ext==="png"))
  {
    if (imgValue.files[0].size<=1024*1024*5) {
      var td=document.getElementById('ImagesSellTd');
      var div=document.getElementsByClassName('uploadDivSell');
      var lastip=document.getElementsByClassName('sellPics');
      var input=document.createElement('input');
      input.type="file";
      input.setAttribute('name','sellPics');
      input.setAttribute('onchange','uploadImgSell(this)');
      input.className="sellPics"
      div[0].insertBefore(input,lastip[uploaded]);
      uploaded++;
      lastip[uploaded].style.display="none";
      var image = document.createElement('img');
      image.id="imageSell"+uploaded;
      image.style.width="80px";
      image.style.height="80px";
      image.style.marginRight="5px";
      image.style.marginBottom="10px";
      td.insertBefore(image,div[0]);
      if(imgValue.files && imgValue.files[0])
      {
        var reader=new FileReader();
        reader.onload=function(e){
        document.getElementById("imageSell"+uploaded).src=e.target.result;
        }
        reader.readAsDataURL(imgValue.files[0]);
      }
      if(uploaded==6)
      {
        div[0].style.display="none";
      }
    }
    else
    {
      alert("Image should of less than 5MB size");
    }
  }
  else
  {
    alert("Image should of jpg and png format")
  }
}

function showans(n){
  $(".faqah").eq(n).slideToggle(800);
  $(".faq .fa").eq(n).toggleClass("fa-plus fa-minus");
}

$(document).on("pagecreate","#pageone",function(){
  $(".mobmenubar").on("swipeleft",function(){
    $(this).hide();
  });                       
});

function handleHeight(textarea,height){
  textarea.style.height=height+'px';
  textarea.style.height=((height/2)+textarea.scrollHeight)+'px';
}