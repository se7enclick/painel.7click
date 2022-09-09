<?php
foreach ($contract_items as $item) {
    if($item->contract_delivery_of_service != ''){
?>
    <li><b><u><?php echo $item->title; ?></u></b>:
		<ol>
            <?php echo $item->contract_delivery_of_service; ?>
        </ol>
    </tr>
<?php }} ?>