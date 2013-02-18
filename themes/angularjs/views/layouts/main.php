<?php
/**
 * AngularJS default layout
 * User: keiran
 * Date: 18/2/13
 * Time: 4:18 PM
 */
?>
<!DOCTYPE html>
<?php
echo AHtml::ngOpenApp();
?>
<head>
    <title><?php echo AHtml::encode($this->pageTitle); ?></title>
</head>
<body>
    <?php echo $content; ?>
</body>
<?php
echo AHtml::closeTag('html');

// use AngularJS widget to embed script files
$this->widget('AngularJS');
?>