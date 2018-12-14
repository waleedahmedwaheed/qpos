<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   
	
	<?php include('styles.php'); ?>
   
</head>
<body>
    <div id="wrapper">
        
        
		<?php include('sidebar.php'); ?>
		
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">DASHBOARD</h1>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="main-box" style="background-color: #51c34f">
                            <a href="order.php">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                                <h5>New Order</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="main-box" style="background-color: #ba4141">
                            <a href="order.php">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                                <h5>Previous Order</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="main-box " style="background-color: #167ac6">
                            <a href="order.php">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                                <h5>New Delivery Order</h5>
                            </a>
                        </div>
                    </div>
					<div class="col-md-6">
                        <div class="main-box " style="background-color: #f00">
                            <a href="order.php">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                                <h5>Previous Delivery Order</h5>
                            </a>
                        </div>
                    </div>
					<div class="col-md-6">
                        <div class="main-box " style="background-color: #777">
                            <a href="#">
                                <i class="fa fa-list-alt fa-5x"></i>
                                <h5>End of Day</h5>
                            </a>
                        </div>
                    </div>
					<div class="col-md-6">
                        <div class="main-box" style="background-color: #8a6d3b">
                            <a href="#">
                                <i class="fa fa-bar-chart fa-5x"></i>
                                <h5>Refund</h5>
                            </a>
                        </div>
                    </div>

                </div>
                <!-- /. ROW  -->
 
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

	<?php include('footer.php'); ?>
    


</body>
</html>
