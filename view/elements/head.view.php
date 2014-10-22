<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Head -->

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="icon" href="<?php echo URL_IMAGE; ?>favicon.ico" type="image/x-icon"/>
	
<!-- Meta Tags -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $viewData["website"]["title"]; ?></title>
	<meta name= "description" content= "<?php echo $viewData["website"]["description"]; ?>"/>
	<meta name= "keywords" content= "<?php echo $viewData["website"]["keywords"]; ?>"/>

<!-- Meta Tags OG -->
	<meta property="og:type" content="website"/>
	<meta property="og:title" content="<?php echo $viewData["website"]["title"]; ?>"/>
	<meta property="og:url" content="<?php echo URL_WEB; ?>"/>
	<meta property="og:image" content="http://atulmy.com/static/images/logo_big.jpg"/>
	<meta property="og:description" content="<?php echo $viewData["website"]["description"]; ?>"/>
	<meta property="og:site_name" content="<?php echo URL_WEB; ?>"/>
    
<!-- Style Sheet -->
	<link rel="stylesheet" href="<?php echo URL_CSS; ?>base.css">
	<link rel="stylesheet" href="<?php echo URL_CSS; ?>skeleton.css">
	<link rel="stylesheet" href="<?php echo URL_CSS; ?>layout.css">
	<style type="text/css">
		em { color: #666666; }
	</style>

<!-- JS Libraries -->
	<script type="text/javascript" src="<?php echo URL_JS; ?>libraries/jquery.js"></script>
	<script type="text/javascript" src="<?php echo URL_JS; ?>libraries/angular.js"></script>
	<script type="text/javascript" src="<?php echo URL_JS; ?>libraries/angular.route.js"></script>
	<script type="text/javascript" src="<?php echo URL_JS; ?>libraries/angular.upload.js"></script>
	
<!-- App JS -->
    <script type="text/javascript" src="<?php echo URL_JS; ?>app.js"></script>
    <script type="text/javascript" src="<?php echo URL_JS; ?>app.controllers.js"></script>
	
	<script type="text/javascript">
		$( function() {
		   
		});
	</script>