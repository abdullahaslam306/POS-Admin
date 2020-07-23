<?php include("header.php");
if(isset($_GET['msg']))
{
echo "<div class='container'> <div class='alert alert-success' role='alert'>
 $_GET[msg]
</div></div>";
}
if(isset($_GET['er']))
{
  echo "<div class='container'> <div class='alert alert-danger' role='alert'>
 $_GET[er]
</div></div>";
} ?>
<br>

<h2>Manage User</h2>
<div class="form-border">
    <form class="needs-validation" method="POST" action="userBack.php" enctype="multipart/form-data" onsubmit="return check();">
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">First name</label>
      <input type="text" name="fname" id="fname" class="form-control" id="validationCustom01" placeholder="Mark" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom02">Last name</label>
      <input type="text" name="lname" id="lname" class="form-control" id="validationCustom02" placeholder="Otto" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-6">
      <label for="validationCustom03">Email</label>
      <input type="email" name="email" id="email" class="form-control" id="validationCustom03" required>
      <div class="invalid-feedback">
        Please provide a valid Email.
      </div>
    </div>
    <div class="col-md-6 mb-6">
      <label for="validationCustom04">User Type</label>
      <select class="custom-select" id="utype" name="utype" id="validationCustom04" required>
        <option selected disabled value="">Choose...</option>
        <option value="Leader">Leader</option>
        <option value="Student">Student</option>
        <option value="Staff">Staff</option>
      </select>
      <div class="invalid-feedback">
        Please select a valid Type.
      </div>
    </div>
    
  </div>
  
  <div class="form-row">
    <div class="col-md-6 mb-6">
      <label for="validationCustom03">RFID No</label>
      <input type="number" name="rfid"  id="rfid" class="form-control"  id="validationCustom03" maxlength="8" required>
       <div class="invalid-feedback" id="feedback">
        Please Enter 8 Digit Number.
      </div>
    </div>

    <div class="col-md-6 mb-6">
      <label for="validationCustom04">ID Card</label>
      <input type="number" name="idcard" id="idcard"  min="1" step="any" class="form-control" id="validationCustom03" maxlength="5" required>
       <div class="invalid-feedback" id="feedback2">
        Please Enter 5 Digit Number.
      </div>

    </div>
    
  </div>

<div class="form-row">
    <div class="col-md-6 mb-6">
      <label for="validationCustom04">Choose Image</label>
      <input type="file" name="img" class="form-control" id="img" >
      
      <div class="invalid-feedback">
        Please select a valid Type.
      </div>
    </div>
    <div class="col-md-6 mb-6">
      <label for="validationCustom04">Grade</label>
      <input type="number" name="grade" id="grade" min="1" step="any" class="form-control" id="validationCustom03" maxlength="8" required>
      
      <div class="invalid-feedback">
        Please select a valid Type.
      </div>
    </div>
    
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-6">
      <label for="validationCustom04">Balance</label>
      <input type="number" id="bal" name="bal" min="0" step="any" class="form-control" id="validationCustom03" required>
      
      <div class="invalid-feedback">
        Please select a valid Type.
      </div>
    </div>
    <div class="col-md-6 mb-6">
      <label for="validationCustom04">Allow Concession</label>
      <select class="custom-select" id="cons" name="cons" id="validationCustom04" required>
        <option selected disabled value="">Choose...</option>
        <option value="1">Yes</option>
        <option value="0">No</option>
        
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
<H2>All Users</H2>
</div>
<br>
<table class="table" id="tab1" >
  <thead class="abc">
    <tr>
      <th scope="col">RFID</th>
      <th scope="col">First Name</th>
      <th scope="col"> Last Name</th>
      <th scope="col"> Type</th>
      <th scope="col"> Email</th>
      <th scope="col"> Allow Concession</th>
      <th scope="col"> ID Card</th>
      <th scope="col"> Grade</th>
      <th> Balance</th>
      <th> Delete</th>

    
    </tr>
  </thead>
  <tbody>
                              
                                    <tbody>
                                        
                                            <?php 
                                            
                                            $con=con_function();

$s=0;
$sql ="SELECT * FROM 'User' where 1 ";
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
    $access=$notif['allow_access'];
    if($access==1)
    {
     $val="Yes";
    }
    else{
    $val="No";
    }
   echo  "<form><tr class='tr-shadow'>";
   echo "<td>".$notif['rfid']."</td><td>
                                                ".$notif['fname']."
                                            </td> <td class='desc'>
                                                ".$notif['lname']."
                                            </td><td class='desc'>".$notif['user_type']."</td><td class='desc'>".$notif['email']."</td><td class='desc'>".$val."</td><td class='desc'>".$notif['id_card']."</td>
                                            <td class='desc'>".$notif['grade']."</td>
                                            <td class='desc'>".$notif['balance']."</td>";
                                              echo "<td>
                                                    <button class='btn btn-danger btn-sm' >
                                                        <a  
                                                        href='userBack.php?id123=$notif[rfid]'>
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
    var rfd=document.getElementById('rfid').value;
     var card=document.getElementById('idcard').value;
     var elementt = document.getElementById("feedback2");
      var element = document.getElementById("feedback");
      element.classList.remove("d-block");
      elementt.classList.remove("d-block");
      notValid=false;
    if(rfd.length!=8 )
    {
     
        
  element.classList.add("d-block");
  
      notValid=true;
    }
    if(card.length!=5)
    {
     
        
  elementt.classList.add("d-block"); 
  notValid=true;
     }
    
  
    if(notValid)
    {
      return false;
    }
    else{
      return true;
    }
  }
</script>
                                            
                                            
                                            
                                            
                                            
                                          
                                            
                                                
                                       
                                    </tbody>
                                </table>

<?php include("footer.php"); ?>


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
document.getElementById('fname').value=this.cells[1].innerHTML.trim();
document.getElementById('lname').value=this.cells[2].innerHTML.trim();
document.getElementById('rfid').value=this.cells[0].innerHTML.trim();
document.getElementById('email').value=this.cells[4].innerHTML;
document.getElementById('idcard').value=this.cells[6].innerHTML;
document.getElementById('utype').value=this.cells[3].innerHTML;
document.getElementById('bal').value=this.cells[8].innerHTML;
document.getElementById('grade').value=this.cells[7].innerHTML;

 var concess=this.cells[5].innerHTML;
 if(concess=="Yes")
 {
  document.getElementById('cons').value=1;
 }
 else{
  document.getElementById('cons').value=0;
 }
document.getElementById('add').style.display = "none";;



  }}

function clearField()
{
  document.getElementById('fname').value="";
document.getElementById('lname').value="";
document.getElementById('rfid').value="";
document.getElementById('email').value="";
document.getElementById('idcard').value="";
document.getElementById('utype').value="";
document.getElementById('bal').value="";
document.getElementById('grade').value="";
document.getElementById('img').value="";
document.getElementById('cons').value="";
document.getElementById('add').style.display = "inline-block";;


}

</script>