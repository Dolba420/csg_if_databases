<form style="padding-left: 200px; display:table;" action="postcomment.php?artikel=<?php echo $_GET['artikel'];?>" method="post" enctype="multipart/form-data">

    <input style="margin-right: 100%; margin-bottom: 20px;" type="text" name="commentname" placeholder="naam">
    <textarea style="margin-right: 100%; margin-bottom: 20px;" placeholder="Reactie" style="resize: none;" name="bericht" rows="15" cols=70></textarea>
<input style="margin-bottom: 50px;" type="submit" value="Posten" name="submit">

<?php
    $sql = 'SELECT * FROM `comments` WHERE artikel_id=' . $_GET['artikel'];
    $records = mysqli_query($DBverbinding, $sql);
        if (mysqli_num_rows($records) > 0) {
            while ($dbid = mysqli_fetch_assoc($records)) {
                echo '<p style="margin-bottom: 10px;"><i><b>' . $dbid["naam"] . '</b></i>' . ' zei:<p>';
                echo '<p style="margin-bottom: 10px;">' . $dbid["bericht"] . '<p>';
                echo '<p>' . $dbid["datum"] . " " . $dbid["tijd"];
                echo '<hr style="margin-bottom: 30px;">';
            }
        }


?>
</form>
