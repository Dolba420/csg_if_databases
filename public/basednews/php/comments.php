<form style="text-align: center;" action="postcomment.php?artikel=<?php echo $_GET['artikel'];?>" method="post" enctype="multipart/form-data">

    <input type="text" name="commentname" placeholder="naam">
    
    <textarea placeholder="Reactie" style="resize: none;" name="bericht" rows="15" cols=70></textarea>
<input type="submit" value="Posten" name="submit">
<br><br>

<?php
    $sql = 'SELECT * FROM `comments` WHERE artikel_id=' . $_GET['artikel'];
    $records = mysqli_query($DBverbinding, $sql);
        if (mysqli_num_rows($records) > 0) {
            while ($dbid = mysqli_fetch_assoc($records)) {
                echo '<p>' . $dbid["naam"] . ' zegt:<p>';
                echo '<p>' . $dbid["bericht"] . '<p>';
            }
        }


?>
</form>