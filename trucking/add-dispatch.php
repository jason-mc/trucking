<!DOCTYPE html>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style>

#loading-img{
display:none;
}

.response_msg{
margin-top:10px;
font-size:13px;
background:#E5D669;
color:#ffffff;
width:250px;
padding:3px;
display:none;
}

</style>
</head>
<body>

<div class="container">
<div class="row">

<div class="col-md-8">
<h1><img src="../images/dispatch-icon.jpg" width="80px">Add new dispatch</h1>
<form name="dispatch-form" action="" method="post" id="dispatch-form">
<div class="form-group">
<label for="Invoice">Invoice Number</label>
<input type="text" class="form-control" name="dispatch_invoice" placeholder="Invoice" required>
</div>
<div class="form-group">
<label for="Driver_ID">Driver ID</label>
<input type="text" class="form-control" name="dispatch_driver_id" placeholder="Driver ID: 1=ED" required>
</div>
<div class="form-group">
<label for="Truck">Truck</label>
<input type="text" class="form-control" name="dispatch_truck" placeholder="Truck" required>
</div>
<div class="form-group">
<label for="PO_Number">PO Number</label>
<input type="text" class="form-control" name="dispatch_po_number" placeholder="PO" required>
</div>
<div class="form-group">
<label for="sales_initials">Sales Initials</label>
<input type="text" class="form-control" name="dispatch_sales_initials" placeholder="initials" required>
</div>
<div class="form-group">
<label for="sales_delivery_number">Delivery Number</label>
<input type="text" class="form-control" name="dispatch_delivery_number" placeholder="delivery number" required>
</div>
<div class="form-group">
<label for="customer_name">Customer Name</label>
<input type="text" class="form-control" name="dispatch_customer_name" placeholder="Name" required>
</div>
<div class="form-group">
<label for="customer_phone">Customer Phone</label>
<input type="text" class="form-control" name="dispatch_customer_phone" placeholder="Phone" required>
</div>
<div class="form-group">
<label for="location_dropoff">Location Dropoff</label>
<input type="text" class="form-control" name="dispatch_location_dropoff" placeholder="Drop off" required>
</div>
<div class="form-group">
<label for="materials">Materials</label>
<input type="text" class="form-control" name="dispatch_materials" placeholder="material" required>
</div>
<div class="form-group">
<label for="timeslot">Timeslot</label>
<input type="text" class="form-control" name="dispatch_timeslot" placeholder="timeslot" required>
</div>

<button type="submit" class="btn btn-primary" name="submit" value="Submit" id="submit_form">Submit</button>
<img src="../images/loading.gif" id="loading-img">
</form>

<div class="response_msg"></div>
</div>
</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
$(document).ready(function(){
$("#dispatch-form").on("submit",function(e){
e.preventDefault();
if($("#dispatch-form [name='dispatch_invoice']").val() === '')
{
$("#dispatch-form [name='dispatch_invoice']").css("border","1px solid red");
}
else if ($("#dispatch-form [name='dispatch_customer']").val() === '')
{
$("#dispatch-form [name='dispatch_customer']").css("border","1px solid red");
}
else
{
$("#loading-img").css("display","block");
var sendData = $( this ).serialize();
$.ajax({
type: "POST",
url: "get_dispatch_response.php",
data: sendData,
success: function(data){
$("#loading-img").css("display","none");
$(".response_msg").text(data);
$(".response_msg").slideDown().fadeOut(4000);
$("#dispatch-form").find("input[type=text], input[type=email], textarea").val("");
}

});
}
});

$("#dispatch-form input").blur(function(){
var checkValue = $(this).val();
if(checkValue != '')
{
$(this).css("border","1px solid #eeeeee");
}
});
});
</script>
</body>
</html>
