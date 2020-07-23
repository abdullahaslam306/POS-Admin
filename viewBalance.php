<?php include('header.php'); ?>
<h2>Inquire Balance</h2>

<form method="GET">
	<div class="form-row">
		<div class="col-md-4 mb-4"></div>
		<div class="col-md-4 mb-4">  
		 <div class="input-group ">
            <input type="number" min="0" required class="form-control" placeholder="Enter Grade ..." name="id">
    <div class="input-group-append">
      <input type="submit" name="Search"  value="Find" class="input-group-button form-control">
      
    </div>
  </div></div>
		<div class="col-md-4 mb-4"></div>

	</div>


</form>

<br><br>

<div class="container">
	<h3 style="text-align: center;">Results</h3>
	<?php if(isset($_GET['Search'])){
	echo "<h4>Grade: $_GET[id]</h4>";
} ?>
	<table class="table" id="tab1" >
  <thead class="abc">
    <tr>
      <th scope="col">RFID</th> 
      <th scope="col"> ID Card</th>
      <th scope="col"> Name</th>
      <th scope="col"> Balance</th>
     

    
    </tr>
  </thead>
  <tbody>
                              
                                    <tbody>
                                        
                                            <?php 
                                            if(isset($_GET['Search']))
                                         { $rid=$_GET['id'];
                                            $con=con_function();


$s=0;
$sql ="SELECT * FROM user where  grade=$rid ";
$r=$con->query($sql);
 if($r->num_rows>0)
  {$s=$s+$r->num_rows;
 $projects = array();
 $pn=array();
  $i=0;
  $tamt=0;
    while ($not =  mysqli_fetch_assoc($r))
    {
        $notif[] = $not;
        
    }
   $i=0;
    sort($notif);
  
   $val="";
 
 
    foreach ($notif as $notif)
    {
        
   echo  "<form><tr class='tr-shadow'>";
   echo "<td>".$notif['rfid']."</td> <td class='desc'>
                                                ".$notif['id_card']."
                                            </td><td class='desc'>".$notif['fname']."</td><td class='desc'>".round($notif['balance'],2)."</td>";
                                              }

                                            
                                            
                                       }else{
	echo "<p style='font-size:18px; text-align:center;'>No User Found For Grade: $rid<p>";
}}else{
   echo "No data Found";
  
}  ?>

                                            
                                            
                                            
                                            
                                            
                                          
                                            
                                                
                                       
                                    </tbody>
                                </table>

</div>

<?php include('footer.php'); ?>