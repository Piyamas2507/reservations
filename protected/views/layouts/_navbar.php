<div class="navbar navbar-white navbar-static-top" role="navigation">
    <div class="container">
        <!-- Navbar Header -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo Yii::app()->request->baseUrl; ?>/">
              <img src="<?php echo Yii::app()->theme->baseUrl.'/img/logo_rmutsb.png'; ?>" style="height:80px; margin-top:-30px;"/>
            </a>
        </div>
        <!-- / Navbar Header -->
        <?php 
            $page = $this->getId().'/'.Yii::app()->controller->action->id;
            ?>
        <!-- Navbar Links -->
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <?php $navigation=NavigationBar::model()->findAll(); ?>
                <?php foreach ($navigation as $key => $value) {
                    if($value->dropdown==0):
                    if($page === $value->url): echo '<li class="active">'; else: echo '<li>'; endif;
                    echo CHtml::link('<i class="fa '.$value->icon.'"></i> '.Yii::t('app',$value->name),array($value->url),array('class'=>'bg-hover-color')).'</li>';
                    elseif($value->dropdown==888):
                    echo '<li class="dropdown">
                                  <a href="'.$value->url.'" class="dropdown-toggle bg-hover-color" data-toggle="dropdown"><i class="fa '.$value->icon.'"></i> '.Yii::t('app',$value->name).'<b class="caret"></b></a>
                                  <ul class="dropdown-menu">';  
                            $criteria=new CDbCriteria();
                                  $criteria->addCondition('dropdown='.$value->id,'AND'); 
                                  $dropdown=NavigationBar::model()->findAll($criteria);
                                  foreach ($dropdown as $key => $value) {
                                    if($page === $value->url): echo '<li class="active">'; else: echo '<li>'; endif;
                                    echo CHtml::link(Yii::t('app',$value->name),array($value->url),array('class'=>'bg-hover-color')).'</li>';
                                  }
                    echo '</ul>
                                </li>';
                    endif;
                    }
                    ?>
                    
                <!-- กำหนดสิทธิ์ผู้ใช้งาน dropdown list -->
                <?php if(Yii::app()->user->isVIP() or Yii::app()->user->isAdmin() or Yii::app()->user->isEditor()): ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle bg-hover-color" data-toggle="dropdown"><i class="fa fa-wrench"></i> <?php echo Yii::t('app','จัดการข้อมูล'); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <?php
                            $criteria=new CDbCriteria();
                            $criteria->addCondition('dropdown=999','AND'); 
                            $dropdown=NavigationBar::model()->findAll($criteria);
                            foreach ($dropdown as $key => $value) {
                              if($page === $value->url): echo '<li class="active">'; else: echo '<li>'; endif;
                              echo CHtml::link(Yii::t('app',$value->name),array($value->url),array('class'=>'bg-hover-color')).'</li>';
                            }
                            ?>
                    </ul>
                </li>
                <?php endif; ?>
            </ul>
            <?php if(Yii::app()->user->isGuest): ?>
            <form class="navbar-form navbar-left visible-xs" method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/site/login">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input id="username" class="form-control" placeholder="Enter username or email" name="LoginForm[username]" type="text">        
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input id="password" class="form-control" placeholder="Enter password" name="LoginForm[password]" type="password">        
                </div>
                <div class="checkbox">
                    <label class="text-color">
                    <input id="ytLoginForm_rememberMe" type="hidden" value="0" name="LoginForm[rememberMe]"><input name="LoginForm[rememberMe]" id="LoginForm_rememberMe" value="1" type="checkbox"> Remember Me          </label>
                </div>
                <input class="btn btn-color" type="submit" name="yt0" value="Login">
            </form>
            <!-- / Search Form (xs) -->
            <?php else: ?>
            <ul class="nav navbar-nav navbar-right hidden-md hidden-lg hidden-sm">
                <li>
                    <?php echo CHtml::link('<i class="fa fa-sign-out"></i> '.Yii::t('app','Logout'),array('site/Logout'),array('class'=>'pull-right')); ?>
                    <?php echo CHtml::link(CHtml::image(Load::Picture(Yii::app()->user->detail->picture),"picture",array("width"=>"14px")).' '.Yii::app()->user->detail->display_name,array('users/profile'),array('class'=>'pull-right')); ?> 
                </li>
            </ul>
            <?php endif; ?>
        </div>
        <!-- / Navbar Links -->
    </div>
    <!-- / container -->
</div>
<!-- / navbar -->