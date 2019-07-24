<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta http-equiv="content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>SIGPAT</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css"/> 
		<link href="../css/bootstrap.css" rel="stylesheet">
		<link href="css/sp.css" rel="stylesheet">
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/popper.min.js"></script>
        <script type="text/javascript" src="../js/ddaccordion.js"></script>
		<script type="text/javascript">
ddaccordion.init({
	headerclass: "submenuheader", //Shared CSS class name of headers group
	contentclass: "submenu", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["suffix", "<img src='images/plus.gif' class='statusicon' />", "<img src='images/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})
</script>

<script type="text/javascript" src="../js/jconfirmaction.jquery.js"></script>
<script type="text/javascript">
	
	$(document).ready(function() {
		$('.ask').jConfirmAction();
	});
	
</script>

<script language="javascript" type="text/javascript" src="../js/niceforms.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="../css/niceforms-default.css" />
		
	</head>
	<body>
		
			<div class = "navbar navbar-inverse navbar-fixed-top" >
			<!--<div class="container">-->
			    <div class="navbar-header">
			       <a class="navbar-brand "  href="index.php?link=1"><img src="imagens/tpai.png" width="100" height="100" alt="Logotipo"></a>
			   </div>
			   <div>
			   <u  class="nav navbar-nav">
			   <li><a href="index.php?link=1"><img src="imagens/home.png" width="50" height="50" alt="icon do home"></img></a></li>
			   <li>
			   </li>
			   </u>
			   </div>
			<!--</div>-->
		</div><br><br>
		
		 
		 