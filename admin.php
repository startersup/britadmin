<?php
session_start();
include("connect.php");
if(!$conn)
{
    echo("Server Connection failed");
    
}

else
{

    
if($_SESSION["access"]=="give")  
{
    date_default_timezone_set('Europe/London');
   
  
  $date= date("Y-m-d");
    $check1=$date;
    
    $date= date("Y-m-d", strtotime(' -1 day'));
 $check2=$date;
 
  $date= date("Y-m-d", strtotime(' +1 day'));
             $check3=$date;
             
              $date= date("Y-m");
    $check4=$date;
    
   ?>
<!DOCTYPE html>
<html lang="en" id="html">
<head>
  <title>Admin Panel</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="./css/bootstrap.css">
  <link rel="stylesheet" href="./css/fonts.css">
  <link rel="stylesheet" href="./css/style.css">
  <script src="./js/jquery.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" id="brandname" href="#">Minicabee <i class="fa fa-taxi"></i> Admin</a>
    </div>
    <div class="collapse navbar-collapse " id="myNavbar">
      <div class="nav navbar-nav padleft">
       <div class="row">
<div class="col-md-12">
  </div>
       </div>
    </div>
       
      <ul class="nav navbar-nav navbar-right navextra" >
            <li><a onclick="openFullscreen();"  data-toggle="tooltip" data-placement="bottom" title="Full Screen" href="#"><span class="fa fa-expand"></span> Full Screen</a></li>
            <li><a data-toggle="tooltip" data-placement="bottom" title="Notification" href="#"><span class="fa fa-bell"></span> Notification</a></li>
        <li><a data-toggle="tooltip" data-placement="bottom" title="Settings" href="#"><span class="fa fa-gear"></span> Settings</a></li>
        <li><a data-toggle="tooltip" data-placement="bottom" title="Logout" href="#"><span class="fa fa-power-off"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
      <div id="livesearch" style="margin-top:10px;"></div>
<div class="sidenav">
        <a href="index.html" class="active"><i class="fa fa-dashboard"></i> Dashboard</a>
        <a href="bookrecord.html">Booking Records</a>
        <a href="passrecord.html">Passenger Records</a>
        <button class="dropdown-btn">Company Admin</button>
              <div class="dropdown-container">
                  <a href="bookanal.html">Booking Analytics</a>
                <a href="staffacc.html">Staff Accounts</a>
                <a href="prolist.html">Provider List</a>
                <a href="cprofit.html">Company Profit</a>
                <a href="fchange.html">Fare Changer</a>
              </div>
              <button class="dropdown-btn">Driver Management</button>
              <div class="dropdown-container">
                <a href="dlist.html">Driver List</a>
                <a href="adriver.html">Add Driver</a>
                <a href="danalytics.html">Driver Analytics</a>
                <a href="payments.html">Payments</a>
                <a href="crecords.html">Council Records</a>
              </div>
              <a href="bquote.html">Booking Quote</a>
              <a href="qrecords.html">Quote Records</a>
        <a href="bsms.html">Booking SMS</a>
        <a href="webupload.html">website Uploads</a>
        <a href="track.html">Live Tracking</a>
        <a href="chat.html">Chatting Panel</a>
        <a href="quick.html">Quick Metrics</a>
        <a href="settings.html"><i class="fa fa-gear"></i> Settings</a>
      </div>
  <section class="remaining container" >
      <div id="preloader">
  <div id="status">&nbsp;</div>
</div>
    	<div class="tabbable-line">
					<ul class="nav nav-tabs ">
            	<li>
                  <a href="#tab_default_1" data-toggle="tab">
                  Yesterday Bookings</a>
                </li>
						<li class="active">
							<a href="#tab_default_2" data-toggle="tab">
							Today Bookings</a>
						</li>
						<li>
							<a href="#tab_default_3" data-toggle="tab">
							Tomorrow Bookings</a>
						</li>
					 <li>
                <a href="#tab_default_4" data-toggle="tab">
                Future Bookings</a>
              </li>
					</ul>
					<div class="tab-content">
              <div class="tab-pane" id="tab_default_1">

  </div>
						<div class="tab-pane active" id="tab_default_2">
                <div id="my_div">
                  <div class="row">
                    <div class="col-xs-10">
          <input type="text" id="myInput" class="form-control searchbar" onkeyup="myFunction()" placeholder="Search for Bookings.." style="width:30%;margin-bottom:10px;" >
        </div><div class="col-xs-2">Showing 281 Records</div> </div>
             <table >
                      <thead class="header">
                        <th style="width:5%;">Ref Id</th>
                        <th style="width:20%;">Pickup From</th>
                        <th style="width:20%;">Dropoff To</th>
                        <th style="width:15%;">Date /Time</th>
                        <th style="width:15%;">Cab Type</th>
                        <th style="width:10%;">Total Fare</th>
                        <th style="width:8%;">Status</th>
                        <th style="width:5%;">Action</th>
                      </thead>
                      <tbody id="myTable">
                          <?php
  
   $result= mysqli_query($conn,"SELECT * from register WHERE 1 ORDER BY time ASC");
        
        $tt=mysqli_num_rows($result);
       // echo($check1);
     while ($row= mysqli_fetch_array($result,MYSQLI_ASSOC))
     {
         $dt=$row["dt"];
         
  
  if($dt==$check1)
         {
  
  
       $pname=$row["name"];
     $number1=$row["num1"];
      $number2=$row["num2"];
     $src=$row["src"];
     $des=$row["des"];
     $tm=$row["time"];
     $id=$row["refid"];
     $status=$row["status"];
     $fare=$row["fare"];
      $np=$row["passenger"];
       $nl=$row["luggage"];
       $type=$row["type"];
       $info=$row["info"];
        $flight=$row["location"];
        $email=$row["mail"];
        $dfare=$row["dfare"];
        $via=$row["via"];
       
       $pm=$row["pay"];
       
        $drvid=$row["drvid"];
       
     $wake=$tm[0].$tm[1];
     $wtm=$tm[3].$tm[4];
     $wake=$wake-1;
     if($wake<0)
     {
         $wake=23;
     }
     $d=$dt." / ".$tm;
     
     
     if($status=="booked")
     {
         $cl="#F44336";
     }
     else
     {
        if($status=="booked-confirmed")
         {
             $cl="#198FFF";  
             $status="waiting";
         }
     
        else
        {
           
           if($status=="cancelled")
           {
                $cl="#000000";
           }
           
           else
           {
            $cl="#1E8E02";
           }
        }
     }
  ?>
                           <tr>
                          <td><?php echo($id); ?><br><small>Wakeup @<?php echo($wake.":".$wtm); ?> </small></td>
                          <td><?php echo($src); ?></td>
                          <td><?php echo($des); ?></td>
                          <td><?php echo($d); ?></td>
                          <td><?php echo($type); ?></td>
                          <td><?php echo($fare); ?></td>
                               <?php
if($status!=="cancelled")
{
?>
                          <td><span style="color:#ffffff;background-color:<?php echo($cl); ?>;font-weight:500;letter-spacing:0.5px;padding:5px;border-radius:4px;"><?php echo($status); ?></span></td>
                               <?php
        }
        
        else
        {
        ?> <td><span style="color:#ffffff;background-color:<?php echo($cl); ?>;font-weight:500;letter-spacing:0.5px;padding:5px;border-radius:4px;"><?php echo($status); ?></span></td>
                          <td><button data-toggle="modal" onclick="document.getElementById('<?php 
$idd=$id.$check1;echo($idd); ?>').style.display='block'" class="btn btn-default">Edit</button></td>
                        </tr>
                     
                          </tbody> </table>
        </div>       
            </div>
            <div class="tab-pane" id="tab_default_3">
                <div id="tmrw">
                    <div class="row">
                        <div class="col-xs-10">
              <input type="text" id="myInput" class="form-control searchbar" onkeyup="myFunction()" placeholder="Search for Bookings.." style="width:30%;margin-bottom:10px;" >
            </div><div class="col-xs-2">Showing 281 Records</div> </div>
            
                    <table >
                      <thead class="header">
                        <th style="width:5%;">Ref Id</th>
                        <th style="width:20%;">Pickup From</th>
                        <th style="width:20%;">Dropoff To</th>
                        <th style="width:15%;">Date /Time</th>
                        <th style="width:15%;">Cab Type</th>
                        <th style="width:10%;">Total Fare</th>
                        <th style="width:10%;">Status</th>
                        <th style="width:5%;">Action</th>
                      </thead>
                      <tbody id="myTable">
                      <tr>
                          <td>BRT1234</td>
                          <td>Gatwick Airport South Terminal</td>
                          <td>Heathrow Airport Terminal 5</td>
                          <td>2018-11-15 19:20:00</td>
                          <td>SALOON CAR x 1</td>
                          <td>£ 7.00</td>
                          <td><span style="color:#ffffff;background-color:red;font-weight:500;letter-spacing:0.5px;padding:5px;border-radius:4px;">Bidded</span></td>
                          <td><button class="btn btn-default">Edit</button></td>
                        </tr>
                      <tr>
                          <td>BRT1234</td>
                          <td>Gatwick Airport South Terminal</td>
                          <td>Heathrow Airport Terminal 5</td>
                          <td>2018-11-15 19:20:00</td>
                          <td>SALOON CAR x 1</td>
                          <td>£ 7.00</td>
                          <td><span style="color:#ffffff;background-color:green;font-weight:600;letter-spacing:0.5px;padding:5px;">Confirm</span></td>
                          <td><button data-toggle="modal" data-target="#myModal2" class="btn btn-default">Edit</button></td>
                        </tr>
                      <tr>
                          <td>BRT1234</td>
                          <td>Gatwick Airport South Terminal</td>
                          <td>Heathrow Airport Terminal 5</td>
                          <td>2018-11-15 19:20:00</td>
                          <td>SALOON CAR x 1</td>
                          <td>£ 7.00</td>
                          <td><span style="color:#ffffff;background-color:rgb(23, 23, 255);font-weight:600;letter-spacing:0.5px;padding:5px;">Booked</span></td>
                          <td><button data-toggle="modal" data-target="#myModal2" class="btn btn-default">Edit</button></td>
                        </tr>
                      <tr>
                          <td>BRT1234</td>
                          <td>Gatwick Airport South Terminal</td>
                          <td>Heathrow Airport Terminal 5</td>
                          <td>2018-11-15 19:20:00</td>
                          <td>SALOON CAR x 1</td>
                          <td>£ 7.00</td>
                          <td><span style="color:#ffffff;background-color:red;font-weight:600;letter-spacing:0.5px;padding:5px;">Bidded</span></td>
                          <td><button class="btn btn-default">Edit</button></td>
                        </tr>
                        <tr>
                            <td>BRT1234</td>
                            <td>Gatwick Airport South Terminal</td>
                            <td>Heathrow Airport Terminal 5</td>
                            <td>2018-11-15 19:20:00</td>
                            <td>SALOON CAR x 1</td>
                            <td>£ 7.00</td>
                            <td><span style="color:#ffffff;background-color:green;font-weight:600;letter-spacing:0.5px;padding:5px;">Confirm</span></td>
                            <td><button data-toggle="modal" data-target="#myModal2" class="btn btn-default">Edit</button></td>
                          </tr>
                          <tr>
                              <td>BRT1234</td>
                              <td>Gatwick Airport South Terminal</td>
                              <td>Heathrow Airport Terminal 5</td>
                              <td>2018-11-15 19:20:00</td>
                              <td>SALOON CAR x 1</td>
                              <td>£ 7.00</td>
                              <td><span style="color:#ffffff;background-color:green;font-weight:600;letter-spacing:0.5px;padding:5px;">Confirm</span></td>
                              <td><button data-toggle="modal" data-target="#myModal2" class="btn btn-default">Edit</button></td>
                            </tr>
                          </tbody>  </table>
         </div>       
              
</div>
            <div class="tab-pane" id="tab_default_4">
                <div id="month">
                    <div class="row">
                        <div class="col-xs-10">
              <input type="text" id="myInput" class="form-control searchbar" onkeyup="myFunction()" placeholder="Search for Bookings.." style="width:30%;margin-bottom:10px;" >
            </div><div class="col-xs-2">Showing 281 Records</div> </div>
                    <table >
                      <thead class="header">
                        <th style="width:5%;">Ref Id</th>
                        <th style="width:20%;">Pickup From</th>
                        <th style="width:20%;">Dropoff To</th>
                        <th style="width:15%;">Date /Time</th>
                        <th style="width:15%;">Cab Type</th>
                        <th style="width:10%;">Total Fare</th>
                        <th style="width:10%;">Status</th>
                        <th style="width:5%;">Action</th>
                      </thead>
                      <tbody id="myTable">
                      <tr>
                          <td>BRT1234</td>
                          <td>Gatwick Airport South Terminal</td>
                          <td>Heathrow Airport Terminal 5</td>
                          <td>2018-11-15 19:20:00</td>
                          <td>SALOON CAR x 1</td>
                          <td>£ 7.00</td>
                          <td><span style="color:#ffffff;background-color:green;font-weight:600;letter-spacing:0.5px;padding:5px;">Confirm</span></td>
                          <td><button data-toggle="modal" data-target="#myModal2" class="btn btn-default">Edit</button></td>
                        </tr>
                      <tr>
                          <td>BRT1234</td>
                          <td>Gatwick Airport South Terminal</td>
                          <td>Heathrow Airport Terminal 5</td>
                          <td>2018-11-15 19:20:00</td>
                          <td>SALOON CAR x 1</td>
                          <td>£ 7.00</td>
                          <td><span style="color:#ffffff;background-color:rgb(23, 23, 255);font-weight:600;letter-spacing:0.5px;padding:5px;">Booked</span></td>
                          <td><button data-toggle="modal" data-target="#myModal2" class="btn btn-default">Edit</button></td>
                        </tr>
                      <tr>
                          <td>BRT1234</td>
                          <td>Gatwick Airport South Terminal</td>
                          <td>Heathrow Airport Terminal 5</td>
                          <td>2018-11-15 19:20:00</td>
                          <td>SALOON CAR x 1</td>
                          <td>£ 7.00</td>
                          <td><span style="color:#ffffff;background-color:red;font-weight:600;letter-spacing:0.5px;padding:5px;">Bidded</span></td>
                          <td><button class="btn btn-default">Edit</button></td>
                        </tr>
                        <tr>
                            <td>BRT1234</td>
                            <td>Gatwick Airport South Terminal</td>
                            <td>Heathrow Airport Terminal 5</td>
                            <td>2018-11-15 19:20:00</td>
                            <td>SALOON CAR x 1</td>
                            <td>£ 7.00</td>
                            <td><span style="color:#ffffff;background-color:green;font-weight:600;letter-spacing:0.5px;padding:5px;">Confirm</span></td>
                            <td><button data-toggle="modal" data-target="#myModal2" class="btn btn-default">Edit</button></td>
                          </tr>
                          <tr>
                              <td>BRT1234</td>
                              <td>Gatwick Airport South Terminal</td>
                              <td>Heathrow Airport Terminal 5</td>
                              <td>2018-11-15 19:20:00</td>
                              <td>SALOON CAR x 1</td>
                              <td>£ 7.00</td>
                              <td><span style="color:#ffffff;background-color:green;font-weight:600;letter-spacing:0.5px;padding:5px;">Confirm</span></td>
                              <td><button data-toggle="modal" data-target="#myModal2" class="btn btn-default">Edit</button></td>
                            </tr>
                          </tbody>       </table>
         </div>       
              
</div>
					</div>


<!--right modal-content starts here-->

  <div class="modal right fade" id="<?php $idd=$id.$check1;echo($idd); ?>" tabindex="-1" role="dialog" >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
  <form action="process_change.php" method="Post">
          <div class="modal-header">
               
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title title" id="myModalLabel2">Booking Information<span class="green"> (BRT12344)</span><span class="btn btn-default" style="float:right;margin:0px 10px;" type="submit">Update</span></h4>
          </div>
  
          <div class="modal-body">
              <table class="table table-user-information">
                  <tbody>
                     
                    <tr>
                      <td>Passenger Name:</td>
                      <td><input typ="text" class="text" name="name" value="<?php echo($pname); ?>"></td>
                    </tr>
                    <tr>
                      <td>Passenger Email:</td>
                      <td><input typ="text" class="text" name="email" value="<?php echo($email); ?>"></td>
                    </tr>
                    <tr>
                      <td>Passenger Contact:</td>
                      <td><input typ="text" class="text" name="num1" value="<?php echo($number1); ?>"></td>
                    </tr>
                        <tr>
                      <td>Alternate Contact:</td>
                      <td><input typ="text" class="text" name="num2" value="<?php echo($number2 ); ?>"></td>
                    </tr>
                           <tr>
                      <td>Pickup From:</td>
                      <td><input typ="text" class="text" name="src" value="<?php echo($src); ?>"></td>
                    </tr>
                      <tr>
                      <td>Dropoff To: </td>
                      <td><input typ="text" class="text" name="des" value="<?php echo($des); ?>"></td>
                    </tr>
                    <tr>
                      <td>Pickup Date & Time</td>
                      <td><input typ="text" class="text" value="<?php echo($dt); ?> / <?php echo($tm); ?>"></td>
                    </tr>
                    <tr>
                        <td>Passengers</td>
                        <td><input typ="text" class="text"  name="passenger" value="<?php echo($np); ?>"></td>
                      </tr>
                      <tr>
                          <td>Luggages</td>
                          <td><input typ="text" class="text" name="luggage" value="<?php echo($nl); ?>"></td>
                        </tr>
                    <tr>
                      <td>Cab Type</td>
                      <td><input typ="text" class="text" name="type" value="<?php echo($type); ?>"></td>
                    </tr>
                         <tr>
                      <td>Meet & Greet</td>
                      <td><input typ="text" class="text" value="<?php
        if($row["mg"]==10)
        {
            echo("YES");
        }
        else{
            echo("NO");
        }
        
        ?>"></td>
                    </tr>
                                               <tr>
                      <td>Child Seat</td>
                      <td><input typ="text" class="text" value="<?php
        if($row["ceat"])
        {
            echo("YES(");
            echo($row["ceat"]);
            echo(")");
        }
        else
        {
            echo("NO");
        }
        ?>"></td>
                    </tr>
                    <tr>
                        <tr>
                      <td>Flight Details</td>
                      <td><input typ="text" class="text" name="flight" value="<?php echo($type); ?>"></td>
                    </tr>
                    <tr>
                              <tr>
                      <td>Special Info</td>
                      <td><input typ="text" class="text" name="info" value="<?php echo($flight); ?>"></td>
                    </tr>
                    <tr>
                        <td>Total Fare</td>
                        <td><input typ="text" class="text" name="fare" value="<?php echo($info); ?>"><input type="hidden" name="id" value="<?php echo($id); ?>"></td>
                      </tr>
                        <tr>
                        <td>Payment Mode</td>
                        <td><select class="form-control" name="pay">
   <?php 
   if($pm=="paid")
   {
   ?>
    <option value="paid">Paid</option>
    <option value="cash">Cash</option>
  <?php
   }
   else
   {
  
  ?>
    <option value="cash">Cash</option>
   <option value="paid">Paid</option>
  
  <?php }  ?>
  
  
  </select></td>
                      </tr></form>
                          <tr>
                              <td><button class="btn btn-success">Confirm Booking</button></td>
                              <td><button class="btn btn-danger">Cancel Booking</button></td>
</tr> 
</tbody></table>    
<span class="title">Drivers Bidded</span><br><br>
<table class="table" >
    <tbody>
      <tr class="gray">
        <th>Name</th>
        <th>Cab Type</th>
        <th>Bid Amount</th>
        <th>Action</th>
      </tr>
      <tr>
          <td>Rahmath Khan</td>
          <td>saloon</td>
          <td>£32</td>
          <td><button class="btn  btn-primary">Allocate</button></td>
        </tr>
          <tr>
          <td>Azwar Khan</td>
          <td>saloon</td>
          <td>£32</td>
          <td><button class="btn  btn-primary">Allocate</button></td>
        </tr>
    
    </tbody></table>
              <span class="title">Manual Allocation</span><br><br>
              <table class="table">
               <tbody>
      <tr class="gray">
        <th>Driver Name</th>
        <th>Amount</th>
        <th>Action</th>
      </tr>
                   <tr>
          <td><select class="form-control" required="required"  placeholder="passengers" name="type">
    <option value="2">Azhwar Khan</option>
    <option value="3">Riyas Khan</option>
    <option value="4"> Estate</option>
          <option value="6"> People Carrier</option>
          <option value="7"> Executive People Carrier</option>
          <option value="8">8-Seater</option>
          
        </select> </td>
          <td><input type="text" class="form-control" required="required" name="amt" value="£32"></td>
          <td><button class="btn  btn-success">Allocate</button></td>
        </tr>
              
              </table>
              <span class="title">Text Message</span>
                <form class="form-horizontal" action="" style="background-color:#defd7c;padding:10px;margin-top:20px;">
    <div class="form-group">
      <label class="control-label col-sm-4" for="email">Contact Number:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control"  style="width:100%" placeholder="Enter Contact Number" >
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="">Text Message</label>
      <div class="col-sm-8">          
           <textarea class="form-control" rows="5" style="width:100%" id="comment"></textarea>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <center><button type="submit" class="btn btn-primary">Send Messsage</button></center>
      </div>
    </div>
  </form>
              
        </div><!-- modal-content -->
      </div><!-- modal-dialog -->
      </div><!-- modal --></div></div></section>
    <script>
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;
        
        for (i = 0; i < dropdown.length; i++) {
          dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
              dropdownContent.style.display = "none";
            } else {
              dropdownContent.style.display = "block";
            }
          });
        }
        </script>
<script>

        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
        </script>
       
                <script>
                        var elem = document.getElementById("html");
                        function openFullscreen() {
                          if (elem.requestFullscreen) {
                            elem.requestFullscreen();
                          } else if (elem.mozRequestFullScreen) { /* Firefox */
                            elem.mozRequestFullScreen();
                          } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
                            elem.webkitRequestFullscreen();
                          } else if (elem.msRequestFullscreen) { /* IE/Edge */
                            elem.msRequestFullscreen();
                          }
                        }
                        </script>
                           <script>
                              $(document).ready(function(){
                                $("#myInput").on("keyup", function() {
                                  var value = $(this).val().toLowerCase();
                                  $("#myTable tr").filter(function() {
                                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                  });
                                });
                              });
                              </script>
      <script type="text/javascript">
        setInterval("my_function();",30000); 
        function my_function(){
          $('#my_div').load(location.href + ' #my_div');
        }
      </script> 
       <script type="text/javascript">
        setInterval("tmrw_function();",30000); 
        function tmrw_function(){
          $('#tmrw').load(location.href + ' #tmrw');
        }
      </script> 
      <script type="text/javascript">
        setInterval("month_function();",30000); 
        function month_function(){
          $('#month').load(location.href + ' #month');
        }
      </script> 
    
    <script>$(window).on('load', function() { // makes sure the whole site is loaded 
  $('#status').fadeOut(); // will first fade out the loading animation 
  $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
  $('body').delay(350).css({'overflow':'visible'});
})</script>
    
    
    <script>
function showResult(str) {
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>
      
        </body></html>