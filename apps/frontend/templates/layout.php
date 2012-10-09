<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/images/favicon.png" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'/>
    <?php include_stylesheets() ?>
    <script type="text/javascript" src='http://download.skype.com/share/skypebuttons/js/skypeCheck.js'></script> 
    <?php include_javascripts() ?>
    <script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script>
    <script type="text/javascript" src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    <script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-26087563-1']);
			_gaq.push(['_trackPageview']);
			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
  </head>
  <body>
  	<div id="header">
  		<div id="header-left">
  			<img src="/images/logo.png" alt="logotip empresa Flux"/>
  		</div>
  		<div id="header-right">
  			<ul>
  				<li><a id="leng" <?php if ($sf_user->getCulture() == 'en') echo 'class="lang-selected"'?> href="<?php echo url_for('change_language').'?lang=en' ?>">eng</a></li>
  				<li><a id="lesp" <?php if ($sf_user->getCulture() == 'es') echo 'class="lang-selected"'?> href="<?php echo url_for('change_language').'?lang=es' ?>">esp</a></li>
  				<li><a id="lcat" <?php if ($sf_user->getCulture() == 'ca') echo 'class="lang-selected"'?> href="<?php echo url_for('change_language').'?lang=ca' ?>">cat</a></li>
  			</ul>
  		</div>
  	</div>
  	<div id="main">
  		<div id="main-left">
  			<?php include_component('menu', 'showMenu'); ?>
  		</div>
  		<div id="main-right">
  			<?php echo $sf_content ?>
  		</div>
  	</div>
    <div id="footer">
			<div id="footer-left">
				
				<ul>
					<li><g:plusone size="medium"></g:plusone></li>
					<li><a href="http://twitter.com/share" class="twitter-share-button" data-url="http://www.flux.cat" data-count="horizontal">Tweet</a></li>
					<li><div id="fb-root" style="padding:0px; margin:0px auto"></div><fb:like href="http://www.flux.cat" send="false" layout="button_count" width="110" show_faces="false" font=""></fb:like></li>
				</ul>
				
			</div>
			<div id="footer-center">
				<p><a href="mailto:info@flux.cat">info@flux.cat</a></p>
			</div>
			<div id="footer-right">
				<p><a href="<?php echo url_for('static/privacy')?>" id="privacitat"><?php echo __('privacy')?></a> · &copy;<?php echo date('Y')?></p>
			</div>		
		</div> 
  </body>
</html>
