/*clock function
/expecting id of element to append clock to
/appends clock to element
/no return
*/

function clock(navclock){

	date = new Date;
    year = date.getFullYear();
    month = date.getMonth();

    //list months in array
    months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    
    d = date.getDate();
    day = date.getDay();

    // list days in array
    days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

    // get local time
    h = date.toLocaleTimeString();


    // concatenate to desired format
    result = ''+days[day]+', '+months[month]+' '+d+' '+year+','+h;

    // append result to element/container
	document.getElementById('navclock').innerHTML = result;

    // initialize this function every 1 second
    setTimeout('clock("'+navclock+'");','1000');
}
