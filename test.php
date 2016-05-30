<html>
  <head>
  	<meta charset="utf-8">
  	<link rel="stylesheet" type="text/css" href="complex.css">
    <title>Complex</title>
  </head>
  <body>
  		<br>
  	<h1>ComplexManager</h1>
  	<div id="form">
  	<center>
    <form method="POST">
      <p>Partie réel:</p>
      <input type = 'text' name = 'reel'>
      <br><br>
      <p>Partie imaginaire:</p>
      <input type = 'text' name = 'imag'>
      <br><br>
      <input type = "submit" class = "button" value = "Valider" name="ok">
    </form>
    </center>
    </div>
    <?php
    if ($_POST['ok'])
    {
			$reel = $_POST['reel'];
	 		$imag = $_POST['imag'];
	 		if(!$reel)
	 			$reel = 0;
	 		if(!$imag)
	 			$imag = 0;
	 		if ($reel != "" || $imag != "")
	 		{
		 		if ((is_numeric($reel) || $reel == "") && (is_numeric($imag) || $imag == ""))
		 		{
		 			$mod = sqrt($reel*$reel+$imag*$imag);
			 		if ($reel != 0)
					{
						$inv = $reel/($reel*$reel+$imag*$imag);
						$cplx = $reel;
						$conj = $reel;
						$arg = acos($reel/$mod);
					}
					if ($imag != 0)
					{
						$invI = $imag/($reel*$reel+$imag*$imag);
						$invI *= -1;
						if (is_null($cplx))
						{	 
							$arg = asin($imag/$mod);
							$cplx = $imag." i";
							$inv = $invI." i";
							$conj = $imag*(-1)." i";
				 		}
						else
				 		{
				 			if($imag < 0)
						    {
						    	$cplx = $cplx." - ".$imag*(-1)." i";
						    	$conj = $conj." + ".$imag*(-1)." i";
						    	$inv = $inv." + ".$invI." i";
						    	$arg *= -1;
						    }
						    elseif ($imag > 0)
						    {
							   	$cplx = $cplx." + ".$imag." i";
							   	$conj = $conj." - ".$imag." i";
							   	$invI *= -1;
							   	$inv = $inv." - ".$invI." i";
						    }
						}
					}
					if (is_null($cplx))
					{
						$cplx = 0;
						$conj = 0;
						$inv = "INF";
					}
					$arg /= pi();
					if ($arg != 0)
						$arg = $arg." pi";
					if ($mod == 0)
						$trigo = 0;
					else
						$trigo = $mod." ( cos ".$arg." + i sin ".$arg." )";
				print "<br>";
				print "<hr>";
				print "<h2>Résultat</h2>";
		 		print "<div id='resultat'>";
				print "<br>";
		 		print "<div id='reel'>Partie réelle: $reel</div>";
		 		print "<br>";
		 		print "<div id='imag'>Partie imaginaire: $imag</div>";
		 		print "<br>";
			    print "<div id='complexe'>Complexe: $cplx</div>";
			    print "<br>";
			    print "<div id='conjugue'>Conjugué: $conj</div>";
			    print "<br>";
			    print "<div id='inverse'>Inverse: $inv</div>";
			    print "<br>";
			    print "<div id='module'>Module: $mod</div>";
			    print "<br>";
			    print "<div id='argument'>Argument: $arg</div>";
			    print "<br>";
			    print "<div id='trigo'>Forme trigonométrique: $trigo</div>";
		 		print "<br>";
			    print "</div>";
			    print "<div class='graph'>";
		 		print "<h2>Graphique</h2>";
			    print "<canvas id='graph' width='510' height='510'></canvas>";
			    print "<script>
			    		var c = document.getElementById('graph');
			    		var absc = c.getContext('2d');
			    		absc.moveTo(5,255);
			    		absc.lineTo(505,255);
			    		absc.stroke();
			    		var ord = c.getContext('2d');
			    		ord.moveTo(255,5);
			    		ord.lineTo(255,505);
			    		ord.stroke();
			    		for (i=5;i<=505;i=i+25)
			    		{
			    			var grad=c.getContext('2d');
			    			grad.moveTo(i,245);
			    			grad.lineTo(i,265);
			    			grad.lineWidth = 1;
			    			grad.stroke();
			    		}
			    		for (i=5;i<=505;i=i+25)
			    		{
			    			var grad=c.getContext('2d');
			    			grad.moveTo(245,i);
			    			grad.lineTo(265,i);
			    			grad.lineWidth = 1;
			    			grad.stroke();
			    		}
			    		var reel = $reel*25+255;
			    		var imag = $imag*(-25)+255;
			    		grad.fillStyle = '#FF0000';
			    		grad.fillRect(reel-6,imag-1,13,3);
			    		grad.fillRect(reel-1,imag-6,3,13);
			    		var mod=c.getContext('2d');
			    		mod.beginPath();
			    		mod.moveTo(255,255);
		    			mod.lineTo(reel, imag);
		    			mod.lineWidth = 2;
		    			mod.strokeStyle = '#2ca5f5';
		    			mod.stroke();
			    		</script>";
			    		print "</div>";
		 		}
		 		else
		 			print "<script>alert('Ce ne sont pas des nombres!!');</script>";
	 		}
	 		else
	 			print "<script>alert('Remplissez au moins un champs!!');</script>";
    }
		?>
  </body>
</html>