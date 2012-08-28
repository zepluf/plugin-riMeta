<?php
/**
 * Created by RubikIntegration Team.
 * User: vunguyen
 * Date: 7/12/12
 * Time: 3:30 PM
 * Question? Come to our website at http://rubikintegration.com
 */
$riview->get('loader')->load(array('jquery.lib', 'jquery.ui.lib', 'jquery.form.lib','riMeta::addLinkVideo.css'));

$riview->get('loader')->startInline('js');
?>
<script type="text/javascript">
    jQuery.extend({
        parseQuerystrings: function(href){
            var nvpair = {};
            var qs = href.substring(href.indexOf('?')+1, href.length);
            var pairs = qs.split('&');
            $.each(pairs, function(i, v){
                var pair = v.split('=');
                nvpair[pair[0]] = pair[1];
            });
            return nvpair;
        }
    });
    $(function () {    
        $('table td img[src="images/icon_edit.gif"]').each(function(){
                var parent = $(this).closest('a');

                var href = parent.attr('href');
                var qs = jQuery.parseQuerystrings(href);

                if(href.search("product.php") > -1)
                    parent.before('<a class="link-video" href="<?php echo riLink('metaList')?>?objects_id=' + qs['pID'] + '&objects_type=product">Metas</a>');
        });
    });
</script>
<?php $riview->get('loader')->endInline();?>
