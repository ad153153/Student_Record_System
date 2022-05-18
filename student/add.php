<?php
include_once "../nav.php";
require_once "../connect.php";
$majList=$conn->query("SELECT * FROM majors");
$majData=$majList->fetchAll(PDO::FETCH_ASSOC);

    //  echo "<pre>";
    //  print_r($courseData);
    //  echo "</pre>";
    //  die();
    if (isset($_POST['submit'])) {
    function validate($input)
    {
        $data = trim($input);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
        $fname = validate($_POST['Firstname']);
        $lname = validate($_POST['Lastname']);
        $ID = validate($_POST['ID']);
        $Maj_id = validate($_POST['Major']);
        $country = validate($_POST['country']);
        $bdate = validate($_POST['bdate']);
        $gender = $_POST['gender'];

//  echo "<pre>";
//      print_r($_POST);
//      echo "</pre>";
    //      die();

    if(!empty($fname) && !empty($lname) && !empty($ID) && !empty($Maj_id) && !empty($country) && !empty($bdate) && !empty($gender)) {
    $image_name = $_FILES['image']['name'];
            if (!empty($image_name)) {
            $allowedExt = ["png", "jpg", "jpeg"];
            $tmp_name = $_FILES['image']['tmp_name'];
            $image_array = explode(".", $image_name);
            $ext = end($image_array);
            $ext = strtolower($ext);
            $image_name = $ID . "." . $ext;

                if (in_array($ext, $allowedExt)) {
                    if (move_uploaded_file($tmp_name, "../upload/images/" . $image_name)) {
                        $stmt = "INSERT INTO `student`(`Fname`, `Lname`, `ID`, `Maj_id`, `Country`, `birthday`, `image`, `gender`) VALUES ('$fname','$lname','$ID','$Maj_id','$country','$bdate','$image_name','$gender')";
                    }
                }
            } else {
                $stmt = "INSERT INTO `student`(`Fname`, `Lname`, `ID`, `Maj_id`, `Country`, `birthday`, `image`, `gender`) VALUES ('$fname','$lname','$ID','$Maj_id','$country','$bdate','$image_name','$gender')";
            }
        $result=$conn->query($stmt);
        if($result){
            echo "inserted";
        }

    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>firt</title>
</head>

<body>

<form method="post" enctype="multipart/form-data">
    <center>
            <div>
                <label>First name</label>

                &nbsp; <input type="text" name="Firstname" autocomplete="on" required size= "40">
                </div>
            </div>
            <div>
                <br>
                
                <label>Last name</label> 

                &nbsp; <input type="text" name="Lastname" autocomplete="on" required size= "40">
                </div>
            <div>
            <br>
            
            <label>ID </label> 
            <br>
            <input type="text" name="ID" autocomplete="on" required size= "40">     
<br><br>
<p><label for="drop">Country&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <select name="country" id="country">
        <option value="0">--Select Country--</option>
        <option value="EG">Egypt</option>
        <option value="SY">Syria</option>
        <option value="JO">Jordan</option>
        <option value="ALG">Algeria</option>
        <option value="MOR">Morocco</option><br>
</select>
        <br>
        <div>
                <label>birthday</label>
                <div>
                    <input type="date" name="bdate" required>
                </div>
</div>
</p>   

<div>
    <label>Major</label>
                        </div>
        <select name="Major">
            <option></option>
    <?php foreach($majData as $maj){ ?>
        <option value="<?php echo $maj['Maj_id'] ?>"required ><?php echo $maj['Maj_id']. " - " ?><?php echo $maj['Maj_name'] ?></option>
   
    <?php } ?>
    </select>
    </div>
    <!-- <div>
    <label>courses</label>
    </div> 
    <select name="course">
    <?php foreach($courseData as $course){ ?>
    <option value="<?php echo $course['Maj_Id'] ?>" ><?php echo $course['Maj_Id']  ?> <?php echo $maj['course_name'] ?></option>
    <?php } ?>
    </select>
    </div> -->
<br> 
            <div>
                <label>Gender</label>
               <br>
                
                    <label>male</label><input type="radio" name="gender" value="M">
                    <label>female</label><input type="radio" name="gender" value="F">
                </div>


            <label>username</label>

<input type="text" name="username" autocomplete="on" required size= "20">
</div>
<br>
<div>
<label>password</label>

    <input type="password" name="password" required size= "20">

</div>

<br>

                <label>image</label>
                <div>
                    <input type="file" name="image">
                </div>

        <br>
<!-- <label>Remember ME ?</label>
<input type="checkbox" name="Remember" value="Yes">
  <div>-->
                <input type="submit" name="submit" value="save">
            </div> 
        </form>
                        </center>
</body>


</html>
