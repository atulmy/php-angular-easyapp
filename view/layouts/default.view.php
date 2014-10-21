<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
    <?php include_once('view/elements/head.view.php'); ?>
</head>

<body ng-app="EasyApp">
	
	<!-- Primary Page Layout -->
	<div class="container">
		
		<?php include_once('view/elements/header.view.php'); ?>
		
        <div ng-view></div>
		<?php
            if($view != '') {
                include_once('view/'.$view.'.view.php');
            }
        ?>
		
		<?php include_once('view/elements/footer.view.php'); ?>

	</div>
	
</body>
</html>