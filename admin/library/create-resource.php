<?php
session_start();
error_reporting(0);
include('includes/config.php');




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Resource</title>
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/prism/prism.css" media="screen">
    <link rel="stylesheet" href="css/main.css" media="screen">
    <script src="js/modernizr/modernizr.min.js"></script>

    <script src="https://www.gstatic.com/firebasejs/8.6.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.6.2/firebase-storage.js"></script>
    <script>
        // Your web app's Firebase configuration
        var firebaseConfig = {
            apiKey: "AIzaSyBn6msKCQR6gstFDTjSUy7-WPSSxWUzUD0",
            authDomain: "esdm-d16a4.firebaseapp.com",
            projectId: "esdm-d16a4",
            storageBucket: "esdm-d16a4.appspot.com",
            messagingSenderId: "315333777495",
            appId: "1:315333777495:web:a90401f4982ddf67f12b12"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        console.log(firebase)
    </script>
    <script type="text/javascript" src="uploadPdf.js"></script>




    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }

        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }
    </style>
</head>

<body class="top-navbar-fixed">
    <div class="main-wrapper">

        <!-- ========== TOP NAVBAR ========== -->
        <?php include('includes/topbar.php'); ?>
        <!-----End Top bar>
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
        <div class="content-wrapper">
            <div class="content-container">

                <!-- ========== LEFT SIDEBAR ========== -->
                <?php include('includes/leftbar.php'); ?>
                <!-- /.left-sidebar -->

                <div class="main-page">
                    <div class="container-fluid">
                        <div class="row page-title-div">
                            <div class="col-md-6">
                                <h2 class="title">Create Resource</h2>
                            </div>

                        </div>
                        <!-- /.row -->
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                    <li><a href="#">Resource</a></li>
                                    <li class="active">Create Resource</li>
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
                                                <h5>Create Resource</h5>
                                            </div>
                                        </div>
                                        <?php if ($msg) { ?>
                                            <div class="alert alert-success left-icon-alert" role="alert">
                                                <strong>Well done!</strong><?php echo htmlentities($msg); ?>
                                            </div><?php } else if ($error) { ?>
                                            <div class="alert alert-danger left-icon-alert" role="alert">
                                                <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                            </div>
                                        <?php } ?>

                                        <div class="panel-body">

                                            <form method="post" action="create-resourceprocess.php">
                                                <div class="form-group has-success">
                                                    <label for="success" class="control-label" >Select Category</label>
                                                    <div class="">
                                                        <select name="r_category" class="form-control" id="r_category" required>
                                                            <option value="r_category" disabled>Select Category</option>
                                                            <?php $sql = "SELECT * from tb_category";
                                                            $query = $dbh->prepare($sql);
                                                            $query->execute();
                                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                            if ($query->rowCount() > 0) {
                                                                foreach ($results as $result) {   ?>
                                                                    <option value="<?php echo htmlentities($result->category_name); ?>"><?php echo htmlentities($result->category_name); ?></option>
                                                            <?php }
                                                            } ?>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="form-group has-success">
                                                    <label for="success" class="control-label">Title</label>
                                                    <div class="">
                                                        <input type="text" name="r_title" required="required" class="form-control" id="r_title">

                                                    </div>
                                                    <div class="form-group has-success">
                                                        <label for="success" class="control-label">Author</label>
                                                        <div class="">
                                                            <input type="text" name="r_author" required="required" class="form-control" id="r_author">

                                                        </div>

                                                    </div>


                                                </div>




                                                <div class="custom-file">

                                                    <label for="file-upload">Select PDF
                                                        <input type="file" id="r_file" name="r_file" accept="application/pdf" required="required" onchange="upload()"></label>
                                                    <input type="hidden" id="r_file_url" name="r_file_url">
                                                    <div>
                                                        <!-- <input type="button" runat="server" value="upload" id="button2"  onclick="upload()" style="visibility:hidden" /> -->
                                                        <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>

                                                        <br>
                                                        <!-- <button type="button" class="btn btn-info btn-labeled" onclick="upload()">Upload</button> -->
                                                        <!-- <asp:FileUpload ID="fileupload1" runat="server"  /> -->

                                                    </div>




                                                    <div class="form-group has-success">
                                                        <label for="success" class="control-label">Date</label>
                                                        <div class="">
                                                            <input type="date" name="r_date" required="required" class="form-control" id="r_date">

                                                        </div>


                                                        <div class="form-group has-success">

                                                            <div class="">
                                                                <button id="submit-button" type="submit" name="submit" class="btn btn-success btn-labeled">Submit<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
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
<?php  ?>