<?php
include '../backend/db.php';

if(empty($_SESSION['name']))
{
    echo "<script>alert('Login first'); window.location.href='login.php'</script>";
    
}
else 
{
    $username= $_SESSION['name'];
    $useremail=$_SESSION['email'];
    
    $user_name=$_POST['name_'];
    $mobile=$_POST['number_'];
    $pin=$_POST['pincode'];
    $add=$_POST['address'];
    $dis=$_POST['city'];
    echo "$mobile"; 
    
    $id_ = "SELECT id FROM users WHERE email = ?";
    $stmt = $conn->prepare($id_);
    $stmt->bind_param("s", $useremail);
    $stmt->execute();
    $result = $stmt->get_result();
    
    
    if($result->num_rows>0)
    {
        $row=$result->fetch_assoc();
        $userid=$row['id'];
        //echo "$userid";
    }
    
    $sel= "SELECT * FROM add_to_cart WHERE user_id = ?";
    $st = $conn->prepare($sel);
    $st->bind_param("s", $userid);
    $st->execute();
    $result1 = $st->get_result();
    
    if($result1->num_rows>0)
    {
        while($row1=$result1->fetch_assoc())
       {    
            $pric=$row1['price'];
            $det=$row1['product_detail'];
            $imagepath=$row1['image'];
            $eventdate=date('Y-m-d');
            $oder_time=date('H:i:s');
    
            $sql = "INSERT INTO order_history (userid,name,mobile,pincode,address,district,prod_det,price,image_path,order_date,order_time) 
            VALUES ('$userid','$user_name','$mobile','$pin','$add','$dis',' $det','$pric','$imagepath',' $eventdate','$oder_time')";
            $result=$conn->query($sql);
        }
        if ($result === TRUE) {
            echo "<script>alert('order successful!'); window.location.href='../backend/orderhistory_backend.php'</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
    }
}


$conn->close();
?>
