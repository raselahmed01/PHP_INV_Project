<?php 

/**
 * 
 */
class Manage
{
	
	private $con;
	function __construct()
	{
		include_once("../database/db.php");
		$db=new Database();
		$this->con=$db->connect();
	}

	public function manageRecordWithPagination($table,$pno)
	{	
		$a=$this->pagination($this->con,$table,$pno,5);
		if ($table=="categories"){
			$sql="SELECT p.category_name as category,c.category_name as parent,p.cid,p.status FROM categories p LEFT JOIN categories c ON p.parent_cat=c.cid ".$a["limit"];
		}
		$result=$this->con->query($sql)or die($this->con->error);
		$rows=array();
		if($result->num_rows > 0){
			while($row=$result->fetch_assoc()){
				$rows[]=$row;
			}
		}
		return ["rows"=>$rows,"pagination"=>$a["pagination"]];
	}

	private function pagination($con,$table,$pno,$n)
	{
		$query=$con->query("SELECT COUNT(*) as rows FROM ".$table);
		$row=mysqli_fetch_assoc($query);
		// $totalRecords=100;
		$pageno=$pno;
		$numberOfRecordPerPage=$n;

		$last=ceil($row["rows"]/$numberOfRecordPerPage);
		$pagination="<ul class='pagination'>";

		if($last!=1){
			if($pageno>1){
				$previous="";
				$previous=$pageno-1;
				$pagination.= "<li class='page-item'><a class='page-link' pn='".$previous."' href='#' style='color:#333;'>Previous</a></li>";

			}
			for($i=$pageno-5;$i<$pageno;$i++){
				if($i>0){
					$pagination 	.="<li class='page-item'><a class='page-link' pn='".$i."'href='#'> ".$i." </a><li>";
				}
				
			}

			$pagination.= "<li class='page-item'><a class='page-link' pn='".$pageno."' href='#' style='color:#333;'> $pageno </a></li>";

			for ($i=$pageno+1; $i <=$last ; $i++) { 
				$pagination.= "<li class='page-item'><a class='page-link' pn='".$i."' href='#'> ".$i." </a></li>";	
				if($i > $pageno +4){
					break;
				}
				
			}

			if($last>$pageno){
				$next=$pageno+1;
				$pagination.= "<li class='page-item'><a class='page-link' pn='".$next."' href='#' style='color:#333;'>Next</a></li></ul>";
			}

			$limit="LIMIT ".($pageno-1)*$numberOfRecordPerPage.",".$numberOfRecordPerPage;
			return ["pagination"=>$pagination,"limit"=>$limit];
		}
	
	}


	public function deleteRecord($table,$pk,$id)
	{
		if($table == "categories"){
			$pre_stmt=$this->con->prepare("SELECT ".$id." FROM categories WHERE parent_cat = ?");
			$pre_stmt->bind_param("i",$id);
			$pre_stmt->execute();
			$result=$pre_stmt->get_result() or die($this->con->error);

			if($result->num_rows > 0){
				return "DEPENDENT_CATEGORY";
			}

			else{
				$pre_stmt=$this->con->prepare("DELETE FROM ".$table." WHERE ".$pk." =?");
				$pre_stmt->bind_param("i",$id);
				$result = $pre_stmt->execute() or die ($this->con->error);
				
				if($result){
					return "CATEGORY_DELETED";
				}
			}
		}
		else{
			$pre_stmt=$this->con->prepare("DELETE FROM ".$table." WHERE ".$pk." =?");
			$pre_stmt->bind_param("i",$id);
			$result = $pre_stmt->execute() or die ($this->con->error);			
			if($result){
				return "DELETED";
			}
		}
	}









}//end class


// $obj=new Manage();
// echo $obj->deleteRecord("categories","cid",1);
// echo "<pre>";

// print_r($obj->manageRecordWithPagination('categories',1));












?>