<?php
use App\Models\Contact;
//SELECT*FROM category WHERE status !=0 AND ODERBY created DESC
$id = $_REQUEST['id'];
$contact = Contact::find($id);
if ($contact == NULL)
{
    header("location:index.php?option=contact");
}

?>
<form action="index.php?option=contact&cat=process" method="contact"
enctype="multipart/form-data">
<?php require_once '../views/backend/header.php';?>
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Cập nhật liên hệ</h1>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header text-right">
                  <button class="btn btn-sm btn-success" type="
                  submit" name="CAPNHAT">
                     <i class="fa fa-save" aria-hidden="true"></i>
                     Lưu
                  </button>
                  <a href="index.php?option=contact" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                       <div class="mb-3">
                           <input type="hidden" name = "id" value="<?= $contact->id;?>">
                           <label label>Tên liên hệ (*)</label>
                           <input type="text" value="<?= $contact->name;?>" name= "name" class="form-control">
                        </div>
                        <div class="mb-3">
                           <input type="hidden" phone = "phone" value="<?= $contact->phone;?>">
                           <label label>Điện thoại (*)</label>
                           <input type="text" value="<?= $contact->phone;?>" name= "phone" class="form-control">
                        </div>
                        <div class="mb-3">
                           <input type="hidden" email = "email" value="<?= $contact->email;?>">
                           <label label>Email (*)</label>
                           <input type="text" value="<?= $contact->email;?>" name= "email" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Trạng thái</label>
                           <select name="status" class="form-control">
                              <option value="1" <?=($contact->status==1)?'selected':'';?> >Xuất bản</option>
                              <option value="2"<?=($contact->status==2)?'selected':'';?>>Chưa xuất bản</option>
                           </select>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      </form>
      <!-- END CONTENT-->
<?php require_once '../views/backend/footer.php';?>      
     