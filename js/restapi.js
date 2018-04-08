function removeProfilePic() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById('userProfilePic').src='propics/client.png';
    }
  };
  xhttp.open("POST", "ajax/removeProfilePic.php", true);
  xhttp.send();
}

function readAllNoti(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
	   document.getElementById("notiBell").innerHTML=0;
	}
  };
	xhttp.open("POST", "ajax/readAllNoti.php", true);
	xhttp.send();
}

function addForInt(item,btn){
  var data="item="+item;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
     btn.innerHTML=this.responseText;
  }
  };
  xhttp.open("POST", "ajax/iaminterested.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(data);
}

function haveBid(aid){
  var data="aid="+aid;
  var input=document.getElementById('bidInput'+aid);
  var bidPrice=input.value;
  data+="&bidPrice="+bidPrice;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
     // btn.innerHTML=this.responseText;
     var resp=this.responseText;

     if(resp=="error"){
      document.getElementById('bidError'+aid).innerHTML="Please Bid price greater than top price";
      setTimeout(function(){
        document.getElementById('bidError'+aid).innerHTML="";
      },2500);
     }
     else{
      resp=JSON.parse(resp);
      document.getElementById('topBidder'+aid).innerHTML=resp[0];
      document.getElementById('topPrice'+aid).innerHTML=resp[1];
     }
  }
  };
  xhttp.open("POST", "ajax/haveBid.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(data);
}

