var getPhTime = function(){
	document.getElementById('phtime').innerHTML = new Date().toLocaleString('fil-ph', {
		timeZone: 'Asia/Manila',
		timeStyle: 'medium',
		hourCycle: 'h24',
	});
}
getPhTime();
setInterval(getPhTime, 1000);