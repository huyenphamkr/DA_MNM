

<?php $__env->startSection('content'); ?>

<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- jquery validation -->
    <div class="card card-primary mt-3">

      <div class="card-header">
        <h3 class="card-title"><?php echo e($title); ?></h3>
      </div>

      <form action="" method="POST" enctype="multipart/form-data">
          
          <div class="card-body">
            <div class="row">

              <div class="col-md-6">
                <div class="form-group">
                  <label for="product">Tên sản phẩm</label>
                  <input type="text" name="name" class="form-control" id="product" placeholder="Nhập tên sản phẩm" value="<?php echo e($product->name); ?>">
                </div>  
                <div class="form-group">
                  <label for="product">Giá</label>
                  <input type="number" name="price" class="form-control" id="product" placeholder="Nhập giá sản phẩm" value="<?php echo e($product->price); ?>">
                </div>  
              </div>
        
              <div class="col-md-6">
                <div class="form-group">
                  <label for="product">Danh mục</label>
                  <select name="category" id="" class="custom-select">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option 
                      <?php if($product->category->id == $category->id): ?>
                      <?php echo e("selected"); ?>                    
                      <?php endif; ?>                
                      value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>            
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>        
                </div> 

                <div class="form-group">
                  <label for="product">Số lượng</label>
                  <input type="number" name="amount" class="form-control" id="product" placeholder="Nhập số lượng sản phẩm" value="<?php echo e($product->amount); ?>">
                </div>  
              </div>
            </div>      

            <div class="form-group">
              <label for="imageProduct">Hình ảnh</label>
              <p>
                  <img src="<?php echo e(asset($product->image)); ?>" alt="<?php echo e($product->name); ?>" style="width:300px">
              </p>
              <input type="file" name="fileimage" class="form-control" id="imageProduct">              
            </div>

            <div class="form-group clearfix">
              <label>Kích hoạt </label>
              <div class="icheck-success">
                <input type="radio" value="1" type="radio" id="active" name="active" <?php echo e((($product->active) == "1") ? 'checked' : ""); ?>>
                <label for="active">Có</label>
              </div>
              <div class="icheck-danger">
                <input type="radio"  value="0" type="radio" id="no_active" name="active" <?php echo e((($product->active) == "0") ? 'checked' : ""); ?>>
                <label for="no_active">Không</label>
              </div>
            </div>
            
            <div class="form-group">
              <label for="product">Mô tả</label>        
              <textarea type="text" name="description" id="demo" class="form-control ckeditor"><?php echo e($product->description); ?></textarea>
            </div>
            
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
          </div>
          <?php echo csrf_field(); ?>
        </form>           
    </div>
  </div>
<!--/.col (left) -->
</div>
<!-- /.row -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.warehouse.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\PTPMMNM\DA_MNM\resources\views/admin/warehouse/product/edit.blade.php ENDPATH**/ ?>