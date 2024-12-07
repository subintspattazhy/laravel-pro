<?php $__env->startSection('title', 'Class Room'); ?>

<?php $__env->startSection('content'); ?>

<style>
    .custom-container {
      background-color: #f8f9fa;
      padding: 30px;
      border-radius: 10px;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="custom-container">
      <h2>Enter Class Name</h2>
      <form role="form" method="post" action="<?php echo e(isset($class) ? route('classroom.update', $class->id) : route('classroom.store')); ?>">

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php echo csrf_field(); ?>

        <?php if(isset($class)): ?>
        <?php echo method_field('put'); ?>
        <?php endif; ?>

        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="<?php echo e($class->name ?? ''); ?>" placeholder="Enter your name">
          
          <label class="switch">
            <input type="checkbox" name="active" <?php echo e(isset($class) && $class->active ? 'checked' : ''); ?>><span class="slider"></span></label>
        </div>
        <button type="submit" class="btn btn-primary">
          <?php echo e(isset($class) ? 'update' : 'submit'); ?>

        </button>
      </form>

      <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo e(session('success')); ?>

        </div>
      <?php endif; ?>

    </div>
  </div>
</body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel12.loc/resources/views/classroom/create.blade.php ENDPATH**/ ?>