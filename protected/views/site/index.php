<div class="container">

<div class="text-center">
    <center><h3><b><p class="bg-success"><i class="fa fa-star"></i> งานอาคารสถานที่ มหาวิทยาลัยเทคโนโลยีราชมงคลสุวรรณภูมิ ศูนย์วาสุกรี ยินดีต้อนรับ <i class="fa fa-star"></i></p></b></h3></center>
</div>

<div class="text-left">
    <b><h4><p class="bg-danger">&nbsp;<i class="fa fa-tags"></i> ข้อกำหนดและเงื่อนไขของหน่วยงาน </p></h4></b>
        <h5><p class="bg-warning">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-hand-o-right"></i> กรุณาตรวจสอบข้อมูลอาคารสถานที่และปฎิธินการใช้งานก่อนทำการขอใช้ทุกครั้ง</br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-hand-o-right"></i> กรุณาจองอาคารสถานที่ล่วงหน้า 2 วัน เพื่อการดำเนินการอนุมัติ</br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-hand-o-right"></i> กรุณากรอกข้อมูลให้ถูกต้องและครบถ้วนเพื่อความสะดวกในการติดต่อ</br> 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-hand-o-right"></i> หากต้องการยกเลิกการขอใช้ให้ติดต่อเจ้าหน้าที่เพื่อทำการยกเลิก โทร: 095-7673547</br> 

        </p></h5>
</div>

<!-- <span class="label label-default">Default</span> -->
<!-- <span class="label label-primary">Primary</span> -->
</br>
<span class="label label-success">อนุมัติ</span>
<span class="label label-warning">หัวหน้างานอนุมัติ</span>
<span class="label label-info">รอดำเนินการ</span>
<span class="label label-danger">ไม่อนุมัติ</span>
</br>
</br>

<div class="table-responsive">
<?php 

$this->widget('ext.EFullCalendar.EFullCalendar', array(
    // polish version available, uncomment to use it
    'lang'=>'th',
    // you can create your own translation by copying locale/pl.php
    // and customizing it
 
    // remove to use without theme
    // this is relative path to:
    // themes/<path>
    //'themeCssFile'=>'cupertino/theme.css',
 
    // raw html tags
    'htmlOptions'=>array(
        // you can scale it down as well, try 80%
        'style'=>'width:100%'
    ),
    // FullCalendar's options.
    // Documentation available at
    // http://arshaw.com/fullcalendar/docs/
    'options'=>array(
        'header'=>array(
            'left'=>'prev,next',
            'center'=>'title',
            // 'right'=>'today'
            'right'=>'today,month,agendaWeek,agendaDay'
        ),
        'lazyFetching'=>true,
        'events'=>Yii::app()->request->baseUrl.'/site/CalendarEvents', // action URL for dynamic events, or
 
        // event handling
        // mouseover for example
        //'eventMouseover'=>new CJavaScriptExpression("js_function_callback"),
    )
));

?>
</div>
</br>
<div class="text-center">
<a target=_blank href="<?php echo Yii::app()->request->baseUrl; ?>/reservations/create" class="btn btn-primary btn-md" role="button" style="color:#fff;"><i class="fa fa-plus-square"></i> ยื่นคำร้องขอใช้บริการ</a>
</div>
<!--target=_blank เปิดแท็ปใหม่-->
</br>
</div>
