	<!-- Google Authorship and Publisher Markup -->
	<link rel="author" href="<?php echo Yii::app()->params['social']['gplus'] ?>"/>
	<link rel="publisher" href="https://plus.google.com/[Google+_Page_Profile]"/>

	<!-- Schema.org markup for Google+ -->
	<meta itemprop="name" content="<?php echo ($this->title=='')? Yii::app()->params['title'] : $this->title ; ?>">
	<meta itemprop="description" content="<?php echo ($this->description=='')? Yii::app()->params['description'] : $this->description ; ?>">
	<meta itemprop="image" content="<?php echo $this->socialImage; ?>">

	<!-- Twitter Card data -->
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@iGammy">
	<meta name="twitter:title" content="<?php echo ($this->title=='')? Yii::app()->params['title'] : $this->title ; ?>">
	<meta name="twitter:description" content="<?php echo ($this->description=='')? Yii::app()->params['description'] : $this->description ; ?>">
	<meta name="twitter:creator" content="@iGammy">
	<!-- Twitter summary card with large image must be at least 280x150px -->
	<meta name="twitter:image:src" content="<?php echo $this->socialImage; ?>">

	<!-- Open Graph data -->
	<meta property="og:title" content="<?php echo ($this->title=='')? Yii::app()->params['title'] : $this->title ; ?>" />
	<meta property="og:type" content="article" />
	<meta property="og:description" content="<?php echo ($this->description=='')? Yii::app()->params['description'] : $this->description ; ?>" />
	<meta property="og:site_name" content="<?php echo ($this->title=='')? Yii::app()->params['title'] : $this->title ; ?>" />
	<!-- <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> -->
	<!-- <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" /> -->
	<!-- <meta property="article:section" content="Article Section" /> -->
	<!-- <meta property="article:tag" content="Article Tag" /> -->
	<!-- <meta property="fb:admins" content="Facebook numberic ID" /> -->
