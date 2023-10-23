<?php

use App\Models\user;
use App\Libraries\MyClass;

if(isset($_user['THEM']))
{
    $user=new User();
    //lấy từ form
    $user->name = $_user['name'];
    $user->slug =(strlen($_user['slug'])>0) ? $_user['slug']: MyClass::str_slug($_user['name']);
    $user->description = $_user['description'];
    $user->status = $_user['status'];
    //Xử lí uploadfile
    if(strlen($_FILES['image']['name'])>0){
        $target_dir = "../public/images/user/";
        $target_file= $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if(in_array($extension, ['jpg','jpeg','png','gif','webp']))
        {
            $filename=$user->slug.'.'.$extension;
            move_uploaded_file($_FILES['image']['tmp_name'],$target_dir . $filename);
            $user->image =$filename;
        }
    }
    //tư sinh ra
    $user->created_at = date('Y-m-d-H:i:s');
    $user->created_by = (isset($_SESSION['user_id']))? $_SESSION['user_id'] : 1;
    var_dump($user);
    //luu vao csdl
    //ínet
    $user->save();
    $_SESSION['message']="Thêm thành công";
    header("location:index.php?option=user");
}





if(isset($_user['CAPNHAT']))
{
    $id=$_user['id'];
    $user=User::find($id);
    if ($user == NULL)
{
    header("location:index.php?option=user");
}
    //lấy từ form
    $user->name = $_user['name'];
    $user->slug =(strlen($_user['slug'])>0) ? $_user['slug']: MyClass::str_slug($_user['name']);
    $user->description = $_user['description'];
    $user->status = $_user['status'];
    //Xử lí uploadfile
    if(strlen($_FILES['image']['name'])>0){
        //Xóa hình cũ

        //Thêm hình mới
        $target_dir = "../public/images/user/";
        $target_file= $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if(in_array($extension, ['jpg','jpeg','png','gif','webp']))
        {
            $filename=$user->slug.'.'.$extension;
            move_uploaded_file($_FILES['image']['tmp_name'],$target_dir . $filename);
            $user->image =$filename;
        }
    }
    //tư sinh ra
    $user->updated_at = date('Y-m-d-H:i:s');
    $user->updated_by = (isset($_SESSION['user_id']))? $_SESSION['user_id'] : 1;
    var_dump($user);
    //luu vao csdl
    //ínet
    $user->save();
    //
    header("location:index.php?option=user");
}

