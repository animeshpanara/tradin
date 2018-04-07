function sendMsg(from,to) {
	var chatTable = document.getElementsByClassName('chatTable')[0];
	var textToSend=document.getElementById('chatTextArea').value;
	document.getElementById('chatTextArea').value="";
	textToSend=textToSend;
	var time = new Date();
	time=time.getTime();
	var data ={
		"from" : from,
		"to" : to,
		"time" : String(time),
		"msg" : textToSend
	}
	data=JSON.stringify(data)
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var divMsg=document.createElement("div");
      divMsg.setAttribute("class","chatSend");
      divMsg.innerHTML = "<pre>"+textToSend+"</pre>";
      var tr=document.createElement("tr");
      var td=document.createElement("td");
      td.appendChild(divMsg);
      tr.appendChild(td);

      chatTable.appendChild(tr);
    }
  };
  xhttp.open("POST", "ajax/sendMsg.php", true);
  xhttp.send(data);
}

function loadChats(from , to){
	var chatTable = document.getElementsByClassName('chatTable')[0];
	var data ={
		"id":-1,
		"from" : from,
		"to" : to,
		"noofmsg":10
	}
	data=JSON.stringify(data)
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {

    if (this.readyState == 4 && this.status == 200) {
    	var msgs=JSON.parse(this.responseText);
    	for(var i=msgs.length-1;i>=0;i--)
    	{
    		var divMsg=document.createElement("div");
    		if(msgs[i]["msgfrom"]==from && msgs[i]["msgto"]==to)
		    	divMsg.setAttribute("class","chatReceive");
		    else if(msgs[i]["msgfrom"]==to && msgs[i]["msgto"]==from)
		    	divMsg.setAttribute("class","chatSend");
		    divMsg.innerHTML = "<pre>"+msgs[i]["msg"]+"</pre>";
		    var tr=document.createElement("tr");
		    var td=document.createElement("td");
		    td.appendChild(divMsg);
		    tr.appendChild(td);
			chatTable.appendChild(tr);	
    	}
	      
    }
  };
  xhttp.open("POST", "ajax/getMsgs.php", true);
  xhttp.send(data);

}