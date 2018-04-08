$(document).ready(function(){
//slider 
  // startcheckingNots();
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

  $("#notiBell").click(function(){
    $(".notiTabDiv,.dropParent").fadeToggle("slow");
  });

  $(".loggedDiv").click(function(){
    $(".drop,.dropParent").fadeToggle("slow");
  }); 

   $(".dropParent").click(function(){
    $(".drop,.dropParent").fadeOut("slow");
    $(".notiTabDiv").fadeOut("slow");
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
      document.getElementsByName('sellpics'+uploaded)[0].style.display="none";
      var td=document.getElementById('ImagesSellTd');
      var div=document.getElementsByClassName('uploadDivSell');
      var lastip=document.getElementsByClassName('sellPics');
      var input=document.createElement('input');
      input.type="file";
      input.setAttribute('name','sellpics'+(uploaded+1));
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
      if(uploaded==4)
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

var unloaded = false;
$(window).on('unload', unload);  
function unload(){    
  if(!unloaded){
    $('body').css('cursor','wait');
    $.ajax({
      type: 'post',
      url: 'logOut.php',
      success:function(){ 
        unloaded = true; 
      },
      timeout: 5000
    });
  }
}


// function startcheckingNots(){
//   var timeInt = setInterval(function(){ 
//     var notTable=document.getElementsByClassName("notiTabDiv")[0];
//     var firstChild=notTable.getElementsByClassName('notiTablesDivParent')[0];
//     var xhttp = new XMLHttpRequest();
//     xhttp.onreadystatechange = function() {

//       if (this.readyState == 4 && this.status == 200) {

//        console.log(this.responseText);
//         var messages=JSON.parse(this.responseText);
//         for(var i=0;i<messages.length;i++)
//         {
//           msgs=messages[i];
//           var table=document.createElement('table');
//           table.setAttribute('class','notiTables');
//           table.setAttribute('onclcik',msgs['locationTo']);
//           var tr=document.createElement('tr');
//           var td=document.createElement('td');
//           var img=document.createElement('img');
//           img.setAttribute('src','propics/'+msgs['propic']);
//           td.appendChild(img);
//           if(msgs['count']>1)
//           {
//             td.innerHTML+="<span class=\"countSpan\">"+msgs['count']+"<span>";
//           }
//           tr.appendChild(td);
//           td=document.createElement('td');
//           td.innerHTML=msgs['notifier']+" : "+msgs['notification'];
//           tr.appendChild(td);
//           table.appendChild(tr);

//           var div=document.createElement('div');
//           div.setAttribute('class','notiTablesDivParent');
//           div.appendChild(table);
//           // notTable.insertBefore(div,firstChild);
//           // console.log(notTable);
//         }
          
        
          
//       }
//     };
//     xhttp.open("POST", "ajax/checkForNotification.php", true);
//     xhttp.send();

//    }, 2000);  
// }