<?php
class Users extends Dbconnection{
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
    public $npass;

    protected $tbname ="admin";
    protected $stbname ="student";

    public function __construct(){
        parent:: __construct();
    }



    public function save(){

		$sql = "INSERT INTO ".$this->tbname."(name, email, password ) VALUES(?, ?, ?)";
		$query = $this->db->prepare($sql);
		$query->execute([$this->name, $this->email, $this->password]);
		return $this->db->lastInsertId();

   }
	
   public function update($id){
       
       $sql = "UPDATE ".$this->tbname." SET name=?, email=?, password=? WHERE id=?";
       $query = $this->db->prepare($sql);
       $update = $query->execute([$this->name, $this->email,$this->password, $id]);
       
       if($update==True)
       echo "Ok";
       else echo "Baa;l";
       return $update ? true : false;
    //    return $update;


//     $sql = "UPDATE ".$this->btbname." SET s_id=?, c_code=? WHERE s_id=? ";
//     $query = $this->db->prepare($sql);
//    $update = $query->execute([$this->s_id,$this->c_code, $s_id]);
//    return $update ? true : false;
       
  }
  public function delete_admin($id){
		
    $sql = "DELETE FROM ".$this->tbname." WHERE id=?";
    $query = $this->db->prepare($sql);
    $delete = $query->execute([$id]);
    return $delete ? true : false;
    
}

    public function getAdmins(){

        $sql = "SELECT * FROM ".$this->tbname;
        $query = $this->db->query($sql);
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        
        return $data ? $data : [];
  
    }
    public function getAdminById($id){

        $sql = "SELECT * FROM ".$this->tbname." WHERE id=?";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        $data = $query->fetch(PDO::FETCH_ASSOC);
        
        return $data ? $data : [];
  
    }

    public function getUserByEmail($email){
         
        $sql = "SELECT * FROM ".$this->tbname." WHERE email=?";
        $query = $this->db->prepare($sql);
        $query->execute([$email]);
        $data = $query->fetch(PDO::FETCH_ASSOC);
        
        return $data ? $data : [];

     }

        
   public function update_pass($email){
    $sql = "UPDATE ".$this->tbname." SET password=? WHERE email=?";
      $query = $this->db->prepare($sql);
      $update = $query->execute([$this->npass, $email]);
    //   echo $email;
    //   echo $this->npass;
      return $update;
 }



}

?>