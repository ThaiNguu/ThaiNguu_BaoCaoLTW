<?php
use App\Models\Order;
//SELECT*FROM order WHERE status !=0 AND ODERBY created DESC

$list = Order::where('status','=',0)
->select('status','user_id','note','deliveryname')
 ->orderBy('created_at','DESC')
 ->get();

?>
<?php require_once '../views/backend/header.php';?>
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Thùng rác đơn hàng</h1>
                  </div>
               </div>
               
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
      <div class="card">
         <div class="card-header p-2">
            <a href="index.php?option=order&cat=trash" class="btn btn-danger text-end">
               <i class="fa fa-trash"></i> Thùng rác</a>
         </div>
         <div class="card-body p-2">
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th class="text-center" style="width:30px;">
                        <input type="checkbox">
                     </th>
                     <th style="width:115px; text-align:center;">Mã đơn hàng</th>
                     <th>Tên người nhận</th>
                     <th>Địa chỉ người nhận</th>
                     
                  </tr>
               </thead>
               <tbody>
                  <?php if (count($list) > 0) : ?>
                     <?php foreach ($list as $item) : ?>
                        <tr class="datarow">
                           <td>
                              <input type="checkbox">
                           </td>
                           <td>
                              <div class="name">
                                 <?= $item->id; ?>
                              </div>
                           </td>
                           <td>
                              <div class="name">
                                 <?= $item->deliveryname; ?>
                              </div>
                              <div class="function_style">
                                       <a href="index.php?option=order&cat=restore&id= <?=  $item->id; ?>"class="btn btn-info btn-xs">
                                       <i class="fas fa-undo"></i>Khôi phục</a> 
                                       <a href="index.php?option=order&cat=destroy&id= <?=  $item->id; ?>"class="btn btn-danger btn-xs">
                                       <i class="fas fa-trash"></i>Xoá vĩnh viễn</a>
                                    </div>
                           </td>
                           <td><?= $item->deliveryaddress; ?></td>
                        </tr>
                     <?php endforeach; ?>
                  <?php endif; ?>
               </tbody>
            </table>
         </div>
      </div>
   </section>
      </div>
      <!-- END CONTENT-->
<?php require_once '../views/backend/footer.php';?>      
     