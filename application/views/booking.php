<div class="container">
  <div class="row">
    <?php //print_r($all_trails); ?>
    <form action="" method="post">
  <div class="form-group">
    <label for="email">Train Name</label>
    <input type="text" disabled class="form-control" value="<?php echo $all_trails->train_name ?>" required name="train_name">
  </div>

  <div class="form-group">
    <label for="pwd">arrival Time:</label>
    <input type="time" class="form-control" disabled value="<?php echo $all_trails->arrival_time ?>" required name="arrival_time" >
  </div>

  <div class="form-group">
    <label for="pwd">Departure Time</label>
    <input type="time" class="form-control" disabled value="<?php echo $all_trails->departure_time ?>" name="departure_time" >
  </div>

  <div class="form-group">
    <label for="pwd">Availability Of Seats</label>
    <input type="number" class="form-control" disabled value="<?php echo $all_trails->availability_of_seats; ?>" name="availability_of_seats" >
  </div>

  <div class="form-group">
    <label for="pwd">Enter Number Of Seats</label>
    
   
    <input type="number" max=<?php echo $all_trails->availability_of_seats;  ?> class="form-control"  value="<?php echo $all_trails->availability_of_seats; ?>" name="number_of_seats_book" >
  </div>
  
 
  <button type="submit" class="btn btn-default">Confirm</button>
</form>

  </div>
 
</div>