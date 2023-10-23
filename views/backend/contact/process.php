<?php

use App\Models\Contact;
use App\Libraries\MyClass;

if(isset($_contact['THEM']))
{
    $contact=new Contact();
    //lấy từ form
    $contact->name = $_contact['name'];
    $contact->slug =(strlen($_contact['slug'])>0) ? $_contact['slug']: MyClass::str_slug($_contact['name']);
    $contact->description = $_contact['description'];
    $contact->status = $_contact['status'];
    //Xử lí uploadfile
    if(strlen($_FILES['image']['name'])>0){
        $target_dir = "../public/images/contact/";
        $target_file= $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if(in_array($extension, ['jpg','jpeg','png','gif','webp']))
        {
            $filename=$contact->slug.'.'.$extension;
            move_uploaded_file($_FILES['image']['tmp_name'],$target_dir . $filename);
            $contact->image =$filename;
        }
    }
    //tư sinh ra
    $contact->created_at = date('Y-m-d-H:i:s');
    $contact->created_by = (isset($_SESSION['user_id']))? $_SESSION['user_id'] : 1;
    var_dump($contact);
    //luu vao csdl
    //ínet
    $contact->save();
    $_SESSION['message']="Thêm thành công";
    header("location:index.php?option=contact");
}





if(isset($_contact['CAPNHAT']))
{
    $id=$_contact['id'];
    $contact=Contact::find($id);
    if ($contact == NULL)
{
    header("location:index.php?option=contact");
}
    //lấy từ form
    $contact->name = $_contact['name'];
    $contact->slug =(strlen($_contact['slug'])>0) ? $_contact['slug']: MyClass::str_slug($_contact['name']);
    $contact->description = $_contact['description'];
    $contact->status = $_contact['status'];
    //Xử lí uploadfile
    if(strlen($_FILES['image']['name'])>0){
        //Xóa hình cũ

        //Thêm hình mới
        $target_dir = "../public/images/contact/";
        $target_file= $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if(in_array($extension, ['jpg','jpeg','png','gif','webp']))
        {
            $filename=$contact->slug.'.'.$extension;
            move_uploaded_file($_FILES['image']['tmp_name'],$target_dir . $filename);
            $contact->image =$filename;
        }
    }
    //tư sinh ra
    $contact->updated_at = date('Y-m-d-H:i:s');
    $contact->updated_by = (isset($_SESSION['user_id']))? $_SESSION['user_id'] : 1;
    var_dump($contact);
    //luu vao csdl
    //ínet
    $contact->save();
    //
    header("location:index.php?option=contact");
}

