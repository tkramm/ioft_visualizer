<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/bootstrap.min.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css" media="screen, projection" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/jquery-1.9.1.js"></script>
</head>

<body>
<div class="container">
    <?php echo $content; ?>
    <!--
    <hr />      
    <div class="row">
        <div class="span12">
            by <?php echo CHtml::link('datensucht.de','http://www.datensucht.de'); ?> | 
            <?php echo CHtml::link('project on github','https://github.com/tkramm/ioft_visualizer'); ?>
        </div>
    </div>
    -->
</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/bootstrap.js"></script>
</body>
</html>
