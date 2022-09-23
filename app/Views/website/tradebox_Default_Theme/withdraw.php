<div class="col-lg-4 offset-lg-4  form-content login mt-4 mb-4">
    <div class="mb-4 form-design">
        <!-- alert message -->
        <?php if ($session->get('message') != null) {  ?>
        <div class="alert alert-info alert-dismissable">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
           <?php echo $session->get('message'); ?>
        </div>
        <?php } ?>
        <?php if ($session->get('exception') != null) {  ?>
        <div class="alert alert-danger alert-dismissable">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
           <?php echo $session->get('exception'); ?>
        </div>
        <?php } ?>
        <!-- /.alert message -->
        <h3 class="user-login-title mb-3"><?php echo display('withdraw');?></h3>
        <?php echo form_open('withdraw',array('name'=>'withdraw','id'=>'withdraw'));?>

        <div class="form-group">
           <label for="crypto_coin" class=""><?php echo display('coin');?> <span class="text-danger">*</span></label>
           <select class="form-control basic-single" name="crypto_coin" id="crypto_coin" onchange="Fee()" required>
              <option><?php echo display('select_option');?></option>
           </select>
        </div>
        <div class="form-group">
           <label for="amount" class=""><?php echo display('amount');?> <span class="text-danger">*</span></label>
           <input class="form-control" name="amount" step="any" min="0" type="number" id="amount" onkeyup="Fee()" autocomplete="off" required>
           <span id="fee" class="form-text text-danger"></span>
        </div>
        <div class="form-group">
           <label for="blockchain_address" class=""><?php echo display('blockchain_address_where_you_want_to_receive_your_tokens');?> <span class="text-danger">*</span></label>
           <input class="form-control" name="blockchain_address" type="text" id="blockchain_address" autocomplete="off" required>
        </div>
        <div class="form-group">
           <label for="network" class="">Network <span class="text-danger">*</span></label>
           <input class="form-control" name="network" type="text" id="network" autocomplete="off" required placeholder="i.e. TRON, SOLANA etc">
        </div>
        <div class="form-group">
           <label for="xx_messenger" class=""><?php echo display('your_xx_messenger_address');?></label>
           <input class="form-control" name="xx_messenger" type="text" id="xx_messenger" autocomplete="off" >
        </div>
        <div id="coinwallet" class="form-group"></div>
        <div class="form-group row">
           <label for="p_name" class="col-sm-5"><?php echo display('otp_send_to')?> <span class="text-danger">*</span></label>
           <div class="col-sm-7">
            <?php if($smsPermission->withdraw == 1){ ?>
              <div class="custom-control custom-radio custom-control-inline">
                 <input type="radio" id="inlineRadio1" value="1" name="varify_media" class="custom-control-input">
                 <label class="custom-control-label" for="inlineRadio1"><?php echo display('sms')?></label>
              </div>
            <?php } ?>
            <?php if($emailPermission->withdraw == 1){ ?>
              <div class="custom-control custom-radio custom-control-inline">
                 <input type="radio" id="inlineRadio2" value="2" name="varify_media" class="custom-control-input">
                 <label class="custom-control-label" for="inlineRadio2"><?php echo display('email')?></label>
              </div>
            <?php } ?>
           </div>
        </div>
        <input type="hidden" name="level" value="withdraw">
        <input type="hidden" name="fees" value="">
        <div class="form-group">
            <p class="form-text text-muted">
               The withdrawal process goes through 6 stages of supervision for your maximum security.
               If the token withdrawal is to the address from which you made the deposit, the withdrawal process will be faster.
               <span class="form-text text-danger">Withdrawal may take 20 minutes to 6 hours and is processed between 5:00 - 17:00 UTC (GMT).</span>
            </p>
         </div>
        <div class=" m-b-15">
           <button type="submit" class="btn btn-kingfisher-daisy" id="withdraw_submit_btn"><?php echo display('submit');?></button>
           <a href="<?php echo base_url();?>" class="btn btn-danger"><?php echo display('cancel')?></a>
        </div>
        <?php echo form_close();?>
    </div>

</div>
<p class="text-center text-white">
   You may send your questions via secure XX Messenger - address of the exchange:  ZeroFees
</p>
<div class="bg-white mx-auto" style="width: 200px; height: 190px">
 <img src="<?php echo base_url("public/assets/images/icons/QR_code.png") ?>" class="rounded img-fluid" alt="...">
</div>

