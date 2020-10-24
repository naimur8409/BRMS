<?php
class Students extends Dbconnection{
    public $id;
    public $s_id;
    public $name;
    public $email;
    public $batch;
    public $dept;
    public $level;
    public $term;
    public $password;
    public $mobile;
    public $address;
    public $status;
    public $cgpa;

    protected $stbname ="student";
    protected $tbname="result";

    public function __construct(){
        parent:: __construct();
    }
    public function getStudent(){
         
      $sql = "SELECT * FROM ".$this->stbname;
      $query = $this->db->query($sql);
      $data = $query->fetchAll(PDO::FETCH_ASSOC);
      
      return $data ? $data : [];

   }

   public function total(){
      // $query = mysql_query("SELECT * FROM ".$this->stbname);
      // $number=mysql_num_rows($query);

      $sql = "SELECT count(*) FROM ".$this->stbname; 
      $result = $this->db->prepare($sql); 
      $result->execute([]); 
      $number = $result->fetchColumn();
      return $number;
   }

    public function getUserByDept($dept){
         
        $sql = "SELECT * FROM ".$this->stbname." WHERE dept=?";
        $query = $this->db->prepare($sql);
        $query->execute([$dept]);
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        
        return $data ? $data : [];

     }     
     public function getStudentByNID($id){

        $sql = "SELECT * FROM ".$this->stbname." WHERE id=?";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        $data = $query->fetch(PDO::FETCH_ASSOC);
        
        return $data ? $data : [];
     }     
     public function getStudentById($s_id){

        $sql = "SELECT * FROM ".$this->stbname." WHERE s_id=?";
        $query = $this->db->prepare($sql);
        $query->execute([$s_id]);
        $data = $query->fetch(PDO::FETCH_ASSOC);
        
        return $data ? $data : [];
     }
 
     public function getUserByDeptBatch($batch,$dept){
         
        $sql = "SELECT * FROM ".$this->stbname." WHERE batch=? AND dept = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$batch,$dept]);
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        
        return $data ? $data : [];

     }
     public function all(){
         $sql = "SELECT final_result.id, student.s_id, final_result.gpa, student.name, student.dept ,final_result.level, final_result.term, final_result.c_code, final_result.c_name, final_result.credit, student.batch
         FROM student
         INNER JOIN final_result 
         ON student.s_id=final_result.s_id";

        $query = $this->db->query($sql);
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data ? $data : [];
     }
     public function allById($s_id){
         $sql = "SELECT student.s_id, final_result.gpa, student.name, student.dept ,final_result.level, final_result.term, final_result.c_code, final_result.c_name, final_result.credit, student.batch
         FROM student
         INNER JOIN final_result 
         ON student.s_id=final_result.s_id WHERE s_id=?";

         $query = $this->db->prepare($sql);
         $query->execute([$s_id]);
         $data = $query->fetch(PDO::FETCH_ASSOC);

         return $data ? $data : [];
     }


  


     public function save(){

		$sql = "INSERT INTO ".$this->stbname."(s_id, name, email, batch, dept, level, term, password, mobile, address, status, cgpa) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$query = $this->db->prepare($sql);
		$query->execute([$this->s_id, $this->name, $this->email, $this->batch, $this->dept, $this->level, $this->term, $this->password,  $this->mobile, $this->address, $this->status, $this->cgpa]);
		return $this->db->lastInsertId();

   }
	
	public function update($id){
		
		$sql = "UPDATE ".$this->stbname." SET s_id=?, name=?, email=?, batch=?, dept=?, level=?, term=?, password=?, mobile=?, address=?, status=?, cgpa=? WHERE id=?";
		$query = $this->db->prepare($sql);
		$update = $query->execute([$this->s_id, $this->name, $this->email, $this->batch, $this->dept, $this->level, $this->term, $this->password,  $this->mobile, $this->address, $this->status, $this->cgpa, $id]);
		return $update;
		
   }

   public function delete($id){
		
		$sql = "DELETE FROM ".$this->stbname." WHERE id=?";
		$query = $this->db->prepare($sql);
		$delete = $query->execute([$id]);
		return $delete ? true : false;
		
   }
   
   public function update_pass($s_id){
      $sql = "UPDATE ".$this->stbname." SET password=? WHERE s_id=?";
		$query = $this->db->prepare($sql);
		$update = $query->execute([$this->npass, $s_id]);
		return $update;
   }


}

?>