<STYLE>

* {
  box-sizing: border-box;
}
.datetimepicker {
  display: inline-flex;
  align-items: center;
  border-radius: 8px;
  &:focus-within {
    border-color: teal;
  }
  
  input {
    font: inherit;
    color: inherit;
    appearance: none;
    outline: none;
    border: 0;
    background-color: transparent;
    
    &[type=date] {
      width: 10rem;
      padding: .25rem 0 .25rem .5rem;
      border-right-width: 0;
    }
    
    &[type=time] {
      width: 5.5rem;
      padding: .25rem .5rem .25rem 0;
      border-left-width: 0;
    }
  }
  
  span {
    height: 1rem;
    margin-right: .25rem;
    margin-left: .25rem;
    border-right: 1px solid #ddd;
  }
}

.info {
  padding-top: .5rem;
  font-size: .8rem;
  color: rgba(255, 255, 255, .5);
}

</STYLE>

<?php
$GID = $_POST['guessid']; // GET THE VALUE TRANSFERRED FROM list.php page to this page.
$CID = $_POST['code']; // GET THE VALUE TRANSFERRED FROM list.php page to this page.
$mydb->setQuery("SELECT * FROM tblguest WHERE GUESTID ='$GID'");
$cur = $mydb->loadSingleResult();
$mydb->setQuery("SELECT * FROM tblreservation WHERE GUESTID ='$GID' and CONFIRMATIONCODE ='$CID'");
$cur2 = $mydb->loadSingleResult();
?>


<br></br>
<br></br>
<br></br>
<form method="post">
<div class="panel panel-primary">
  <div class="panel-body">
        <caption><h3 align="center">GUEST REFUND REQUEST INFORMATION</h3></caption>
    <table class="table table-hover" border="0">
    <tr>
        <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "FNAME">First Name:</label>
              <div class="col-md-8">
                 <input name="FN" type="hidden" value="<?php if (isset($cur)) {echo ''.$cur->G_FNAME;} ?>">
                 <input disabled class="form-control input-sm" id="FNAME" name="FNAME" placeholder=
                    "First Name" type="text" value="<?php if (isset($cur)) {echo ''.$cur->G_FNAME;} ?>">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "LNAME">Last Name:</label>
              <div class="col-md-8">
                 <input name="LN" type="hidden" value="<?php if (isset($cur)) {echo ''.$cur->G_LNAME;} ?>">
                 <input disabled class="form-control input-sm" id="LNAME" name="LNAME" placeholder=
                    "Last Name" type="text" value="<?php if (isset($cur)) {echo ''.$cur->G_LNAME;} ?>">
              </div>
            </div>
          </div>

           <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "CONTACT">Contact #:</label>
              <div class="col-md-8">
                 <input name="C" type="hidden" value="<?php if (isset($cur)) {echo ''.$cur->G_PHONE;} ?>">
                 <input disabled class="form-control input-sm" id="CONTACT" name="CONTACT" placeholder=
                    "Contact Info" type="text" value="<?php if (isset($cur)) {echo ''.$cur->G_PHONE;} ?>">
              </div>
            </div>
          </div>

           <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "GUESSID">Guest ID:</label>
              <div class="col-md-8">
                 <input name="GSID" type="hidden" value="<?php if (isset($cur2)) {echo ''.$cur2->GUESTID;} ?>">
                 <input disabled class="form-control input-sm" id="GUESSID" name="GUESSID" placeholder=
                    "Guess Id" type="text" value="<?php if (isset($cur2)) {echo ''.$cur2->GUESTID;} ?>">
              </div>
            </div>
          </div>

             <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "BOOKID">BOOK ID:</label>
              <div class="col-md-8">
                 <input name="BID" type="hidden" value="<?php if (isset($cur2)) {echo ''.$cur2->RESERVEID;} ?>">
                 <input disabled class="form-control input-sm" id="BOOKID" name="BOOKID" placeholder=
                    "Booked ID" type="text" value="<?php if (isset($cur2)) {echo ''.$cur2->RESERVEID;} ?>">
              </div>
            </div>
          </div>

              <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "BAM">Book Amount:</label>
              <div class="col-md-8">
                 <input name="BILAM" type="hidden" value="<?php if (isset($cur2)) {echo ''.$cur2->RPRICE;} ?>">
                 <input class="form-control input-sm" id="BAM" name="BAM" placeholder=
                    "Bill Amount" type="number" value="<?php if (isset($cur2)) {echo ''.$cur2->RPRICE;} ?>">
              </div>
            </div>
          </div>
        <br></br>
            <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "CONC">Confirmation Code:</label>
              <div class="col-md-8">
                 <input name="CC" type="hidden" value="<?php if (isset($cur2)) {echo ''.$cur2->CONFIRMATIONCODE;} ?>">
                 <input class="form-control input-sm" id="CONC" name="CONC" placeholder=
                    "Confrimation Code" type="text" value="<?php if (isset($cur2)) {echo ''.$cur2->CONFIRMATIONCODE;} ?>">
              </div>
            </div>
          </div>

              <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "ST">Status:</label>
              <div class="col-md-8">
                 <input name="STS" type="hidden" value="<?php if (isset($cur2)) {echo ''.$cur2->STATUS;} ?>">
                 <input class="form-control input-sm" id="ST" name="ST" placeholder=
                    "Status" type="text" value="<?php if (isset($cur2)) {echo ''.$cur2->STATUS;} ?>">
              </div>
            </div>
          </div>
    </tr>
    <br></br>
    </table>

         <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "CCR">CONFIRMATION CODE:</label>
              <div class="col-md-8">
                 <input class="form-control input-sm" id="CCR" name="CCR" placeholder="0" type="text" value="">
              </div>
            </div>
          </div>
          <button  name="submit3" type="submit3" class="btn btn-default">CONFIRM REFUND REQUEST</button>

          <div class="btn-group">
          <input type="button" value="&laquo Back" class="btn btn-primary" onclick="window.location.href='index.php'" >
          </div>
   </div><!--End of Panel Body-->
 </div><!--End of Main Panel-->  
</form>

           <?php 
                 if (isset($_POST['submit3'])) 
                {
                     $previousbalance = $_POST['BALE'];
                     $addpayment = $_POST['APA'];  
                     $previouspaid = $_POST['PDAA'];  
                     $totalpaid =  $previouspaid+$addpayment;    
                     $totalbalance = $previousbalance-$addpayment; 

                    //$sql = "UPDATE `tblreservation` SET `ARRIVAL`= '".date_format(date_create($_POST['ARRDT']),'Y-m-d')."', `DEPARTURE`='".date_format(date_create($_POST['DEDT']),'Y-m-d h:i')."', `ROOMID`='".$_POST['ROOMID']."', `STATUS`='".$_POST['STS']."' WHERE `GUESTID` ='$GID'";
                    $sql = "UPDATE `tblbilling` SET `bill_paidamount`='$totalpaid', `bill_balance`='$totalbalance' WHERE `bill_id` = '".$_POST['BID']."'";
                   
                    $mydb->setQuery($sql);
                    $mydb->executeQuery(); 
                   redirect("index.php");
                }
          ?>