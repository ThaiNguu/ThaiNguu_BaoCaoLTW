<?php
use App\Models\Product;
//SELECT*FROM product WHERE status !=0 AND ODERBY created DESC

// $list = Product::where('status','=',0)
// ->select('status','id','image','name','slug')
//  ->productBy('created_at','DESC')
//  ->get();
$list = Product::join('category', 'product.category_id', '=', 'category.id')
   ->join('brand', 'product.brand_id', '=', 'brand.id')
   ->where('product.status', '=', 0)
   ->select("product.*", "category.name as category_name", "brand.name as brand_name")
   ->get();

?>
<?php require_once '../views/backend/header.php';?>
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Thùng rác</h1>
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
                     <a href="index.php?option=product">Tất cả</a> |
                     <a href="index.php?option=product&cat=trash">Thùng rác</a>
                  </div>
                  <div class="col-md-6 text-right"><a href="index.php?option=product" class="btn btn-sm btn-info">
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
                        <table class="table table-bproducted">
                           <thead>
                              <tr>
                                 <th class="text-center" style="width:30px;">
                                    <input type="checkbox">
                                 </th>
                                 <th class="text-center" style="width:130px;">Hình ảnh</th>
                                 <th>Tên thương hiệu</th>
                                 <th>Tên slug</th>
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
                                    <img src="../public/images/product/<?php  $item->image; ?>" alt="<?php  $item->image; ?>">
                                 </td>
                                 <td>
                                    <div class="name">
                                    <?= $item->name; ?>
                                    </div>
                                    <div class="function_style">
                                       <a href="index.php?option=product&cat=restore&id= <?=  $item->id; ?>"class="btn btn-info btn-xs">
                                       <i class="fas fa-undo"></i>Khôi phục</a> 
                                       <a href="index.php?option=product&cat=destroy&id= <?=  $item->id; ?>"class="btn btn-danger btn-xs">
                                       <i class="fas fa-trash"></i>Xoá vĩnh viễn</a>
                                    </div>
                                 </td>
                                 <td><?= $item->slug; ?></td>
                              </tr>
                              <?php endforeach; ?>
                              <?php endif; ?>
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
     