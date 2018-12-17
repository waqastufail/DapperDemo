<?php
session_start();

class users {
	
	public $host = "localhost";
	public $username = "root";
	public $pass = "";
	public $dbname = "quiz_oops";
	public $conn;
	public $data;
	public $cat;
	public $qus;
	
	
	public function __construct()
	
	{
		$this->conn = new mysqli($this->host, $this->username, $this->pass, $this->dbname);
		if($this->conn->connect_errno)
		{
die ("Database Connection failed".$this->conn->connect_errno);
		}	
		
	}
	
	public function signup($data)
	
	{
		
		$this->conn->query($data);
		return true;
		
	}
	public function signin($email, $pass)
	{
	$query = $this->conn->query("select email, pass from signup1 where email='$email' and pass='$pass'");	
	$query->fetch_array(MYSQLI_ASSOC);
	if($query->num_rows>0)
	{
		$_SESSION['email']=$email;
		return true;
	}
	else
	{
		return false;
	}
	}
	public function users_profile($email)
	{
	$query = $this->conn->query("select * from signup1 where email='$email'");	
	$row = $query->fetch_array(MYSQLI_ASSOC);
	if($query->num_rows>0)
	{
    $this->data[] = $row;
    }
		return $this->data;  //made an array to store
	}
	
	public function cat_shows()
	{
	$query = $this->conn->query("select * from category");	
	while($row = $query->fetch_array(MYSQLI_ASSOC))
	
	{
    $this->cat[] = $row; //changed data to cat becoz already fetched on that page
    }
		return $this->cat;  //made an array to store	
	}
	public function qus_show($qus)
	{
		$query = $this->conn->query("select * from questions where cat_id='$qus'");	
	while($row = $query->fetch_array(MYSQLI_ASSOC))
	
	{
    $this->qus[] = $row; //changed data to cat becoz already fetched on that page
    }
		return $this->qus;  //made an array to store
		
	}
	public function answer($data)
	{
		$ans=implode(" ", $data);
		$right=0;
		$wrong=0;
		$no_answer=0;
		
		$query = $this->conn->query("select id, ans from questions where cat_id='".$_SESSION['cat']."'");	
	while($qust = $query->fetch_array(MYSQLI_ASSOC))
	{
	   if ($qust['ans']==$_POST[$qust['id']])
		{
			$right++;
     }
	 elseif ($_POST[$qust['id']]=="quiz")
	 {
		 $no_answer++;
	 }
	 else
	 {
		 $wrong++;
	 }
	}
	$array=array();
	$array['right']=$right;
	$array['wrong']=$wrong;
	$array['no_answer']=$no_answer;
	
	return $array;
	
	
	}
	public function url($url)
	{
		header("location:".$url);
	}
	
	
	
	
}






?>
