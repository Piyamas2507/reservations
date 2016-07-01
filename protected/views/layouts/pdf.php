<?php
header("Content-Type:pdf;charset=utf-8");
$session=new CHttpSession;
$session->open();
?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>
		<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrapth.css" rel="stylesheet">
		<style type="text/css">
		body {
				font-family: 'THSaraban' !important;
				font-size: 10px;
			}

			td {
				padding: 3px;
			}
			th {
				padding: 5px;
			}

			</style>
	</head>

<body class="<?php echo $this->bodyColor; ?>" style="font-family:'THSaraban';">

		<?php echo $content; ?>

</body></html>  
