<div class="container">
  <h3 class="user-login-title mb-3">Token Listing</h3>
  <?php echo form_open_multipart('token-listing', array('name'=>'token_listing','id'=>'token_listing'));?>
    <?php if ($session->get('message') != null) {  ?>
      <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $session->get('message'); ?>
      </div>
    <?php } ?>
    <div class="form-group">
      <span class="text-info"><?php echo display('please_fill_out_the_form_and_submit_it') ?></span>
    </div>
    <div class="row mb-2">
      <div class="col-6">
        <div class="form-group">
          <label for="token_name" class=""><?php echo display('token_name');?> <span class="text-danger">*</span></label>
          <input class="form-control" name="token_name" type="text" id="token_name" autocomplete="off" required>
        </div>
      </div>
      <div class="col-6">
        <div class="form-group">
          <label for="token_symbol" class=""><?php echo display('token_symbol');?> <span class="text-danger">*</span></label>
          <input class="form-control" name="token_symbol" type="text" id="token_symbol" autocomplete="off" required>
        </div>
      </div>
    </div>
    <div class="form-group mb-4">
      <label for="token_id" class=""><?php echo display('token_id_contract_address');?> <span class="text-danger">*</span></label>
      <input class="form-control w-50" name="token_id" type="text" id="token_id" autocomplete="off" required>
    </div>
    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="network" class=""><?php echo display('network_where_token_is_issued');?> <span class="text-danger">*</span></label>
          <input class="form-control" name="network" type="text" id="network" autocomplete="off" required>
        </div>
      </div>
      <div class="col-6">
        <div class="form-group">
          <label><?php echo display('token_logo');?> <span class="text-danger">*</span><span class="text-muted"> (100x100 px or 50x50 px, png, jpg)</span></label>
          <div class="custom-file mb-3">
            <input type="file" class="custom-file-input form-control" id="token_logo" name="token_logo">
            <label class="custom-file-label" for="token_logo" style="background-color: #121d27; border-color: #262d34; color: #8f8e8e;">Choose file</label>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group mb-4">
      <label for="token_url" class=""><?php echo display('url_of_token_on_tronscan_solscan');?> <span class="text-danger">*</span></label>
      <input class="form-control" name="token_url" type="text" id="token_url" autocomplete="off" required>
    </div>
    <div class="form-group mb-4">
      <label for="token_project_website" class=""><?php echo display('website_of_token_project');?></label>
      <input class="form-control" name="token_project_website" type="text" id="token_project_website" autocomplete="off">
    </div>
    <div class="form-group mb-4">
      <label for="token_project_des" class=""><?php echo display('short_description_token_project');?> <span class="text-danger">*</span><span class="text-muted"> (1 to 6 sentences)</span></label>
      <textarea class="form-control" name="token_project_des" id="token_project_des" rows="6" required></textarea>
    </div>
    <div class="form-group mb-4">
      <label for="token_exchange"><?php echo display('token_already_traded');?> <span class="text-muted">(<?php echo display('prefer_tokens_not_traded');?>)</span></label>
      <div class="ml-4 d-flex align-items-center">
        <input type="checkbox" class="form-check-input mb-2" id="token_traded_other" name="token_traded_other">
        <label class="form-check-label" for="token_traded_other"><?php echo display('if_yes_where'); ?></label>
        <input class="form-control w-50 ml-2" name="token_exchange" type="text" id="token_exchange" autocomplete="off" disabled>
      </div>
    </div>
    <div class="mb-4">
      <label><?php echo display('someone_associated');?> <span class="text-danger">*</span></label>
      <div class="d-flex">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="someone_associated" id="someone_associated1" value="yes" checked>
          <label class="form-check-label" for="someone_associated1">
            Yes
          </label>
        </div>
        <div class="form-check ml-5">
          <input class="form-check-input" type="radio" name="someone_associated" id="someone_associated2" value="no">
          <label class="form-check-label" for="someone_associated2">
            No
          </label>
        </div>
      </div>
    </div>
    <div class="form-group mb-4">
      <label for="token_founders" class=""><?php echo display('founders_stakeholders_makers');?></label>
      <input class="form-control" name="token_founders" type="text" id="token_founders" autocomplete="off">
    </div>
    <div class="form-group mb-4">
      <label><?php echo display('willing_to_keep_market_price_floor');?></label>
      <div class="ml-4 d-flex align-items-center">
        <input type="checkbox" class="form-check-input mb-2" id="market_price_floor" name="market_price_floor">
        <label class="form-check-label" for="market_price_floor"><?php echo display('if_yes_market_price_floor_percent'); ?></label>
        <input class="form-control ml-2" style="width: 6%" name="floor_percent" type="number" id="floor_percent" autocomplete="off" disabled>
        <label class="form-check-label"> % <?php echo display('of_the_current_market_price'); ?></label>
      </div>
    </div>
    <div class="row mb-4">
      <div class="col-6">
        <div class="form-group">
          <label for="total_volume" class=""><?php echo display('total_volume_of_the_token');?> <span class="text-danger">*</span><span class="text-muted"> (<?php echo display('total_minted_issued_volume');?>)</span></label>
          <input class="form-control" name="total_volume" type="text" id="total_volume" autocomplete="off" required>
        </div>
      </div>
      <div class="col-6">
        <div class="form-group">
          <label for="circulation_volume" class=""><?php echo display('circulation_volume');?> <span class="text-danger">*</span></label>
          <input class="form-control" name="circulation_volume" type="text" id="circulation_volume" autocomplete="off" required>
        </div>
      </div>
    </div>
    <div class="form-group mb-4">
      <label for="percetage_total_volume" class=""><?php echo display('percentage_of_total_volume');?> <span class="text-danger">*</span></label>
      <input class="form-control" name="percetage_total_volume" type="text" id="percetage_total_volume" autocomplete="off" required>
    </div>
    <div class="form-group mb-4">
      <label for="initial_price_token" class=""><?php echo display('initial_price_propose_token');?></label>
      <input class="form-control w-50" name="initial_price_token" type="text" id="initial_price_token" autocomplete="off">
    </div>
    <div class="form-group mb-4">
      <label class="font-weight-bold">Note:</label>
      <div class="text-white"><?php if (isset($lang) && $lang =="french") { echo htmlspecialchars_decode($article->article1_fr); } else { echo htmlspecialchars_decode($article->article1_en); } ?></div>
    </div>
    <div class="form-group mb-4">
      <label class="font-weight-bold"><?php echo display('listing_fees');?></label>
      <?php
        foreach ($articles2 as $key => $value) {
      ?>
        <div class="ml-4">
          <input type="checkbox" class="form-check-input" id="<?php echo "listing_fee_" . $key; ?>" name="<?php echo "listing_fee_" . $key ?>">
          <label class="form-check-label" for="<?php echo "listing_fee_" . $key; ?>"><?php echo $value; ?></label>
        </div>
      <?php } ?>
    </div>
    <input type="hidden" name="listing_fees_len" value="<?php echo count($articles2); ?>"/>
    <div class="text-white mb-4">
      <div class="text-info"><?php echo display('for_token_project_managers');?></div>
      <div class="mt-3">
        <a href="https://xx.network/messenger" target="_blank" class="xx-messenger-ref">https://xx.network/messenger</a><br/>
        <a href="https://play.google.com/store/apps/details?id=io.xxlabs.messenger" target="_blank" class="xx-messenger-ref">https://play.google.com/store/apps/details?id=io.xxlabs.messenger</a><br/>
        <a href="https://links.xx.network/appstore" target="_blank" class="xx-messenger-ref">https://links.xx.network/appstore</a>
      </div>
        <div class="mt-4">
          <?php echo display('xx_messenger_recommended_secure_communication');?>
        </div>
        <div class="mt-1 w-50">
          <input class="form-control" name="xx_messenger" type="text" id="xx_messenger" autocomplete="off">
        </div>
    </div>
    <div class="row mb-4">
      <div class="col-6 form-group">
        <label for="applicant_name"><?php echo display('applicant_full_name');?> <span class="text-danger">*</span></label>
        <input class="form-control" name="applicant_name" type="text" id="applicant_name" autocomplete="off" required>
      </div>
      <div class="col-6 form-group">
        <label for="applicant_email"><?php echo display('applicant_email_address');?> <span class="text-danger">*</span></label>
        <input class="form-control" name="applicant_email" type="email" id="applicant_email" autocomplete="off" required>
      </div>
    </div>
    <div class=" m-b-15">
      <button type="submit" class="btn btn-kingfisher-daisy" id="withdraw_submit_btn"><?php echo display('submit');?></button>
      <a href="<?php echo base_url();?>" class="btn btn-danger"><?php echo display('cancel')?></a>
    </div>
  <?php echo form_close();?>
  <div class="mb-4 mt-5">
      <div class="text-danger" style="font-size: 16px">Outright scam or Ponzi scheme tokens will be marked, traders will be warned and subsequently these tokens will be delisted.</div>
    </div>
</div>

<script>
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

$(document).ready(function() {
  $("#token_traded_other").on('change', function() {
    const isTradedOther = $("#token_traded_other").is(':checked');
    if (isTradedOther === true) {
      $("#token_exchange").removeAttr('disabled')
    } else {
      $("#token_exchange").attr('disabled', 'true')
    }
  })

  $("#market_price_floor").on('change', function() {
    const isMarketPriceFloor = $("#market_price_floor").is(':checked');
    if (isMarketPriceFloor === true) {
      $("#floor_percent").removeAttr('disabled')
    } else {
      $("#floor_percent").attr('disabled', 'true')
    }
  })

  $("input[type=number]").on("mousewheel", function () {
    this.blur();
  });
})
</script>
