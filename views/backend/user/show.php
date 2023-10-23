<?php
use App\Models\User;
//SELECT*FROM user WHERE status !=0 AND ODERBY created DESC

$id = $_REQUEST['id'];
$user = User::find($id);
if ($user == NULL)
{
    header("location:index.php?option=user&cat=trash");
}

?>
<?php require_once '../views/backend/header.php';?>
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Chi tiết thương hiệu</h1>
                  </div>
               </div>
               
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header">
                  <div class="row">
                  <div class="col-md-12 text-right"><a href="index.php?option=user" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a></div>
                  
                  </div>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-4">
                        <div class="mb-3">
                           <label>Tên thương hiệu (*)</label>
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
                           <td>Mã tài khoản</td>
                           <td><?=$user->id;?></td>
                         </tr>
                         <tr>
                           <td>Họ và tên</td>
                           <td><?=$user->name;?></td>
                         </tr> 
                         <tr>
                           <td>Tên đăng nhập</td>
                           <td><?=$user->username;?></td>
                         </tr> 
                         <tr>
                           <td>Mật khẩu</td>
                           <td><?=$user->password;?></td>
                         </tr>
                         <tr>
                           <td>Email</td>
                           <td><?=$user->email;?></td>
                         </tr> 
                         <tr>
                           <td>Giới tính</td>
                           <td><?=$user->gender;?></td>
                         </tr> 
                         <tr>
                           <td>Điện thoại</td>
                           <td><?=$user->phone;?></td>
                         </tr> 
                         <tr>
                           <td>Hình ảnh</td>
                           <td><img style="width:100px;" src="../public/images/user/<?=  $item->image; ?>" alt="<?=$item->image;?>" ></td>
                         </tr> 
                         <tr>
                           <td>Quyền truy cập</td>
                           <td><?=$user->roles;?></td>
                         </tr> 
                         <tr>
                           <td>Địa chỉ</td>
                           <td><?=$user->addess;?></td>
                         </tr> 
                         <tr>
                           <td>Ngày tạo</td>
                           <td><?=$user->created_at;?></td>
                         </tr> 
                         <tr>
                           <td>Người tạo</td>
                           <td><?=$user->created_by;?></td>
                         </tr> 
                         <tr>
                           <td>Ngày sửa</td>
                           <td><?=$user->updated_at;?></td>
                         </tr> 
                         <tr>
                           <td>Người sửa</td>
                           <td><?=$user->updated_by;?></td>
                         </tr> 
                         <tr>
                           <td>Trạng thái</td>
                           <td><?=$user->status;?></td>
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
     