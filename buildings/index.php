<?php
// 1- 

    include_once "../nav.php";
    require_once "../connect.php";

     $BuList = $conn->query("SELECT * FROM buildings");
     $BuData = $BuList->fetchAll(PDO::FETCH_ASSOC); 
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
   <h1> Buildings Record System</h1>
</center>
</head>

<body>
<table border="4" bgcolor="grey" width=100% align="center">
        
        <tr>
            <th>Building name</th>
            <th>number of lecture halls in Building</th>
            <th>Major ID</th>
            <th>Building ID</th>
            
            
        </tr>
        <?php foreach ($BuData as $Bu) { ?>
            <tr>
                <td><?php echo $Bu['Building_name'] ?></td>
                <td><?php echo $Bu['Building_size'] ?></td>
                <td><?php echo $Bu['Maj_Id'] ?></td>
                <td><?php echo $Bu['Building_id'] ?></td>
                
            </tr>
        <?php } ?>
    </table>
    <center>
        <a href="add.php">Add New Building</a>
    </center>
</body>

</html>