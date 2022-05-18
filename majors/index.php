<?php
// 1- 

    include_once "../nav.php";
    require_once "../connect.php";

     $MajList = $conn->query("SELECT * FROM majors LEFT JOIN buildings ON majors.Maj_id = buildings.Maj_id  ");
     $MajData = $MajList->fetchAll(PDO::FETCH_ASSOC); 
    //  echo "<pre>";
    //  print_r($MajData);
    //  echo "</pre>";
    //  die();
?>
 <style>table, th, td {
  border: 1px solid white;
  border-collapse: collapse;
  padding-top: 10px;
  padding-bottom: 20px;
  padding-left: 30px;
  padding-right: 40px;
  
}
th, td {
  background-color: #96D4D4;
}</style>
<html>
<head>
    <center>
   <h1> Majors Record System</h1>
</center>
</head>

<body>
<table border="4" bgcolor="lightblue" width=100% align="center">
        
        <tr>
            <th>Major name</th>
            <th>Major Id</th>
            <th>Number of students in major</th>
            <th>Major's Building</th>
            <th>number of lecture halls in Building</th>
            <th>Building ID</th>
            
            
        </tr>
        <?php foreach ($MajData as $Maj) { ?>
            <tr>
                <td><?php echo $Maj['Maj_name'] ?></td>
                <td><?php echo $Maj['Maj_id'] ?></td>
                <td><?php echo $Maj['Maj_cap'] ?></td>
                <td><?php echo $Maj['Building_name'] ?></td>
                <td><?php echo $Maj['Building_size'] ?></td>
                <td><?php echo $Maj['Building_id'] ?></td>
                
                
            </tr>
        <?php } ?>
    </table>
    
        <a href="add.php"> Add New Major</a>
    
</body>

</html>