<div class="container">	
	<?php //print_r($all_trails); ?>
	
	<?php if($this->session->flashdata('invalid_login')){ ?>
		<div class="alert alert-danger" role="alert">
			<?php echo $this->session->flashdata('invalid_login'); ?>
		</div>
	<?php } ?>

	<?php if($this->session->flashdata('booking_done')){ ?>
		<div class="alert alert-success" role="alert">
			<?php echo $this->session->flashdata('booking_done'); ?>
		</div>
	<?php } ?>
	 

	<div class="row">
		<div class="col-sm-12" >
		<ul class="lsit_trn">
			<?php foreach($all_trails as $trains){ ?>
				<li>
					<h2><?php echo $trains->train_name ?></h2>
					<p class="trn">Train No. <?php echo $trains->start_train_number ?></p>
					<p class="trFrm">From: <span><?php echo $trains->start_station_name ?></span>  To  <span><?php echo $trains->stop_station_name ?></span> </p>
					<p class="tmTrn"><span>Arrival time : <span class="grnClt"><?php echo $trains->arrival_time ?> </span>Departure Time :  <span class="grnClt"><?php echo $trains->departure_time ?></span> </span></p>
					 

					<p class="trnAv">Availability of Seats: <span><?php echo $trains->availability_of_seats; ?></span></p>
					
					<?php if(!empty($this->session->userdata('user'))){ ?>
						
						<?php if(!in_array($trains->main_train_no,$train_ids)){ ?>

						<a class="btn Clrbtn" href="<?php echo base_url('book/'.$trains->main_train_no) ?>">Book Ticket</a>
						<?php } else { ?>
							<a class="btn Clrbtn" href="#">Already Booked</a>
						<?php } ?>
					<?php }else { ?>
						<a class="btn Clrbtn" href="#" onclick="document.getElementById('id01').style.display='block'" >Book Ticket</a>
					<?php } ?>
				</li>
			<?php } ?>
		</ul>
		</div>
	</div>
