<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('admin/login');
		if($_POST){
			print_r($_POST);

			$this->db->select('*');
			$this->db->where(["email" => $_POST['email'] , "password" => $_POST['password'] , "user_type" => 1]);
			$query = $this->db->get('rrs_user')->result();
			$this->session->set_userdata('admin',$query);
			if(!empty($query)){
				redirect('/admin/dashboard'); 
			}else{

				$this->session->set_flashdata('invalid_login','Please enter valid email and password.');
				redirect('/admin'); 
			}
			
		}
	    //$this->db->select('*');
		//$this->db->from('rrs_user');
		//$this->db->join('comments', 'comments.id = blogs.id');
	
	}
	public function dashboard()
	{
		$session_data = $this->session->userdata('admin');
		if(!$session_data){
			redirect('admin'); 
		}
	 	$this->load->view('admin/header');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/footer');

	}
	public function addtrain()
	{
		$session_data = $this->session->userdata('admin');
		if(!$session_data){
			redirect('admin'); 
		}
		$data['all_stations'] = $this->db->get('rss_station')->result();
		if($_POST){
		
			$data = array(
				'train_name' => $_POST['train_name'],
				'arrival_time' => $_POST['arrival_time'],
				'departure_time' => $_POST['departure_time'],
				'availability_of_seats' => $_POST['availability_of_seats']

			);
			$this->db->insert('rss_train',$data);

			$train_insert_id = $this->db->insert_id();
 
			$rrs_starts = array(
				'train_no' => $train_insert_id,
				'station_no' => $_POST['start_station_name']
			);
			$this->db->insert('rrs_starts',$rrs_starts);
			
			$rrs_starts = array(
				'train_no' => $train_insert_id,
				'station_no' => $_POST['stop_station_name']
			);
			$this->db->insert('rrs_stops_at',$rrs_starts);
			$this->session->set_flashdata('admin_msg','Train Added!');
			redirect('admin/showtrains');
		}
	 	$this->load->view('admin/header');
		$this->load->view('admin/addtrains',$data);
		$this->load->view('admin/footer');
	}
	public function showbooking()
	{
		$data['all_bookings'] = $this->db->select('*')
								->from('books')
								->join('rss_train','rss_train.train_no = books.train_id')
								->join('rrs_user','rrs_user.user_id = books.user_id' )
								->order_by('id','desc')
								->get()->result();
		
		$this->load->view('admin/header');
		$this->load->view('admin/showbookings',$data);
		$this->load->view('admin/footer');
	}
	public function delete_booking($id)
	{
		
		$this->db->where('id', $id);
		$this->db->delete('books');
		$this->session->set_flashdata('booking_deleted', 'Booking deleted successfully!');
		redirect('admin/showbooking');
	}
	public function showtrains()
	{
		$data['trains'] = $this->db->order_by('train_no','desc')->get('rss_train')->result();
		$this->load->view('admin/header');
		$this->load->view('admin/showtrains',$data);
		$this->load->view('admin/footer');
	}
	public function edittrain($id)
	{
		
		$data['get_booking'] = $this->db->where('train_no', $id)->get('rss_train')->row();

		$this->load->view('admin/header');
		$this->load->view('admin/edittrains',$data);
		$this->load->view('admin/footer');
		if($_POST){

			$data = array(
				'train_name' => $_POST['train_name'],
				'arrival_time' => $_POST['arrival_time'],
				'departure_time' => $_POST['departure_time'],
				'availability_of_seats' => $_POST['availability_of_seats']

			);
		
			$this->db->set($data);
			$this->db->where('train_no', $id);
			$this->db->update('rss_train');


			$train_insert_id = $id;
			// $rrs_starts = array(
			// 	'station_no' => $_POST['start_station_name']
			// );
			// $this->db->set($rrs_starts);
			// $this->db->where('train_no', $train_insert_id);
			// $this->db->update('rrs_starts');
			
			// $rrs_starts = array(
			// 	'station_no' => $_POST['stop_station_name']
			// );
			// $this->db->set($rrs_starts);
			// $this->db->where('train_no', $train_insert_id);
			// $this->db->update('rrs_stops_at');
			redirect('admin/showtrains');
		}
		
	}
	public function delettrain($id)
	{
		
		$this->db->where('train_no', $id);
		$this->db->delete('rss_train');
		$this->session->set_flashdata('train_deleted', 'Train deleted successfully!');
		redirect('admin/showtrains');
	}
	
}
