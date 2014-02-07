<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A layout example with a side menu that hides on mobile, just like the Pure website.">
<title>Everywhere Sqwiggle Room</title>
<!-- Web Fonts -->
<link href='http://fonts.googleapis.com/css?family=Arvo:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>


<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.3.0/pure-min.css">

		
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="css/side-menu-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="css/side-menu.css">
    <!--<![endif]-->
	<style type="text/css">
		#nm {
				font-family:  'Roboto Slab', sans-serif;
				font-weight: 400;
				font-size: 1em;
				color: #b1b1b1; 
				padding: 0;
				margin-top: 0;
		}

		#msg {
				font-family:  'Roboto Slab', sans-serif;
				font-weight: 300; 
				font-size: 1em;
				color: #B1B1B1;
				padding: 0;
				margin-top: 0;
				margin-bottom:0.5em;
				padding-bottom:0.5em;
				padding-left:3em;
				border-bottom:solid 1px #eee;
				word-wrap: break-word;
		}
		#apimsg{
				font-family:  'Roboto Slab', sans-serif;
				font-weight: 300; 
				font-size: 1em;
				color: #B1B1B1;
				padding: 0;
				margin-top: 0;
				margin-bottom:0.5em; 
				padding-bottom:0.5em;
				border-bottom:solid 1px #CBDDE7;

		}
		#convomsg{
				font-family:  'Roboto Slab', sans-serif;
				font-weight: 300; 
				font-size: 1em;
				color: #B1B1B1;
				padding: 0;
				margin-top: 0;
				margin-bottom:0.5em; 
				padding-bottom:0.5em;
				border-bottom:solid 1px #D4E7CB;

		}
		.content{
			padding-top:2em;
		}
		#menu .pure-menu-offline {
			background: #CA5F5F;
			color:#fff;
			border:none;
		}
		#menu .pure-menu-busy {
			background: #EBA85F;
			color:#fff;
			border:none; 
		}
		#menu .pure-menu-available {
			background: #90C76B;
			color:#fff;
			border:none;
		}
		#menu a {
			color: #fff;
		}
	
		#menu {
		margin-left: -200px;
		}	
		#layout.active #menu {
			left: 200px; 
			width: 200px;
		}
		@media (min-width: 48em){
			#menu {
			left: 200px;
			}
		} 
		.avatar { 
			float: left;
			margin-top: .3em;
			margin-right: 1em;
			position: relative;

			height:2em;
			width:2em;
			
			-webkit-border-radius: 50%;
			-moz-border-radius: 50%;
			border-radius: 50%;

			-webkit-box-shadow: 0 0 0 3px #fff, 0 0 0 1px #999, 0 2px 5px 4px rgba(0,0,0,.2);
			-moz-box-shadow: 0 0 0 3px #fff, 0 0 0 1px #999, 0 2px 5px 4px rgba(0,0,0,.2);
			box-shadow: 0 0 0 3px #fff, 0 0 0 1px #999, 0 2px 5px 4px rgba(0,0,0,.2);
		}
		.attachment{
			border:solid 1px #eee;
			margin-bottom:1em;
			margin-top:1em;
			padding:1em;
		}
		.attachment img{
			width: 100%;
			height: 10em;
		}
		#msg a{
			text-decoration: none;
		}
		.attachment_title{
			font-family:  'Roboto Slab', sans-serif;
			font-weight: 400;
			font-size: .8em;
			color: #b1b1b1; 
		}
		.attachment_desciption{
			font-weight: 100;
			font-size: .6em;
			color: #b1b1b1; 
		}
		.timestamp{
			float:right;
			font-size: .6em;
		}
		.clear{
		clear:both;
		}
	</style>

</head>
<body>

<div id="layout">
    <!-- Menu toggle -->
    <a id="menuLink" class="menu-link">
        <!-- Hamburger icon -->
        <span></span>
    </a>

    <div id="menu">
        <div class="pure-menu pure-menu-open">
            <a  href="#">Team</a>

            <ul>
				<?php include 'resources/users_api.php'; ?>
            </ul>
        </div>
    </div>

    <div id="main">
        <div class="header">
            <h1>Sqwiggle Feed</h1>
            <h2>Everywhere Room</h2>
        </div>

        <div class="content">
           <?php include 'resources/message_api.php'; ?>
        </div>
    </div>
</div>





<script src="js/ui.js"></script>
<script src="http://localhost:35729/livereload.js"></script>

</body>
</html>
