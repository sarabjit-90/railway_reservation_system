<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{

		$data['all_trails'] = $this->db
							->select('
							rss_train.train_no as main_train_no, 
							rss_train.train_name as train_name, 
							rss_train.arrival_time , 
							departure_time, 
							availability_of_seats, 
							rrs_starts.train_no as start_train_number, 
							rrs_starts.station_no as start_station_number, 
							rss_station_start.name as start_station_name,  
							rrs_stops_at.station_no as stop_station_number,
							rss_station_stop.name as stop_station_name'
							)

							->join('rrs_starts','rrs_starts.train_no = rss_train.train_no')
							->join('rss_station as rss_station_start','rss_station_start.no = rrs_starts.station_no')
							->join('rrs_stops_at','rrs_stops_at.train_no = rss_train.train_no')
							->join('rss_station as rss_station_stop','rss_station_stop.no = rrs_stops_at.station_no')
							->get('rss_train')->result();
		$this->load->view('front/header');
		$this->load->view('welcome_message',$data);
		$this->load->view('front/footer');
	}
}
