<?php
use App\Models\banner;
//SELECT*FROM banner WHERE status !=0 AND ODERBY created DESC

$id = $_REQUEST['id'];
$banner = banner::find($id);
if ($banner == NULL)
{
    header("location:index.php?option=banner&cat=trash");
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
                  <div class="col-md-12 text-right"><a href="index.php?option=banner" class="btn btn-sm btn-info">
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
                           <td>Mã slider</td>
                           <td><?=$banner->id;?></td>
                         </tr>
                         <tr>
                           <td>Tên slider</td>
                           <td><?=$banner->name;?></td>
                         </tr> 
                         <tr>
                           <td>Liên kết</td>
                           <td><?=$banner->link;?></td>
                         </tr> 
                         <tr>
                           <td>Vị trí</td>
                           <td><?=$banner->position;?></td>
                         </tr> 
                          
                         <tr>
                           <td>Hình ảnh</td>
                           <td><img style="width:100px;" src="../public/images/banner/<?=  $item->image; ?>" alt="<?=$item->image;?>" ></td>
                         </tr> 
                         <tr>
                           <td>Thứ tự</td>
                           <td><?=$banner->sort_order;?></td>
                         </tr>
                          
                         <tr>
                           <td>Ngày tạo</td>
                           <td><?=$banner->created_at;?></td>
                         </tr> 
                         <tr>
                           <td>Người tạo</td>
                           <td><?=$banner->created_by;?></td>
                         </tr> 
                         <tr>
                           <td>Ngày sửa</td>
                           <td><?=$banner->updated_at;?></td>
                         </tr> 
                         <tr>
                           <td>Người sửa</td>
                           <td><?=$banner->updated_by;?></td>
                         </tr> 
                         <tr>
                           <td>Trạng thái</td>
                           <td><?=$banner->status;?></td>
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
     