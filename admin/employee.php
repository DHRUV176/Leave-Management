<?php
include "../db.inc.php";
include "header.inc.php";
include "sidebar.inc.php";
include "footer.inc.php";


?>



<section id="main-content">
      <section class="wrapper">


      	<div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal " id="register_form" method="POST">
                    <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2"><b>Name</b> <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="fullname" name="name" placeholder="Enter Employee Name" type="text" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2"><b>Email</b> <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="fullname" name="email" placeholder="Enter Employee Email" type="text" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2"><b>Mobile</b> <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="fullname" name="mobile" placeholder="Enter the Employee Mobile" type="text" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2"><b>Password</b> <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="fullname" name="password" placeholder="Enter the Employee Password" type="text" required />
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2"><b>Department</b> <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select class="form-control" name="department">
                          <option value="">Select Department</option>
                            <?php
                              $res=mysqli_query($con,"select * from department order by department desc");
                              while($row=mysqli_fetch_assoc($res)){ 
                              echo "<option>";
                              echo $row["department"];
                              echo "</option>";
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2"><b>Address</b> <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="fullname" name="address" placeholder="Enter Employee Address" type="text" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2"><b>Join Date</b> <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="fullname" name="join_date" placeholder="Join Date" type="date" required />
                      </div>
                    </div>
                    <div class="alert alert-danger" id="error" style="display:none;">
                       This Employee Already Exits | Please Try Another !!!
            		</div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit" name="add_employee">Add Employee</button>
                      </div>
                    </div>
                    <div class="alert alert-success" id="success" style="display:none;">
                       Record Inserted Successfully
            		</div>

                  </form>
                </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                EMPLOYEE INFORMATION
              </header>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Sr.No</th>
                      <th>Employee Name</th>
                      <th>Employee Email</th>
                      <th>Department Name</th>
                      <th>Mobile</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  	$count=0;
                	$res = mysqli_query($con,"select * from employee order by id desc");
                	while($row=mysqli_fetch_array($res)){
                  	$count=$count+1;

                  ?>
                    <tr>
                      <td><?php echo $count; ?></td>
                      <td><?php echo $row["name"] ?></td>
                      <td><?php echo $row["email"] ?></td>
                      <td><?php echo $row["department_id"] ?></td>
                      <td><?php echo $row["mobile"] ?></td>
                      <td width="10%"><a href="delete_employee.php?id=<?php echo $row["id"]; ?>" style="color:red;">Delet</td>
                    </tr>
                    <?php
                	}
                   ?>
                  </tbody>
                </table>
              </div>

            </section>
          </div>
        </div>

    <!-- Wrapper Close   -->  
    </section>
</section>



<?php

if(isset($_POST['add_employee']))
{
	$count=0;
    $res = mysqli_query($con,"select * from employee where email='$_POST[email]'");
    $count = mysqli_num_rows($res);
    if($count>0){
      ?>
      <script>
        document.getElementById("success").style.display="none";
        document.getElementById("error").style.display="block";
      </script>
      <?php
    }else{
        mysqli_query($con,"insert into employee values (NULL,'$_POST[name]','$_POST[email]','$_POST[mobile]','$_POST[password]','$_POST[department]','$_POST[address]','$_POST[join_date]','2')") or die(mysqli_error($con));
        ?>
      <script>
        document.getElementById("success").style.display="block";
        document.getElementById("error").style.display="none";
        setTimeout(function(){
          window.location.href=window.location.href;
        },1000)
      </script>
      <?php
    }
}



?>