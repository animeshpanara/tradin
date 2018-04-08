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
      var status=this.responseText;
      if (status=="1") {
      	divMsg.innerHTML+="<i class=\"fa fa-check\"></i>";
      }
      var tr=document.createElement("tr");
      var td=document.createElement("td");
      td.appendChild(divMsg);
      tr.appendChild(td);

      chatTable.appendChild(tr);

      console.log(status);
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
		    if(msgs[i]["msgread"]=="1" && msgs[i]["msgfrom"]==to)
		    	divMsg.innerHTML+="<i class=\"fa fa-check\"></i>";
		    var tr=document.createElement("tr");
		    var td=document.createElement("td");
		    td.appendChild(divMsg);
		    tr.appendChild(td);
			chatTable.appendChild(tr);	
    	}

	 	startchecking(from,to);
	 	// startcheckingNots();
	 	console.log(this.responseText);	
    }
  };
  xhttp.open("POST", "ajax/getMsgs.php", true);
  xhttp.send(data);

}


function startchecking(from , to){
	var timeInt = setInterval(function(){ 
		
		var data={
			"from":from,
			"to":to
		}
		data=JSON.stringify(data);
		var chatTable = document.getElementsByClassName('chatTable')[0];
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {

	    if (this.readyState == 4 && this.status == 200) {

	    	var msgs=JSON.parse(this.responseText);
	    	lastAct=msgs[1];
	    	chatActive=msgs[2];
	    	msgs=msgs[0];
	    	if(chatActive=="1"){
	    		$('.chatSend:not(.fa)').append("<i class=\"fa fa-check\"></i>");
	    	}
	    	if(lastAct!="1")
	    	{
	    		var time = new Date(parseInt(lastAct)*1000-3.5*60*60*1000);
	    		var hours = time.getHours();
	    		var minutes = time.getMinutes();
	    		var seconds = time.getSeconds();
	    		var year = time.getFullYear();
	    		var month = time.getMonth()+1;
	    		month = month < 10 ? '0'+month : month;
	    		var date = time.getDate();
	    		date = date < 10 ? '0'+date : date;
	    		var ampm = hours>=12 ? 'pm' : 'am';
	    		hours=hours%12;
	    		hours = hours ? hours : 12;
	    		hours = hours < 10 ? '0'+hours : hours;
	    		minutes = minutes < 10 ? '0'+minutes : minutes;
	    		time = hours+":"+minutes+":"+seconds+ampm+" "+date+"-"+month+"-"+year;
	    		document.getElementById('userStatus').innerHTML="Last Online : "+time;
	    		online=0
	    	}
	    	else if(lastAct=="1")
	    	{
	    		document.getElementById('userStatus').innerHTML="Online";
	    		online=1;
	    	}
	    	if(msgs!=[])
	    	{
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
		      
	    }
	  };
	  xhttp.open("POST", "ajax/getNewMsgs.php", true);
	  xhttp.send(data);

	 }, 2000);	
}





