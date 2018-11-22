<?php


include 'Config.php';
include 'Izbornik.php';

/*

CREATE TABLE izbornik (
id int(11) unsigned primary key auto_increment,
title varchar(255) NOT NULL,
parent_id int(11) unsigned DEFAULT NULL,
FOREIGN KEY (parent_id) REFERENCES izbornik(id) ON UPDATE CASCADE ON DELETE RESTRICT
);

*/

$r = Izbornik::getAll($conn);
$copy = $r;


function findChildren($curr_id, $copy)
{
	$out = '<ul class="dl-submenu">';
	foreach($copy as $i)
	{
		if($i['parent_id'] == $curr_id)
		{
			$out .= '<li>
				<a href="#">'.$i['title'].'</a>';	
			$out .= findChildren($i['id'], $copy);
			$out .= '</li>';
		}
	}
	$out .= '</ul>';
	return $out;
}


$html = '';
foreach($r as $i)
{
	if($i['parent_id'] == NULL)
	{
		$html .= '<li>
			<a href="#">'.$i['title'].'</a>';	
		$html .= findChildren($i['id'], $copy);
		$html .= '</li>';
	}
}


echo '
<!DOCTYPE html>
<html>
	<head>
<style>
		.dl-menu.dl-animate-out-1 {
	animation: MenuAnimOut1 0.4s linear forwards;
}

@keyframes MenuAnimOut1 {
	50% {
		transform: translateZ(-250px) rotateY(30deg);
	}
	75% {
		transform: translateZ(-372.5px) rotateY(15deg);
		opacity: .5;
	}
	100% {
		transform: translateZ(-500px) rotateY(0deg);
		opacity: 0;
	}
}

.dl-menu.dl-animate-in-1 {
	animation: MenuAnimIn1 0.3s linear forwards;
}

@keyframes MenuAnimIn1 {
	0% {
		transform: translateZ(-500px) rotateY(0deg);
		opacity: 0;
	}
	20% {
		transform: translateZ(-250px) rotateY(30deg);
		opacity: 0.5;
	}
	100% {
		transform: translateZ(0px) rotateY(0deg);
		opacity: 1;
	}
}
</style>
<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>

<div id="dl-menu" class="dl-menuwrapper">
   <button class="dl-trigger">Open Menu</button>
	<ul class="dl-menu">
		'.$html.'
	</ul>
</div><!-- /dl-menuwrapper -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="js/jquery.dlmenu.js"></script>
<script type="text/javascript">
$( "#dl-menu" ).dlmenu();
</script>

</body>
</html>
';



/* TEMPLATE:
echo '
<div id="dl-menu" class="dl-menuwrapper">
	<button class="dl-trigger">Open Menu</button>
	<ul class="dl-menu">
		<li>
			<a href="#">Item 1</a>
			<ul class="dl-submenu">
				<li><a href="#">Sub-Item 1</a></li>
				<li><a href="#">Sub-Item 2</a></li>
				<li><a href="#">Sub-Item 3</a></li>
				<li>
					<a href="#">Sub-Item 4</a>
					<ul class="dl-submenu">
						<li><a href="#">Sub-Sub-Item 1</a></li>
						<li><a href="#">Sub-Sub-Item 2</a></li>
						<li><a href="#">Sub-Sub-Item 3</a></li>
					</ul>
				</li>
				<li><!-- ... --></li>
				<!-- ... -->
			</ul>
		</li>
		<li><!-- ... --></li>
		<li><!-- ... --></li>
		<!-- ... -->
	</ul>
</div><!-- /dl-menuwrapper -->

'; 
*/
