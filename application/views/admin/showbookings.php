<div class="container">
    <p><?php echo $this->session->flashdata('booking_deleted') ?></p>
<?php //print_r($all_bookings) ?>
<table class="table">
  <thead>
    <tr>
      
      <th scope="col">Name</th>
      <th scope="col">train name</th>
      <th scope="col">train_id</th>
      <th scope="col">arrival_time</th>
      <th scope="col">departure_time</th>
      <th scope="col">number_of_seats_book</th>
        <th scope="col" > Action </th>
    </tr>
  </thead>
  <tbody>
    <?php if(!empty($all_bookings)){ ?>
     
  <?php foreach($all_bookings as $booking) { ?>
    <tr>
      <th ><?php echo $booking->first_name; ?></th>
      <th scope="row"><?php echo $booking->train_name; ?></th>
      <th scope="row"><?php echo $booking->train_id; ?></th>
      <th scope="row"><?php echo $booking->arrival_time; ?></th>
      <th scope="row"><?php echo $booking->departure_time; ?></th>
      <th scope="row"><?php echo $booking->number_of_seats_book; ?></th>
      <th scope="row"><a onclick="return confirm('Are you sure you want to delete this item?');"  href="<?php echo base_url('admin/delete_booking/'.$booking->id) ?>">Delete</a></th>
    </tr>
  <?php } ?>
<?php } else { ?> 
<tr><th>No Booking Found</th></tr>
<?php   } ?>
  </tbody>
</table>
</div>