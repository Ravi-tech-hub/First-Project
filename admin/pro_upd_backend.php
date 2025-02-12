<?php
include '../backend/db.php';
if($_SERVER['REQUEST_METHOD']=='POST')
{   
    $pri=$_POST['price'];
    $det=$_POST['detail'];
    $subcat=$_POST['pro_sub'];
    $img=$_POST['old_img'];
    //echo "$img";
    // $cat=$_POST['categ'];
    // echo "$cat";

    $file_name=$_FILES['image']['name'];
    $tempname=$_FILES['image']['tmp_name'];
    $folder='../images/'.$file_name;

    if(empty($file_name))
    {
        $sql="UPDATE product  SET pro_price=?,pro_detail=?,pro_sub_cat=?,image_path=? WHERE image_path=?";
        $stmt=$conn->prepare($sql);
        $stmt->bind_param("sssss", $pri,$det,$subcat,$img,$img);
        $result=$stmt->execute();  
        
        if($result)
        {
            echo "<script>alert('product updated successfully'); window.location.href='adm_pan_women.php'</script>";
    
        }   
    }
    else
    {
        $sql="UPDATE product  SET pro_price=?,pro_detail=?,pro_sub_cat=?,image_path=? WHERE image_path=?";
        $stmt=$conn->prepare($sql);
        $stmt->bind_param("sssss", $pri,$det,$subcat, $file_name,$img);
        $result=$stmt->execute();
        
        if(move_uploaded_file($tempname,$folder))
        {
            echo "<script>alert('Product  updated successfully'); window.location.href='adm_pan_women.php'</script>";
        }
        else
        {
            echo "Not Update";
        }
    }

}
?>