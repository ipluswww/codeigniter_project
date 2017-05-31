<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/*	properties
	 */
	private $brand_url_array;
	private $tour_number_info;
	
	// Construntor
	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
		$this->load->library('session');
		
		$this->load->helper('config');
		$this->load->helper('functions');
		$this->load->helper('paypal.class');
		
		$this->brand_url_array = array(
			'city' => 'pick-up-from-city-brand.png',
			'beach' => 'manly-tour-patch-brand.png',
			'owntour' => 'build-your-own-patch-brand.png');
		
		$this->tour_number_info = (object)[];
		
		$this->tour_number_info->city = array(
			'1th' => 'THE SYDNEY CITY CIRCLE',
			'2th' => 'OVER AND UNDER SYDNEY HARBOUR',
			'3th' => 'BONDI BEACH & PADDINGTON',
			'4th' => 'BONDI BEACH & CENTENNIAL PARK',
			'5th' => 'WATSONS BAY & BONDI BEACH',
			'6th' => 'BALMORAL BEACH & THE ZOO',
			);
		
		$this->tour_number_info->beach = array(
			'1th' => 'MANLY BEACH LOOP',
			'2th' => 'DEE WHY BEACH & LONG REEF',
			'3th' => 'NARRABEEN LAKE',
			'4th' => 'CHURCH POINT AND PITTWATER',
			'5th' => 'PALM BEACH',
			);
		
		$this->tour_number_info->owntour = array(
			'1th' => 'HALF DAY CUSTOM-BUILT TOUR',
			'2th' => 'FULL DAY CUSTOM-BUILT TOUR',
			);
		
		$this->time_array = array('#time_9am','#time_10am','#time_11am','#time_12pm','#time_1pm','#time_2pm','#time_3pm','#time_4pm','#time_5pm',);
		
		$this->load->model('time_schedule_model');
	}
	
	// Not Use in this projects
	public function index()
	{
		die;
	}

	// Set year to data->json_year_data in json format
	private function set_yeardata(&$data){
		$today = date("Y-m-d");  
		$year = substr($today, 0, 4);
		
		$year_data = $this->time_schedule_model->get_year_schedule($data->title, $year);
		
		if(empty($year_data))
			$data_list = '';
		else {
			$data_list = array();
			
			foreach($year_data as $t) {
				$data_list[$t->date] = $t;
			}
		}
		
		$data->json_year_data = json_encode($data_list);

	}
	
	//Get all information for a year
	public function get_yeardata($year=2016){
		$title = $this->session->userdata('tour_type');
		$year_data = $this->time_schedule_model->get_year_schedule($title, $year);
		
		if(empty($year_data))
			$data_list = '';
		else {
			$data_list = array();
			
			foreach($year_data as $data) {
				$data_list[$data->date] = $data;
			}
		}
		
		$json_year_data = json_encode($data_list);
		
		return $json_year_data;
	}
	
	//Choose Data/Time Page 
	public function booking_choosedatetime($tour_type = NULL, $tour_number = NULL, $hour = 0)
	{
		if(!empty($this->input->post()))
		{
			$date = $this->input->post('date');
			$time = $this->input->post('time');
			$hour = $this->input->post('hour');
			
			if(empty($date))
			{
				echo "DATE";
				die;
			}
			if(empty($time))
			{
				echo "TIME";
				die;
			}
			if(empty($hour))
			{
				echo "HOUR";
				die;
			}
			
			$array = array();
			$array['date'] = $date;
			$array['time'] = $time;
			$array['hour'] = $hour;
			
			$this->session->set_userdata($array);
			redirect(site_url('booking_inputpeoplecount'));
		}
		
		if(empty($tour_type))
			$tour_type = $this->session->userdata('tour_type');
		
		if(empty($tour_number))
			$tour_number = $this->session->userdata('tour_number');

		if(empty($hour))
			$hour = $this->session->userdata('hour');
		
		$t1 = $this->tour_number_info->$tour_type;
		$title = $t1[$tour_number];
		$brand_url = $this->brand_url_array[$tour_type];
		
		$data = (object)[];
		$data->title = $title;
		$data->brand_url = $brand_url;
		$data->hour = $hour;
		
		$this->set_yeardata($data);
		
		$array = array();
		$array['title'] = $title;
		$array['brand_url'] = $brand_url;
		$array['tour_type'] = $tour_type;
		$array['tour_number'] = $tour_number;
		$array['hour'] = $hour;
		
		$this->session->set_userdata($array);

		$data->time_array = json_encode($this->time_array);
		$this->load->view('page1', $data);
	}
	
	public function booking_inputpeoplecount() 
	{
		if($this->input->post())
		{
			$numberofpeople = $this->input->post('numberofpeople');
			$numberofmotorbike = $this->input->post('numberofmotorbike');
			$numberofpicnic = $this->input->post('numberofpicnic');
			
			if(empty($numberofpeople))
			{
				echo "NO PEOPLE";
				die;
			}
			if(empty($numberofmotorbike))
			{
				echo "NO MOTORBIKE";
				die;
			}
			
			$array = array();
			$array['numberofpeople'] = $numberofpeople;
			$array['numberofmotorbike'] = $numberofmotorbike;
			$array['numberofpicnic'] = $numberofpicnic;
			
			if(empty($array['numberofpicnic']))
				$array['numberofpicnic'] = '0';
			
			$this->session->set_userdata($array);
			redirect('booking_inputpersonalinfo');
		}
		
		$data = (object)[];
		$data->title = $this->session->userdata('title');
		$data->brand_url = $this->session->userdata('brand_url');
		
		$this->load->view('page2', $data);
	}
	
	public function booking_inputpersonalinfo()
	{
		if($this->input->post())
		{
			$array = array();
			$array['customername'] = $this->input->post('customername');
			$array['countryofresidence'] = $this->input->post('countryofresidence');
			$array['email'] = $this->input->post('email');
			$array['nationality'] = $this->input->post('nationality');
			$array['phonenumber'] = $this->input->post('phonenumber');
			$array['languagessponken'] = $this->input->post('languagessponken');
			$array['addressofhotel'] = $this->input->post('addressofhotel');
			$array['namesofotherpassengers'] = $this->input->post('namesofotherpassengers');
			$array['numberofsmallhelmet'] = $this->input->post('numberofsmallhelmet');
			$array['numberofmediumhelmet'] = $this->input->post('numberofmediumhelmet');
			$array['numberoflargehelmet'] = $this->input->post('numberoflargehelmet');
			$array['numberofextralargehelmet'] = $this->input->post('numberofextralargehelmet');
			$array['numberof7to16'] = $this->input->post('numberof7to16');
			$array['numberof17to49'] = $this->input->post('numberof17to49');
			$array['numberof50to69'] = $this->input->post('numberof50to69');
			$array['numberof70plus'] = $this->input->post('numberof70plus');
			$array['specialneeds'] = $this->input->post('specialneeds');
			$array['namesofotherpassengers'] = $this->input->post('namesofotherpassengers');
			
			if(empty($array['customername']))
			{
				echo "NO CUSTOMERNAME";
				die;
			}
			if(empty($array['email']))
			{
				echo "NO EMAIL";
				die;
			}
			if(empty($array['addressofhotel']))
			{
				echo "NO ADDRESSOFHOTEL";
				die;
			}
			
			$this->session->set_userdata($array);
			redirect('booking_summary');
		}
		
		$data = (object)[];
		$data->title = $this->session->userdata('title');
		$data->brand_url = $this->session->userdata('brand_url');
		
		$this->load->view('page3', $data);
	}
	
	public function booking_summary()
	{
		$data = (object)[];
		
		$data->title = $this->session->userdata('title');
		$data->brand_url = $this->session->userdata('brand_url');
		$data->numberofpeople = $this->session->userdata('numberofpeople');
		$data->numberofmotorbike = $this->session->userdata('numberofmotorbike');
		$data->numberofpicnic = $this->session->userdata('numberofpicnic');
		$data->date = $this->session->userdata('date');
		$data->time = $this->session->userdata('time');
		$data->hour = $this->session->userdata('hour');
		$first_person_price = 75 + 100 * $data->hour;
		$second_person_price = 25 + 25 * $data->hour;
		$second_person_count = max(($data->numberofpeople - $data->numberofmotorbike), 0);
		$data->total = $data->numberofmotorbike*$first_person_price + $second_person_count*$second_person_price;
		$data->total += $data->numberofpicnic*50;
		
		$array = array();
		$array['total'] = $data->total;
		$this->session->set_userdata($array);
		
		if($this->input->post('paynow')) {
			//-------------------- prepare products -------------------------
			$paypal= new MyPayPal();
			
			//Mainly we need 4 variables from product page Item Name, Item Price, Item Number and Item Quantity.
			
			$products = [];
			
			
			
			// set an item via POST request
			
			$products[0]['ItemName'] = $data->title; //Item Name
			$products[0]['ItemPrice'] = $data->total; //Item Price
			$products[0]['ItemNumber'] = 'xxx1'; //Item Number
			$products[0]['ItemDesc'] = 'tour'; //Item Number
			$products[0]['ItemQty']	= 1; // Item Quantity
			
			//-------------------- prepare charges -------------------------
			
			$charges = [];
			
			//Other important variables like tax, shipping cost
			$charges['TotalTaxAmount'] = 0;  //Sum of tax for all items in this order. 
			$charges['HandalingCost'] = 0;  //Handling cost for this order.
			$charges['InsuranceCost'] = 0;  //shipping insurance cost for this order.
			$charges['ShippinDiscount'] = 0; //Shipping discount for this order. Specify this as negative number.
			$charges['ShippinCost'] = 0; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.
			
			//------------------SetExpressCheckOut-------------------
			
			//We need to execute the "SetExpressCheckOut" method to obtain paypal token

			$paypal->SetExpressCheckOut($products, $charges);	
			return;

		} else {
		   // Response from PayPal
		}


		$this->load->view('page4', $data);
	}
	
	private function send_mail()
	{
		$this->load->library('email');

		$to      = $this->session->userdata('email');
		//$from 		= 'tony_love_plus@protonmail.com';
		$from 		= 'bookings@shelbyssidecartours.com';
		$subject = 'Notification';
		$message = "
		<html>
		<head>
			<title>Thanks for booking</title>
		</head>
		<body>
			<p>Shelby's Sidecar Tours is a great way to see Sydney.</p>
			<p>We'll contact you shortly to fine tune the details.</p>
			<p>best regards,</p>
			<p>The Shelby's Team</p>
		</body>
		</html>
		";
		$alt_message = "Thanks for booking
		Shelby's Sidecar Tours is a great way to see Sydney.
		We'll contact you shortly to fine tune the details.
		best regards,
		The Shelby's Team";
		
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		$headers .= "To: $to" . "\r\n";
		$headers .= "From: $from" . "\r\n";
		
		$email_setting  = array('mailtype'=>'html');
		$this->email->initialize($email_setting);		
		$this->email->set_newline("\r\n");
		$this->email->from($from);
		$this->email->to($to);
		$this->email->subject($subject);

		$this->email->set_header('From', $from);
		$this->email->set_header('To', $to);
		$this->email->set_header('Organization', "Shelby's Team");
		$this->email->set_header('MIME-Version', '1.0');
		$this->email->set_header('X-Mailer', 'PHP'. phpversion());

		$this->email->message($message);
		$this->email->set_alt_message($alt_message);

		if($this->email->send()){
		//	echo '<p>Email sent.</p>';
		}
		else{
			echo '<p>error occur</p>';
			show_error($this->email->print_debugger());
		}

		$detail_array = array(
			'title' => 'TITLE',
			'date' => 'DATE',
			'time' => 'TIME',
			'hour' => 'HOURS',
			'numberofpeople' => 'NUMBER OF PASSENGERS',
			'numberofmotorbike' => 'NUMBER OF MOTORBIKE',
			'numberofpicnic' => 'NUMBER OF PICNIC',
			'customername' => 'CUSTOMER NAME',
			'countryofresidence' => 'COUNTRY OF RESIDENCE',
			'email' => 'EMAIL',
			'nationality' => 'NATIONALITY',
			'phonenumber' => 'PHONE',
			'languagessponken' => 'LANGUAGES SPOKEN',
			'addressofhotel' => 'ADDRESS OF HOTEL WHILE STAYING IN SYDNEY',
			'namesofotherpassengers' => 'NAMES OF OTHER PASSENGERS',
			'numberofsmallhelmet' => 'NUMBER OF SMALL HELMET',
			'numberofmediumhelmet' => 'NUMBER OF MEDIUM HELMET',
			'numberoflargehelmet' => 'NUMBER OF LARGE HELMET',
			'numberofextralargehelmet' => 'NUMBER OF EXTRA LARGE HELMET',
			'numberof7to16' => 'NUMBER OF PASSENGERS in AGE Range 7-16',
			'numberof17to49' => 'NUMBER OF PASSENGERS in AGE Range 17-49',
			'numberof50to69' => 'NUMBER OF PASSENGERS in AGE Range 50-69',
			'numberof70plus' => 'NUMBER OF PASSENGERS in AGE Range 70+',
			'specialneeds' => 'SPECIAL NEEDS',
			'namesofotherpassengers' => 'ADDITIONAL COMMENTS',
			'total' => 'TOTAL PRICE',
			);

		$detail_string = '';
		$alt_detail_string = '';

		foreach($detail_array as $key => $name) {
			
			$detail_string .= "<tr><td><strong>$name :</strong> </td><td>" . $this->session->userdata($key) . "</td></tr>";
		}

		//send mail to bookings@shelbyssidcartours.com
		$to      = 'bookings@shelbyssidecartours.com';
		$from 		= 'bookings@shelbyssidecartours.com';
		$subject = 'Notification';

		$message = "
		<html>
		<head>
			<title>Thanks for booking</title>
		</head>
		<body>
			$detail_string
		</body>
		</html>
		";

		$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta name="viewport" content="width=device-width" /><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>ZURBemails</title><link rel="stylesheet" type="text/css" href="stylesheets/email.css" /></head><body>';
		$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
		$message .= $detail_string;
		$message .= "</table>";
		$message .= "</body></html>";

		$email_setting  = array('mailtype'=>'html');
		$this->email->initialize($email_setting);

		$this->email->set_newline("\r\n");
		$this->email->from($from);
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->set_header('From', $from);
		$this->email->set_header('To', $to);
		$this->email->set_header('Organization', "Shelby's Team");
		$this->email->set_header('MIME-Version', '1.0');
				//$this->email->set_header('Content-type', 'text/html; charset=iso-8859-1');
		$this->email->set_header('X-Mailer', 'PHP'. phpversion());
		$this->email->message($message);

				//$this->email->set_mailtype("html");

		if($this->email->send()){
				//	echo '<p>Email sent.<p>';
		}
		else{
			show_error($this->email->print_debugger());
		}

	}
	
	public function pay_success()
	{
		$paypal= new MyPayPal();
		
		if(_GET('token')!=''&&_GET('PayerID')!=''){
			
			//------------------DoExpressCheckoutPayment-------------------		
			
			//Paypal redirects back to this page using ReturnURL, We should receive TOKEN and Payer ID
			//we will be using these two variables to execute the "DoExpressCheckoutPayment"
			//Note: we haven't received any payment yet.
			
			$paypal->DoExpressCheckoutPayment();
			
			$this->send_mail();
		}
		else {
			// Request Transaction Details

			$this->GetTransactionDetails();
		}

		$data = (object)[];
		$data->title = $this->session->userdata('title');
		$data->brand_url = $this->session->userdata('brand_url');
		
		$this->load->view('pay_success', $data);
	}
	
	public function date_time_manage()
	{
		if(!is_logged_user())
			redirect('login');
		
		$data = (object)[];
		
		$data->title = $this->session->userdata('title');
		$data->brand_url = $this->session->userdata('brand_url');
		$data->hour = 1;
		
		$this->set_yeardata($data);
		
		$this->load->view('date_time_manage', $data);
	}
	
	public function change_day_schedule_item() {
		
		if(!empty($this->input->post())) {
			$record = $this->input->post('record');
			echo $this->time_schedule_model->change_day_schedule_item($record['title'], $record['date'], $record['state'], $record['time_array']);
		}
	}
}