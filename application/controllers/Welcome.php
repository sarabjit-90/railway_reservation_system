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

		$use_rdata = $this->session->userdata('user');
		if(!empty($use_rdata))
		{
			$bookings = $this->db->where('user_id',$use_rdata[0]->user_id)->get('books')->result();
			$train_ids=[];
			foreach($bookings as $train_id){
				$train_ids[] = $train_id->train_id;
			}
			$data['train_ids'] = $train_ids;
		}
		$this->load->view('front/header');
		$this->load->view('welcome_message',$data);
		$this->load->view('front/footer');
	}
	public function login()
	{
		
		//die('dddd');
		if($_POST){
			
			$this->db->select('*');
			$this->db->where(["email" => $_POST['email'] , "password" => $_POST['password'] , "user_type" => '2'  ]);
			$query = $this->db->get('rrs_user')->result();
			
			$this->session->set_userdata('user',$query);
			if(!empty($query)){
				redirect('/'); 
			}else{

				$this->session->set_flashdata('invalid_login','Please enter valid email and password.');
				redirect('/'); 
			}
			
		}
	}
	public function book($id)
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
		->where(['rss_train.train_no '=> $id])
		->join('rrs_starts','rrs_starts.train_no = rss_train.train_no')
		->join('rss_station as rss_station_start','rss_station_start.no = rrs_starts.station_no')
		->join('rrs_stops_at','rrs_stops_at.train_no = rss_train.train_no')
		->join('rss_station as rss_station_stop','rss_station_stop.no = rrs_stops_at.station_no')
		
		->get('rss_train')->row();
		
	

		//book train
		if($_POST){
			//print_r($data['all_trails']);
			//print_r($_POST);
			//echo $id;
			$use_rdata = $this->session->userdata('user');
			//print_r($use_rdata[0]->user_id);
			$book = array(
				'user_id' => $use_rdata[0]->user_id,
				'number_of_seats_book' => $_POST['number_of_seats_book'],
				'train_id' => $id
			);
			$this->db->insert('books',$book);
			$this->session->set_flashdata('booking_done','Your booking have been done!');
			redirect('/'); 
		}

		$this->load->view('front/header');
		$this->load->view('booking',$data);
		$this->load->view('front/footer');
		
	}
	public function logout()
	{
		$this->session->unset_userdata('user');
		redirect('/');
	}
}
