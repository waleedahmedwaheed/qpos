<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php include('styles.php'); ?>
	 <style>
		.panel-body a{
			margin-bottom : 15px !important;
		}
		.ttl-amts
		{
			text-align:right;
		}
	 </style>
</head>
<body>
    <div id="wrapper">
      
		<?php include('sidebar.php'); ?>
		
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Order Detail</h1>
                    </div>
                </div>
               
			 <div class="content">
        <div class="container">
               <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
           <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>S. No.</th>
                                    <th>Perticulars</th>
                                    <th>Quantity.</th>
                                    <th>Unit Price</th>
                                     <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Website Design</td>
                                    <td>1</td>
                                    <td>300 USD</td>
                                    <td>300 USD</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Plugin Dev.</td>
                                    <td>2</td>
                                    <td>200 USD</td>
                                    <td>400 USD</td>
                                </tr>
                                <tr>
                                     <td>3</td>
                                    <td>Hosting Domains</td>
                                    <td>2</td>
                                    <td>100 USD</td>
                                    <td>200 USD</td>
                                </tr>
                                
                            </tbody>
                        </table>
               </div>
             <hr />
             <div class="ttl-amts">
               <h5>  Total Amount : 900 USD </h5>
             </div>
             <hr />
              <div class="ttl-amts">
                  <h5>  Tax : 90 USD ( by 10 % on bill ) </h5>
             </div>
             <hr />
              <div class="ttl-amts">
                  <h4> <strong>Bill Amount : 990 USD</strong> </h4>
             </div>
         </div>
     </div>
    
           </div>
    </div>
			
			   
			
			 
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

	<?php include('footer.php'); ?>
    


</body>
</html>
