				<?php 
				  	include 'connection.php';
				  	$sql="SELECT * FROM chat order by chatid desc";
				  	$result=mysqli_query($conn,$sql);
				  	while($row=mysqli_fetch_assoc($result)):
				  	?>
				   <div class="row">
                       <div class="col-md-2"> <p class="names"><?php echo $row['name'];?></p></div>
                       <div class="col-md-8">  <p class="message"><?php echo $row['msg'];?></p></div>
                       <div class="col-md-2">    <p class="time"><?php echo $row['time'];?></p>
                       
                       </div>
				   	</div><hr>
<style>
    .card
    {
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 100%; 
        background-color:#ffffff;
    }
    
    .low {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 100%;
 margin:20px 10px;
 padding:10px;
  border-radius: 10px 30px;
}



.container {
  padding: 2px 16px;
}
    
    p.names
    {
      font-weight:bold;
       letter-spacing:0.6px;
       font-family: 'Merriweather', serif;
        background-color:#b9f645;
        padding:5px;
        text-align: center;
        font-size:14px;
       border-radius: 15px ;
color:green;
    }
    
 p.message
    {
      font-weight:bold;
       letter-spacing:0.6px;
        color:#000;
       font-family: 'Merriweather', serif;
        font-size:14px;
    }
     p.time
    {
      font-weight:bold;
       letter-spacing:0.6px;
        padding:5px;
        font-family: 'Roboto', sans-serif;
        font-size:13px;
        color:#000;
    }
</style>
		
				<?php endwhile;?>