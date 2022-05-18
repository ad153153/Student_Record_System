<?php
// 1- 

    include_once "../nav.php";
    require_once "../connect.php";

     $studentList = $conn->query("SELECT * FROM student LEFT JOIN majors ON student.Maj_id = majors.Maj_id  ");
     $studentData = $studentList->fetchAll(PDO::FETCH_ASSOC); 
    //  echo "<pre>";
    //  print_r($studentData);
    //  echo "</pre>";
    //  die();
?>
<html>
<head>
   <h1> Student Record System</h1>
</head>

<body>
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
    <table border="4" bgcolor="lightgreen" width=100% align="center">
        <caption>student</caption>
        <tr>
            <th>firstname</th>
            <th>lastname</th>
            <th>id</th>
            <th>country</th>
            <th>birthday</th>
            <th>image</th>
            <th>gender</th>
            <th>Major name </th>
            <th>operations</th> 
        </tr>
        <?php foreach ($studentData as $student) { 
            // $courses_list= $conn->query("SELECT * FROM courses WHERE Maj_id={$student['Maj_id']}");
            // $courses_Data=$courses_list->fetchAll(PDO::FETCH_ASSOC);   
        ?>
            <tr>
                <td><?php echo $student['Fname'] ?></td>
                <td><?php echo $student['Lname'] ?></td>
                <td><?php echo $student['ID'] ?></td>
                <td><?php echo $student['Country'] ?></td>
                <td><?php echo $student['birthday'] ?></td>
                <?php if($student['image'] == ""){ ?>
                <td></td>
                <?php } else{ ?>
                   <td> <img src="../upload/images/<?php echo $student['image'] ?>" width="90"></td>
                <?php }  ?>
                <td><?php echo $student['gender'] ?></td>
                <td><?php echo $student['Maj_name'] ?></td>
                <td>
                    <a href="view.php?ID=<?php echo $student['ID'] ?>">view</a>
                    <a href="edit.php?ID=<?php echo $student['ID'] ?>">edit</a>
                    <a href="delete.php?ID=<?php echo $student['ID'] ?>">delete</a>
                </td>
                
            </tr>
        <?php } ?>
    </table>
   
        <a href="add.php">Add New Student</a>
    
</body>

</html>