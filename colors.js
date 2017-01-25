function changeButtColor(elem){
	if(elem.style.backgroundColor == "white"){
		elem.style.backgroundColor = "#cf7";
	}
	else if(elem.name == "current"){
		elem.style.backgroundColor = "#cf7";
	}
	else{
		elem.style.backgroundColor = "white";
	}
}

function clicked(elem){
	elem.style.backgroundColor = "#9fc";
}

function setCookie(c_name,value,exdays)
{
	deleteCookie(c_name);
	var exdate=new Date();
	exdate.setDate(exdate.getDate() + exdays);
	var c_value=escape(value) + ((exdays==null) ? "" : "; expires :"+exdate.toUTCString());
	document.cookie=c_name + "=" + c_value;
	document.cookie="expires :" + exdate;
}

function getCookie(c_name)
{
var i,x,y,ARRcookies=document.cookie.split(";");
for (i=0;i<ARRcookies.length;i++)
  {
  x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
  y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
  x=x.replace(/^\s+|\s+$/g,"");
  if (x==c_name)
    {
    return unescape(y);
    }
  }
}
function deleteCookie(c_name) {
    document.cookie = encodeURIComponent(c_name) + "=deleted; expires=" + new Date(0).toUTCString();
}
function checkCookie()
{
var obj = document.getElementById('feed');
obj.style.height = '0px';

var username=getCookie("username");
if (username!=null && username!="")
  {
  document.forms[0].usernametop.value = username;
  }
else 
  {
  document.forms[0].usernametop.value = "";
  }
}

function changeInfo(elem){
	if(elem.value == "Edit Info"){
		elem.value = "Set Changes";
		document.getElementById("1").style.visibility = hidden;
		document.getElementById("2").style.visibility = hidden;
		document.getElementById("3").style.visibility = hidden;
		document.getElementById("4").style.visibility = hidden;
		document.getElementById("5").style.visibility = hidden;
	}
	else{
		elem.value = "Edit Info";
		document.getElementById("1").style.visibility = visible;
		document.getElementById("2").style.visibility = visible;
		document.getElementById("3").style.visibility = visible;
		document.getElementById("4").style.visibility = visible;
		document.getElementById("5").style.visibility = visible;
	}
}