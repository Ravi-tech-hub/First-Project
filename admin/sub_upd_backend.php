<?php
include '../backend/db.php';
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $subcat=$_POST['subcat'];
    $img=$_POST['old_img'];
    $cat=$_POST['categ'];
    //echo "$cat";

    $file_name=$_FILES['image']['name'];
    $tempname=$_FILES['image']['tmp_name'];
    $folder='../images/'.$file_name;

    if(empty($file_name))
    {
        $sql="UPDATE sub_cat  SET sub_category=?, image=? WHERE image=?";
        $stmt=$conn->prepare($sql);
        $stmt->bind_param("sss",$subcat,$img,$img);
        $result=$stmt->execute(); 

        if($result)
        {
            echo "<script>alert('Sub category updated successfully'); window.location.href='adm_pan_women.php'</script>";
    
        }   
    }
    else
    {
        $sql="UPDATE sub_cat  SET sub_category=?, image=? WHERE image=?";
        $stmt=$conn->prepare($sql);
        $stmt->bind_param("sss",$subcat,$file_name,$img);
        $result=$stmt->execute();

        if(move_uploaded_file($tempname,$folder))
        {
            echo "<script>alert('sub category updated successfully'); window.location.href='adm_pan_women.php'</script>";
        }
        else
        {
            echo "Not Update";
        }
    }
    
}
?>