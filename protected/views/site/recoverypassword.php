<div class="container" >
	<div class="row">
      <div class="col-sm-12">
        
      </div>
    </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-sm-3">
      <div class="team-member user-avatar text-center">
        <?php echo CHtml::image(Load::Picture($data->picture),"picture",array("class"=>"img-responsive center-block")); ?>
        <?php echo $data->display_name; ?>
        <p class="text-muted"><?php echo Load::UserLevel($data->level_user); ?></p>
      </div>
    </div>
    <div class="col-sm-9">
      <div class="row">
        <div class="col-sm-12">
		  <h2 class="text-color"><?php echo Yii::t('app','Recovery Password'); ?></h2>
        <p class="text-muted"><?php echo Yii::t('app','We have been sent new password to '); ?>
		  <i class="fa fa-envelope"></i> Email : <span class="text-muted"><?php echo CHtml::mailto($data->email, $data->email); ?></span></p>
		  
		  
		</div>
        <div class="col-sm-12">
          <hr class="arrow-down">
          
        </div>
      </div>
    </div>
  </div> <!-- / .row -->
</div>


