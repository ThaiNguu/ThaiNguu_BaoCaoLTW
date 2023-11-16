<?php
use App\Models\Contact;
//SELECT*FROM contact WHERE status !=0 AND ODERBY created DESC

$id = $_REQUEST['id'];
$contact = Contact::find($id);
if ($contact == NULL)
{
    header("location:index.php?option=contact&cat=trash");
}

?>
<?php require_once '../views/backend/header.php';?>
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Chi tiết liên hệ</h1>
                  </div>
               </div>
               
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header">
                  <div class="row">
                  <div class="col-md-12 text-right"><a href="index.php?option=contact" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a></div>
                  
                  </div>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-4">
                        <div class="mb-3">
                           <label>Tên liên hệ (*)</label>
                           <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Slug</label>
                           <input type="text" name="slug" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Hình đại diện</label>
                           <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Trạng thái</label>
                           <select name="status" class="form-control">
                              <option value="1">Xuất bản</option>
                              <option value="2">Chưa xuất bản</option>
                           </select>
                        </div>
                     </div>
                     <div class="card-body">
                        <div class="row">
                     <div class="col-md-12">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th>Tên trường</th>
                                 <th>Giá trị</th>
                              </tr>
                           </thead>
                           <tbody>
                           <tr>
                           <td>Mã liên hệ</td>
                           <td><?=$contact->id;?></td>
                         </tr>
                         <tr>
                           <td>Họ và tên</td>
                           <td><?=$contact->name;?></td>
                         </tr> 
                         <tr>
                           <td>Email</td>
                           <td><?=$contact->email;?></td>
                         </tr> 
                         <tr>
                           <td>Điện thoại</td>
                           <td><?=$contact->phone;?></td>
                         </tr> 
                         <tr>
                           <td>Tiêu đề</td>
                           <td><?=$contact->title;?></td>
                         </tr> 
                         <tr>
                           <td>Chi tiết</td>
                           <td><?=$contact->content;?></td>
                         </tr> 
                         <tr>
                           <td>Nội dung liên hệ</td>
                           <td><?=$contact->replay_id;?></td>
                         </tr> 
                         <tr>
                           <td>Ngày tạo</td>
                           <td><?=$contact->created_at;?></td>
                         </tr> 
                         <tr>
                           <td>Người tạo</td>
                           <td><?=$contact->created_by;?></td>
                         </tr> 
                         <tr>
                           <td>Ngày sửa</td>
                           <td><?=$contact->updated_at;?></td>
                         </tr> 
                         <tr>
                           <td>Người sửa</td>
                           <td><?=$contact->updated_by;?></td>
                         </tr> 
                         <tr>
                           <td>Trạng thái</td>
                           <td><?=$contact->status;?></td>
                         </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      <!-- END CONTENT-->
<?php require_once '../views/backend/footer.php';?>      
     