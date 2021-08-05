<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Auto-transcription</title>
  </head>
  <body>
  	<div class="container">
    	<div class="content-wrapper">
    		<div class="col-md-8 mx-auto mt-5">
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<input type="file" name="audiofile" id="file" accept="audio/wav">
					</div>
					<button type="submit" class="btn btn-primary" name="transcribe"><i class=""></i>Transcribe!</button>
					<hr>
				</form>
				<?php 
					if (isset($_POST['transcribe'])) {
						$audio = $_FILES['audiofile']['name'];
						if (move_uploaded_file($_FILES['audiofile']['tmp_name'], 'audio/'.$audio)) {
							$result = shell_exec("python C:/laragon/www/transcribeme/audio/transcribe.py " . escapeshellarg($audio));
							echo '<p>'.trim($result).'</p>';
						}
						else {
							die("Cannot save file.");
						}
					}
				?>
			</div>
    	</div>
    </div>
  </body>
</html>
