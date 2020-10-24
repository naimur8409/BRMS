<?php
class Results extends Dbconnection{
    public $id;
    public $s_id;
    public $c_code;
    public $c_name;
    public $credit;
    public $level;
    public $term;
    public $gpa;

    protected $stbname ="final_result";
    protected $btbname ="backlog";

    public function __construct(){
        parent:: __construct();
    }

    public function getResult(){
         
        $sql = "SELECT * FROM ".$this->stbname;
        $query = $this->db->query($sql);
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        
        return $data ? $data : [];

     }

     public function getResultById($id){

        $sql = "SELECT * FROM ".$this->stbname." WHERE id=?";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        $data = $query->fetch(PDO::FETCH_ASSOC);
        
        return $data ? $data : [];
     }
 

     public function save(){

		$sql = "INSERT INTO ".$this->stbname."(s_id, c_code, c_name, credit, level, term, gpa) VALUES(?, ?, ?, ?, ?, ?, ?)";
		$query = $this->db->prepare($sql);
		$query->execute([$this->s_id, $this->c_code, $this->c_name, $this->credit, $this->level, $this->term, $this->gpa]);
		return $this->db->lastInsertId();

    }

    public function backlogSave(){

		$sql = "INSERT INTO ".$this->btbname."(s_id, c_code) VALUES(?, ?)";
		$query = $this->db->prepare($sql);
		$query->execute([$this->s_id, $this->c_code]);
		return $this->db->lastInsertId();

    }
 

    public function update($id){

       $sql = "UPDATE ".$this->stbname." SET s_id=?, c_code=?, c_name=?, credit=?, level=?, term=?, gpa=? WHERE id=? ";
       $query = $this->db->prepare($sql);
	   $update = $query->execute([$this->s_id,$this->c_code,$this->c_name,$this->credit,$this->level,$this->term,$this->gpa, $id]);
	   // return $update ? true : false;
      echo $id;
   }

   public function update_backlog($s_id){

      $sql = "UPDATE ".$this->btbname." SET s_id=?, c_code=? WHERE s_id=? ";
      $query = $this->db->prepare($sql);
     $update = $query->execute([$this->s_id,$this->c_code, $s_id]);
     return $update ? true : false;

  }
   
   public function getBacklogById($s_id){

      $sql = "SELECT * FROM ".$this->btbname." WHERE s_id=?";
        $query = $this->db->prepare($sql);
        $query->execute([$s_id]);
        $data = $query->fetch(PDO::FETCH_ASSOC);
        
        return $data ? $data : [];
   }

   public function getBacklog($id){
      $sql = "SELECT * FROM ".$this->btbname." WHERE s_id=?";
      $query = $this->db->prepare($sql);
      $query->execute([$id]);
      $data = $query->fetchALL(PDO::FETCH_ASSOC);
        
        return $data ? $data : [];
   }

   public function getAllBacklog(){
      $sql = "SELECT * FROM ".$this->btbname;
      $query = $this->db->query($sql);
      $data = $query->fetchAll(PDO::FETCH_ASSOC);

        
        return $data ? $data : [];
   }


	public function delete($s_id){
		
		$sql = "DELETE FROM ".$this->stbname." WHERE id=?";
		$query = $this->db->prepare($sql);
		$delete = $query->execute([$s_id]);
		return $delete ? true : false;
		
	}

	public function delete_backlog($s_id){
		
		$sql = "DELETE FROM ".$this->btbname." WHERE s_id=?";
		$query = $this->db->prepare($sql);
		$delete = $query->execute([$s_id]);
		return $delete ? true : false;
		
	}
    
   public function search($level,$term,$s_id){
      $sql = "SELECT * FROM ".$this->stbname." WHERE level=? AND term=? AND s_id=?";
      $query = $this->db->prepare($sql);
      $query->execute([$level,$term,$s_id]);
      $data = $query->fetchALL(PDO::FETCH_ASSOC);
      
      return $data ? $data : [];
  }


}

?>