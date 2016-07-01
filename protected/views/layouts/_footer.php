<!-- Footer -->
<footer class="footer-dark">
    <div class="container">
        <div class="row">
            <!-- Contact Us -->
            <div class="col-sm-4">
                <h3 class="text-color"><span class="border-color"><?php echo Yii::t('app', 'ติดต่อเรา'); ?></span></h3>
                <div class="content">
                    <p>
                        <?php echo Yii::app()->params['contact']['address']; ?><br />
                        <i class="fa fa-fax"></i> Fax: <?php echo Yii::app()->params['contact']['fax']; ?><br />
                        <i class="fa fa-phone-square"></i> Phone: <?php echo Yii::app()->params['contact']['phone']; ?><br />
                        <i class="fa fa-envelope"></i> Email<span class="hidden-sm">: <a href="mailto:<?php echo Yii::app()->params['contact']['email']; ?>" class="first-child"><?php echo Yii::app()->params['contact']['email']; ?></span></a>
                    </p>
                </div>
            </div>
            <!-- Social icons -->

            <!--Follow me : this time #Piyamas-->
            <div class="col-sm-4">
                <h3 class="text-color"><span><?php echo Yii::t('app', 'ติดตามเรา'); ?></span></h3>
                <div class="content social">
                    <ul class="list-inline">
                        <!--<li><a href="<?php echo Yii::app()->params['social']['twitter']; ?>" class="twitter"><i class="fa fa-twitter"></i></a></li>-->
                        <li><a href="<?php echo Yii::app()->params['social']['facebook']; ?>" class="facebook"><i class="fa fa-facebook"></i></a></li>
                        <!--<li><a href="<?php echo Yii::app()->params['social']['instagram']; ?>" class="instagram"><i class="fa fa-instagram"></i></a></li>-->
                    </ul>
                    <div class="clearfix"></div>
                </div>
            
        </div>
        <div class="row">
            <div class="col-sm-12">
                <hr>
            </div>
        </div>

        <!-- Copyrights -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <p>&copy; Copyright 2014-2015 by <a href="<?php echo Yii::app()->request->baseUrl; ?>/"> <?php echo Yii::app()->params['title'] ?></a> Rajamangala University of Technology Suvarnabhumi All rights reserved.</p>
                </div>
                <!-- <div class="col-sm-6">
                    <p class="pull-right">
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/site/setlanguage?lang=th"><?php echo Yii::t('home','flag_th'); ?></a> |
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/site/setlanguage?lang=en"><?php echo Yii::t('home','flag_en'); ?></a>
                    </p>
                </div> -->
            </div>
        </div>
    </div>
</footer>
<?php //include "_toggle_style.php" ?>
<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/scrolltopcontrol.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.sticky.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/lightbox-2.6.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/custom.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/highlightjs/highlight.pack.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
<script type="text/javascript">
    // (function () {
          
    //   $('form').on('submit',function(e){
    //     e.preventDefault();
    //     var dat = $(this).serialize(),
    //       act = $(this).attr('action'),
    //       tid = $(this).attr('id');
    //     $.ajax({
    //       url:act,
    //       data:dat,
    //       type:'POST',
    //       dataType:'html',
    //       success:function(res){
    //         $("#"+tid).html($("#"+tid,res).html());
    //       },
    //     });
    //   })
    // })();
</script>
<script type="text/javascript">
    // var ua = navigator.userAgent.toLowerCase(),
    // platform = navigator.platform.toLowerCase();
    // platformName = ua.match(/ip(?:ad|od|hone)/) ? 'ios' : (ua.match(/(?:webos|android)/) || platform.match(/mac|win|linux/) || ['other'])[0],
    // isMobile = /ios|android|webos/.test(platformName);
    // if (!isMobile) {
    // var FHChat = {product_id: "ad0d6d1fa0a6"};
    // FHChat.properties={};FHChat.set=function(key,data){this.properties[key]=data};FHChat.customAttributes=[];FHChat.sendCustomAttributes=function(data){this.customAttributes.push(data)};!function(){var a,b;return b=document.createElement("script"),a=document.getElementsByTagName("script")[0],b.src="https://chat-client-js.firehoseapp.com/chat-min.js",b.async=!0,a.parentNode.insertBefore(b,a)}();
    // }
</script>
<script>
    // (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    // (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    // m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    // })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    
    // ga('create', 'UA-53268836-1', 'auto');
    // ga('send', 'pageview');
    
</script>
