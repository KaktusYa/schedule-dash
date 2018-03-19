function getCurrentTime()
{

	//connect class
	var main = new Date();

	var hours = main.getHours();
	var mins = main.getMinutes();

	mins = mins < 10 ? `0${mins}` : mins

	document.getElementById("digital-time").innerHTML = `${hours}:${mins}`;
}
setInterval(getCurrentTime, 1000)