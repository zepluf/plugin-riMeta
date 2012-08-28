<?php
$loader->load(array('jquery.lib', 'jquery.form.lib'));

$metas = \plugins\riPlugin\Plugin::get('riMeta.Metas')->findByObjectId($_GET['products_id'], 'product');
if($metas !== false):
    foreach($metas as $meta_key => $meta_value):?>
        <div class="meta">
            <div class="meta_key">
                <?php echo $meta_key;?>
            </div>
            <div class="meta_value">
                <?php echo $meta_value;?>
            </div>
        </div>
    <?php endforeach;?>
        <?php endif;?>