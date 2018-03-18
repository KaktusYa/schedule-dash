function getCurrentTime()
{

	//connect class
	var main = new Date();

	var hours = main.getHours();
	var mins = main.getMinutes();

	if (mins == 0) {
		mins = 0 + "0"
	}

	if (mins == 1) {
		mins = 0 + "1"
	}

	if (mins == 2) {
		mins = 0 + "2"
	}

	if (mins == 3) {
		mins = 0 + "3"
	}

	if (mins == 4) {
		mins = 0 + "4"
	}

	if (mins == 5) {
		mins = 0 + "5"
	}

	if (mins == 6) {
		mins = 0 + "6"
	}

	if (mins == 7) {
		mins = 0 + "7"
	}

	if (mins == 8) {
		mins = 0 + "8"
	}				

	if (mins == 9) {
		mins = 0 + "9"
	}

	document.getElementById("digital-time").innerHTML = hours + ":" + mins;
}
setInterval(getCurrentTime, 1)