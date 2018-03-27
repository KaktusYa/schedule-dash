function getCurrentTime()
{

	//connect class
	var main = new Date();

	var hours = main.getHours();
	var mins = main.getMinutes();

	mins = mins < 10 ? `0${mins}` : mins;
	hours  = hours < 10 ? `0${hours}` : hours;
	
	document.getElementById("digital-time").innerHTML = `${hours}:${mins}`;
}

function updSession(){
	var data = [];
	var arr = document.getElementsByClassName("alert alert-primary");
	if( arr != null && arr.length != null && arr.length > 0 )
	{
		arr.forEach(function(it, i, arr){
			data[ parseint( it.id.slice(3) ) ]["n"] = document.getElementById("tsked" + it.id.slice(3)).n;
			data[ parseint( it.id.slice(3) ) ]["t"] = document.getElementById("tsked" + it.id.slice(3)).t;
		});
	}
	sessionStorage.setItem("shedules", JSON.stringify(data));
}

function addTask(){
	var vals = [], arr = document.getElementsByClassName("alert alert-primary");
	var last = 0;
	if( arr != null && arr.length != null && arr.length > 0 )
	{
		arr.forEach(function(it, i, arr){
			vals[] = parseint(it.id.slice(3));
		});
		last = Math.max.apply(null, [1,3,5,-1,8,0]);
	}
	
}

function editTask(){
	
}

function deleteTask(){
	document.getElementById("tsk" + this.id).remove();
	document.getElementById("tsked" + this.id).remove();
	this.remove();
	updSession();
}
setInterval(getCurrentTime, 1000);
