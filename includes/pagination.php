<?php 


$con=mysqli_connect("localhost","root","","test");

function pagination($con,$table,$pno,$n){
	$totalRecords=100;
	$pageno=$pno;
	$numberOfRecordPerPage=$n;

	$last=ceil($totalRecords/$numberOfRecordPerPage);
	$pagination="";

	if($last!=1){
		if($pageno>1){
			$previous="";
			$previous=$pageno-1;
			$pagination.= "<a href='pagination.php?pageno=".$previous."' style='color:#333;'>Previous</a>";

		}
		for($i=$pageno-5;$i<$pageno;$i++){
			if($i>0){
				$pagination 	.="<a href='pagination.php?pageno=".$i."'> ".$i." </a>";
			}
			
		}

		$pagination.= "<a href='pagination.php?pageno=".$pageno."' style='color:#333;'> $pageno </a>";

		for ($i=$pageno+1; $i <=$last ; $i++) { 
			$pagination.= "<a href='pagination.php?pageno=".$i."'> ".$i." </a>";	
			if($i > $pageno +4){
				break;
			}
			
		}

		if($last>$pageno){
			$next=$pageno+1;
			$pagination.= "<a href='pagination.php?pageno=".$next."' style='color:#333;'>Next</a>";
		}

		$limit="Limit".($pageno-1)*$numberOfRecordPerPage.",".$numberOfRecordPerPage;
		return ["pagination"=>$pagination,"limit"=>$limit];
	}
	
}

if(isset($_GET["pageno"])){
	$pageno=$_GET["pageno"];
	echo "<pre>";
	print_r(pagination($con,"xxx",$pageno,"10"));
}


?>