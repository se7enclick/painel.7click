<?php
foreach ($contract_items as $item) {
    if($item->contract_description != ''){
?>
    <li><b><u><?php echo $item->title; ?></u></b>:
		<ol>
            <?php echo $item->contract_description; ?>
        </ol>
    </tr>
<?php } } ?>