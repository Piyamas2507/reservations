<div class="container text-center">
</br>
</br>
<div class="text-right">วันที่ : <?php echo Load::DateFormat(date('d-m-Y')); ?></div>
<?php
$data = Locations::model()->findAll();

foreach ($data as $key => $value) {
    $location[] = Locations::model()->findByPk($value->id)->name;

    //if( $reservations = Reservations::model()->findAll('location_id='.$value->id.' '));
    if( $reservations = Reservations::model()->findAll('location_id='.$value->id.' '.$datestart.' '.$dateend.' '.$status));
    $total = 0;
    foreach ($reservations as $key => $value) {
        $total = $total + 1;
    }
    $count[] = $total;
}

?>
<div class="container text-center">
<?php 
if($status)
$this->title='รายงานสถิติการใช้บริการ อาคารสถานที่';
else
$this->title='รายงานสถิติคำร้องขอใช้บริการ อาคารสถานที่';    
 ?>

<div class="container">
    <div class="text-center">
        <img src="<?php echo Yii::app()->theme->baseUrl.'/img/logo_rmutsb.jpg'; ?>" style="height:100px;"/>
    </div>
<h5><?php echo $this->title; ?></h5>
<!-- <h5>รายการคำร้องทั้งหมด : <?php echo Load::ReservationsTotal(); ?> รายการ</h5> -->
<p>ตั้งแต่วันที่ <?php echo Load::DateFormat($start).' - '.Load::DateFormat($end); ?></p>
<div id="reservations-grid" class="grid-view">
  <table class="table table-bordered pdf">
<thead>
<tr>
<th class="text-center">อาคารสถานที่</th><th class="text-center">จำนวนครั้ง</th></tr>
</thead>
<tbody>
<?php 
    $i = 0;
        foreach ($location as $key => $value) {
            echo '<tr class="odd"><td>'.$value.'</td><td>'.$count[$i].'</td></tr>';
        $i = $i + 1;
    }
?>


</tbody>
</table> <div class="keys" style="display:none" title="/reservations/reservations/reportuse"><span>1</span><span>2</span><span>3</span><span>4</span></div>
</div>

</div>