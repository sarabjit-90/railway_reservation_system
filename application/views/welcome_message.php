<div class="container-fluid">	
	<?php //print_r($all_trails); ?>
	<?php foreach($all_trails as $trains){ ?>
		<div class="row">
				<div class="col-sm-12" >
					<h2><?php echo $trains->train_name ?></h2>
					<p>Train No. <?php echo $trains->start_train_number ?></p>
					From <?php echo $trains->start_station_name ?>  To  <?php echo $trains->stop_station_name ?> 
					<p><span>arrival time : <?php echo $trains->arrival_time ?> Departure Time :  <?php echo $trains->departure_time ?> </span></p>
					 
					availability of seats <?php echo $trains->availability_of_seats; ?>
					<br>
										
					<?php if(!empty($this->session->userdata('user'))){ ?>
						<a href="<?php echo base_url('book/'.$trains->main_train_no) ?>">Book Ticket</a>
					<?php }else { ?>
						<a href="#" onclick="document.getElementById('id01').style.display='block'" >Book Ticket</a>
					<?php } ?>	
					
				</div>
		</div>
		<hr>
	<?php } ?>
</div>

