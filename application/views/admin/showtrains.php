<div class="container">
    <p><?php  // echo $this->session->flashdata('booking_deleted') ?></p>
  <?php if($this->session->flashdata('admin_msg')){ ?>
		<div class="alert alert-success" role="alert">
		  <?php echo $this->session->flashdata('admin_msg'); ?>
	  </div>
	<?php } ?>
<table class="table">
  <thead>
    <tr>
      
      <th scope="col">train_no</th>
      <th scope="col">train_name</th>
      <th scope="col">arrival_time</th>
      <th scope="col">departure_time</th>
      <th scope="col">availability_of_seats</th>
        <th scope="col" > Action </th>
    </tr>
  </thead>
  <tbody>
    <?php if(!empty($trains)){ ?>
     
  <?php foreach($trains as $booking) { ?>
    <tr>
      <th ><?php echo $booking->train_no; ?></th>
      <th scope="row"><?php echo $booking->train_name; ?></th>
      <th scope="row"><?php echo $booking->arrival_time; ?></th>
      <th scope="row"><?php echo $booking->departure_time; ?></th>
      <th scope="row"><?php echo $booking->availability_of_seats; ?></th>
      <th scope="row"> <a href="<?php echo base_url('admin/edittrain/'.$booking->train_no) ?>">Edit</a> | <a style="color:red" onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url('admin/delettrain/'.$booking->train_no) ?>">Delete</a>   </th>
    </tr>
  <?php } ?>
<?php } else { ?> 
<tr><th>No Booking Found</th></tr>
<?php   } ?>
  </tbody>
</table>
</div>