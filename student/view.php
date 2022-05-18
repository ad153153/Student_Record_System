<?php
include_once "../nav.php";
require_once "../connect.php";
if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
} else {
    $id = 0;
}
$student_list= $conn->query("SELECT * FROM student WHERE ID=$id"); // object
$stud_data = $student_list->fetch(PDO::FETCH_ASSOC);
// print_r($stud_data);
?>
<html>

<head>
    <style>
        table tr th {
            width: 20%;
            background-color: #158;
            color: #fff;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <table border="2.5" bgcolor="lightgray" align="center" hei  ght="31%" width="45% ">
        <tr>
            <th>Fname</th>
            <td><?php echo $stud_data['Fname'] ?></td>
        </tr>
        <tr>
            <th>Lname</th>
            <td><?php echo $stud_data['Lname'] ?></td>
        </tr>
        <tr>
            <th>SSN</th>
            <td><?php echo $stud_data['ID'] ?></td>
        </tr>
        <tr>
            <th>birthday</th>
            <td><?php echo $stud_data['birthday'] ?></td>
        </tr>
        
        <tr>
            <th>gender</th>
            <td><?php echo $stud_data['gender'] ?></td>
        </tr>
        <tr>
            <th>Image</th>
            <?php if (!empty($stud_data['image'])) { ?>
                <td><img src="../upload/images/<?php echo $stud_data['image'] ?>" width="90"></td>
            <?php } else { ?>
                <td></td>
            <?php } ?>

        </tr>
            </td>
        </tr>
    </table>
</body>

</html>