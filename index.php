<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>O que é melhor para você?</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<style type="text/css">
		@font-face {font-family: "Calibri";src: url("calibri.ttf") format("truetype");}
		body {margin: 0;padding: 0;height: auto;width: 100%;overflow: auto;background-color: #FFF;background-image: url(wallpaper.jpg);background-repeat: repeat;background-position: center center;font-family: Calibri, Arial, Helvetica, sans-serif;}
		#container {background-image: url(container-bg.png);background-repeat: repeat;padding: 10px;height: auto;width: auto;overflow: hidden;position: fixed;top: 50%;left: 50%;margin-top: -224px;margin-left: -382px;-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;box-shadow: #000 1px 1px 10px;}
			h1 {font-size: 30px;font-weight: bold;margin-bottom: 0;}
			h2 {font-size: 15px;font-weight: normal;color: #333;margin-top: 10px;margin-bottom: 30px;}
			form {margin-bottom: 30px;}
				input#name {border: solid 1px #CCC;padding: 7px 10px;-webkit-border-radius: 3px;-moz-border-radius: 3px;border-radius: 3px;width: 315px;font-size: 15px;}
				button#btn_submit {font: bold 15px Tahoma, Geneva, sans-serif;font-style: normal;color: #ffffff;background: #9baaba;border: 0px solid #ffffff;text-shadow: 0px 0px 0px #222222;box-shadow: 0px 0px 0px #000000;-moz-box-shadow: 0px 0px 0px #000000;-webkit-box-shadow: 0px 0px 0px #000000;border-radius: 3px 3px 3px 3px;-moz-border-radius: 3px 3px 3px 3px;-webkit-border-radius: 3px 3px 3px 3px;width: auto;padding: 7px 22px;cursor: pointer;margin: 0 auto;}
			iframe#can_text {height: 226px;width: 404px;border: none;float: left;overflow: none;background-image: url(cocacola.png);background-repeat: no-repeat;background-position: center center;border: solid 10px #FFF;-webkit-border-radius: 3px;-moz-border-radius: 3px;border-radius: 3px;	}
			#howtosave {float: right;width: 300px;height: auto;overflow: hidden;margin-left: 20px;}
	</style>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script type="text/javascript">
		function validate() {
			if ( $('#name').val().length <= 1 ) {
				alert('Escreva pelo menos 2 caracteres (10 no máximo)');
				return false;
			}
		}
	</script>
</head>
<body>
	<div id="container">
		<h1>O que é melhor para você?</h1>
		<h2>Crie uma lata personalizada para compartilhar no seu Facebook e dos seus amigos!</h2>
		
		<form method="post" action="cocacola.php" onsubmit="return validate()">
			<input type="text" id="name" name="name" value="" placeholder="O que é melhor para você?" maxlength="10" /> 
			<button type="submit" id="btn_submit" onclick="generate()">Criar lata</button>
		</form>
	
		<iframe id="can_text" frameborder="0" height="226" width="404"></iframe>
		
		<div id="howtosave">
			<b>Para salvar a imagem:</b>
			
			<br /><br />
			
			&bull; Clique na imagem com o botão direito do mouse
			<br /><br />
			&bull; Clique em "Salvar imagem como..." e escolha onde quer salvá-la no seu computador
			
			<br /><br />
			
			<b>Compartilhe com seus amigos!</b>
			
			<br /><br />
			
			<!-- AddThis Button BEGIN -->
			<!---->
			<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
				<a class="addthis_button_preferred_1"></a>
				<a class="addthis_button_preferred_2"></a>
				<a class="addthis_button_compact"></a>
				<a class="addthis_counter addthis_bubble_style"></a>
			</div>
			<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
			<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=moreirapontocom"></script>
			<!---->
			<!-- AddThis Button END -->

		</div><!-- end #howtosave -->
	</div><!-- end #container -->
</body>
</html>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-21832901-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
