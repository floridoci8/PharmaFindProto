<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style.css">
<title>PharmaFind</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

</style>
</head>
<body>

<div class="header">
<h1>PharmaFind</h1>
</div>

<div>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<input type="text" placeholder="search medicine" name="medicinesearch">
	<!--<input type="submit" style="display:none">-->
</form>


<!-- search -->
<p class="main">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	//input medicine
	$name = htmlspecialchars($_REQUEST['medicinesearch']);
	
	//medicine "database", medicine => pharmacies
	$medicine = array("aspirin" => array("Delfin Apotheke","Albert Apotheke"), 
	"anaesthetic" => array("Raths-Apotheke","Vital Apotheke","Delfin Apotheke"),
	"antibiotic" => array("Delfin Apotheke","Albert Apotheke"), 
	"antifungal" => array("Kronen Apotheke"),
	"antianxiety" => array("Kronen Apotheke","a","Raths-Apotheke"));
	
	//shops "database", shop => "distance to user's location"
	$shops = array("Delfin Apotheke" => 15, "Kronen Apotheke" => 23,
	"Raths-Apotheke" => 10, "Albert Apotheke" =>25, "Vital Apotheke" =>30);
	
	//sort shops by "distance to user's location"
	asort($shops);
	
	//search for the input in medicine
	foreach($medicine as $x => $z) {
		if ($x === $name) {
			global $y;
			$y = $z;
		}
	}
	
	foreach($shops as $x => $z) {
		foreach($y as $w) {
			if ($x == $w) {
				echo $x. " is in " .$z. " km distance, and has ". $name. "."?>
				</p><p class="main">
				<?php
			}
		}
	}
}
?>
</p>
</div>

<div class="footer">
<p>By: Aron Jinga, Edwin Agbakpe, Eglis Balani, Flori Doci</p>
</div>




</body>
</html>