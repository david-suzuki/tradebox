<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <table  id="example" class="table table-responsive table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('sl_no') ?></th>
                            <th><?php echo display('user_id') ?></th>
                            <th><?php echo display('blockchain_address') ?></th>
                            <th>Network</th>
                            <th><?php echo display('xx_messenger') ?></th>
                            <th>Coin</th>
                            <th><?php echo display('amount') ?></th>
                            <th><?php echo display('comments') ?></th>
                            <th><?php echo display('date') ?></th>
                            <th class="text-center"><?php echo display('action')."/".display('status'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($deposit)) ?>
                        <?php $sl = 1; ?>
                        <?php foreach ($deposit as $value) { ?>
                        <tr>
                            <td><?php echo $sl++; ?></td>
                            <td><?php echo esc($value->user_id); ?></td>
                            <td><?php echo esc($value->blockchain_address); ?></td>
                            <td><?php echo esc($value->network); ?></td>
                            <td><?php echo esc($value->xx_messenger); ?></td>
                            <td><?php echo esc($value->currency_symbol); ?></td>
                            <td><?php echo esc((float)$value->amount); ?></td>
                            <td><?php echo esc($value->comment);?></td>
                            <td>
                                <?php
                                    $date=date_create($value->deposit_date);
                                    echo date_format($date, "Y-m-d");
                                ?>
                            </td>
                            <?php if (esc($value->status)==1) { ?>
                            <td class="text-center"><i title='<?php echo display('success')?>' class='fas fa-check mr-2 fs-20 text-success'></i></td>
                            <?php } else if(esc($value->status)==2){ ?>
                            <td class="text-center"> <i title='<?php echo display('cancel')?>' class='far fa-times-circle mr-2 fs-20 text-danger'></i></td>
                            <?php } else { ?>
                            <td class="text-center">
                                <a href="<?php echo base_url()?>/backend/finance/confirm-deposit?id=<?php echo $value->id;?>&user_id=<?php echo $value->user_id;?>&set_status=1&csym=<?php echo $value->currency_symbol;?>" class="btn btn-success btn-sm text-white"><?php echo display('confirm')?></a>
                                <a href="<?php echo base_url()?>/backend/finance/cancel-deposit?id=<?php echo $value->id;?>&user_id=<?php echo $value->user_id;?>&set_status=2&csym=<?php echo $value->currency_symbol;?>" class="btn btn-danger btn-sm text-white"><?php echo display('cancel')?></a>
                            </td>
                           <?php } ?>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php echo  htmlspecialchars_decode($pager); ?>
            </div>
        </div>
    </div>
</div>

