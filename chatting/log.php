<!DOCTYPE html>
<html lang="en" id="html">
<head>
  <title>Admin Panel</title>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Merriweather|Roboto" rel="stylesheet">
     <script src="./js/config.js"></script>
    <script src="./js/util.js"></script>
        <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="./js/jquery.emojiarea.js"></script>
    <script src="./js/emoji-picker.js"></script>
     <link href="./css/emoji.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/fonts.css">
  <link rel="stylesheet" href="../css/style.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
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
<div class="sidenav">
        <a href="../index.html" class="active"><i class="fa fa-dashboard"></i> Dashboard</a>
        <a href="../bookrecord.html">Booking Records</a>
        <a href="../passrecord.html">Passenger Records</a>
        <button class="dropdown-btn">Company Admin</button>
              <div class="dropdown-container">
                  <a href="../bookanal.html">Booking Analytics</a>
                <a href="../staffacc.html">Staff Accounts</a>
                <a href="../prolist.html">Provider List</a>
                <a href="../cprofit.html">Company Profit</a>
                <a href="../fchange.html">Fare Changer</a>
              </div>
              <button class="dropdown-btn">Driver Management</button>
              <div class="../dropdown-container">
                <a href="../dlist.html">Driver List</a>
                <a href="../adriver.html">Add Driver</a>
                <a href="../danalytics.html">Driver Analytics</a>
                <a href="../payments.html">Payments</a>
                <a href="../crecords.html">Council Records</a>
              </div>
              <a href="../bquote.html">Booking Quote</a>
              <a href="../qrecords.html">Quote Records</a>
        <a href="../bsms.html">Booking SMS</a>
        <a href="../webupload.html">website Uploads</a>
        <a href="../track.html">Live Tracking</a>
        <a href="../chat.html">Chatting Panel</a>
        <a href="../quick.html">Quick Metrics</a>
        <a href="../settings.html"><i class="fa fa-gear"></i> Settings</a>
      </div>
    
         <section class="internal container" >
<body onload="ajax()">
				<div class="card color">
				  <div class="card-header">
                      <div class="row">
                          <div class="col-md-6"></div>
                          <div class="col-md-6">
				<p style="text-align:right;">welcome! <?php echo $_POST["name"]?></p></div>
				  </div>
				  <div class="card-body" style="max-height:450px;overflow-y:scroll;overflow-x:hidden;">
					  <div id="chat" >
					  	
					  </div>
				   
				  </div>
				  <div class="card-footer text-muted">
				  	<form action="log.php" method="post">
				   <div class="row">
				   		<div class="col-xs-10">
				   		 <p class="lead emoji-picker-container">
              <input type="text" name="msg" class="form-control" placeholder="Enter Your Message Here....." data-emojiable="true">
            </p>
                            <input type="hidden" name="name" value ="<?php echo $_POST["name"]?>" class="form-control">
				   		</div>
				   		<div class="col-xs-2">
				   			<input type="submit" class="btn btn-success" name="submit" value="Enter">
				   		</div>
				   </div>
				</form>
				  </div>
				</div>
			</div>
	</body>
                </section>

  	<script>
function ajax(){
  var xhttp;
  if(window.XMLHttpRequest){
    xhttp=new XMLHttpRequest();
  }else{
    xhttp=new ActiveXObjext("Micosoft.XMLHTTP");
  }
  xhttp.onreadystatechange=function(){
    if(this.readyState==4 && this.status==200){
      document.getElementById("chat").innerHTML=this.responseText; 
    }
  }
  xhttp.open('GET',"chat.php",true);
  xhttp.send();
}
setInterval(function(){ ajax()},1000);
</script>

    <style>input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}
.internal 
        {
            margin-left:170px;
            margin-top:80px;
        }
 .color
    {
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 100%;
        padding:10px;
background-color: #ffffff;
    }
    </style>
    
    <script>function key_up(e){
    var enterKey = 13; //Key Code for Enter Key
    if (e.which == enterKey){
        //Do you work here
    }
}</script>
    
    
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
                          <script></script>
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
     <script>$(window).on('load', function() { // makes sure the whole site is loaded 
  $('#status').fadeOut(); // will first fade out the loading animation 
  $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
  $('body').delay(350).css({'overflow':'visible'});
})</script>
	
         <script>
      $(function() {
        // Initializes and creates emoji set from sprite sheet
        window.emojiPicker = new EmojiPicker({
          emojiable_selector: '[data-emojiable=true]',
          assetsPath: './img/',
          popupButtonClasses: 'fa fa-smile-o'
        });
    
        window.emojiPicker.discover();
      });
    </script>
    </body>
</html>
<?php
		if(isset($_POST['submit'])){
			$name=$_POST['name'];
			$msg=$_POST['msg'];
			include 'connection.php';
			$sql="INSERT into chat (name, msg) values('$name','$msg');";
			
			if (mysqli_query($conn, $sql)) {
	         // echo "<embed loop='false' src='chat.mp3' hidden='true' autoplay='true'>";
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

		}



	?>