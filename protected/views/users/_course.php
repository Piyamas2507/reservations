<tr>
  <td>
    <a href="<?php echo Yii::app()->request->baseUrl.'/course/view/'.$data->course_id ?>">
      <img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl;?><?php echo LoadCourse::Detail($data->course_id)->picture ?>" alt="...">
    </a>
    <div class="item">
      <a href="<?php echo Yii::app()->request->baseUrl.'/course/view/'.$data->course_id ?>"><?php echo LoadCourse::Detail($data->course_id)->title ?></a>
      <p class="text-muted"><?php echo Yii::t('app', 'Register Date :'); ?><?php echo Load::DateFormat($data->create); ?></p>
<?php $model = LoadCourse::ConfirmPayment($data->id);
    foreach($model as $dataCP) 
        {
            echo 'การแจ้งชำระเงิน : [ '.Load::DateFormat($dataCP->date).' '.$dataCP->hour.':'.$dataCP->min.' ]  ';
            if ($dataCP->comment=='1'){
            echo  '<span class="label label-success">'.Yii::t('app','Approve').'</span>';
            } else if ($dataCP->comment=='0'){
            echo  '<span class="label label-danger">'.Yii::t('app', 'Denine').'</span>';
            } else {
            echo '<span class="label label-info">'.$dataCP->comment.'</span>';
            }
            
        } 
?>
    </div>
  </td>
  
  <td><?php echo $data->status?
                  '<h4><span class="label label-success">'.Yii::t('app','Paid').'</span></h4>':
                  '<h4><span class="label label-warning">'.Yii::t('app', 'Unpaid').'</span></h4>'; ?></td>
  

</tr>