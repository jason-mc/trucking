<?php 
require_once("config.php");
if((isset($_POST['dispatch_invoice'])&& $_POST['dispatch_invoice'] !='') && (isset($_POST['dispatch_truck'])&& $_POST['dispatch_truck'] !='') &&
(isset($_POST['dispatch_po_number'])&& $_POST['dispatch_po_number'] !='') && (isset($_POST['dispatch_sales_initials'])&& $_POST['dispatch_sales_initials'] !='') &&
(isset($_POST['dispatch_delivery_number'])&& $_POST['dispatch_delivery_number'] !='') && (isset($_POST['dispatch_customer_name'])&& $_POST['dispatch_customer_name'] !='') &&
(isset($_POST['dispatch_customer_phone'])&& $_POST['dispatch_customer_phone'] !='') && (isset($_POST['dispatch_location_dropoff'])&& $_POST['dispatch_location_dropoff'] !='') &&
(isset($_POST['dispatch_materials'])&& $_POST['dispatch_materials'] !='') && (isset($_POST['dispatch_timeslot'])&& $_POST['dispatch_timeslot'] !=''))
{
 //require_once("contact_mail.php");

$dispatchInvoice = $conn->real_escape_string($_POST['dispatch_invoice']);
$dispatchDriverId = $conn->real_escape_string($_POST['dispatch_driver_id']);
$dispatchTruck = $conn->real_escape_string($_POST['dispatch_truck']);
$dispatchPoNumber = $conn->real_escape_string($_POST['dispatch_po_number']);
$dispatchSalesInitials = $conn->real_escape_string($_POST['dispatch_sales_initials']);
$dispatchDeliveryNumber = $conn->real_escape_string($_POST['dispatch_delivery_number']);
$dispatchCustomerName = $conn->real_escape_string($_POST['dispatch_customer_name']);
$dispatchCustomerPhone = $conn->real_escape_string($_POST['dispatch_customer_phone']);
$dispatchLocationDropoff = $conn->real_escape_string($_POST['dispatch_location_dropoff']);
$dispatchMaterials = $conn->real_escape_string($_POST['dispatch_materials']);
$dispatchTimeslot = $conn->real_escape_string($_POST['dispatch_timeslot']);

$sql="INSERT INTO `dispatches` (`id`, `invoice`, `driver_id`, `truck`, `po_number`, `sales_initials`, `delivery_number`, `customer`, `customer_number`, `customer_phone`, `location_dropoff`, `materials`, `date`, `timeslot`) ".
       " VALUES (NULL, '".$dispatchInvoice."', '".$dispatchDriverId."', '".$dispatchTruck."', '".$dispatchPoNumber."', '".$dispatchSalesInitials."', '".$dispatchDeliveryNumber."', '".$dispatchCustomerName."', NULL, '".$dispatchCustomerPhone."', '".$dispatchLocationDropoff."', '".$dispatchMaterials."', CURRENT_TIMESTAMP, '".$dispatchTimeslot."')";


if(!$result = $conn->query($sql)){
die('There was an error running the query [' . $conn->error . ']');
}
else
{
echo "Thank you! Dispatch added";
}
}
else
{
echo "Please fill in required fields";
}
?>
