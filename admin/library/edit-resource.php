<?php
session_start();
error_reporting(0);
include('includes/config.php');

    
        
        if(isset($_POST['Delete'])){
            $cid=intval($_GET['r_id']);
            $count=$dbh->prepare("DELETE FROM tb_resource WHERE r_id=:cid");
            $count->bindParam(":cid",$cid,PDO::PARAM_INT);
            $count->execute();
            $msg=" Deleted!";
        }  
if(isset($_POST['update']))
{
$r_file=$_POST['r_file'];
$r_title=$_POST['r_title'];
$r_category=$_POST['r_category'];
$r_author=$_POST['r_author'];
$r_date=$_POST['r_date'];
$cid=intval($_GET['r_id']);
$sql="update  tb_resource set r_file=:r_file,r_date=:r_date,r_author=:r_author,r_category=:r_category,r_title=:r_title where r_id=:cid ";
$query = $dbh->prepare($sql);
$query->bindParam(':r_file',$r_file,PDO::PARAM_STR);
$query->bindParam(':r_title',$r_title,PDO::PARAM_STR);
$query->bindParam(':r_category',$r_category,PDO::PARAM_STR);
$query->bindParam(':cid',$cid,PDO::PARAM_STR);
$query->bindParam(':r_author',$r_author,PDO::PARAM_STR);
$query->bindParam(':r_date',$r_date,PDO::PARAM_STR);

$query->execute();
$msg="Data has been updated successfully";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Resource Update</title>
        <link rel="stylesheet" href="css/bootstrap.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
            <?php include('includes/topbar.php');?>   
          <!-----End Top bar>
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

<!-- ========== LEFT SIDEBAR ========== -->
<?php include('includes/leftbar.php');?>                   
 <!-- /.left-sidebar -->

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Update Resource</h2>
                                </div>
                                
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
            							<li><a href="#">Update Resource</a></li>
            							<li class="active">Update Resource</li>
            						</ul>
                                </div>
                               
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">

                             

                              

                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Update Resource</h5>
                                                </div>
                                            </div>
<?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong>Well done!</strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>

                                                <form method="post">
<?php 
$cid=intval($_GET['r_id']);
$sql = "SELECT * from tb_resource where r_id=:cid";
$query = $dbh->prepare($sql);
$query->bindParam(':cid',$cid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>




                                                    <div class="form-group has-success">
                                                        <label for="success" class="control-label">Current Category is: <?php echo htmlentities($result->r_category);?></label>
                                                		
                                                		<div class="">
                                                        <label for="success" class="control-label">Select Updated Category: </label>
                                                        <select name="r_category" class="form-control" id="r_category" required="required">
                                                                <option value="r_category">Select Category</option>
                                                                <?php $sql1 = "SELECT * from tb_category";
                                                                $query1 = $dbh->prepare($sql1);
                                                                $query1->execute();
                                                                $result1=$query1->fetchAll(PDO::FETCH_OBJ);
                                                                if($query1->rowCount() > 0)
                                                                        {
                                                                foreach($result1 as $resul)
                                                                                {   ?>
                                                                <option value="<?php echo htmlentities($resul->category_name); ?>"><?php echo htmlentities($resul->category_name); ?></option>
                                                                        <?php }} ?>
                                                                    </select>
                                                            
                                                		</div>
                                                            	
                                                	</div>
                                                            
                                                    <div class="form-group has-success">
                                                        <label for="success" class="control-label">Title</label>
                                                		<div class="">
                                                			<input type="text" name="r_title" value="<?php echo htmlentities($result->r_title);?>" required="required" class="form-control" id="success">
                                                            
                                                		</div>
                                                	</div>

                                                    <div class="form-group has-success">
                                                        <label for="success" class="control-label">Author</label>
                                                		<div class="">
                                                			<input type="text" name="r_author" value="<?php echo htmlentities($result->r_author);?>" required="required" class="form-control" id="success">
                                                            
                                                		</div>
                                                	</div>
                                                    
                                                    <div class="form-group has-success">
                                                        <label for="success" class="control-label">Date</label>
                                                		<div class="">
                                                			<input type="date" name="r_date" value="<?php echo htmlentities($result->r_date);?>" required="required" class="form-control" id="success">
                                                            
                                                		</div>
                                                	</div>


                                                    <div class="form-group has-success"> 
                                                        <label for="success" class="control-label">Resource uploaded Previously:</label>
                                                		<div class="">
                                                        <?php echo htmlentities($result->r_file);?>
                                                            
                                                		</div>
                                                	</div>
                                                            
                                                            <div class="form-group has-success">
                                                            <div class="custom-file">
          


                                                            <label for="file-upload">Reupload Updated Resource<input type="file" id="r_file" name="r_file"></label>
                                                             </div><br><br>
                                                      
                                                     
                                                    <?php }} ?>
  <div class="form-group has-success">

                                                        <div class="">
                                                           <button type="submit" name="update" class="btn btn-success btn-labeled">Update<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                           <button type="button" class="btn btn-danger " data-toggle="modal" data-target="#modal" >Delete</button>
                                                    </div>
 <!-- Modal content-->
 <div class="modal fade" id="modal" role="dialog">
                                                        <div class="modal-dialog">
                                                        
                                                          <!-- Modal content-->
                                                          <div class="modal-content">
                                                            <div class="modal-header">
                                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                              <h4 class="modal-title">Delete</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                              <p>Are you sure you want to delete?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                              <button type="submit" name="Delete" class="btn btn-danger btn-labeled">Delete<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>

                                                            </div>
                                                          </div>
                                                          
                                                        </div>
                                                      </div>


                                                    
                                                </form>

                                              
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-8 col-md-offset-2 -->
                                </div>
                                <!-- /.row -->

                               
                               

                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                    </div>
                    <!-- /.main-page -->

             
                    <!-- /.right-sidebar -->

                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/jquery-ui/jquery-ui.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>



        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>
<?php   ?>
