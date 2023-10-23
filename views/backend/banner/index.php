<?php

use App\Models\Banner;
use App\Libraries\MyClass;
//SELECT*FROM category WHERE status !=0 AND ODERBY created DESC

$list = Banner::where('status','!=',0)
->select('status','id','name','position','link')
 ->orderBy('created_at','DESC')
 ->get();

?>
<?php require_once '../views/backend/header.php'; ?>
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Tất cả banner</h1>
                     <a href="banner_create.html" class="btn btn-sm btn-primary">Thêm banner</a>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
         <div class="card">
               <div class="card-header">
                  <div class="row">
                  <div class="col-md-6">
                     <a href="index.php?option=banner">Tất cả</a> |
                     <a href="index.php?option=banner&cat=trash">Thùng rác</a>
                  </div>
                  <div class="col-md-6 text-right"><button class="btn btn-sm btn-success" type="
                  submit" name="THEM">
                     <i class="fa fa-save" aria-hidden="true"></i>
                     Lưu
                  </button></div>
                  
                  </div>
               </div>
               <div class="card-body">
               <?php require_once '../views/backend/message.php';?>
                  <table class="table table-bordered" id="mytable">
                     <thead>
                        <tr>
                           <th class="text-center" style="width:30px;">
                              <input type="checkbox">
                           </th>
                           <th class="text-center" style="width:130px;">Hình ảnh</th>
                           <th>Tên banner</th>
                           <th>Liên kết</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php if (count ($list) > 0) : ?> 
                                 <?php foreach ($list as $item) : ?>
                        <tr class="datarow">
                           <td>
                              <input type="checkbox">
                           </td>
                           <td>
                              <img src="../public/images/<?php  $item->image; ?>" alt="<?php  $item->image; ?>">
                           </td>
                           <td>
                              <div class="name">
                                 <?= $item->name; ?>
                              </div>
                              <div class="function_style">
                              <?php if($item->status==1): ?>
                                       <a href="index.php?option=banner&cat=status&id=<?= $item->id; ?>"class="btn btn-success btn-xs">
                                       <i class="fas fa-toggle-on"></i>Hiện</a>
                                       <?php else: ?>
                                          <a class="text-danger" href="index.php?option=banner&cat=status&id=<?= $item->id; ?>"class="btn btn-danger btn-xs">
                                          <i class="fas fa-toggle-off"></i>Ẩn</a>
                                       <?php endif; ?> 
                                 
                                       <a href="index.php?option=banner&cat=edit&id= <?=  $item->id; ?>"class="btn btn-primary btn-xs">
                                       <i class="fas fa-edit"></i> Chỉnh sửa</a> 
                                       <a href="index.php?option=banner&cat=show&id= <?=  $item->id; ?>"class="btn btn-info btn-xs">
                                       <i class="fas fa-eye"></i>Chi tiết</a> 
                                       <a href="index.php?option=banner&cat=delete&id= <?=  $item->id; ?>"class="btn btn-danger btn-xs">
                                       <i class="fas fa-trash"></i>Xoá</a>
                              </div>
                           </td>
                           <td><?= $item->link; ?></td>
                        </tr>
                        <?php endforeach;?>
                        <?php endif;?>
                     </tbody>
                  </table>
               </div>
            </div>
         </section>
      </div>
      <!-- END CONTENT-->
<?php require_once '../views/backend/footer.php'; ?>
     