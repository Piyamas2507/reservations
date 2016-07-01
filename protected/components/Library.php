<?php
class Library {
	public static function filterPostalCode($string){
		
		$string = preg_replace("`\[.*\]`U","",$string);
		$string = preg_replace('`&(amp;)?#?[a-z0-9]+;`i','-',$string);
		$string = str_replace('%', '-percent', $string);
		$string = htmlentities($string, ENT_COMPAT, 'utf-8');
		$string = preg_replace( "`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i","\\1", $string );
		$string = preg_replace( array("`[^a-z0-9ก-๙เ-า]`i","`[-]+`") , "-", $string);
		$string = strtolower(trim($string, '-'));

		return $string;		
	}

    
	public static function facebook($link){
	echo '<div class="fb-comments" data-href="'.$link.'" data-width="630" data-numposts="10" data-colorscheme="light"></div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=562361790483683";
  fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));</script>
';
	}

	// public static function matric($size){
	// 	return $size. ' เมตร';
	// }
    
    public static function volumn($volumn){
		return $volumn. ' คน';
	}

	public static function Status($id){
        if ($id==0){
            echo '<span class="label label-info">รอดำเนินการ</span>';
        }
        if ($id==1){
            echo '<span class="label label-danger">ไม่อนุมัติ</span>';
        }
        
        if ($id==2){
            echo '<span class="label label-warning">หัวหน้างานอนุมัติ</span>';
        }

        if ($id==3){
            echo '<span class="label label-success">ผ่านการอนุมัติ</span>';
        }
    }

public static function locationstatus($id){
        if ($id==0){
            echo '<span class="label label-danger">ไม่พร้อมใช้งาน</span>';
        }
        if ($id==1){
            echo '<span class="label label-success">พร้อมใช้งาน</span>';
        }
    }

public static function reservationstatus($id){
        if ($id==1){
            echo 'บุคคลภายใน';
        }
        if ($id==2){
            echo 'บุคคลภายนอก';
        }
    }

    // public static function Detail($id){
    // 	$data=Reservations::model()->findByPk($id);
    // 	$location=Locations::model()->findByPk($data->location_id)->name;
    // 	$datestart=Load::DateFormat($data->datestart);
    // 	$dateend=Load::DateFormat($data->dateend);    	
    // 	echo "$location <br/> ตั้งแต่ $data->datestart เวลา $data->timestart น. ถึง $data->dateend เวลา $data->timeend น.";
    // }
    //โชว์หน้าปฎิธิน
    public static function Detail($id){
      $data=Reservations::model()->findByPk($id);
      $location=Locations::model()->findByPk($data->location_id)->name;
      $datestart=Load::DateFormat($data->datestart);
      $dateend=Load::DateFormat($data->dateend);      
      echo "$location <br/> $datestart เวลา $data->timestart น. - $dateend เวลา $data->timeend น.";
    }

    public static function Create_date($id){
      $data=Users::model()->findByPk($id);
      $create_date=Load::DateFormat($data->create_date);     
      echo "$create_date";
    }

    //  public static function Detail2($id){
    //     $location=Locations::model()->findByPk($data->location_id)->name;     
    //     echo "$location";
    // }

    public static function Janitor($id){
        if (Janitors::model()->findByPk($id)){
        $janitor = Janitors::model()->findByPk($id);
            return $janitor->title.' '.$janitor->name.' '.$janitor->lastname; 
        } else {
            return 'ยังไม่มีแม่บ้านดูแล';
        }
    }

   // public static function Locatepic($id){
   //      if (Locations::model()->findByPk($id)){
   //      $locatepic = Locations::model()->findByPk($id);
   //          return $locatepic->name; 
   //      } else {
   //          return 'ไม่มีข้อมูล';
   //      }
   //  }




}