<?php echo form_open(get_uri("items/save"), array("id" => "item-form", "class" => "general-form", "role" => "form")); ?>
<div id="items-dropzone" class="post-dropzone">
    <div class="modal-body clearfix">
        <div class="container-fluid">
            <input type="hidden" name="id" value="<?php echo $model_info->id; ?>" />

            <?php if ($model_info->id) { ?>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12 text-off"> <?php echo app_lang('item_edit_instruction'); ?></div>
                    </div>
                </div>
            <?php } ?>

            <div class="form-group">
                <div class="row">
                    <label for="title" class=" col-md-3"><?php echo app_lang('title'); ?></label>
                    <div class="col-md-9">
                        <?php
                        echo form_input(array(
                            "id" => "title",
                            "name" => "title",
                            "value" => $model_info->title,
                            "class" => "form-control validate-hidden",
                            "placeholder" => app_lang('title'),
                            "autofocus" => true,
                            "data-rule-required" => true,
                            "data-msg-required" => app_lang("field_required"),
                        ));
                        ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="description" class="col-md-3"><?php echo app_lang('description'); ?></label>
                    <div class=" col-md-9">
                        <?php
                        echo form_textarea(array(
                            "id" => "description",
                            "name" => "description",
                            "value" => $model_info->description ? $model_info->description : "",
                            "class" => "form-control",
                            "placeholder" => app_lang('description'),
                            "data-rich-text-editor" => true
                        ));
                        ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="contract_description" class="col-md-3"><?php echo app_lang('contract_description'); ?></label>
                    <div class=" col-md-9">
                        <?php
                        echo form_textarea(array(
                            "id" => "contract_description",
                            "name" => "contract_description",
                            "value" => $model_info->contract_description ? $model_info->contract_description : "",
                            "class" => "form-control",
                            "placeholder" => app_lang('contract_description'),
                            "data-rich-text-editor" => true
                        ));
                        ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="contract_content" class="col-md-3"><?php echo app_lang('contract_content'); ?></label>
                    <div class=" col-md-9">
                        <?php
                        echo form_textarea(array(
                            "id" => "contract_content",
                            "name" => "contract_content",
                            "value" => $model_info->contract_content ? $model_info->contract_content : "",
                            "class" => "form-control",
                            "placeholder" => app_lang('contract_content'),
                            "data-rich-text-editor" => true
                        ));
                        ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="contract_delivery_of_service" class="col-md-3"><?php echo app_lang('contract_delivery_of_service'); ?></label>
                    <div class=" col-md-9">
                        <?php
                        echo form_textarea(array(
                            "id" => "contract_delivery_of_service",
                            "name" => "contract_delivery_of_service",
                            "value" => $model_info->contract_delivery_of_service ? $model_info->contract_delivery_of_service : "",
                            "class" => "form-control",
                            "placeholder" => app_lang('contract_delivery_of_service'),
                            "data-rich-text-editor" => true
                        ));
                        ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="category_id" class=" col-md-3"><?php echo app_lang('category'); ?></label>
                    <div class=" col-md-9">
                        <?php
                        echo form_dropdown("category_id", $categories_dropdown, $model_info->category_id, "class='select2 validate-hidden' id='category_id' data-rule-required='true', data-msg-required='" . app_lang('field_required') . "'");
                        ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="module_id" class=" col-md-3"><?php echo app_lang('item_modules'); ?></label>
                    <div class=" col-md-9">
                        <?php
                        echo form_dropdown("module_id", $modules_dropdown, $model_info->module_id, "class='select2 validate-hidden' id='module_id' data-rule-required='true', data-msg-required='" . app_lang('field_required') . "'");
                        ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="item_rate" class=" col-md-3"><?php echo app_lang('rate'); ?></label>
                    <div class="col-md-9">
                        <?php
                        echo form_input(array(
                            "id" => "item_rate",
                            "name" => "item_rate",
                            "value" => $model_info->rate ? to_decimal_format($model_info->rate) : "",
                            "class" => "form-control",
                            "placeholder" => app_lang('rate'),
                            "data-rule-required" => true,
                            "data-msg-required" => app_lang("field_required"),
                        ));
                        ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="unit_type" class=" col-md-3"><?php echo app_lang('unit_type'); ?></label>
                    <div class="col-md-9">
                        <?php
                        echo form_input(array(
                            "id" => "unit_type",
                            "name" => "unit_type",
                            "value" => $model_info->unit_type,
                            "class" => "form-control",
                            "placeholder" => app_lang('unit_type') . ' (Ex: hours, pc, etc.)'
                        ));
                        ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="recurrence" class=" col-md-3 col-xs-5 col-sm-4"><?php echo app_lang('recurrence'); ?></label>
                    <div class=" col-md-9 col-xs-7 col-sm-8">
                        <?php
                        $recurrence = ['Único' => 'Único', 'Mensal' => 'Mensal', 'Trimestral' => 'Trimestral', 'Anual' => 'Anual'];
                        echo form_dropdown("recurrence", $recurrence, $model_info->recurrence, "class='select2 validate-hidden' id='module_id' data-rule-required='true', data-msg-required='" . app_lang('field_required') . "'");
                        ?>
                    </div>
                </div>
            </div>

            <!-- <div class="form-group">
                <div class="row">
                    <label for="item_ciclo" class=" col-md-3 mt-2"><?php echo app_lang('ciclo'); ?></label>
                    <div class="col-md-2">
                        <label for="item_recurrence_mount"><?php echo app_lang('mount'); ?></label>
                        <?php
                        echo form_input(array(
                            "id" => "item_recurrence_mount",
                            "name" => "item_recurrence_mount",
                            "value" => $model_info->item_recurrence_mount ? to_decimal_format($model_info->item_recurrence_mount) : "",
                            "class" => "form-control",
                            "placeholder" => app_lang('mount'),
                        ));
                        ?>
                    </div>
                    <div class="col-md-2">
                    <label for="item_recurrence_quarterly"><?php echo app_lang('quarterly'); ?></label>
                        <?php
                        echo form_input(array(
                            "id" => "item_recurrence_quarterly",
                            "name" => "item_recurrence_quarterly",
                            "value" => $model_info->item_recurrence_quarterly ? to_decimal_format($model_info->item_recurrence_quarterly) : "",
                            "class" => "form-control",
                            "placeholder" => app_lang('quarterly'),
                        ));
                        ?>
                    </div>
                    <div class="col-md-2">
                    <label for="item_recurrence_semiannual"><?php echo app_lang('semiannual'); ?></label>
                        <?php
                        echo form_input(array(
                            "id" => "item_recurrence_semiannual",
                            "name" => "item_recurrence_semiannual",
                            "value" => $model_info->item_recurrence_semiannual ? to_decimal_format($model_info->item_recurrence_semiannual) : "",
                            "class" => "form-control",
                            "placeholder" => app_lang('semiannual'),
                        ));
                        ?>
                    </div>
                    <div class="col-md-2">
                    <label for="item_recurrence_yearly"><?php echo app_lang('yearly'); ?></label>
                        <?php
                        echo form_input(array(
                            "id" => "item_recurrence_yearly",
                            "name" => "item_recurrence_yearly",
                            "value" => $model_info->item_recurrence_yearly ? to_decimal_format($model_info->item_recurrence_yearly) : "",
                            "class" => "form-control",
                            "placeholder" => app_lang('yearly'),
                        ));
                        ?>
                    </div>
                </div>
            </div> -->
            <?php if ($login_user->is_admin && get_setting("module_order")) { ?>
                <div class="form-group">
                    <div class="row">
                        <label for="show_in_client_portal" class=" col-md-3 col-xs-5 col-sm-4"><?php echo app_lang('show_in_client_portal'); ?></label>
                        <div class=" col-md-9 col-xs-7 col-sm-8">
                            <?php
                            echo form_checkbox("show_in_client_portal", "1", $model_info->show_in_client_portal ? true : false, "id='show_in_client_portal' class='form-check-input'");
                            ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-12 row pr0">
                        <?php
                        echo view("includes/file_list", array("files" => $model_info->files, "image_only" => true));
                        ?>
                    </div>
                </div>
            </div>

            <?php echo view("includes/dropzone_preview"); ?>

        </div>
    </div>

    <div class="modal-footer">
        <button class="btn btn-default upload-file-button float-start btn-sm round me-auto" type="button" style="color:#7988a2"><i data-feather="camera" class="icon-16"></i> <?php echo app_lang("upload_image"); ?></button>
        <button type="button" class="btn btn-default" data-bs-dismiss="modal"><span data-feather="x" class="icon-16"></span> <?php echo app_lang('close'); ?></button>
        <button type="submit" class="btn btn-primary"><span data-feather="check-circle" class="icon-16"></span> <?php echo app_lang('save'); ?></button>
    </div>
</div>
<?php echo form_close(); ?>

<script type="text/javascript">
    $(document).ready(function() {
        var uploadUrl = "<?php echo get_uri("items/upload_file"); ?>";
        var validationUri = "<?php echo get_uri("items/validate_items_file"); ?>";

        var dropzone = attachDropzoneWithForm("#items-dropzone", uploadUrl, validationUri);

        $("#item-form").appForm({
            onSuccess: function(result) {
                if (window.refreshAfterUpdate) {
                    window.refreshAfterUpdate = false;
                    location.reload();
                } else {
                    $("#item-table").appTable({
                        newData: result.data,
                        dataId: result.id
                    });
                }
            }
        });

        $("#item-form .select2").select2();
    });
</script>