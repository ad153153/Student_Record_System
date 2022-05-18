<?php
// 1- 

    include_once "../nav.php";
    require_once "../connect.php";

     $MajList = $conn->query("SELECT * FROM majors LEFT JOIN buildings ON majors.Maj_id = buildings.Maj_id  ");
     $MajData = $MajList->fetchAll(PDO::FETCH_ASSOC); 
     $BuList=$conn->query("SELECT * FROM buildings");
     $BuData=$BuList->fetchAll(PDO::FETCH_ASSOC);
    //  echo "<pre>";
    //  print_r($MajData);
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
            $Maj_name = validate($_POST['Maj_name']);
            $Maj_id = validate($_POST['Maj_id']);
            $Maj_cap = validate($_POST['Maj_cap']);
        
           
    //  echo "<pre>";
    //      print_r($_POST);
    //      echo "</pre>";
        //      die();
    
        if(!empty($Maj_name) && !empty($Maj_id) && !empty($Maj_cap)) {
      
         $stmt = "INSERT INTO `majors`(`Maj_name`, `Maj_id`, `Maj_cap`) VALUES ('$Maj_name','$Maj_id','$Maj_cap')";
                }
            $result=$conn->query($stmt);
            if($result){
                echo "inserted";
            }
    
        }
    
    
?>
<form method="post" enctype="multipart/form-data">
    <center>
            <div>
                <label>Major name</label>

                &nbsp; <input type="text" name="Maj_name" autocomplete="on" required size= "40">
                </div>
            </div>
            <div>
                <br>
                
                <label>Major Id</label> 

                &nbsp; <input type="text" name="Maj_id" autocomplete="on" required size= "40">
                </div>
            <div>
            <br>
            
            <label>Major Capacity </label> 
            
            <input type="text" name="Maj_cap" autocomplete="on" required size= "40">     
<br><br>
<label>Building</label>
                        </div>
        <select name="Major">
            <option></option>
    <?php foreach($BuData as $Bu){ ?>
        <option value="<?php echo $Bu['Building_id'] ?>"required ><?php echo "Id - ". $Bu['Building_id'] . " - "?><?php echo $Bu['Building_name'] ?></option>
   
    <?php } ?>
    </select>

                <input type="submit" name="submit" value="save">
            </div> 
        </form>
                        </center>
</body>


</html>