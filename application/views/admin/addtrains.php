<div class="container-fluid">  
<form action="" method="post">
  <div class="form-group">
    <label for="email">Train Name</label>
    <input type="text" class="form-control" required name="train_name">
  </div>

  <div class="form-group">
    <label for="pwd">arrival Time:</label>
    <input type="time" class="form-control" required name="arrival_time" >
  </div>

  <div class="form-group">
    <label for="pwd">Departure Time</label>
    <input type="time" class="form-control" required name="departure_time" >
  </div>

  <div class="form-group">
    <label for="pwd">Availability Of Seats</label>
    <input type="number" class="form-control" required name="availability_of_seats" >
  </div>
 
  <!-- <div class="form-group">
    <label for="pwd">Station Name</label>
        <select  class="form-control"  name="station_number" >
            <?php foreach($all_stations as $stations){  ?>
                    <option value="<?php echo $stations->no; ?>"><?php echo $stations->name; ?></option>
            <?php } ?>
        </select>
  </div> -->

  <div class="form-group">
    <label for="pwd">Start From Station</label>
    <!-- <input type="text" class="form-control"  required name="start_station_name" > -->
        <select  class="form-control"  name="start_station_name" >
            <?php foreach($all_stations as $stations){  ?>
                    <option value="<?php echo $stations->no; ?>"><?php echo $stations->name; ?></option>
            <?php } ?>
        </select>
  </div>   
  <div class="form-group">
    <label for="pwd">Stops At Station</label>
    <!-- <input type="text" class="form-control" required name="stop_station_name" > -->
    <select  class="form-control"  name="stop_station_name" >
            <?php foreach($all_stations as $stations){  ?>
                    <option value="<?php echo $stations->no; ?>"><?php echo $stations->name; ?></option>
            <?php } ?>
        </select>
  </div>    
 
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>