<div class="container">  
<form action="" method="post" class="addTrains">
  <h3>Add New Train</h3>
  
  <?php //print_r($get_booking); ?>
  <div class="form-group">
    <label for="email">Train Name</label>
    <input type="text" class="form-control" value="<?php echo $get_booking->train_name; ?>" required name="train_name">
  </div>

  <div class="form-group">
    <label for="pwd">arrival Time:</label>
    <input type="time" class="form-control" value="<?php echo $get_booking->arrival_time; ?>" required name="arrival_time" >
  </div>

  <div class="form-group">
    <label for="pwd">Departure Time</label>
    <input type="time" class="form-control"  value="<?php echo $get_booking->departure_time; ?>"  required name="departure_time" >
  </div>

  <div class="form-group">
    <label for="pwd">Availability Of Seats</label>
    <input type="number" class="form-control"  value="<?php echo $get_booking->availability_of_seats; ?>"  required name="availability_of_seats" >
  </div>
  
 
 
  <button type="submit" class="btn btn-default">Update</button>
</form>
</div>