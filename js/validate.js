$("input[name=fname]").blur(function(){
	if ($("input[name=fname]").val()=='') {
		if(!$(".efname").length)
		{
			$("input[name=fname]").before("<span class='error efname'>Enter First Name</span>");
		}
	}
	else{
		$(".efname").remove();
	}
});

$("input[name=lname]").blur(function(){
	if ($("input[name=lname]").val()=='') {
		if(!$(".elname").length)
		{
			$("input[name=lname]").before("<span class='error elname'>Enter Last Name</span>");
		}
	}
	else{
		$(".elname").remove();
	}
});

$("input[name=email]").blur(function(){
	var vemail=/^([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)@([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)[\\.]([a-zA-Z]{2,9})$/;
	if ($("input[name=email]").val()=='') {
		$(".evemail").remove();
		if(!$(".eemail").length)
		{
			$("input[name=email]").before("<span class='error eemail'>Enter Email-Id</span>");
		}
	}
	else if(vemail.test($("input[name=email]").val())==false){
		$(".eemail").remove();
		if(!$(".evemail").length)
		{
			$("input[name=email]").before("<span class='error evemail'>Enter Valid Email-Id</span>");
		}
	}
	else{
		$(".eemail").remove();
		$(".evemail").remove();
	}
});

$("input[name=mobno]").blur(function(){
	if(isNaN($("input[name=mobno]").val())){
		if(!$(".evmobno").length)
		{
			$("input[name=mobno]").before("<span class='error evmobno'>Enter Valid Mobile Number</span>");
		}
	}
	else if($("input[name=mobno]").val().length!=10){
		if ($("input[name=mobno]").val().length!=0) {
			if(!$(".evmobno").length)
			{
				$("input[name=mobno]").before("<span class='error evmobno'>Enter Valid Mobile Number</span>");
			}
			else{
				$(".evmobno").remove();
			}
		}
	}
	else{
		$(".evmobno").remove();
	}
});

$("input[name=uname]").blur(function(){
	if ($("input[name=uname]").val()=='') {
		$(".evuname").remove();
		if(!$(".euname").length)
		{
			$("input[name=uname]").before("<span class='error euname'>Enter User Name</span>");
		}
	}
	else if($("input[name=uname]").val().length<6){
		$(".euname").remove();
		if(!$(".evuname").length)
		{
			$("input[name=uname]").before("<span class='error evuname'>Enter Valid User Name of 6 char.</span>");
		}
	}
	else{
		$(".euname").remove();
		$(".evuname").remove();
	}
});

$("input[name=pass]").blur(function(){
	if ($("input[name=pass]").val()=='') {
		$(".evpass").remove();
		if(!$(".epass").length)
		{
			$("input[name=pass]").before("<span class='error epass'>Enter Password</span>");
		}
	}
	else if($("input[name=pass]").val().length<6){
		$(".epass").remove();
		if(!$(".evpass").length)
		{
			$("input[name=pass]").before("<span class='error evpass'>Enter Password of 6 char.</span>");
		}
	}
	else{
		$(".epass").remove();
		$(".evpass").remove();
	}
});

$("input[name=cpass]").blur(function(){
	if ($("input[name=cpass]").val()=='') {
		$(".evcpass").remove();
		if(!$(".ecpass").length)
		{
			$("input[name=cpass]").before("<span class='error ecpass'>Confirm Password</span>");
		}
	}
	else if($("input[name=cpass]").val()!=$("input[name=pass]").val()){
		$(".ecpass").remove();
		if(!$(".evcpass").length)
		{
			$("input[name=cpass]").before("<span class='error evcpass'>Match with your Password</span>");
		}
	}
	else{
		$(".ecpass").remove();
		$(".evcpass").remove();
	}
});

$("select.signupips").blur(function(){
	if ($("select.signupips").val()=='') 
	{
		if (!$(".esecq").length) {
			$("select.signupips").before("<span class='error esecq'>Select Security Question</span>");
		}
	}
	else
	{
		$(".esecq").remove();
	}
});

$("input[name=secans]").blur(function(){
	if ($("input[name=secans]").val()=='') 
	{
		if (!$(".eseca").length) {
			$("input[name=secans]").before("<span class='error eseca'>Give Security Answer</span>");
		}
	}
	else
	{
		$(".eseca").remove();
	}
});

$("input[name=fname]").on('input',function(){
	if ($("input[name=fname]").val()=='') {
		if(!$(".efname").length)
		{
			$("input[name=fname]").before("<span class='error efname'>Enter First Name</span>");
		}
	}
	else{
		$(".efname").remove();
	}
});

$("input[name=lname]").on('input',function(){
	if ($("input[name=lname]").val()=='') {
		if(!$(".elname").length)
		{
			$("input[name=lname]").before("<span class='error elname'>Enter Last Name</span>");
		}
	}
	else{
		$(".elname").remove();
	}
});

$("input[name=email]").on('input',function(){
	var vemail=/^([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)@([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)[\\.]([a-zA-Z]{2,9})$/;
	if ($("input[name=email]").val()=='') {
		$(".evemail").remove();
		if(!$(".eemail").length)
		{
			$("input[name=email]").before("<span class='error eemail'>Enter Email-Id</span>");
		}
	}
	else if(vemail.test($("input[name=email]").val())==false){
		$(".eemail").remove();
		if(!$(".evemail").length)
		{
			$("input[name=email]").before("<span class='error evemail'>Enter Valid Email-Id</span>");
		}
	}
	else{
		$(".eemail").remove();
		$(".evemail").remove();
	}
});

$("input[name=mobno]").on('input',function(){
	if(isNaN($("input[name=mobno]").val())){
		if(!$(".evmobno").length)
		{
			$("input[name=mobno]").before("<span class='error evmobno'>Enter Valid Mobile Number</span>");
		}
	}
	else if($("input[name=mobno]").val().length!=10){
		if ($("input[name=mobno]").val().length!=0) {
			if(!$(".evmobno").length)
			{
				$("input[name=mobno]").before("<span class='error evmobno'>Enter Valid Mobile Number</span>");
			}
		}
		else{
			$(".evmobno").remove();
		}
	}
	else{
		$(".evmobno").remove();
	}
});

$("input[name=uname]").on('input',function(){
	if ($("input[name=uname]").val()=='') {
		$(".evuname").remove();
		if(!$(".euname").length)
		{
			$("input[name=uname]").before("<span class='error euname'>Enter User Name</span>");
		}
	}
	else if($("input[name=uname]").val().length<6){
		$(".euname").remove();
		if(!$(".evuname").length)
		{
			$("input[name=uname]").before("<span class='error evuname'>Enter Valid User Name of 6 char.</span>");
		}
	}
	else{
		$(".euname").remove();
		$(".evuname").remove();
	}
});

$("input[name=pass]").on('input',function(){
	if ($("input[name=pass]").val()=='') {
		$(".evpass").remove();
		if(!$(".epass").length)
		{
			$("input[name=pass]").before("<span class='error epass'>Enter Password</span>");
		}
	}
	else if($("input[name=pass]").val().length<6){
		$(".epass").remove();
		if(!$(".evpass").length)
		{
			$("input[name=pass]").before("<span class='error evpass'>Enter Password of 6 char.</span>");
		}
	}
	else{
		$(".epass").remove();
		$(".evpass").remove();
	}
});

$("input[name=cpass]").on('input',function(){
	if ($("input[name=cpass]").val()=='') {
		$(".evcpass").remove();
		if(!$(".ecpass").length)
		{
			$("input[name=cpass]").before("<span class='error ecpass'>Confirm Password</span>");
		}
	}
	else if($("input[name=cpass]").val()!=$("input[name=pass]").val()){
		$(".ecpass").remove();
		if(!$(".evcpass").length)
		{
			$("input[name=cpass]").before("<span class='error evcpass'>Match with your Password</span>");
		}
	}
	else{
		$(".ecpass").remove();
		$(".evcpass").remove();
	}
});

$("select.signupips").on('input',function(){
	if ($("select.signupips").val()=='') 
	{
		if (!$(".esecq").length) {
			$("select.signupips").before("<span class='error esecq'>Select Security Question</span>");
		}
	}
	else
	{
		$(".esecq").remove();
	}
});

$("input[name=secans]").on('input',function(){
	if ($("input[name=secans]").val()=='') 
	{
		if (!$(".eseca").length) {
			$("input[name=secans]").before("<span class='error eseca'>Give Security Answer</span>");
		}
	}
	else
	{
		$(".eseca").remove();
	}
});

$("#signup").submit(function(){
	if ($("input[name=fname]").val()=='') {
		if(!$(".efname").length)
		{
			$("input[name=fname]").before("<span class='error efname'>Enter First Name</span>");
		}
		$('html, body').animate({
       		scrollTop: 0
    	}, 500);
		return false;
	}
	if ($("input[name=lname]").val()=='') {
		if(!$(".elname").length)
		{
			$("input[name=lname]").before("<span class='error elname'>Enter Last Name</span>");
		}
		$('html, body').animate({
       		scrollTop: 0
    	}, 500);
		return false;
	}
	var vemail=/^([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)@([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)[\\.]([a-zA-Z]{2,9})$/;
	if ($("input[name=email]").val()=='') {
		$(".evemail").remove();
		if(!$(".eemail").length)
		{
			$("input[name=email]").before("<span class='error eemail'>Enter Email-Id</span>");
		}
		$('html, body').animate({
       		scrollTop: 0
    	}, 500);
		return false;
	}
	else if(vemail.test($("input[name=email]").val())==false){
		$(".eemail").remove();
		if(!$(".evemail").length)
		{
			$("input[name=email]").before("<span class='error evemail'>Enter Valid Email-Id</span>");
		}
		$('html, body').animate({
       		scrollTop: 0
    	}, 500);
		return false;
	}
	if(isNaN($("input[name=mobno]").val())){
		$(".emobno").remove();
		if(!$(".evmobno").length)
		{
			$("input[name=mobno]").before("<span class='error evmobno'>Enter Valid Mobile Number</span>");
		}
		$('html, body').animate({
       		scrollTop: 0
    	}, 500);
		return false;
	}
	else if($("input[name=mobno]").val().length!=10){
		$(".evmobno").remove();
		if ($("input[name=mobno]").val().length!=0) {
			if(!$(".evmobno").length)
			{
				$("input[name=mobno]").before("<span class='error evmobno'>Enter Valid Mobile Number</span>");
			}
			$('html, body').animate({
       			scrollTop: 0
    		}, 500);
			return false;
		}
	}
	if ($("input[name=uname]").val()=='') {
		$(".evuname").remove();
		if(!$(".euname").length)
		{
			$("input[name=uname]").before("<span class='error euname'>Enter User Name</span>");
		}
		$('html, body').animate({
       		scrollTop: 0
    	}, 500);
		return false;
	}
	else if($("input[name=uname]").val().length<6){
		$(".euname").remove();
		if(!$(".evuname").length)
		{
			$("input[name=uname]").before("<span class='error evuname'>Enter Valid User Name of 6 char.</span>");
		}
		$('html, body').animate({
       		scrollTop: 0
    	}, 500);
		return false;
	}
	if ($("input[name=pass]").val()=='') {
		$(".evpass").remove();
		if(!$(".epass").length)
		{
			$("input[name=pass]").before("<span class='error epass'>Enter Password</span>");
		}
		$('html, body').animate({
       		scrollTop: 0
    	}, 500);
		return false;
	}
	else if($("input[name=pass]").val().length<6){
		$(".epass").remove();
		if(!$(".evpass").length)
		{
			$("input[name=pass]").before("<span class='error evpass'>Enter Password of 6 char.</span>");
		}
		$('html, body').animate({
       		scrollTop: 0
    	}, 500);
		return false;
	}
	if ($("input[name=cpass]").val()=='') {
		$(".evcpass").remove();
		if(!$(".ecpass").length)
		{
			$("input[name=cpass]").before("<span class='error ecpass'>Confirm Password</span>");
		}
		$('html, body').animate({
       		scrollTop: 0
    	}, 500);
		return false;
	}
	else if($("input[name=cpass]").val()!=$("input[name=pass]").val()){
		$(".ecpass").remove();
		if(!$(".evcpass").length)
		{
			$("input[name=cpass]").before("<span class='error evcpass'>Match with your Password</span>");
		}
		$('html, body').animate({
       		scrollTop: 0
    	}, 500);
		return false;
	}
	if ($("select.signupips").val()=='') 
	{
		if (!$(".esecq").length) {
			$("select.signupips").before("<span class='error esecq'>Select Security Question</span>");
		}
		$('html, body').animate({
       		scrollTop: 0
    	}, 500);
		return false;
	}
	if ($("input[name=secans]").val()=='') 
	{
		if (!$(".eseca").length) {
			$("input[name=secans]").before("<span class='error eseca'>Give Security Answer</span>");
		}
		$('html, body').animate({
       		scrollTop: 0
    	}, 500);
		return false;
	}
	return true;
});

