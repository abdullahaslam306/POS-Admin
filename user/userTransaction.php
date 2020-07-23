
<?php 
include("header.php"); ?>
<br>
<h2>Transaction Report</h2>


<br><br>

<div class="container">
	<h3 style="text-align: center;">History</h3>
	<?php if(isset($_GET['Search'])){
	echo "<h4>User ID: $_GET[id]</h4>";
} ?>
	<table class="table" id="tab1" >
  <thead class="abc">
    <tr>
      <th scope="col">ID</th> 
      <th scope="col"> Date</th>
      <th scope="col"> Location</th>
      <th scope="col"> Amount</th>
     

    
    </tr>
  </thead>
  <tbody>
                              
                                    <tbody>
                                        
                                            <?php 
                                           
                                            $con=con_function();

 
$s=0;
$sql ="SELECT * FROM transaction where rfid=$_SESSION[rfid] ";
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
        $tamt=$tamt+$notif['amount'];
   echo  "<form><tr class='tr-shadow'>";
   echo "<td>".$notif['tid']."</td> <td class='desc'>
                                                ".$notif['date']."
                                            </td><td class='desc'>".$notif['location']."</td><td class='desc'>".$notif['amount']."</td>";
                                              }

                                            
                                            
                                       echo " </tr>
                                        </form>
                                        <tr class='spacer'></tr>
                                         <tr class='tr-shadow'><td></td><td></td><td><b>Total:</b></td><td>$tamt</td></tr>" ;
$i++;}else{
	echo "<p style='font-size:18px; text-align:center;'>No Transaction Found For $rid<p>";
}?>

                                            
                                            
                                            
                                            
                                            
                                          
                                            
                                                
                                       
                                    </tbody>
                                </table>

</div>

<?php include("footer.php"); ?>