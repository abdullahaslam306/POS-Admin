<?php 
include('header.php'); ?>
<h2>Manage System Users</h2>

<div class="form-border">
    <form class="needs-validation" method="POST" action="SystemBack.php"  onsubmit="return check();">
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">UserID</label>
      <input type="email" name="userid" id="userid" class="form-control" id="validationCustom01" placeholder="Auto" readonly required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  <div class="col-md-6"></div>
</div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">User Email:</label>
      <input type="email" name="mail" id="mail" class="form-control" id="validationCustom01" placeholder="user@abc.com" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom02">New Password:</label>
      <input type="Password" name="npass" id="npass" class="form-control" id="validationCustom02" placeholder="password ..." required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-6">
      <label for="validationCustom03">Confoirm Password:</label>
      <input type="password" name="cpass" placeholder="enter password again ..." id="cpass" class="form-control" id="validationCustom03" required>
      <div class="invalid-feedback">
        Please provide a valid Email.
      </div>
    </div>
    <div class="col-md-6 mb-6">
      <label for="validationCustom04">User Type</label>
      <select class="custom-select" id="utype" name="utype" id="validationCustom04" required>
        <option selected disabled value="">Choose...</option>
        <option value="Admin">Admin</option>
        <option value="Analyst">Analyst</option>
        
      </select>
      <div class="invalid-feedback">
        Please select a valid Type.
      </div>
    </div>
    
  </div>
  
  
  <br>

 <button type="Submit" class="btn btn-success" id="add" name="add">Submit</button>
<button type="Submit" class="btn btn-primary" name="update">Edit</button>
<button type="button" class="btn btn-danger" onclick="clearField();" >Clear</button>
 

</form>
<br>
</div>
<br>
<H2>All Users</H2>
<br>
<div class="col-md-12">
<table class="table" id="tab1" >
  <thead class="abc">
  	<th>ID</th>
   <th> Email</th>
   <th>Password</th>
   <th>User Type</th>
   <th>Delete</th>
  </thead>
  <tbody>
                              
                                    
                                        
                                            <?php 
                                            
                                            $con=con_function();

$s=0;
$sql ="Select * from login where userid !=$_SESSION[userid]";
$r=$con->query($sql);
 if($r && $r->num_rows>0)
  {$s=$s+$r->num_rows;
 $projects = array();
 $pn=array();
  $i=0;
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
   echo "<td>".$notif['userid']."<td>".$notif['username']."</td><td>
                                                ".$notif['password']."
                                            </td> <td class='desc'>
                                                ".$notif['type']."
                                            </td>";
                                              echo "<td>
                                                    <button class='btn btn-danger btn-sm' >
                                                        <a  
                                                        href='userBack.php?id123=$notif[userid]'>
                                                        delete

                                                    </button>
                                                    </td>
                                                    ";}

                                            
                                            
                                       echo " </tr>
                                        </form>
                                        <tr class='spacer'></tr>
                                        " ;
$i++;}else{
   echo "No data Found";
  
}  ?>
<script type="text/javascript">
  function check()
  {
    var rfd=document.getElementById('npass').value;
     var card=document.getElementById('cpass').value;
     if(rfd===card)
     {
     	return true;
     }
     else{
     	alert('Password Dose Not Match')
     	return false;
     }
     
  }
</script>
                                            
                                            
                                            
                                            
                                            
                                          
                                            
                                                
                                       
                                    </tbody>
                                </table>
                                </div>




<script type="text/javascript">
  var table=document.getElementById('tab1'),rIndex;
  console.log(table);
  for (var i = 1; i < table.rows.length; i++) {
var len=table.rows[i].cells.length;
len=len-1;

table.rows[i].ondblclick=function()
{
rIndex=this.rowIndex;
console.log(rIndex);
document.getElementById('userid').value=this.cells[0].innerHTML.trim();
document.getElementById('mail').value=this.cells[1].innerHTML.trim();
document.getElementById('npass').value=this.cells[2].innerHTML.trim();
document.getElementById('utype').value=this.cells[3].innerHTML.trim();
document.getElementById('cpass').value=this.cells[2].innerHTML.trim();
document.getElementById('add').style.display = "none";



  }}

function clearField()
{
  document.getElementById('utype').value="";
document.getElementById('mail').value="";
document.getElementById('npass').value="";
document.getElementById('cpass').value="";
document.getElementById('userid').value="Auto";

document.getElementById('add').style.display = "inline-block";






}

</script>
<?php include('footer.php'); ?>