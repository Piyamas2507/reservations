<?php
$data = Locations::model()->findAll();

foreach ($data as $key => $value) {
    $location[] = Locations::model()->findByPk($value->id)->name;

    if( $reservations = Reservations::model()->findAll('location_id='.$value->id.' AND status = 3'));
    $total = 0;
    foreach ($reservations as $key => $value) {
        $total = $total + 1;
    }
    $count[] = $total;
}

?>
<div class="container text-center">
<center><h3><b><p class="bg-success"><i class="fa fa-star"></i> สถิติการใช้งาน อาคารสถานที่ มหาวิทยาลัยเทคโนโลยีราชมงคลสุวรรณภูมิ ศูนย์วาสุกรี <i class="fa fa-star"></i></p></b></h3></center>

<?php 
    $this->widget(
        'chartjs.widgets.ChBars', 
        array(
            
            
            'htmlOptions' => array(),
            'labels' => $location,
            'datasets' => array(
                array(
                    "fillColor" => "rgba(220,220,220,0.5)",
                    "strokeColor" => "rgba(220,220,220,1)",
                    "data" => $count
                )       
            ),
            'options' => array(
                'scaleIntegersOnly'=>true,
                'showScale'=>true,
                'scaleFontSize'=> 18,
                'responsive'=>true,
                'scaleShowLabels'=>true,
                
                )
        )
    ); 
?>
</div>