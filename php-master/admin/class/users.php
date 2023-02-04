<?php



class users
{
	public $host = "localhost";
	public $username = "root";
	public $pass = "";
	public $db_name = "php-master";
	public $conn;
	public $dbconn;
	public $data;
	public $cat;
	public $qus;


	public function __construct()
	{
		$this->conn = new mysqli($this->host, $this->username, $this->pass, $this->db_name);
		if ($this->conn->connect_errno) {
			die('Connect Error: ' . $this->dbconn->connect_errno);
		}
	}
	public function exam_shows()
	{
		$query = $this->conn->query("SELECT * FROM questions1 p JOIN exam1 c ON p.cat_id = c.id");
		while ($row = $query->fetch_array(MYSQLI_ASSOC)) {
			$this->exam[] = $row;
		}
		return $this->exam;
	}

	public function cat_shows()
	{
		$query = $this->conn->query("SELECT * FROM exam1");
		while ($row = $query->fetch_array(MYSQLI_ASSOC)) {
			$this->cat[] = $row;
		}
		return $this->cat;
	}
	public function qus_show($qus)
	{

		$query = $this->conn->query("SELECT * FROM questions1 WHERE cat_id='$qus'");
		while ($row = $query->fetch_array(MYSQLI_ASSOC)) {
			$this->qus[] = $row;
		}
		return $this->qus;

	}
	public function answer($data)
	{
		$ans = implode("", $data);
		$right = 0;
		$wrong = 0;
		$no_answer = 0;
		$query = $this->conn->query("SELECT qid ,ans FROM questions1 WHERE cat_id='" . $_SESSION['cat'] . "'");
		while ($qust = $query->fetch_array(MYSQLI_ASSOC)) {
			if ($qust['ans'] == $_POST[$qust['qid']]) {
				$right++;
			} elseif ($_POST[$qust['qid']] == "no_attempt") {
				$no_answer++;
			} else {
				$wrong++;
			}
		}
		$array = array();
		$array['right'] = $right;
		$array['wrong'] = $wrong;
		$array['no_answer'] = $no_answer;
		return $array;
	}
	public function add_quiz($data)
	{
		$this->conn->query($data);
		return true;
	}
	
	public function delete_category($id)
	{
		$this->conn->query("DELETE FROM exam1 WHERE id = '$id'");
		return true;
	}
	public function delete_category1($id)
	{
		$this->conn->query("DELETE FROM questions1 WHERE qid = '$qid'");
		return true;
	}
	public function update_category($id, $cat)
	{
		$this->conn->query("UPDATE exam1 SET category='$cat' WHERE id='$id'");
		return true;
	}

	public function update_question( $question,$ans1,$ans2,$ans3,$ans4,$ans)
	{
		$this->conn->query("UPDATE questions1 SET question='$question,ans1='$ans1',ans2='$ans2',ans3='$ans3',ans4='$ans4',ans='$ans'");
		return true;
	}
	public function url($url)
	{
		header("location:" . $url);
	}
}


?>