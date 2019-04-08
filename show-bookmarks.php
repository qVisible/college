<?php require_once('session.php'); ?>
<html>

<head>
    <title>Show Bookmarks
    </title>
    <link href="style1.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="wrapper">
        <?php require_once('nav.php');  ?>
        <?php require_once('db-connect.php');  ?>
        <div id="main">
            <?php
if(isset($_SESSION['bookmarks'])){
    foreach($_SESSION['bookmarks'] as $item){
        $sql = 'SELECT student_id, forename, surname, phone,address, course_name, image FROM t_students JOIN t_courses ON course_fk=course_id WHERE student_id='.$item;
        $result = mysqli_query($con,$sql);
        $row1 = mysqli_fetch_array($result);

     ?>
                <section>


                    <?php
if($row1['image']!=''){
    ?>

                        <img src="student-images/<?php echo $row1['image'];?>" alt="student image" /><br/>

                        <?php
}
else{
    ?>
                            <img src="student-images/unknown-avatar.png" alt="student image" /><br/>
                            <?php
    }?>

                                <span id="student-details"><?

 echo $row1['forename'].' '.$row1['surname'].'<br/>';?>

 </span>
                </section>

                <?php
    }
}
else{
    echo 'There have been no bookmarks added';
}

mysqli_close($con);
?>
        </div>
        <!--end wrapper div-->
    </div>
</body>

</html>
