<div id="page-content" class="page-wrapper clearfix">
    <div class="card">
        <div class="page-title clearfix">
            <h1> <?php echo app_lang('google_meet_meetings'); ?></h1>
            <div class="title-button-group">
                <?php
                $can_manage_google_meet_integration = can_manage_google_meet_integration();
                if ($can_manage_google_meet_integration) {
                    echo modal_anchor(get_uri("google_meet_meetings/modal_form"), "<i data-feather='plus-circle' class='icon-16'></i> " . app_lang('google_meet_integration_add_meeting'), array("class" => "btn btn-default", "title" => app_lang('google_meet_integration_add_meeting')));
                }
                ?>
            </div>
        </div>
        <div class="table-responsive">
            <table id="meeting-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
    </div>
</div>

<?php
//prepare status dropdown list
//show only upcoming meetings by default.
$statuses = array(
    array("text" => app_lang("google_meet_integration_upcoming"), "value" => "upcoming", "isChecked" => true),
    array("text" => app_lang("google_meet_integration_recent"), "value" => "recent"),
    array("text" => app_lang("google_meet_integration_past"), "value" => "past")
);
?>

<script type="text/javascript">
    $(document).ready(function () {
        var actionVisibility = false;
<?php if ($can_manage_google_meet_integration) { ?>
            actionVisibility = true;
<?php } ?>

        $("#meeting-table").appTable({
            source: '<?php echo_uri("google_meet_meetings/list_data") ?>',
            order: [[3, 'desc']],
            multiSelect: [
                {
                    name: "status",
                    text: "<?php echo app_lang('status'); ?>",
                    options: <?php echo json_encode($statuses); ?>,
                    saveSelection: true
                }
            ],
            columns: [
                {title: '<?php echo app_lang("google_meet_integration_topic"); ?>', "class": "w300"},
                {title: '<?php echo app_lang("description"); ?>', "class": "w300"},
                {visible: false, searchable: false},
                {title: "<?php echo app_lang("google_meet_integration_meeting_time") ?>", "class": "w200", "iDataSort": 2},
                {title: '<?php echo app_lang("created_by"); ?>', "class": "w200"},
                {title: '<?php echo app_lang("google_meet_integration_join_url") ?>', "class": "w150"},
                {title: '<?php echo app_lang("status") ?>', "class": "w100"},
                {title: "<i data-feather='menu' class='icon-16'></i>", "class": "text-center option w100", visible: actionVisibility}
            ]
        });
    });
</script>