<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Time_schedule_model class.
 * 
 * @extends CI_Model
 */
class Time_schedule_model extends CI_Model {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	
	private $table_name;
	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
		$this->table_name = 'time_schedule';
		
	}
	
	/**
	 * create_day_schedule_item function.
	 * 
	 * @access public
	 * @param mixed $title
	 * @param mixed $date
	 * @param mixed $state
	 * @return bool true on success, false on failure
	 */
	public function create_day_schedule_item($title, $date, $state, $time_array) {
		
		$data = array(
			'title'   => $title,
			'date'      => $date,
			'state'   => $state,
			'time_array' => $time_array,
			);
		
		return $this->db->insert($this->table_name, $data);
		
	}
	
	/**
	 * update_day_schedule_item function.
	 * 
	 * @access public
	 * @param mixed $title
	 * @param mixed $date
	 * @param mixed $state
	 * @return bool true on success, false on failure
	 */
	public function update_day_schedule_item($title, $date, $state, $time_array) {
		
		$data = array(
			'title'   => $title,
			'date'      => $date,
			'state'   => $state,
			'time_array' => $time_array,
			);
		
		$this->db->where('title', $title);
		$this->db->where('date', $date);
		
		$q = $this->db->get($this->table_name);  
		if ( $q->num_rows() <= 0 )
			return false;
		
		$this->db->where('title', $title);
		$this->db->where('date', $date);
		
		return $this->db->update($this->table_name, $data);
		
	}
	
	/**
	 * change_day_schedule_item function.
	 * 
	 * @access public
	 * @param mixed $title
	 * @param mixed $date
	 * @param mixed $state
	 * @return bool true on success, false on failure
	 */
	public function change_day_schedule_item($title, $date, $state, $time_array) {
		
		if($this->update_day_schedule_item($title, $date, $state, $time_array))
			return true;		
		
		$data = array(
			'title'   => $title,
			'date'      => $date,
			'state'   => $state,
			'time_array' => $time_array,
			);
		
		return $this->db->insert($this->table_name, $data);
		
	}
	
	/**
	 * get_year_schedule function.
	 * 
	 * @access public
	 * @param mixed $year
	 * @return result on success, false on failure
	 */
	public function get_year_schedule($title, $year) {
		
		$this->db->where('title', $title);
		$this->db->like('date', $year);
		
		$this->db->from($this->table_name);
		
		return $this->db->get()->result();
		
	}
	
	/**
	 * get_day_schedule function.
	 * 
	 * @access public
	 * @param mixed $year
	 * @return result on success, false on failure
	 */
	public function get_day_schedule($title, $date) {
		
		$this->db->where('title', $title);
		$this->db->where('date', $date);
		
		$this->db->from($this->table_name);
		
		return $this->db->get()->row();
		
	}
	
}
