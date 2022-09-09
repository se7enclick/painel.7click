<?php
foreach ($contract_items as $item) {
    if($item->contract_content != ''){
?>
    <li><b><u><?php echo $item->title; ?></u></b>:
		<ol>
            <?php echo $item->contract_content; ?>
        </ol>
    </tr>
<?php }} ?>