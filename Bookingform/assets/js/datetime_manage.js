
var $selected_day;
var $selected_monday;
var $selected_time;
var $selected_hour;
var $time_array;
var $time_array_length;
var $cur_date = new Array();
var $year_schedule_array;
var $cur_year_schedule;


var $date_selector_array = new Array();
$date_selector_array[0] = '.day-monday';
$date_selector_array[1] = '.day-tuesday';
$date_selector_array[2] = '.day-wednesday';
$date_selector_array[3] = '.day-thursday';
$date_selector_array[4] = '.day-friday';
$date_selector_array[5] = '.day-saturday';
$date_selector_array[6] = '.day-sunday';

var $month_list = new Array();
$month_list[0] = 'January';
$month_list[1] = 'Febuary';
$month_list[2] = 'March';
$month_list[3] = 'April';
$month_list[4] = 'May';
$month_list[5] = 'June';
$month_list[6] = 'July';
$month_list[7] = 'August';
$month_list[8] = 'September';
$month_list[9] = 'October';
$month_list[10] = 'November';
$month_list[11] = 'December'; 

var $time_array_winter = ['#time_9am','#time_10am','#time_11am','#time_12pm','#time_1pm','#time_2pm','#time_3pm','#time_4pm','#time_5pm','#time_6pm'];
var $time_array_summer = ['#time_6am','#time_7am','#time_8am','#time_9am','#time_10am','#time_11am','#time_12pm','#time_1pm','#time_2pm','#time_3pm','#time_4pm','#time_5pm','#time_6pm','#time_7pm','#time_8pm','#time_9pm'];

function isObject(val) {
    if (val === null) { return false;}
    return ( (typeof val === 'function') || (typeof val === 'object') );
}

function isEmpty(val) {
    if (val == null) { 
		return true;
	}
	
	if (val == undefined) { 
		return true;
	}
	
	if (val == '') { 
		return true;
	}
	
    return false;
}

function make_two_letter(str) {
	str = str.toString();

	if(str.length == 1) {
		return '0' + str;
	}
	else return str;
}

function is_in_array($year_schedule_array, $date) {
	if(!isObject($year_schedule_array))
		return false;
	//alert(JSON.stringify($year_schedule_array));
	if(isEmpty($year_schedule_array[$date])) {
		return false;
	}
	
	return true;
}

function set_active_state() {
	$temp = new Date($selected_monday);
	
	for (x in $date_selector_array) {
		$('.datesofweek ' + $date_selector_array[x] + ' .daynumber-container').removeClass('active'); 
		$('.datesofweek ' + $date_selector_array[x] + ' .daynumber-container').removeClass('disabled'); 
		
		if($temp.toDateString() == $selected_day.toDateString())
		{
			$('.datesofweek ' + $date_selector_array[x] + ' .daynumber-container').addClass('active');  
		}
		
		$date = get_standard_date($temp);
		
		if(!get_date_state($year_schedule_array, $date)) {
			$('.datesofweek ' + $date_selector_array[x] + ' .daynumber-container').addClass('disabled');
		}
	
		$temp.setDate($temp.getDate() + 1); 
	}
	
	$('.monthofdate').text($month_list[$selected_day.getMonth()]+' '+$selected_day.getFullYear());
	
	var dd = $selected_day.getDate();
	var mm = $selected_day.getMonth();
	var y = $selected_day.getFullYear();
	$('.selected-date').val(dd + ' '+ $month_list[mm] + ' '+y);    
	$cur_date[0] = y;
	$cur_date[1] = mm;
	$cur_date[2] = dd;
	
	//==================================================
	if(y != $cur_year_schedule ) {
		
		$cur_year_schedule = y;
		var request = $.ajax({
			method: "GET",
			url: "home/get_yeardata",
			data: { year : $cur_year_schedule },
		});
			 
		request.done(function( msg ) {
			alert( "Request success: " + msg );
		});
		 
		request.fail(function( jqXHR, textStatus ) {
			alert( "Request failed: " + textStatus );
		});	
	}
	
	$selected_date = get_standard_date($selected_day);
	$time_array = get_time_array(mm, $year_schedule_array, $selected_date);
		
	$selected_time = $time_array[0];
	$time_array_length = $time_array.length;
	$selected_hour = $('.hour').val();
	
	set_time_selectstate();
	
	$('.time-container .selected-time').val($('span',$($selected_time)).text().trim());
	$('.time-item').addClass('disabled');
	
	for($i = 0; $i < $time_array_length; $i++) {
		$($time_array[$i]).removeClass('disabled');
	}
	
	//==================================================
	
}

function set_datesofweek() {
	$temp = new Date($selected_monday);
	var dd = $selected_monday.getDate();
	
	for (x in $date_selector_array) {
		dd = $temp.getDate();
		
		$date = get_standard_date($temp);
		$state = 0;
		if(is_in_array($year_schedule_array, $date)) {
			$state = $year_schedule_array[$date].state;
		}
		else {
			$state = 1;
		}
		
		if($state == 0)
			$('.datesofweek ' + $date_selector_array[x] + ' .daynumber-container').addClass('disabled');
	
		$('.datesofweek ' + $date_selector_array[x] + ' .daynumber').text(dd); 
		$('.datesofweek ' + $date_selector_array[x] + ' .date-string').text($temp.toString()); 
		$temp.setDate($temp.getDate() + 1); 
	}
	
	set_active_state();
}

function set_time_selectstate() {
	$('.time-container .time-item:not(.disabled)').each(function() {
		$(this).removeClass('active');
	});
	
	$cur_time_key = $time_array.indexOf($selected_time);
	$cur_time_key = Math.min($time_array_length-$selected_hour, $cur_time_key);
	$selected_time = $time_array[$cur_time_key];
	
	$('.time-container .selected-time').val($('span', $($selected_time)).text().trim());
	
	for($i = $cur_time_key; $i < (Number($cur_time_key)+Number($selected_hour)); $i++)
	{
		$($time_array[$i]).addClass('active');
	}
}

function validateEmail(email) {
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}

function validateNumber(number) {
	var re = /^[0-9]*$/;
	return re.test(number);
}

function get_time_array(mm, $year_schedule_array, $date) {
	if(is_in_array($year_schedule_array, $date)) {
		if($year_schedule_array[$date].state == 1) {
			$time_array = $.parseJSON($year_schedule_array[$date].time_array);	
			return $time_array;
		}
		else {
			$time_array = new Array();	
			return $time_array;
		}
	}
	
	if((mm>=3) && (mm<=8))
		$time_array = $time_array_winter;
	else 
		$time_array = $time_array_summer;

	return $time_array;
}

function get_date_state($year_schedule_array, $date) {
	if(is_in_array($year_schedule_array, $date)) {
		if($year_schedule_array[$date].state == 1) {
			return true;
		}
		else {
			return false;
		}
	}

	return true;
}

function get_standard_date($selected_day) {
	var dd = $selected_day.getDate();
	var mm = $selected_day.getMonth();
	var y = $selected_day.getFullYear();
   
	var two_letter_mm = make_two_letter(mm+1);
	var two_letter_dd = make_two_letter(dd);
	
	$selected_date = y + '-'+ two_letter_mm + '-'+ two_letter_dd;
	
	return $selected_date;
}

function validate_cur_date() {
	var $today = new Date();
	
	var dd = $today.getDate();
	var mm = $today.getMonth();
	var y = $today.getFullYear();
	
	var $flag = 0;
	if($cur_date[0] < y)
	{
		$flag = 1;
	}
	else if(($cur_date[0] == y) && ($cur_date[1] < mm))
	{
		$flag = 1;
	}
	else if(($cur_date[0] == y) && ($cur_date[1] == mm) && ($cur_date[2] < dd))
	{
		$flag = 1;
	}
	
	return $flag;
}
	
$(document).ready(function() {
    
	
	/*var calendarPicker2 = $(".date-container").calendarPicker({
		monthNames:["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
		dayNames: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
		//useWheel:true,
		//callbackDelay:500,
		years:1,
		months:1,
		days:7,
		callback:function(cal) {
		  $(".data-value").html("Selected date: " + cal.currentDate);

    }});  */
    	
	
    function init() {
		$year_schedule_array = $.parseJSON($('.time_array').val());
		
		var $i = 0;
		var $today = new Date();
		for ($i= 0; $i<300; $i++) {
			$date = get_standard_date($today);
			
			if(get_date_state($year_schedule_array, $date)) {
				break;
			}
		
			$today.setDate($today.getDate() + 1); 
		}
		
        $selected_monday = new Date($today.toString());
        $dayofweek = $today.getDay();
        $selected_monday.setDate($selected_monday.getDate() - $dayofweek + 1); 
        $selected_day = new Date($today.toString());
        
        var dd = $selected_day.getDate();
        var mm = $selected_day.getMonth();
        var y = $selected_day.getFullYear();
		
		var two_letter_mm = make_two_letter(mm+1);
		var two_letter_dd = make_two_letter(dd);
		
        $selected_date = y + '-'+ two_letter_mm + '-'+ two_letter_dd;
		
		$('.selected-date').val(dd + ' '+ $month_list[mm] + ' '+y); 
        
        if(!($('.time_array').val())) {
			return;
		}
		
		$cur_year_schedule = y;
		
		$time_array = get_time_array(mm, $year_schedule_array, $selected_date);
		
		$selected_time = $time_array[0];
		$time_array_length = $time_array.length;
		$selected_hour = $('.hour').val();
		
		set_time_selectstate();
		set_datesofweek();
        
		$('.time-container .selected-time').val($('span',$($selected_time)).text().trim());
		
		for($i = 0; $i < $time_array_length; $i++) {
			$($time_array[$i]).removeClass('disabled');
		}
		
	}
    
    $('.cal-right-arrow').click(function() {
        $selected_monday.setDate($selected_monday.getDate() + 7); 
        
        set_datesofweek();      
    });
    
    $('.cal-left-arrow').click(function() {
        $selected_monday.setDate($selected_monday.getDate() - 7); 
        
        set_datesofweek();     
    });
	
	
	$('.btn-next').click(function(event) {
		$state = 0;
		
		$('.require').each(function() {
			if(!$(this).val())
			{
				$state = 1;
				return;
			}
		});
		
		$('.selected-date').each(function() {
			if(validate_cur_date())
				$state = 4;
		});
		
		$('.number').each(function() {
			if(!validateNumber($(this).val()))
			{
				$state = 2;
				return;
			}
		});
		
		$('.email').each(function() {
			if(!validateEmail($(this).val()))
			{
				$state = 3;
				return;
			}
		});
		
		if($state == 1)
			alert('Please Fill Out Required Fields!');
		else if($state == 2)
			alert('Invalid Number!');
		else if($state == 3)
			alert('Invalid Email!');
		else if($state == 4)
			alert('Invalid Date!');
				
		if($state != 0)
			event.preventDefault();
	});
    
    init();
	date_time_manage_init();
});


function set_time_array($date, $state, $time_array) {
	var $record = {};
	$record.date = $date;
	$record.title = $('.tour-title-text').text().trim();
	$record.state = $state;
	$record.time_array = $time_array;
	
	$year_schedule_array[$date] = $record;
	
}

function set_desabled_state() {
	var $date = get_standard_date($selected_day);
	
	/*$.ajax({
	  dataType: "json",
	  url: url,
	  data: data,
	  success: success
	});
	
	$.ajax({
	  method: "POST",
	  url: "some.php",
	  data: { name: "John", location: "Boston" }
	})
	.done(function( msg ) {
		alert( "Data Saved: " + msg );
	});
	*/
	
	var $record = {};
	$record.date = $date;
	$record.title = $('.tour-title-text').text().trim();
	$record.state = 1;
	
	if ($('.datesofweek ' + ' .daynumber-container.active').is('.disabled')) {
		$record.state = 0;
	}
	
	$time_array_length = $time_array_summer.length;

	$time_array = new Array();
	for($i = 0; $i < $time_array_length; $i++) {
		if(!$($time_array_summer[$i]).is('.disabled'))
			$time_array.push($time_array_summer[$i]);
	}
	
	$record.time_array = JSON.stringify($time_array);
	
	set_time_array($date, $record.state, $record.time_array)
	
	var request = $.ajax({
		method: "POST",
		url: "home/change_day_schedule_item",
		data: { record: $record},
	});
		 
	request.done(function( msg ) {
		//alert( "Request success: " + msg );
	});
	 
	request.fail(function( jqXHR, textStatus ) {
		alert( "Request failed: " + textStatus );
	});
}

function date_time_manage_init() {

	for (x in $date_selector_array) {
		$('.datesofweek ' + $date_selector_array[x] + ' .daynumber-container').click(function(){
			$date = $('.date-string', $(this)).text();
			$date = $date.trim();
			$selected_day = new Date($date);
			
			if ($(this).is('.disabled'))
				$(this).removeClass('disabled');
			else if($(this).is('.active'))
				$(this).addClass('disabled');
			else 
				set_active_state();  
			
			set_desabled_state();      
		}); 
	}
	
	$('.time-container .time-item').click(function() { 
		$selected_time = '#'+$(this).attr('id');
		$(this).toggleClass('disabled');
		set_desabled_state();
	});
	
}
