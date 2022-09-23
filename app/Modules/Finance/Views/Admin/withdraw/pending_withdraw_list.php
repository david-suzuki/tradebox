<div class="card">
  <div class="card-body">
      <div class="table-responsive">
          <table id="example" class="table display table-bordered table-striped table-hover">
              <thead>
                  <tr>
                      <th width="60"><?php echo display('user_id') ?></th>
                      <th><?php echo display('blockchain_address') ?></th>
                      <th><?php echo display('amount') ?></th>
                      <th><?php echo display('fees') ?></th>
                      <th class="text-center" width="50"><?php echo display('status') ?></th>
                      <th class="text-center" width="150"><?php echo display('action') ?></th>
                  </tr>
              </thead>
              <tbody>
                  <?php if (!empty($withdraw)) ?>
                  <?php $sl = 1; ?>
                  <?php foreach ($withdraw as $value) { ?>
                  <tr>
                      <td><?php echo esc($value->user_id); ?></td>
                      <td><?php echo esc($value->blockchain_address);?></td>
                      <td><?php echo esc($value->amount." ".$value->currency_symbol); ?></td>
                      <td><?php echo esc($value->fees_amount." ".$value->fee_type); ?></td>
                      <td class="text-center">

                          <?php if($value->status == 2){?>
                            <i title="Pending Withdraw" class="fas fa-spinner fa-pulse text-danger"></i>
                           <?php } else if($value->status == 1){?>
                           <a class="btn btn-success btn-sm"><?php echo display('success')?></a>
                           <?php } else if($value->status == 0){ ?>
                           <a class="btn btn-danger btn-sm"><?php echo display('cancel')?></a>
                           <?php } ?>
                       </td>
                       <td class="text-center d-flex">
                          <a href="<?php echo base_url()?>/backend/finance/confirm-withdraw?id=<?php echo $value->id;?>&user_id=<?php echo $value->user_id;?>&set_status=2" class="btn btn-success btn-sm"><?php echo display('confirm')?></a>
                           &nbsp;
                          <a href="<?php echo base_url()?>/backend/finance/cancel-withdraw?id=<?php echo $value->id;?>&user_id=<?php echo $value->user_id;?>&set_status=3" class="btn btn-danger btn-sm"><?php echo display('cancel')?></a>
                          &nbsp;
                          <a href="#<?php echo $value->user_id;?>" class="AjaxModal btn btn-info btn-sm" data-toggle="modal" data-target="#newModal"> <i class="fa fa-info-circle info-position" data-toggle="tooltip" data-original-title="Information"></i></a>
                       </td>

                  </tr>
                  <?php } ?>
              </tbody>
          </table>
          <?php echo htmlspecialchars_decode($pager); ?>
      </div>
  </div>
</div>
<!-- Modal body load from ajax start-->
<div class="modal fade modal-success" id="newModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
   <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"><?php echo display('profile');?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <table>
                <tr><td><strong><?php echo display('name');?> : </strong></td> <td id="name"></td></tr>
                <tr><td><strong><?php echo display('email');?> : </strong></td> <td id="email"></td></tr>
                <tr><td><strong><?php echo display('mobile');?> : </strong></td> <td id="phone"></td></tr>
                <tr><td><strong><?php echo display('user_id');?> : </strong></td> <td id="userid"></td></tr>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
    </div><!-- /.modal-content -->
  </div>
</div>
