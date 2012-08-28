<div id="main-meta">
    <div class="list-meta">
        <div class="header-list">
            <h5><?php rie("Name", null, "riMeta"); ?></h5>
            <h5><?php rie("Value", null, "riMeta"); ?></h5>
        </div>
        <?php foreach($metas as $row) {?>
        <form name="form_insert" method="post"  action="<?php echo riLink('metaAction')?>" >
        <div class="item-meta">
            <div class="meta-name pull-left"  >
                <input type="text" class="meta-name-input" name="meta_name" value="<?php echo $row['metas_key'] ?>">
                <div>
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>" />
                    <input type="hidden" name="action" value="update" />
                    <input type="hidden" name="objects_id" value="<?php echo $objects_id ?>" />
                    <input type="hidden" name="objects_type" value="<?php echo $objects_type ?>" />
                    <input type="button" name="update" class="btn" value="update" />
                    <input type="button" name="delete" value="delete" class="btn" />
                    
                </div>
            </div>
            <div class="meta-value pull-left">
                <textarea name="meta_value"><?php echo $row['metas_value'] ?></textarea>
            </div>
            <br class="clearfix" />
        </div>
        </form>
        <?php } ?>
        <br class="clearBoth" />
    </div>
    <h3><?php rie("Add New Custom Field :", null, "riMeta"); ?></h3>
    <div class="list-meta">
        <div class="header-list">
            <h5><?php rie("Name", null, "riMeta"); ?></h5>
            <h5><?php rie("Value", null, "riMeta"); ?></h5>
        </div>
        <form name="form_insert" method="post" action="<?php echo riLink('metaAction')?>" >
        <div class="item-meta">
            <div class="meta-name pull-left" >
                <select name="meta_name_dropdown" id="meta_name_dropdown">
                    <?php foreach($list as $key =>$value){?>
                    <option value="<?php echo $key?>" >
                        <?php echo $value?>
                    </option>
                    <?php }?>
                </select>
                <input type="text" class="meta-name-input" name="meta_name" id="meta_name_insert">
                <div>
                    <input type="hidden" name="action" value="insert" />
                    <input type="hidden" name="objects_id" value="<?php echo $objects_id ?>" />
                    <input type="hidden" name="objects_type" value="<?php echo $objects_type ?>" />
                    <input type="button" name="insert" class="btn" value="insert" />
                </div>
            </div>
            <div class="meta-value pull-left">
                <textarea name="meta_value"></textarea>
            </div>
            <br class="clearfix" />
        </div>
        </form>
    </div>
</div>
