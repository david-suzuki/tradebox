<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="fs-17 font-weight-600 mb-0"></h6>
                    </div>
                    <div class="text-right">
                        <div class="actions">
                            <a href="#" class="action-item"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="border_preview">
                <?php
                    if (is_null($slider->id)) {
                        echo form_open_multipart(base_url("backend/cms/add-slider"));
                    } else {
                        echo form_open_multipart(base_url("backend/cms/edit-slider/$slider->id"));
                    }
                ?>
                <?php echo form_hidden('id', @$slider->id) ?>
                    <div class="form-group row">
                        <label for="title_en" class="col-sm-2 col-form-label font-weight-600"><?php echo display('slider_title_english');?><i class="text-danger">*</i></label>
                        <div class="col-sm-8">
                            <input name="title_en" value="<?php echo htmlspecialchars($slider->title_en); ?>" class="form-control" type="text" id="title_en" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title_fr" class="col-sm-2 col-form-label font-weight-600"><?php echo display('slider_title_french'); ?></label>
                        <div class="col-sm-8">
                            <input name="title_fr" value="<?php echo $slider->title_fr ?>" class="form-control" type="text" id="title_fr">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text_en" class="col-sm-2 col-form-label font-weight-600"><?php echo display('slider_text_en') ?></label>
                        <div class="col-sm-9">
                            <textarea  id="ckeditor" name="text_en" class="form-control editor" placeholder="<?php echo display('slider_text_en') ?>" type="text" id="text_en"><?php echo @$slider->text_en; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text_fr" class="col-sm-2 col-form-label font-weight-600"><?php echo display('slider_text_fr') ?></label>
                        <div class="col-sm-9">
                            <textarea  id="ckeditor2" name="text_fr" class="form-control editor" placeholder="<?php echo display('slider_text_fr') ?>" type="text" id="text_fr"><?php echo @$slider->text_fr; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="button_en" class="col-sm-2 col-form-label font-weight-600"><?php echo display('slider_button_en');?><i class="text-danger">*</i></label>
                        <div class="col-sm-8">
                            <input name="button_en" value="<?php echo htmlspecialchars($slider->button_en); ?>" class="form-control" type="text" id="button_en" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="button_fr" class="col-sm-2 col-form-label font-weight-600"><?php echo display('slider_button_fr');?></label>
                        <div class="col-sm-8">
                            <input name="button_fr" value="<?php echo htmlspecialchars($slider->button_fr); ?>" class="form-control" type="text" id="button_fr">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="custom_url" class="col-sm-2 col-form-label font-weight-600"><?php echo display('url') ?></label>
                        <div class="col-sm-8">
                            <input name="custom_url" value="<?php echo htmlspecialchars_decode($slider->custom_url); ?>" class="form-control" type="text" id="custom_url">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="slider_img" class="col-sm-2 col-form-label font-weight-600"><?php echo display('image') ?></label>
                        <div class="col-sm-8">
                            <input name="slider_img" class="form-control" placeholder="<?php echo display('image') ?>" type="file" id="slider_img">
                            <span class="text-danger">1200x800 px(jpg, jpeg, png, gif, ico)</span><br>
                            <input type="hidden" name="slider_img_old" value="<?php echo $slider->slider_img ?>">
                            <?php if (!empty($slider->slider_img)) { ?>
                                <img src="<?php echo IMAGEPATH.$slider->slider_img ?>" width="450">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-2 col-form-label font-weight-600"><?php echo display('status') ?></label>
                        <div class="col-sm-8 pt10">
                            <label class="radio-inline">
                                <?php echo form_radio('status', '1', (($slider->status==1 || $slider->status==null)?true:false)); ?><?php echo display('active') ?>
                             </label>
                            <label class="radio-inline">
                                <?php echo form_radio('status', '0', (($slider->status=="0")?true:false) ); ?><?php echo display('inactive') ?>
                             </label>
                        </div>
                    </div>
                    <div class="row">
                          <label for="status" class="col-sm-2 col-form-label font-weight-600"></label>
                        <div class="col-sm-8">
                            <a href="<?php echo base_url('backend/home'); ?>" class="btn btn-primary  w-md m-b-5"><?php echo display("cancel") ?></a>
                            <button type="submit" class="btn btn-success  w-md m-b-5"><?php echo $slider->id?display("update"):display("create") ?></button>
                        </div>
                    </div>
                <?php echo form_close() ?>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo BASEPATH.'/assets/plugins/ckeditor/ckeditor.js' ?>"></script>
<!--Page Active Scripts(used by this page)-->
<script src="<?php echo BASEPATH.'/assets/plugins/ckeditor/ckeditor.active.js' ?>"></script>