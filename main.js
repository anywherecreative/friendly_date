/**
This program parses time stamps form an object, and creates a friendly version similar to the one seen on popular social networking sites.
the value for timestamp is taken from the server and then compared to the local time stamp and a varience is added to the local time to match server
time. The time re-calculated once every minute to insure accuracy. 

Copyright (C) 2014 Jeff Manning

This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program.  If not, see <http://www.gnu.org/licenses/>.
**/
var HOUR = 3600;
var DAY = 86400;
var WEEK = 604800;
var varience = server - Math.round(new Date().getTime()/1000);
$(document).ready(function() {
	updateDates();
	setInterval("updateDates()",60000); //once a minute
});
function updateDates() {
	var timestamp = Math.round(new Date().getTime()/1000)+varience;
	$('[data-roll="time"]').each(function() {
		var diff =timestamp - parseInt($(this).data('time'));
		if(diff < 60) {
			$(this).text('Just Now');
		}
		else if(diff >= 60 && diff < HOUR) {
			$(this).text('About ' + Math.floor(diff/60) + ' Minute' + (((Math.round(diff/60)) > 1) ? 's':'') + ' ago');
		}
		else if(diff >= HOUR && diff < DAY) {
			$(this).text('About ' + Math.round(diff/HOUR) + ' Hour' + (((Math.round(diff/HOUR)) > 1) ? 's':'') + ' ago');
		}
		else if(diff >= DAY && diff < WEEK) {
			$(this).text('About ' + Math.round(diff/DAY) + ' day' + (((Math.round(diff/DAY)) > 1) ? 's':'') + ' ago');
		}
		else {
			// show the date
			$(this).text(textDate(parseInt($(this).data('time'))));
		}
	});
}
function textDate(timestamp) {
	var theDate = new Date(timestamp*1000); //js likes to use miliseconds
	var result = "";
	switch(theDate.getMonth()) {
		case 0:
			result+="January ";
			break;
		case 1: 
			result +="February";
			break;
		case 2:
			result +="March";
			break;
		case 3:
			result +="April";
			break;
		case 4:
			result +="May";
			break;
		case 5:
			result +="June";
			break;
		case 6:
			result+="July";
			break;
		case 7:
			result +="August";
			break;
		case 8:
			result +="September";
			break;
		case 9:
			result +="October";
			break;
		case 10:
			result +="November";
			break;
		case 11:
			result +="December";
			break;
	}
	result += " " + theDate.getDate(); //day of the week
	result += ", "+theDate.getFullYear();
	return result;
}