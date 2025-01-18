<?php
    include 'db.php';
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        
        $proprice=$_POST['pro_price'];
        $prodet=$_POST['pro_det'];
        $procat=$_POST['pro_cat'];
        $prosubcat=$_POST['pro_sub_cat'];

        $file_name=$_FILES['image']['name'];
        $tempname=$_FILES['image']['tmp_name'];
        $folder='images/'. $file_name;

        $stmt=$conn->prepare("INSERT INTO product(pro_price,pro_detail,image_path,pro_cat,pro_sub_cat) 
        VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss",$proprice,$prodet, $file_name,$procat,$prosubcat);
        if($stmt->execute())
        {
            if(move_uploaded_file($tempname,$folder))
            {
                echo "<script>alert('sub category added successfully'); window.location.href='adm_pan.php'</script>";
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