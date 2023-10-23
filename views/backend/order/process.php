<?php

use App\Models\Order;
use App\Libraries\MyClass;

if(isset($_order['THEM']))
{
    $order=new Order();
    //lấy từ form
    $order->name = $_order['name'];
    $order->slug =(strlen($_order['slug'])>0) ? $_order['slug']: MyClass::str_slug($_order['name']);
    $order->description = $_order['description'];
    $order->status = $_order['status'];
    //Xử lí uploadfile
    if(strlen($_FILES['image']['name'])>0){
        $target_dir = "../public/images/order/";
        $target_file= $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if(in_array($extension, ['jpg','jpeg','png','gif','webp']))
        {
            $filename=$order->slug.'.'.$extension;
            move_uploaded_file($_FILES['image']['tmp_name'],$target_dir . $filename);
            $order->image =$filename;
        }
    }
    //tư sinh ra
    $order->created_at = date('Y-m-d-H:i:s');
    $order->created_by = (isset($_SESSION['user_id']))? $_SESSION['user_id'] : 1;
    var_dump($order);
    //luu vao csdl
    //ínet
    $order->save();
    $_SESSION['message']="Thêm thành công";
    header("location:index.php?option=order");
}





if(isset($_order['CAPNHAT']))
{
    $id=$_order['id'];
    $order=Order::find($id);
    if ($order == NULL)
{
    header("location:index.php?option=order");
}
    //lấy từ form
    $order->name = $_order['name'];
    $order->slug =(strlen($_order['slug'])>0) ? $_order['slug']: MyClass::str_slug($_order['name']);
    $order->description = $_order['description'];
    $order->status = $_order['status'];
    //Xử lí uploadfile
    if(strlen($_FILES['image']['name'])>0){
        //Xóa hình cũ

        //Thêm hình mới
        $target_dir = "../public/images/order/";
        $target_file= $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if(in_array($extension, ['jpg','jpeg','png','gif','webp']))
        {
            $filename=$order->slug.'.'.$extension;
            move_uploaded_file($_FILES['image']['tmp_name'],$target_dir . $filename);
            $order->image =$filename;
        }
    }
    //tư sinh ra
    $order->updated_at = date('Y-m-d-H:i:s');
    $order->updated_by = (isset($_SESSION['user_id']))? $_SESSION['user_id'] : 1;
    var_dump($order);
    //luu vao csdl
    //ínet
    $order->save();
    //
    header("location:index.php?option=order");
}

