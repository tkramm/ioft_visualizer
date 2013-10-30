<?php $this->pageTitle=Yii::app()->name; ?>

<div style="position: relative;height:100%;text-align: center; margin-bottom: 10px;">
    <?php echo CHtml::image('images/channels/'.$config->image,'',array('style'=>'width:1200px;')); ?>
    <div id="data">
        <?php $this->renderPartial('_data',array('data'=>$data)); ?>
    </div>
</div>
<div class="well">
    <form class='form-inline'>
    <?php foreach($types as $type => $present): ?>
        <label class="checkbox">
          <input type="checkbox" CHECKED id="<?php echo $type; ?>"><?php echo $type; ?>
        </label>
    <?php endforeach; ?>
    </form>
</div>

<script type="text/javascript">
function update(id){
    jQuery.ajax({
        'type':'POST',
        'data':{
            <?php foreach($types as $type => $present): ?>
                '<?php echo $type; ?>':$('#<?php echo $type; ?>').is(':checked'),
            <?php endforeach; ?>
            'name':'<?php echo $name; ?>'
        },
        'url':'<?php echo CHtml::normalizeUrl(array('/site/GetValues')); ?>',
        'cache':false,
        'success':function(html){jQuery("#data").html(html)}});
};
var checkUpdates = function()
{
    serverPoll = setInterval( function()
    {
        update()
    }, 60000 )
};
$( document ).ready( checkUpdates );
<!--
<?php foreach($types as $type => $present): ?>
    $('#<?php echo $type; ?>').click(
      function(){
        if ( $(this).is(':checked') )
          $('.<?php echo $type; ?>').show()
        else
          $('.<?php echo $type; ?>').hide();
      }
    );    
<?php endforeach; ?>
-->

</script>