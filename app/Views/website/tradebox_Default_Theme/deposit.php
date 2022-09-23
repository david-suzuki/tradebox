<div class="cryp_wrapper">
  <div class="col-lg-9 form-content login mt-4 mb-4">
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
      <!-- /.end of alert message -->
      <div class="deposit-info mb-0 form-design">
         <h3 class="user-login-title mb-3"><?php echo display('deposit');?></h3>
         <?php echo form_open_multipart('deposit/payment_gateway', array('name'=>'deposit_form', 'id'=>'deposit_form', 'class'=>'mb-4 row'));?>
         <div class="col-7">
            <div class="form-group">
               <span class="text-danger"><?php echo display('deposit_minimum_amount_20') ?></span>
            </div>
            <div class="form-group">
               <label for="blockchain_address" class=""><?php echo display('deposit_blockchain_address_from_which') ?> <span class="text-danger">*</span></label>
               <input class="form-control" name="blockchain_address" type="text" id="blockchain_address" autocomplete="off" required>
            </div>
            <div class="form-group">
               <label for="crypto_coin" class=""><?php echo display('token_that_you_will_send');?> <span class="text-danger">*</span></label>
               <select class="custom-select basic-single" name="crypto_coin" id="crypto_coin" onchange="Fee()" required>
                  <option hidden><?php echo display('select_option');?></option>
               </select>
            </div>
            <div class="form-group">
               <label for="network" class=""><?php echo display('on_which_network') ?> <span class="text-danger">*</span></label>
               <input class="form-control" name="network" type="text" id="network" autocomplete="off" required placeholder="i.e. TRON, SOLANA etc">
            </div>
            <div class="form-group">
               <label for="deposit_amount" class=""><?php echo display('deposit_amount');?> <span class="text-danger">*</span></label>
               <input class="form-control" name="amount" step="any" min="0" type="number" id="deposit_amount" onkeyup="Fee()" autocomplete="off" required>
               <span id="fee" class="form-text text-danger"></span>
            </div>
            <div class="form-group">
               <label><?php echo display('zerofees_address_send_tokens_tron_network') ?></label>
               <div class="text-break">
                  <span class="font-weight-bolder" id="tron_address">TNFz4t82LaKvRJGFqtc8VpFoMhMfFgHzby</span>
                  <button class="transparent-btn" type="button" id="tron_address_btn" data-toggle="popover" data-trigger="focus" data-content="Copied to clipboard" data-placement="top">
                     <i title="copy address" class="fas fa-copy text-primary"></i>
                  </button>
               </div>
               <div class="row">
                  <div class="col-9"></div>
                  <div class="col-3 col">
                     <img src="<?php echo base_url("public/assets/images/icons/qr_code_tron.png") ?>" class="rounded img-fluid" alt="...">
                  </div>
               </div>
            </div>
            <div class="form-group">
               <label><?php echo display('zerofees_address_send_tokens_solana_network') ?></label>
               <div class="text-break">
                  <span class="font-weight-bolder" id="solana_address">FvwMfhxKquaeseTGxyaWzgH8r1FZDpzSFuG9oVxK1NB</span>
                  <button class="transparent-btn" type="button" id="solana_address_btn" data-toggle="popover" data-trigger="focus" data-content="Copied to clipboard" data-placement="top">
                     <i title="copy address" class="fas fa-copy text-primary"></i>
                  </button>
               </div>
               <div class="row">
                  <div class="col-9"></div>
                  <div class="col-3">
                     <img src="<?php echo base_url("public/assets/images/icons/qr_code_solana.png") ?>" class="rounded img-fluid" alt="...">
                  </div>
               </div>
            </div>
            <div class="form-group">
               <label for="comment" class=""><?php echo display('comments');?></label>
               <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
            </div>
            <div class="form-group">
               <span class="text-danger"><?php echo display('deposited_tokens_ledger_hardware') ?></span>
            </div>
            <button type="submit" class="btn btn-kingfisher-daisy w-md m-b-5 mt-3" id="deposit_submit_btn"><?php echo display('submit');?></button>
            <a href="<?php echo base_url();?>" class="btn btn-danger w-md m-b-5 mt-3"><?php echo display('cancel')?></a>
         </div>
         <div class="col-5">
            <div class="text-white">
               <div class="text-danger"><?php echo display('strongly_recommend_using_xx_messenger') ?></div>
               <div class="mt-3 text-success"><?php echo display('xx_messenger_is') ?></div>
               <div class="mt-1"><?php echo display('ultra_secure_metadata_shredding_quantum_resistant_end_to_end_encrypted_open_source_and_free') ?></div>
               <div class="mt-3">
                  <a href="https://xx.network/messenger" target="_blank" class="xx-messenger-ref">https://xx.network/messenger</a>
                  <a href="https://play.google.com/store/apps/details?id=io.xxlabs.messenger" target="_blank" class="xx-messenger-ref">https://play.google.com/store/apps/details?id=io.xxlabs.messenger</a>
                  <a href="https://links.xx.network/appstore" target="_blank" class="xx-messenger-ref">https://links.xx.network/appstore</a>
               </div>
               <div class="mt-4">
                  <?php echo display('your_xx_messenger_address') ?>
               </div>
               <div class="mt-1 w-50">
                  <input class="form-control" name="xx_messenger" type="text" id="xx_messenger" autocomplete="off">
               </div>
               <div class="row mt-3">
                  <div class="col-6 text-right">ZeroFeex Exchange Address</div>
                  <div class="col-5">
                     <img src="<?php echo base_url("public/assets/images/icons/QR_code.png") ?>" class="rounded img-fluid" alt="...">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <input type="hidden" name="level" id="level" value="deposit">
      <input type="hidden" name="fees" value="">
      <?php echo form_close();?>
   </div>
</div>

