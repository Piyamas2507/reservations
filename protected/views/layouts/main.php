<?php
header("Content-Type:text/html;charset=utf-8");
$session=new CHttpSession;
$session->open();
?>
<?php include "_header.php" ?>

<body class="<?php echo $this->bodyColor; ?>">

    <?php include "_extrabar.php" ?>

    <?php include "_navbar.php" ?>

    <!-- Wrapper -->
    <div class="wrapper">

		<?php echo $content; ?>

    </div> <!-- / .wrapper -->

    <?php include "_footer.php" ?>

</body></html>  
