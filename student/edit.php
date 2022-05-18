<?php

include_once "../nav.php";
require_once "../connect.php";
if (isset($_GET['ID'])) {
    $ID = $_GET['ID'];
} else {
    $ID = 0;
}
//ID select
$Studlist = $conn->query("SELECT * FROM student WHERE ID=$ID"); // object
$StuData = $Studlist->fetch(PDO::FETCH_ASSOC);
$majList=$conn->query("SELECT * FROM majors");
$majData=$majList->fetchAll(PDO::FETCH_ASSOC);

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
        $new_ID = validate($_POST['ID']);
        $Maj_id = validate($_POST['Major']);
        $Country=$_POST['country'];
        $bdate = validate($_POST['bdate']);
        $gender = $_POST['gender'];
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        //    die();

if(!empty($fname) && !empty($lname) && !empty($new_ID) && !empty($Maj_id) && !empty($Country) && !empty($bdate) && !empty($gender)) {
     if (!empty($_FILES['image']['name'])) {
        $image_name=$_FILES['image']['name'];
    
            $allowedExt = ["png", "jpg", "jpeg"];
            $tmp_name = $_FILES['image']['tmp_name'];
            $image_array = explode(".", $image_name);
            $ext = end($image_array);
            $ext = strtolower($ext);
            $image_name = $new_ID . "stud." . $ext;

                if (in_array($ext, $allowedExt)) {
                    if (move_uploaded_file($tmp_name, "../upload/images/" . $image_name)) {
                        unlink("../upload/images/" . $StuData['image']);
                        $udmt = "UPDATE `student` SET `Fname`='$fname',`Lname`='$lname',`ID`='$new_ID',`Maj_id`='$Maj_id',`Country`='$Country',`birthday`='$bdate',`image`='$image_name',`gender`='$gender' WHERE ID=$ID";
                    }
                }
            } else if(!empty($StuData['image'])) {
                $image_name=$StuData['image'];  
                $udmt = "UPDATE `student` SET `Fname`='$fname',`Lname`='$lname',`ID`='$new_ID',`Maj_id`='$Maj_id',`Country`='$Country',`birthday`='$bdate',`image`='$image_name',`gender`='$gender' WHERE ID=$ID";
            }
            else{
                $udmt = "UPDATE `student` SET `Fname`='$fname',`Lname`='$lname',`ID`='$new_ID',`Maj_id`='$Maj_id',`Country`='$Country',`birthday`='$bdate',`gender`='$gender' WHERE ID=$ID";
            }
            // echo $fname;
            // echo $new_ID;
            // die();
        $result=$conn->query($udmt);
        if($result){
            echo "done";
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

<form method="post" enctype="multipart/form-data" action="edit.php?ID=<?php echo $ID ?>">
    <center>
            <div>
                <label>First name</label>

                &nbsp; <input type="text" name="Firstname" autocomplete="on" required size= "40" value="<?php echo $StuData['Fname']; ?>" >
                </div>
            </div>
            <div>
                <br>
                
                <label>Last name</label> 

                &nbsp; <input type="text" name="Lastname" autocomplete="on" required size= "40"value="<?php echo $StuData['Lname']; ?>">
                </div>
            <div>
            <br>
            
            <label>ID </label> 
            <br>
            <input type="text" name="ID" autocomplete="on" required size= "40"value="<?php echo $StuData['ID']; ?>">     
<br><br>

<?php if (isset($StuData['Country']) && ($StuData['Country'] == 'EG')) { ?>

<p><label for="drop">Country&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select name="country" id="country">
<option value="0">--Select Country--</option>
<option value="EG" selected>Egypt</option>
<option value="SY"  >Syria</option>
<option value="JO">Jordan</option>
<option value="ALG">Algeria</option>
<option value="MOR">Morocco</option><br>

</select>
<?php } else if (isset($StuData['Country']) && ($StuData['Country'] == 'SY')) { ?>

<p><label for="drop">Country&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select name="country" id="country">
<option value="0">--Select Country--</option>
<option value="EG" >Egypt</option>
<option value="SY" selected >Syria</option>
<option value="JO">Jordan</option>
<option value="ALG">Algeria</option>
<option value="MOR">Morocco</option><br>

</select>

<?php } else if (isset($StuData['Country']) && ($StuData['Country'] == 'JO')) { ?>
<p><label for="drop">Country&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select name="country" id="country">
<option value="0">--Select Country--</option>
<option value="EG" >Egypt</option>
<option value="SY"  >Syria</option>
<option value="JO"selected>Jordan</option>
<option value="ALG">Algeria</option>
<option value="MOR">Morocco</option><br>

</select>

<?php } else if (isset($StuData['Country']) && ($StuData['Country'] == 'ALG')) { ?>
<p><label for="drop">Country&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select name="country" id="country">
<option value="0">--Select Country--</option>
<option value="EG" >Egypt</option>
<option value="SY"  >Syria</option>
<option value="JO">Jordan</option>
<option value="ALG"selected>Algeria</option>
<option value="MOR">Morocco</option><br>

</select>

<?php } else if (isset($StuData['Country']) && ($StuData['Country'] == 'MOR')) { ?>
<p><label for="drop">Country&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select name="country" id="country">
<option value="0">--Select Country--</option>
<option value="EG" >Egypt</option>
<option value="SY"  >Syria</option>
<option value="JO">Jordan</option>
<option value="ALG">Algeria</option>
<option value="MOR" selected >Morocco</option><br>

</select>
<?php } else if (isset($StuData['Country']) && ($StuData['Country'] == 'MOR')) { ?>
<p><label for="drop">Country&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select name="country" id="country">
<option value="0">--Select Country--</option>
<option value="EG" >Egypt</option>
<option value="SY"  >Syria</option>
<option value="JO">Jordan</option>
<option value="ALG">Algeria</option>
<option value="MOR" selected >Morocco</option><br>
</select>
<?php } else {?>
    <p><label for="drop">Country&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select name="country" id="country">
<option value="0">--Select Country--</option>
<option value="EG" >Egypt</option>
<option value="SY"  >Syria</option>
<option value="JO">Jordan</option>
<option value="ALG">Algeria</option>
<option value="MOR" selected >Morocco</option><br>
</select>
<?php } ?>

        <br>
        <div>
                <label>birthday</label>
                <div>
                    <input type="date" name="bdate" required value="<?php echo $StuData['birthday']; ?>">
                </div>
</div>
</p>   

<div>
    <label>Major</label>
                        </div>
        <select name="Major">
            <option></option>
    <?php foreach($majData as $maj){ ?>
        <option value="<?php echo $maj['Maj_id'] ?>" required <?php if ($StuData['Maj_id'] == $maj['Maj_id']) { ?> selected <?php } ?> ><?php echo $maj['Maj_id'] . " - "?><?php echo $maj['Maj_name'] ?></option>
   
    <?php } ?>
    </select>
    </div>
  
<br> 
            <div>
                <label>Gender</label>
               <br>
                <?php if($StuData['gender']== 'M'){?>
                    <label>male</label><input type="radio" name="gender" value="M" checked>
                    <label>female</label><input type="radio" name="gender" value="F">
                    <?php }else{?>
                        <label>male</label><input type="radio" name="gender" value="M" >
                    <label>female</label><input type="radio" name="gender" value="F" checked>
                    <?php } ?>
                </div>


            <label>username</label>

<input type="text" name="username" autocomplete="on" required size= "20" >
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
                <div>
                    <?php if (!empty($StuData['image'])) { ?>
                        <img src="../upload/images/<?php echo $StuData['image'] ?>" width="90">
                    <?php } else { ?>
                        <div style="width: 100;height:100;border:2px solid #333"></div>
                    <?php } ?>

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
