<?php
    include 'db.php';
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $procat=$_POST['cat'];
        $pro_sub_cat=$_POST['sub_cat'];
        $file_name=$_FILES['image']['name'];
        $tempname=$_FILES['image']['tmp_name'];
        $folder='images/'. $file_name;
    

        $stmt=$conn->prepare("INSERT INTO sub_cat(category,sub_category,image) VALUES (?,?,?)");
        $stmt->bind_param("sss",$procat,$pro_sub_cat, $file_name);
        if($stmt->execute())
        {
            if(move_uploaded_file($tempname,$folder))
            {
                echo "Image uploaded successfully";
            }
            else
            {
                echo "Image not uploaded";
            }
        }
        else 
        {
            echo "Data not inseted";
        }

    }
?>