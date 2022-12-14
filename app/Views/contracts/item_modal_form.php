<?php echo form_open(get_uri("contracts/save_item"), array("id" => "contract-item-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">
    <div class="container-fluid">
        <input type="hidden" name="id" value="<?php echo $model_info->id; ?>" />
        <input type="hidden" name="contract_id" value="<?php echo $contract_id; ?>" />
        <input type="hidden" name="add_new_item_to_library" value="" id="add_new_item_to_library" />

        <div class="form-group">
            <div class="row">
                <label for="contract_item_title" class=" col-md-3"><?php echo app_lang('item'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "contract_item_title",
                        "name" => "contract_item_title",
                        "value" => $model_info->title,
                        "class" => "form-control validate-hidden",
                        "placeholder" => app_lang('select_or_create_new_item'),
                        "data-rule-required" => true,
                        "data-msg-required" => app_lang("field_required"),
                    ));
                    ?>
                    <a id="contract_item_title_dropdwon_icon" tabindex="-1" href="javascript:void(0);" style="color: #B3B3B3;float: right; padding: 5px 7px; margin-top: -35px; font-size: 18px;"><span>×</span></a>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label for="contract_item_description" class="col-md-3"><?php echo app_lang('description'); ?></label>
                <div class=" col-md-9">
                    <?php
                    echo form_textarea(array(
                        "id" => "contract_item_description",
                        "name" => "contract_item_description",
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
                <label for="contract_item_quantity" class=" col-md-3"><?php echo app_lang('quantity'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "contract_item_quantity",
                        "name" => "contract_item_quantity",
                        "value" => $model_info->quantity ? to_decimal_format($model_info->quantity) : "",
                        "class" => "form-control",
                        "placeholder" => app_lang('quantity'),
                        "data-rule-required" => true,
                        "data-msg-required" => app_lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label for="contract_unit_type" class=" col-md-3"><?php echo app_lang('unit_type'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "contract_unit_type",
                        "name" => "contract_unit_type",
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
                <label for="contract_item_rate" class=" col-md-3"><?php echo app_lang('rate'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "contract_item_rate",
                        "name" => "contract_item_rate",
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
                <label for="recurrence" class=" col-md-3"><?php echo app_lang('recurrence'); ?></label>
                <div class="col-md-9">
                    <?php
                    $recurrence = ['Único' => 'Único', 'Mensal' => 'Mensal', 'Trimestral' => 'Trimestral', 'Anual' => 'Anual'];
                    echo form_dropdown("recurrence", $recurrence, 'Único', "class='select2 validate-hidden' id='recurrence' data-rule-required='true', data-msg-required='" . app_lang('field_required') . "'");
                    ?>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-bs-dismiss="modal"><span data-feather="x" class="icon-16"></span> <?php echo app_lang('close'); ?></button>
    <button type="submit" class="btn btn-primary"><span data-feather="check-circle" class="icon-16"></span> <?php echo app_lang('save'); ?></button>
</div>
<?php echo form_close(); ?>

<script type="text/javascript">
    $(document).ready(function() {
        $("#contract-item-form").appForm({
            onSuccess: function(result) {
                $("#contract-item-table").appTable({
                    newData: result.data,
                    dataId: result.id
                });
                $("#contract-total-section").html(result.contract_total_view);
                if (typeof updateContractStatusBar === 'function') {
                    updateContractStatusBar(result.contract_id);
                }
            }
        });

        //show item suggestion dropdown when adding new item
        var isUpdate = "<?php echo $model_info->id; ?>";
        if (!isUpdate) {
            applySelect2OnItemTitle();
        }

        //re-initialize item suggestion dropdown on request
        $("#contract_item_title_dropdwon_icon").click(function() {
            applySelect2OnItemTitle();
        })

    });

    function applySelect2OnItemTitle() {
        $("#contract_item_title").select2({
            showSearchBox: true,
            ajax: {
                url: "<?php echo get_uri("contracts/get_contract_item_suggestion"); ?>",
                dataType: 'json',
                quietMillis: 250,
                data: function(term, page) {
                    return {
                        q: term // search term
                    };
                },
                results: function(data, page) {
                    return {
                        results: data
                    };
                }
            }
        }).change(function(e) {
            if (e.val === "+") {
                //show simple textbox to input the new item
                $("#contract_item_title").select2("destroy").val("").focus();
                $("#add_new_item_to_library").val(1); //set the flag to add new item in library
            } else if (e.val) {
                //get existing item info
                $("#add_new_item_to_library").val(""); //reset the flag to add new item in library
                $.ajax({
                    url: "<?php echo get_uri("contracts/get_contract_item_info_suggestion"); ?>",
                    data: {
                        item_name: e.val
                    },
                    cache: false,
                    type: 'POST',
                    dataType: "json",
                    success: function(response) {

                        //auto fill the description, unit type and rate fields.
                        if (response && response.success) {
                            $("#contract_item_description").val(response.item_info.description);

                            $("#contract_description").val(response.item_info.contract_description);

                            $("#contract_content").val(response.item_info.contract_content);

                            $("#contract_delivery_of_service").val(response.item_info.contract_delivery_of_service);

                            $("#contract_unit_type").val(response.item_info.unit_type);

                            $("#contract_item_rate").val(response.item_info.rate);

                            $("#recurrence").val(response.item_info.recurrence);
                        }
                    }
                });
            }

        });
    }
</script>