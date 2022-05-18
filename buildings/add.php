<?php
// 1- 

    include_once "../nav.php";
    require_once "../connect.php";

    $BuList = $conn->query("SELECT * FROM buildings");
    $BuData = $BuList->fetchAll(PDO::FETCH_ASSOC); 
    $majList=$conn->query("SELECT * FROM majors");
    $majData=$majList->fetchAll(PDO::FETCH_ASSOC);
    //  echo "<pre>";
    //  print_r($_POST);
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
            $Building_name = validate($_POST['Building_name']);
            $Building_size = validate($_POST['Building_size']);
            $Maj_Id=validate($_POST['Maj_Id']);
            $Building_id = validate($_POST['Building_id']);
        
           
    //  echo "<pre>";
    //      print_r($_POST);
    //      echo "</pre>";
        //      die();
    
        if(!empty($Building_name) && !empty($Building_size) && !empty($Building_id)) {
      
         $stmt = "INSERT INTO `buildings`(`Building_name`, `Building_size`, `Maj_Id`, `Building_id`) VALUES ('$Building_name','$Building_size','$Maj_Id','$Building_id')";
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
                <label>Building name</label>

                &nbsp; <input type="text" name="Building_name" autocomplete="on" required size= "40">
                </div>
            
            <div>
                <br>
                
                <label>Building Size</label> 

                &nbsp; <input type="text" name="Building_size" autocomplete="on" required size= "40">
                </div>
                <div>
                <br>
                
                <label>Major Id</label> 

                <select name="Maj_Id">
            <option></option>
    <?php foreach($majData as $maj){ ?>
        <option value="<?php echo $maj['Maj_id'] ?>"required ><?php echo $maj['Maj_id']. " - " ?><?php echo $maj['Maj_name'] ?></option>
   
    <?php } ?>
    </select>
                </div>
                <div>
                <br>

            <label>Building id </label> 
            
            <input type="text" name="Building_id" autocomplete="on" required size= "40">     
<br><br>

    
    </select>

                <input type="submit" name="submit" value="save">
            </div> 
        </form>
        
                        </center>
</body>


</html>