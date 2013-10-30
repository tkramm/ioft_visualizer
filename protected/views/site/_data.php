    <?php foreach($data as $sourceName => $source): ?>
        <div style="position: absolute;top:<?php echo $source['top']; ?>px; left:<?php echo $source['left']; ?>px;">
        <?php foreach($source['feeds'] as $feed): ?>
            <?php if(isset($visible)){ ?>
                <span class='<?php echo $feed['type']; ?>' style="display:<?php echo ($visible[$feed['type']] == 'false')?'none':'inline'; ?>">
            <?php } else { ?>
                <span class='<?php echo $feed['type']; ?>'>
            <?php } ?>
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