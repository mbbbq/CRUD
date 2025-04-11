<?php
    function reset_vars(){
        global $first_name, $last_name, $age, 
               $gender, $department, $ID, $save_update, $info;
        $first_name=null;
        $last_name=null;
        $age=null;
        $gender=null;
        $department=null;
        $ID=null;
        //$out=false;
        $info = "";
        $save_update="save";
      }  
      reset_vars(); 
try {
    $conn = new PDO("mysql:host=localhost; dbname=crud", "root", null);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e) {
    exit("Verbindung abgebrochen!");
}

$action = "none";
$param = [];
$list_sql = "select * from user";

if (isset($_POST['button'])) $action = $_POST['button'];
switch ($action) {
    
    case 'save':
        $first_name=$_POST['first_name'];
        $last_name=$_POST['last_name'];
        $age=$_POST['age'];
        $gender=$_POST['gender'];
        $department=$_POST['department'];

        if ($first_name =="" or $last_name =="" or $age =="" or $gender =="" or $department =="") {
            $alert_type = "danger";
            $info = "Bitte Eingabe überprüfen!";
        }else {
            $sql = "insert into user 
                    (first_name, last_name, age, gender, department) values
                    (?, ?, ?, ?, ?)";
        $request = $conn->prepare($sql);
        $request->execute([$first_name, $last_name, $age, $gender, $department]);
        reset_vars();    
        $info = $request->rowcount()." Datensatz angefügt!";
        $alert_type = "success";
        }
    break;
    
    case 'edit':
        $save_update = "update";
        $ID =$_POST['ID'];
        $sql = "select * from user where ID=?";
        $request = $conn->prepare($sql);
        $request->execute([$ID]);
        $row = $request->fetch(PDO::FETCH_ASSOC);

        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $age = $row['age'];
        $gender = $row['gender'];
        $department = $row['department'];
    break;

    case 'update':
        $first_name=$_POST['first_name'];
        $last_name=$_POST['last_name'];
        $age=$_POST['age'];
        $gender=$_POST['gender'];
        $department=$_POST['department'];
        $ID=$_POST['ID'];
        if ($first_name =="" or $last_name =="" or $age =="" or $gender =="" or $department =="") {
            $alert_type = "danger";
            $info = "Bitte Eingabe überprüfen!";
        }else {
            $sql = "update user set first_name = ?, last_name = ?, age = ?, gender = ?, department = ? where ID = ?";
            $request = $conn->prepare($sql);
            $request->execute([$first_name, $last_name, $age, $gender, $department, $ID]);
            $info = $request->rowcount()." Datensatz geändert!";
            $alert_type = "success";
            reset_vars();
        }
    break;

    case 'delete':
        $ID=$_POST['ID'];
        $sql = "delete from user where ID=?";
        $request = $conn->prepare($sql);
        $request->execute([$ID]);
        $info = $request->rowcount()." Datensatz gelöscht!";
        $alert_type = "success";
    break;

    case 'search':
        $list_sql = "select * from user where 
        (first_name like :search_string) or
        (last_name like :search_string) or
        (department like :search_string)
        ";
        $param = ['search_string'=>'%'.$_POST['search'].'%'];
        
    break;    


}




$request = $conn->prepare($list_sql);
$request->execute($param);
$rows = $request->fetchAll(PDO::FETCH_ASSOC);
$info_DB = "Datensätze: ".$request->rowcount();

include "template1.php";
?>