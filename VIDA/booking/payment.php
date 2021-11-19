<?php

if (!isset($_SESSION['feuhotel_cart'])) {
  # code...
  redirect(WEB_ROOT.'index.php');
}

function createRandomPassword() {

    $chars = "abcdefghijkmnopqrstuvwxyz023456789";

    srand((double)microtime()*1000000);

    $i = 0;

    $pass = '' ;
    while ($i <= 7) {

        $num = rand() % 33;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;

    }

    return $pass;

}

 $confirmation = createRandomPassword();
$_SESSION['confirmation'] = $confirmation;
 
 $count_cart = count($_SESSION['feuhotel_cart']);

if(isset($_POST['btnsubmitbooking'])){
  // $message = $_POST['message'];
 

if(!isset($_SESSION['GUESTID'])){

$sql = "SELECT * FROM `tblauto` WHERE `autoid`=1";
$mydb->setQuery($sql);
$res = $mydb->loadSingleResult();


$guest = New Guest();
$guest->GUESTID          = $res->start;
$guest->G_FNAME          = $_SESSION['name'];    
$guest->G_LNAME          = $_SESSION['last'];  
$guest->G_CITY           = $_SESSION['city'];
$guest->G_ADDRESS        = $_SESSION['address'] ;        
$guest->DBIRTH           = date_format(date_create($_SESSION['dbirth']), 'Y-m-d');   
$guest->G_PHONE          = $_SESSION['phone'];    
$guest->G_NATIONALITY    = $_SESSION['nationality'];          
$guest->G_COMPANY        = $_SESSION['company'];      
$guest->G_CADDRESS       = $_SESSION['caddress'];        
$guest->G_TERMS          = 1;    
$guest->G_EMAIL          = $_SESSION['cemail'];  
$guest->G_UNAME          = $_SESSION['username'];    
$guest->G_PASS           = sha1($_SESSION['pass']);    
$guest->ZIP              = $_SESSION['zip'];
$guest->create(); 


  $lastguest= $res->start;
   
$_SESSION['GUESTID'] =   $lastguest;

}
 
    $count_cart = count($_SESSION['feuhotel_cart']);
  

    for ($i=0; $i < $count_cart  ; $i++) { 

 

            $reservation = new Reservation();
            $reservation->CONFIRMATIONCODE  = $_SESSION['confirmation'];
            $reservation->TRANSDATE         = date('Y-m-d h:i:s'); 
            $reservation->ROOMID            = $_SESSION['feuhotel_cart'][$i]['feuhotelroomid'];
            $reservation->ARRIVAL           = date_format(date_create( $_SESSION['feuhotel_cart'][$i]['feuhotelcheckin']), 'Y-m-d');  
            $reservation->DEPARTURE         = date_format(date_create( $_SESSION['feuhotel_cart'][$i]['feuhotelcheckout']), 'Y-m-d'); 
            $reservation->RPRICE            = $_SESSION['feuhotel_cart'][$i]['feuhotelroomprice'];  
            $reservation->GUESTID           = $_SESSION['GUESTID']; 
            $reservation->PRORPOSE          = 'RENT A ROOM';
            $reservation->STATUS            = 'Pending';
            $reservation->create(); 

            
            @$tot += $_SESSION['feuhotel_cart'][$i]['feuhotelroomprice'];
            @$CONFIRM = $_SESSION['confirmation'];
            @$ROOMN = $_SESSION['feuhotel_cart'][$i]['feuhotelroomid'];
            @$ROOMNAME = $_SESSION['ROOM'];
            @$GUESTN = $_SESSION['name'];
            @$STARTD = date_format(date_create( $_SESSION['feuhotel_cart'][$i]['feuhotelcheckin']), 'Y-m-d');
            @$ENDD =date_format(date_create( $_SESSION['feuhotel_cart'][$i]['feuhotelcheckout']), 'Y-m-d'); 
            @$GUESTNUM = $_SESSION['GUESTID'];


            @$A = date('Y-m-d h:i:s');
            @$B = $_SESSION['feuhotel_cart'][$i]['feuhotelroomid'];
            @$C = date_format(date_create( $_SESSION['feuhotel_cart'][$i]['feuhotelcheckin']), 'Y-m-d');  
            @$D = date_format(date_create( $_SESSION['feuhotel_cart'][$i]['feuhotelcheckout']), 'Y-m-d'); 
            @$E = $_SESSION['feuhotel_cart'][$i]['feuhotelroomprice'];  
            @$F = $_SESSION['GUESTID']; 
            @$G = 'Rental';
            @$H = 'Pending';
            }

           $item = count($_SESSION['feuhotel_cart']);

      $sql = "INSERT INTO `tblpayment` (`TRANSDATE`,`CONFIRMATIONCODE`,`PQTY`, `GUESTID`, `SPRICE`,`MSGVIEW`,`STATUS`)
       VALUES ('" .date('Y-m-d h:i:s')."','" . $_SESSION['confirmation'] ."',".$item."," . $_SESSION['GUESTID'] . ",".$tot.",0,'Pending')" ;
      $mydb->setQuery($sql);
      $mydb->executeQuery(); 

     $sql = "INSERT INTO tblbilling (bill_amount, bill_misc_charges, bill_room_charges, bill_mode_of_payment, bill_roomnum, bill_balance, Booking_id) VALUES ('$tot','0','0','Paypal Payment','$ROOMN','$tot','$GUESTNUM')";  // Booking_id = GUEST NUMBER;
      $mydb->setQuery($sql);
      $mydb->executeQuery(); 

      $query="SELECT * FROM `tblroom` WHERE  `ROOMID` ='$ROOMN'";
      $mydb->setQuery($query);
      $res = $mydb->loadResultList();

      foreach ($res as $cur) {
      $ROOMNAME=$cur->ROOM;
      $ROOMDES =$cur->ROOMDESC;
     

      $sql = "INSERT INTO tblinventory (inv_name, inv_desc, inv_guestname, inv_startdate, inv_guest_end_date, inv_rate, inv_guestpaid, inv_guest_to_pay, inv_bal, inv_guest_room, User_user_id) VALUES ('ROOM RENTAL','$ROOMDES','$GUESTN','$STARTD','$ENDD','$tot','0','$tot','$tot','$ROOMNAME','$GUESTNUM')";
      $mydb->setQuery($sql);
      $mydb->executeQuery(); 

      $sql = "INSERT INTO tblreservation (CONFIRMATIONCODE, TRANSDATE, ROOMID, ARRIVAL, DEPARTURE, RPRICE, GUESTID, PRORPOSE, STATUS, BOOKDATE, REMARKS, USERID) VALUES ('$CONFIRM','$A','$B','$C','$D','$E','$F','$G','$H','$A','NONE','$GUESTNUM')";
      $mydb->setQuery($sql);
      $mydb->executeQuery(); 

    }

            unset($_SESSION['feuhotel_cart']);
            // unset($_SESSION['confirmation']);
            unset($_SESSION['pay']);
            unset($_SESSION['from']);
            unset($_SESSION['to']);
            $_SESSION['activity'] = 1;

            ?> 

<script type="text/javascript"> alert("Booking is successfully submitted!");</script>

            <?php
            
    redirect( WEB_ROOT."index.php");


}
?>

 
 
 <div id="accom-title"  > 
    <div  class="pagetitle">   
            <h1 >Billing Details and Information
                 
            </h1> 
        </div> 
  </div>
 
<div id="bread">
   <ol class="breadcrumb">
      <li><a href="<?php echo WEB_ROOT ;?>index.php"></a> </li> 
      <li><a href="<?php echo WEB_ROOT ;?>booking/">Booking Information</a></li>    
   </ol> 
</div> 


<form action="index.php?view=payment" method="post"  name="personal" >

 
<div class="col-md-12">

  <div class="row">
    <div class="col-md-8 col-sm-4">
       <div class="col-md-12">
          <label>Name:</label>
          <?php echo $_SESSION['name'] . ' '. $_SESSION['last']; 
   echo $count_cart;
           ?>
        </div>
        <div class="col-md-12">
          <label>Address:</label>
          <?php echo isset($_SESSION['address'])  ? $_SESSION['address'] : ' '; ?> 
        </div>
        <div class="col-md-12"> 
        <label>Phone #:</label>
         <?php echo $_SESSION['phone'] ; ?>
        </div>
    </div> 
    <div class="col-md-4 col-sm-2">
      <div class="col-md-12">
        <label>Transaction Date:</label>
       <?php echo date("m/d/Y") ; ?>
      </div>
       <div class="col-md-12">
        <label>Transaction ID:</label>
       <?php echo $_SESSION['confirmation']; ?>
      </div>
      
    </div>
  </div> 
  <br/>




<div class="row">
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <td>Room</td>
          <td>Arrival</td>
          <td>Departure</td>
          <td>Price</td>
          <td>Night(s)</td>
          <td>Subtotal</td>
        </tr>
      </thead> 
      <tbody>
<?php
$payable = 0;
if (isset( $_SESSION['feuhotel_cart'])){ 
$count_cart = count($_SESSION['feuhotel_cart']);


for ($i=0; $i < $count_cart  ; $i++) {  

  $query = "SELECT * FROM `tblroom` r ,`tblaccomodation` a WHERE r.`ACCOMID`=a.`ACCOMID` AND ROOMID=" . $_SESSION['feuhotel_cart'][$i]['feuhotelroomid'];
   $mydb->setQuery($query);
   $cur = $mydb->loadResultList(); 
    foreach ($cur as $result) { 


?>

      
        <tr>
          <td><?php echo  $result->ROOM.' '. $result->ROOMDESC; ?></td>
          <td><?php echo  date_format(date_create( $_SESSION['feuhotel_cart'][$i]['feuhotelcheckin']),"m/d/Y"); ?></td>
          <td><?php echo  date_format(date_create( $_SESSION['feuhotel_cart'][$i]['feuhotelcheckout']),"m/d/Y"); ?></td>
          <td><?php echo  ' ₱ '. $result->PRICE; ?></td>
          <td><?php echo   $_SESSION['feuhotel_cart'][$i]['feuhotelday']; ?></td>
          <td><?php echo ' ₱ '.   $_SESSION['feuhotel_cart'][$i]['feuhotelroomprice']; ?></td>
        </tr>
<?php
       $payable += $_SESSION['feuhotel_cart'][$i]['feuhotelroomprice'] ;  
      }
    } 
     $_SESSION['pay'] = $payable;   
 } 
 ?> 
      </tbody>
    </table>
  </div> 
</div>

 

    <div class="right"> 
      <h3 style="text-align: right;">Total: ₱  <?php echo $payable ;?></h3>
    </div>
    

  <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=PHP" data-sdk-integration-source="button-factory"></script>
  <script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'gold',
          layout: 'vertical',
          label: 'paypal', 
          
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"description":"VIDA INTERNATIONAL HOTEL AND RESORT, ROOM RENTAL. TRANSACTION ID: <?php echo $_SESSION['confirmation']; ?>.","amount":{"currency_code":"PHP","value":<?php echo $payable ;?>}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            
            // Full available details
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

            // Show a success message within this page, e.g.
            const element = document.getElementById('paypal-button-container');
            element.innerHTML = '';
            element.innerHTML = '<h3>Please Click Submit Booking Button.</h3>';

            // Or go to another URL:  actions.redirect('thank_you.html');
            
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script>
      <div class="">
      <div id="smart-button-container">
      <div style="text-align: center;">
        <div id="paypal-button-container"></div>
      </div>
    </div>
       <CENTER><button type="submit" class="button"  name="btnsubmitbooking">Submit Booking</button></CENTER>
    </div>
  </div>   
</form>
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>
 



