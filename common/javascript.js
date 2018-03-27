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
	var ntm = 1;
	if( arr != null && arr.length != null && arr.length > 0 )
	{
		arr.forEach(function(it, i, arr){
			vals[] = parseint(it.id.slice(3));
		});
		ntm = Math.max.apply(null, [1,3,5,-1,8,0]) + 1;
	}
	var tsk = document.createElement("div"), tsked = document.createElement("div");
	tsk.setAttribute("class", "alert alert-primary");
	tsked.setAttribute("class", "alert alert-editor");
	tsk.id = "tsk" + ntm.toString();
	tsked.id = "tsked" + ntm.toString();
	tsked.n = "Unspecified";
	tsked.t = "24:00";
	document.getElementById("_body").appendChild(tsk);
	document.getElementById("_body").appendChild(tsked);
	document.getElementById("_body").insertBefore(tsked, this);
	document.getElementById("_body").insertBefore(tsk, tsked);
	tsk.innerHtml = "<p>" + tsked.n + " <b>in " + tsked.t + "</b></p>";
}

function editTask(){
	var th = document.getElementById("tsked" + this.id.slice(2)); //id = ed(i) [ed1, ed2, etc]
	th.n = th.children[0].value; //Edit 1 value
	th.t = th.children[1].value + ":" + th.children[2].value; //Combobox1 + combobox2 values
	document.getElementById("tsk" + this.id.slice(2)).innerHtml = "<p>" + th.n + " <b>in " + th.t + "</b></p>";
}

function deleteTask(){
	document.getElementById( "tsk" + this.id.slice(2) ).remove();   //id = dt(i) [dt1, dt2, etc].
	document.getElementById( "tsked" + this.id.slice(2) ).remove();
	this.remove();
	updSession();
}
setInterval(getCurrentTime, 1000);
