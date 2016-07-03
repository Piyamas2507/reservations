<?php $this->title= Yii::t('app', 'Contact us'). ' - rmutsb.ac.th'; ?>

<div class="container">
<div class="row">
  <div class="col-sm-7 contact-us-p">
    <h2 class="headline first-child text-color">
      <span class="border-color">สมัครสมาชิก</span>
    </h2>

    <form role="form" action="MAILTO:<?php echo Yii::app()->params['contact']['email']; ?>" method="post" enctype="text/plain">
      <div class="form-group">
        <label for="email"><?php echo Yii::t('app', 'Your email address'); ?></label>
        <input type="email" class="form-control" id="email" placeholder="<?php echo Yii::t('app', 'Enter email'); ?>" data-original-title="" title="">
      </div>
      <div class="form-group">
        <label for="name"><?php echo Yii::t('app', 'Your name'); ?></label>
        <input type="text" class="form-control" id="name" placeholder="<?php echo Yii::t('app', 'Enter name'); ?>" data-original-title="" title="">
      </div>
      <div class="form-group">
        <label for="message"><?php echo Yii::t('app', 'Your message'); ?></label>
        <textarea class="form-control" rows="3" id="message" placeholder="<?php echo Yii::t('app', 'Enter message'); ?>"></textarea>
      </div>
      <div class="form-group">
        <label for="exampleInputFile"><?php echo Yii::t('app', 'Upload file'); ?></label>
        <input type="file" id="exampleInputFile">
        <p class="help-block">Attach your file here.</p>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox"> <?php echo Yii::t('app', 'Send a copy to myself'); ?>
        </label>
      </div>
      <button type="submit" class="btn btn-lg btn-color"><?php echo Yii::t('app', 'Send Request'); ?></button>
    </form>
  </div>
  <div class="col-sm-5">
    <h2 class="headline first-child first-child-m text-color">
      <span class="border-color">SunBug</span>
    </h2>
    <p>
      318 หมู่ 15 ต.ขามใหญ่ อ.เมือง จ.อุบลราชธานี 34000<br>
      โทร: 0966598006<br>
      Email: <a href="mail:indywib@gmail.com">admin</a>
    </p>
    <h2 class="headline text-color">
      <span class="border-color">Google Map</span>
    </h2>
    <div class="map">
      <iframe src="https://www.google.com/maps/d/embed?mid=zamgyPvg2SAU.kYiaOR3EHU4E&ie=UTF8&msa=0&t=m&z=15" width="100%" height="300"></iframe>
    </div>
  </div>
</div>
</div>