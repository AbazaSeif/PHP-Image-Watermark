<?php 
	
	$imagem = "php.png";
	$mini = "mini.png";

	list($largura_original, $altura_original) = getimagesize($imagem);
	list($largura_mini, $altura_mini) = getimagesize($mini);

	$imagem_final = imagecreatetruecolor($largura_original, $altura_original);
	
	$imagem_original = imagecreatefrompng($imagem);
	$imagem_mini = imagecreatefrompng($mini);

	imagealphablending($imagem_final, false);
	imagesavealpha($imagem_final, true);

	imagecopy($imagem_final, $imagem_original, 0, 0, 0, 0, $largura_original, $altura_original);
	imagecopy($imagem_final, $imagem_mini, ($largura_original - $largura_mini - 50), 
										   ($altura_original - $altura_mini- 50), 
										   0, 0, $largura_mini, $altura_mini);

	header("Content-Type: image/png");
	
	//This line just exhibits the image on the browser
	imagepng($imagem_final, null);

	// This line saves the new watermarked image
	imagepng($imagem_final, "watermarked.png");
 ?>