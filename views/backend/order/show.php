<?php
use App\Models\Order;
//SELECT*FROM order WHERE status !=0 AND ODERBY created DESC

$id = $_REQUEST['id'];
$order = Order::find($id);
if ($order == NULL)
{
    header("location:index.php?option=order&cat=trash");
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
                  <div class="col-md-12 text-right"><a href="index.php?option=order" class="btn btn-sm btn-info">
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
                           <td>Mã đơn hàng</td>
                           <td><?=$order->id;?></td>
                         </tr>
                         <tr>
                           <td>Mã khách hàng</td>
                           <td><?=$order->user_id;?></td>
                         </tr> 
                         <tr>
                           <td>Địa chỉ người nhận</td>
                           <td><?=$order->deliveryaddess;?></td>
                         </tr> 
                         <tr>
                           <td>Tên người nhận</td>
                           <td><?=$order->deliveryname;?></td>
                         </tr> 
                         <tr>
                           <td>Điện thoại người nhận</td>
                           <td><?=$order->deliveryphone;?></td>
                         </tr>
                         <tr>
                           <td>Email người nhận</td>
                           <td><?=$order->deliveryemail;?></td>
                         </tr>
                         <tr>
                           <td>Code đơn hàng</td>
                           <td><?=$order->note;?></td>
                         </tr>
                         
                         <tr>
                           <td>Ngày tạo</td>
                           <td><?=$order->created_at;?></td>
                         </tr> 
                         <tr>
                           <td>Người tạo</td>
                           <td><?=$order->created_by;?></td>
                         </tr> 
                         <tr>
                           <td>Ngày sửa</td>
                           <td><?=$order->updated_at;?></td>
                         </tr> 
                         <tr>
                           <td>Người sửa</td>
                           <td><?=$order->updated_by;?></td>
                         </tr> 
                         <tr>
                           <td>Trạng thái</td>
                           <td><?=$order->status;?></td>
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
     