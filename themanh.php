<?php 
	if(isset($_POST['them'])){
			$tenmaychu='localhost';
			$tentaikhoan='root';
			$matkhau='';
			$csdl='ansama';
			$con=mysqli_connect($tenmaychu,$tentaikhoan,$matkhau,$csdl);
			$sql= "SELECT * FROM anh";
			$run=mysqli_query($con, $sql);
			$i=0;
			$id=$_POST['id'];
			foreach($_FILES['file']['name'] as $i => $name){
				$name= $_FILES['file']['name'][$i];
				$type= $_FILES['file']['type'][$i];
				$size= $_FILES['file']['size'][$i];
				$tmp= $_FILES['file']['tmp_name'][$i];
				
				//tách đuôi
				$explode= explode('.',$name);
				$ex= end($explode);
				$path='uploads/';
				$path=$path . basename($explode[0].time().'.'.$ex);
				$hinhanhsp= basename($explode[0].time().'.'.$ex);
				$thongbao=array();
				
			if(empty($tmp)){
				echo $thongbao[]='Hay chon 1 file!';
			}else{
				$chophep=array('jpg','img','gif');
				$max_size=400000000;
				if(in_array($ex,$chophep) === false){
					echo $thongbao[]='File nhu lone';
				}else if($size > $max_size){
					echo $thongbao[]='File to vay ai choi';
				}
			}if(empty($thongbao)){
				if(!file_exists('uploads')){
					mkdir('uploads',0777);
				}
				if(move_uploaded_file($tmp,$path)){
					echo 'Upload thanh cong';
					mysqli_query($con,"INSERT INTO anh(id,hinhanh) VALUES('$id','$hinhanhsp')");
					header('location:../ansama/hinhanh.php');
				}
			}
		}
	}
?>