<div class="card">
  <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table display table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th><?php echo display('user_id') ?></th>
                        <th><?php echo display('blockchain_address') ?></th>
                        <th><?php echo display('amount') ?></th>
                        <th><?php echo display('fees') ?></th>
                        <th class="text-center"><?php echo display('status') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($withdraw)) ?>
                    <?php $sl = 1; ?>
                    <?php foreach ($withdraw as $value) { ?>
                    <tr>
                        <td><?php echo esc($value->user_id); ?></td>
                        <td><?php echo esc($value->blockchain_address); ?></td>
                        <td><?php echo esc($value->amount . " ". $value->currency_symbol); ?></td>
                        <td><?php echo esc($value->fees_amount . " " . $value->fee_type); ?></td>
                        <td class="text-center">
                            <?php if($value->status==2){?>
                             <i title='<?php echo display('pending_withdraw')?>' class='fas fa-spinner fa-pulse mr-2 fs-20 text-warning'></i>
                             <?php } else if($value->status==1){?>
                             <i title='<?php echo display('success')?>' class='fas fa-check mr-2 fs-20 text-success'></i>
                             <?php } else if($value->status==0){ ?>
                             <i title='<?php echo display('cancel')?>' class='far fa-times-circle mr-2 fs-20 text-danger'></i>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php echo htmlspecialchars_decode($pager); ?>
        </div>
    </div>
</div>