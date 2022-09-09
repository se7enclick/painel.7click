<?php
$color = get_setting("contract_color");
if (!$color) {
    $color = get_setting("invoice_color") ? get_setting("invoice_color") : "#2AA384";
}

$discount_row = '<tr>
                        <td colspan="3" style="text-align: right;">' . app_lang("discount") . '</td>
                        <td style="text-align: right; width: 20%; border: 1px solid #fff; background-color: #f4f4f4;">' . to_currency($contract_total_summary->discount_total, $contract_total_summary->currency_symbol) . '</td>
                    </tr>';
?>

<table class="table-responsive" style="width: 100%; color: #444;">
    <tr style="font-weight: bold; background-color: <?php echo $color; ?>; color: #fff;  ">
        <th style="width: 45%; border-right: 1px solid #eee;"> <?php echo app_lang("item"); ?> </th>
        <th style="text-align: center;  width: 15%; border-right: 1px solid #eee;"> <?php echo app_lang("quantity"); ?></th>
        <th style="text-align: right;  width: 20%; border-right: 1px solid #eee;"> <?php echo app_lang("rate"); ?></th>
        <th style="text-align: right;  width: 20%; "> <?php echo app_lang("price/cycle"); ?></th>
    </tr>
    <?php
    foreach ($contract_items as $item) {
    ?>
        <tr style="background-color: #f4f4f4; ">
            <td style="width: 45%; border: 1px solid #fff; padding: 10px;"><?php echo $item->title; ?>
                <br />
                <span style="color: #888; font-size: 90%;"><?php echo nl2br($item->description); ?></span>
            </td>
            <td style="text-align: center; width: 15%; border: 1px solid #fff;"> <?php echo $item->quantity . " " . $item->unit_type; ?></td>
            <td style="text-align: right; width: 20%; border: 1px solid #fff;"> <?php echo to_currency($item->rate, $item->currency_symbol); ?></td>
            <td style="text-align: right; width: 20%; border: 1px solid #fff;">
                <?php echo to_currency($item->total, $item->currency_symbol); ?> <br>
                <sup><?php echo $item->recurrence ?></sup>
            </td>
        </tr>
    <?php } ?>

    <?php
    if ($contract_total_summary->contract_single) {
    ?>
        <tr>
            <td colspan="2"></td>
            <td style="text-align: right; background-color: <?php echo $color; ?>; color: #fff ; border: 1px solid #fff;"><?php echo app_lang("total_single"); ?></td>
            <td style="text-align: right; width: 20%; background-color: #f4f4f4; border: 1px solid #fff;">
                <?php echo to_currency($contract_total_summary->contract_single, $contract_total_summary->currency_symbol); ?>
            </td>
        </tr>
    <?php
    }
    if ($contract_total_summary->contract_monthly) {
    ?>
        <tr>
            <td colspan="2"></td>
            <td style="text-align: right; background-color: <?php echo $color; ?>; color: #fff ; border: 1px solid #fff;"><?php echo app_lang("total_monthly"); ?></td>
            <td style="text-align: right; width: 20%; background-color: #f4f4f4; border: 1px solid #fff;">
                <?php echo to_currency($contract_total_summary->contract_monthly, $contract_total_summary->currency_symbol); ?>
            </td>
        </tr>
    <?php
    }
    if ($contract_total_summary->contract_quarterly) {
    ?>
        <tr>
            <td colspan="2"></td>
            <td style="text-align: right; background-color: <?php echo $color; ?>; color: #fff ; border: 1px solid #fff;"><?php echo app_lang("total_quarterly"); ?></td>
            <td style="text-align: right; width: 20%; background-color: #f4f4f4; border: 1px solid #fff;">
                <?php echo to_currency($contract_total_summary->contract_quarterly, $contract_total_summary->currency_symbol); ?>
            </td>
        </tr>
    <?php
    }
    if ($contract_total_summary->contract_yearly) {
    ?>
        <tr>
            <td colspan="2"></td>
            <td style="text-align: right; background-color: <?php echo $color; ?>; color: #fff ; border: 1px solid #fff;"><?php echo app_lang("total_yearly"); ?></td>
            <td style="text-align: right; width: 20%; background-color: #f4f4f4; border: 1px solid #fff;">
                <?php echo to_currency($contract_total_summary->contract_yearly, $contract_total_summary->currency_symbol); ?>

            </td>
        </tr>
    <?php
    }
    ?>
</table>