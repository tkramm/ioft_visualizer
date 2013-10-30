<?php $this->pageTitle=Yii::app()->name; ?>

<div style="position: relative;height:100%;text-align: center; margin-bottom: 10px;">
    <?php echo CHtml::image('images/channels/1.png','',array('style'=>'width:1200px;')); ?>
    <?php foreach($data as $sourceName => $source): ?>
        <div style="position: absolute;top:<?php echo $source['top']; ?>px; left:<?php echo $source['left']; ?>px;">
        <?php foreach($source['feeds'] as $feed): ?>
            <span class='<?php echo $feed['type']; ?>'>
                <?php if($feed['type'] == "Bewegung"){ ?>
                    <a href="" class="btn btn-success btn" style="opacity:<?php echo ($feed['response']->activity)/42+0.3; ?>;">
                    <?php 
                        $activity = $feed['response']->activity;
                        echo floor(30-$feed['response']->activity);
                    ?>
                    </a>
                <br />
                <?php } else { ?>
                <span class="badge" style="background-color:#<?php echo $feed['color']; ?>;">
                    <?php 
                    echo $feed['response']->lastValue;
                    echo $feed['symbol'];
                    ?>
                </span><br />
                <?php } ?>
            </span>
        <?php endforeach; ?>    
        </div>
    <?php endforeach; ?>    
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

<script>
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
</script>