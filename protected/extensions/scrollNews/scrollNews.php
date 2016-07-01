// <?php?
// class scrollNews extends Cwidget
// {
// 	public $sNews="";//ประกาศตัวแปรเพื่อรับข่าวที่จะส่งมาแสดง
// 	public function init() //ฟังก์ชันที่ถูกเรียกเมื่อเรียกใช้งาน Widget
// 		{
// 			parent::init();//<--ส่งการทำงานกลับไปยังโปรแกรมหลัก (หน้าเว็ปที่เรียกใช้ Widget นี้)
// 		}	
// 	public function run()//ฟังก์ชันถูกเรียกใช้เมื่อ Widget ต้องการแสดงผล
// 		{
		
// 			$html="<marquee>".$this->sNews."</marquee>";//เขียน HTML เพื่แสดงผลลัพธ์
// 			echo $html;
// 			parent::run();//<-- ส่งการทำงานกลับไปยังโปรแกรมหลัก (หน้าเว็ปที่เรียกใช้ Widget นี้)
// 		}
// }
// >