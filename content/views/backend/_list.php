<div id="main-meta">
    <div class="list-meta">
        <div class="header-list">
            <h5><?php rie("Name", null, "riMeta"); ?></h5>
            <h5><?php rie("Value", null, "riMeta"); ?></h5>
        </div>
        <?php foreach($metas as $row) {?>
        <form name="form_insert" method="post"  action="<?php echo riLink('rimeta_action')?>" >
        <div class="item-meta">
            <div class="meta-name pull-left"  >
                <input type="text" class="meta-name-input" name="meta_name" value="<?php echo $row['metas_key'] ?>">
                <div>
                    <input type="hidden" name="metas_id" value="<?php echo $row['metas_id'] ?>" />
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
            <br class="clear-both" />
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
        <form name="form_insert" method="post" action="<?php echo riLink('rimeta_action')?>" >
        <div class="item-meta">
            <div class="meta-name pull-left" >
                <select name="meta_name_dropdown" id="meta_name_dropdown">
                    <option value="new"><?php rie('Add New', '', 'riMeta');?></option>
                    <?php foreach($all_metas as $meta){?>
                    <option value="<?php echo $meta->metasKey?>" >
                        <?php echo $meta->metasValue?>
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
            <br class="clear-both" />
        </div>
        </form>
    </div>
</div>
<?php
$riview->get("loader")->load(array("jquery.lib", "jquery.form.lib", "bootstrap.form.lib", "riMeta::metas.css"));
$riview->get("loader")->startInline('js');
?>
<script type="text/javascript">
    $(document).ready(function(){
        $(".btn").live("click",function(){
            $(this).parents("form").find("input[name=action]").val($(this).val());
            var form = $(this).parents("form[name=form_insert]");

            $.ajax({
                url: form.attr("action"),
                data: form.serialize(),
                success :function(data) {
                    $("#main-admin").html(data);
                }
            });

        });
        $("#meta_name_dropdown").live("change",function(){
            if($(this).val() == "new"){
                $("#meta_name_insert").show();
                $("#meta_name_insert").attr('disabled', false);
            }
            else{
                $("#meta_name_insert").hide();
                $("#meta_name_insert").attr('disabled', true);
            }
        });

    });
</script>
<?php
$riview->get("loader")->endInline();