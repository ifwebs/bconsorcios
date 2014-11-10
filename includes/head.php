<?php $base_url = "http://www.bconsorcios.com.br/";?>
<meta name="viewport" content="width=device-width, user-scalable=no" />
<meta name="distribution" content="global" />
<meta name="rating" content="general" />
<meta name="robots" content="ALL" />
<meta name="robots" content="index,follow"/>
<meta name="language" content="pt-br" />
<meta name="doc-rights" content="Public" />
<meta name="classification" content="Servicos" />
<meta name="Author" content="IfWebStudio" />
<meta http-equiv="Content-Language" content="pt-br" />
<?php
 ini_set('default_charset','iso-8859-1');
?>

<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $base_url?>images/favicon.png" />
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $base_url?>images/favicon.png" />
<link rel="apple-touch-icon" sizes="57x57" href="<?php echo $base_url?>images/favicon.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $base_url?>images/favicon.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $base_url?>images/favicon.png">
<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo $base_url?>images/favicon.png">
<link rel="shortcut icon" href="<?php echo $base_url?>images/favicon.ico" />
<link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo $base_url?>images/favicon.ico" />
<link rel="icon" type="image/png" href="<?php echo $base_url?>images/favicon.png" />
<link rel="canonical" href="http://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>" />
<link rel="stylesheet" href="<?php echo $base_url?>css1/style.css" media="screen">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-56214521-1', 'auto');
  ga('send', 'pageview');

</script>
<?php 
$pg = end(explode("/",$_SERVER['REQUEST_URI']));
$pg = end(array_reverse(explode("&",$pg)));
?>