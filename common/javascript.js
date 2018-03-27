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
	req.open("POST", "save_schedules.php?content=" + JSON.stringify(data), true);				
	req.send();
}

function addTask(){
	var vals = [], arr = document.getElementsByClassName("alert alert-primary");
	var ntm = 1;
	if( arr != null && arr.length != null && arr.length > 0 )
	{
		arr.forEach(function(it, i, arr){
			vals[] = parseint(it.id.slice(3));
		});
		ntm = Math.max.apply(null, vals) + 1;
	}
	var tsk = document.createElement("div"), tsked = document.createElement("div");
	var edit = document.createElement("input"), select = document.createElement("input");
	
	//task block
	tsk.setAttribute("class", "alert alert-primary");
	tsk.id = "tsk" + ntm.toString();
	
	//editor
	tsked.setAttribute("class", "alert alert-editor");
	edit.setAttribute("type", "text");
	edit.setAttribute("class", "input-text");
	edit.setAttribute("placeholder", "Task Name");
	select.setAttribute("type", "time");
	select.setAttribute("class", "input-select");
	tsked.id = "tsked" + ntm.toString();
	tsked.n = edit.value = "Unspecified";
	tsked.t = select.value = "24:00";
	tsked.appendChild(edit);
	tsked.appendChild(select);
	
	//buttons
	var EdSh = document.createElement("button"), DlTs = document.createElement("button"),
	    EdTs = document.createElement("button"), DiCh = document.createElement("button");
	//buttons styles
	EdSh.setAttribute("class", "button-grey");
	DlTs.setAttribute("class", "button-grey red");
	EdTs.setAttribute("class", "button-grey green");
	DiCh.setAttribute("class", "button-grey red");
	
	//buttons text
	EdSh.innerHtml = "✎";
	DlTs.innerHtml = "✗";
	EdTs.innerHtml = "✓";
	DiCh.innerHtml = "✗";
	
	//buttons events
	EdSh.addEventListener("click", function(){editTaskShow(ntm);});
	DlTs.addEventListener("click", function(){deleteTask(ntm);});
	EdTs.addEventListener("click", function(){editTask(ntm);});
	DiCh.addEventListener("click", function(){discardChanges(ntm);});
	
	document.getElementById("_body").appendChild(tsk);
	document.getElementById("_body").appendChild(tsked);
	document.getElementById("_body").insertBefore(tsked, document.getElementById("add_box"));
	document.getElementById("_body").insertBefore(tsk, tsked);
	
	tsk.innerHtml = "<p>" + tsked.n + " <b>in " + tsked.t + "</b></p>";
}

function editTaskShow(nid){
	var tid = nid.toString();
	var th = document.getElementById("tsked" + tid);
	var ts = document.getElementById("tsk" + tid);
	th.style.display = "block";
	ts.style.display = "none";
}
function discardChanges(nid){
	tid = nid.toString();
	var th = document.getElementById("tsked" + tid);
	var ts = document.getElementById("tsk" + tid);
	th.style.display = "none";
	ts.style.display = "block";
	th.children[0].value = th.n;
	th.children[1].value = th.t;
	updSession();
}
function editTask(nid){
	var tid = nid.toString();
	var th = document.getElementById("tsked" + tid);
	var ts = document.getElementById("tsk" + tid);
	th.n = th.children[0].value; //Edit1 value
	th.t = th.children[1].value; //Time1 value
	document.getElementById("tsk" + tid).innerHtml = "<p>" + th.n + " <b>in " + th.t + "</b></p>";
	th.style.display = "none";
	ts.style.display = "block";
	updSession();
}

function deleteTask(nid){
	var tid = nid.toString();
	document.getElementById( "tsk" + tid).remove();
	document.getElementById( "tsked" + tid).remove();
	updSession();
}
setInterval(getCurrentTime, 1000);
