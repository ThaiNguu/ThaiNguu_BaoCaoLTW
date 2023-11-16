<?php
use App\Models\Post;
//SELECT*FROM post WHERE status !=0 AND ODERBY created DESC

$id = $_REQUEST['id'];
$post = Post::find($id);
if ($post == NULL)
{
    header("location:index.php?option=post&cat=trash");
}

?>
<?php require_once '../views/backend/header.php';?>
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Chi tiết bài viết</h1>
                  </div>
               </div>
               
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header">
                  <div class="row">
                  <div class="col-md-12 text-right"><a href="index.php?option=post" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a></div>
                  
                  </div>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-4">
                        <div class="mb-3">
                           <label>Tên bài viết (*)</label>
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
                           <td>Mã bài viết</td>
                           <td><?=$post->id;?></td>
                         </tr>
                         <tr>
                           <td>Mã chủ đề</td>
                           <td><?=$post->topic_id;?></td>
                         </tr>
                         <tr>
                           <td>Tiêu đề bài viết</td>
                           <td><?=$post->title;?></td>
                         </tr>  
                         <tr>
                           <td>Slug</td>
                           <td><?=$post->slug;?></td>
                         </tr> 
                         <tr>
                           <td>Chi tiết bài viết</td>
                           <td><?=$post->detail;?></td>
                         </tr> 
                         
                         <tr>
                           <td>Hình ảnh</td>
                           <td><img style="width:100px;" src="../public/images/post/<?=  $post->image; ?>" alt="<?=$post->image;?>" ></td>
                         </tr> 
                         <tr>
                           <td>Kiểu bài viết</td>
                           <td><?=$post->type;?></td>
                         </tr>
                         <tr>
                           <td>Từ khóa</td>
                           <td><?=$post->description;?></td>
                         </tr> 
                         <tr>
                           <td>Ngày tạo</td>
                           <td><?=$post->created_at;?></td>
                         </tr> 
                         <tr>
                           <td>Người tạo</td>
                           <td><?=$post->created_by;?></td>
                         </tr> 
                         <tr>
                           <td>Ngày sửa</td>
                           <td><?=$post->updated_at;?></td>
                         </tr> 
                         <tr>
                           <td>Người sửa</td>
                           <td><?=$post->updated_by;?></td>
                         </tr> 
                         <tr>
                           <td>Trạng thái</td>
                           <td><?=$post->status;?></td>
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
     