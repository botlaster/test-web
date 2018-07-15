<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Form</title>
    </head>
    <body>
        <h3>Form Ranks</h3>
        <form name="frm" method="POST" action="save.php" enctype="multipart/form-data">
            <label> Title :</label><input type="text" name="rank_title" /><br/>
            <label>Min :</label><input type="text" name="rank_min" /></br>
            <label>Special :</label>
            <input type="radio" name="rank_special" id="rank_special1" value="1" checked="checked" />
            <label for="rank_special1">Yes</label>
            <input type="radio" name="rank_special" id="rank_special2" value="0"/>
            <label for="rank_special2">No</label><br/>
            <label>Image :</label><input type="file" name="rank_image" /></br>
            <input type="submit" name="save" value="save" />
        </form>
    </body>
</html>
