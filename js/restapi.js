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