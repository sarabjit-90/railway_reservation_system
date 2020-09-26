<div class="container">
    <p><?php  // echo $this->session->flashdata('booking_deleted') ?></p>
<?php //print_r($trains) ?>
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
      <th scope="row"><a href="<?php echo base_url('admin/delete_booking/'.$booking->train_no) ?>">Delete</a> | EDIT </th>
    </tr>
  <?php } ?>
<?php } else { ?> 
<tr><th>No Booking Found</th></tr>
<?php   } ?>
  </tbody>
</table>
</div>