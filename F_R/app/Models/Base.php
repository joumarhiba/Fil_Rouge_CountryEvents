 <?php

class Base
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "cevent";

    // private $servername = "sql202.epizy.com";
    // private $username = "epiz_32183523";
    // private $password = "E6]zg&aQsysQ$H%w";
    protected $conn;


    public function connect()
    {
        try{
            $this->conn = new PDO("mysql:host=$this->servername;dbname=cevent",$this->username, $this->password);
            return $this->conn;
        }
        catch(PDOException $e){
            echo "No Connection with DB  : ".$e->getMessage();
        }

    }
}





// class Base
// {
//     private $servername = "localhost";
//     private $username = "root";
//     private $password = "";
//     // private $database = "";
//     protected $conn;


//     public function __construct()
//     {
//         try{
//             $this->conn = new PDO("mysql:host=$this->servername;dbname=community",$this->username, $this->password);
//         }
//         catch(PDOException $e){
//             echo "No Connection with DB  : ".$e->getMessage();
//         }

//     }

//     public function insertUser($table, $tableColone, $tableVal )
//     {
//         $names = "";
//         $values = "";
//         $vrls = "";
//         for($i=0;$i<count($tableColone);$i++){
//             if($i>0){
//                 $vrls = ",";
//             }
//             $names .=$vrls."`".$tableColone[$i]."`";
//             $values.=$vrls."'".$tableVal[$i]."'";
//         }

//         $str = "INSERT INTO `$table`($names)VALUES($values)";
//         $query = $this->conn->prepare($str);
//         $query->execute();
//     }



//     public function selectAll()
//     {
//         $contenu  = $this->conn->prepare( "SELECT * FROM posts ORDER BY idPost DESC");
//         $contenu->execute();
//         return $contenu->fetchAll(PDO::FETCH_ASSOC);
//     }


//     public function delete($id)
//     {
//         $str = "DELETE FROM posts WHERE id = $id";
//         $query = $this->conn->prepare($str);
//         $query->execute();
//     }


//     public function selectByEmail($email)
//     {
//         $str = "SELECT * FROM users WHERE email = '$email' ";
//         $query  = $this->conn->prepare($str);
//         $query->execute();
//         return $query->fetch(PDO::FETCH_ASSOC);
//     }


//     public function Ajouter($title,$photo,$desc,$category,$idUser){
//         $query = "INSERT INTO posts(`title`, `photo`,`description`, `category`,`idUser`) VALUES('$title','$photo','$desc','$category','$idUser')";
//         $sql = $this->conn->prepare($query);
//         $sql->execute();
//     }



//     public function updatePost($title,$photo,$desc,$category,$id){
//         $sql = $this->conn->prepare("UPDATE posts SET title='$title',photo='$photo',`description`='$desc',category='$category' WHERE idPost=$id");
//         $sql->execute();
//         return $sql->fetch(PDO::FETCH_ASSOC);
//     }
//  public function selectById($id){
//     $str = "SELECT * FROM posts WHERE idPost = '$id' ";
//     $query  = $this->conn->prepare($str);
//     $query->execute();
//     return $query->fetch(PDO::FETCH_ASSOC);
//  }
//  public function deleteById($id){
//     $str = "DELETE FROM posts WHERE idPost = $id ";
//     $query  = $this->conn->prepare($str);
//     return $query->execute();
//  }
//  public function addCmt($idUser,$idPost,$content){
//      $sql = "INSERT INTO commentaires (`idUser`,`idPost`,`content`) VALUES('$idUser','$idPost','$content')";
//      $query = $this->conn->prepare($sql);
//      $query->execute();
//     }











//  public function showCmt(){
//      $sql = "SELECT content FROM commentaires";
//      $query = $this->conn->prepare($sql);
//      $query->execute();
//     //  return $query-> fetchAll(PDO::FETCH_ASSOC);
//  }

// }

