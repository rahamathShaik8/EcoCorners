<!DOCTYPE html>
<html lang="en">
    <head>
        <title>EcoCorner's file upload</title>  
    </head>
    <body>
        <h2>Upload File</h2>
        <form  action="upload.php"method="post" enctype="multipart/form-data">
            <input type="file" name="myfile" required>
            <br><br>
            <input type="submit" value="Upload" name="upload">
        </form>
        <?php 
        if (isset($_POST['upload'])){
            $filename=$_FILES['myfile']['name'];
            $tempName=$_FILES['myfile']['tmp_name'];
            $uploadpath="uploads/".$filename;
            if(move_uploaded_file($tempName, $uploadpath)){
                echo "<p style='color:green;'>File uploaded successfully</p>";
echo "
<form action='download.php' method='get'>
    <input type='hidden' name='file' value='$filename'>
    <button type='submit'>Download File</button>
</form>
";
            } else {
                echo "<p style='color:red;'>Failed to upload file</p>";
            }
        }
        ?>
    </body>
</html>