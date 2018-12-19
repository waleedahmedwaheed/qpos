<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>POS</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body style="background-color: #E2E2E2;">
    <div class="container">
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
                <img src="assets/img/logo-invoice.png" />
            </div>
        </div>
         <div class="row ">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                           
                            <div class="panel-body">
                                <form role="form" method="post" id="userForm">
                                    <hr />
                                    <h5>Enter PIN to Login</h5>
                                       <br />
                                    <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" name="password" class="form-control" required  placeholder="Enter your PIN" maxlength="10" />
                                        </div>
                                    <div class="form-group">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" /> Remember me
                                            </label>
                                            <span class="pull-right" style="display:none;">
                                                   <a href="index.php" >Forget password ? </a> 
                                            </span>
                                        </div>
                                     
                                     <button type="submit" class="btn btn-primary">Login Now</button>
                                    <hr />
                                     <span id="response"></span>
                                    </form>
                            </div>
                           
                        </div>
                
                
        </div>
    </div>

<script src="assets/js/jquery-1.10.2.js"></script>

<script>
$(document).ready(function (e) {
$("#userForm").on('submit',(function(e) {
e.preventDefault();
$('#response').show();
$("#loader").show();
$.ajax({
url: "login-exec.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
$("#loader").hide();
$("#response").html(data);
	
	if(data==0) 
	{
		 $("#response").html('<div class="alert alert-danger">Invalid PIN.</div>');
	}
	setTimeout(function() 
	{	
		$("#response").hide();	
	}, 3000);
},
error: function (jqXHR, status, err) {
    alert("Error : Connection to server failed");
}
});

}));
});
</script>	

</body>
</html>
