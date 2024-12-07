<?php $__env->startSection('title', 'Students'); ?>

<?php $__env->startSection('content'); ?>

<div class="container mt-5">
    <h2>Registration Form</h2>
    <form method="POST" action="<?php echo e(isset($students) ? route('students.update', $students->id) : route('students.store')); ?>">

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
        <?php if(isset($students)): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>

        <div class="row">
            <!-- Name -->
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name"  name="name" value="<?php echo e($students->name ?? ''); ?>" placeholder="Enter your name">
            </div>

            <!-- Father Name -->
            <div class="col-md-6 mb-3">
                <label for="fatherName" class="form-label">Father Name</label>
                <input type="text" class="form-control" id="fatherName" name="father_name"  value="<?php echo e($students->father_name ?? ''); ?>" placeholder="Enter father's name">
            </div>
        </div>

        <div class="row">
            <!-- Mother Name -->
            <div class="col-md-6 mb-3">
                <label for="motherName" class="form-label">Mother Name</label>
                <input type="text" class="form-control" id="motherName" name="mother_name" value="<?php echo e($students->mother_name ?? ''); ?>" placeholder="Enter mother's name">
            </div>

            <!-- District (Dropdown) -->
            <div class="col-md-6 mb-3">
                <label for="district" class="form-label">District</label>
                <select class="form-select" id="district" name="district">
                    <option value="no" selected disabled>Select your district</option>
                    <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($district); ?>" <?php echo e(isset($students) && $students->district == $district ? 'selected' : ''); ?>>
                        <?php echo e($district); ?>

                    </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>

        <div class="row">
            <!-- Place -->
            <div class="col-md-6 mb-3">
                <label for="place" class="form-label">Place</label>
                <input type="text" class="form-control" id="place" name="place" value="<?php echo e($students->place ?? ''); ?>" placeholder="Enter your place">
            </div>

            <!-- Abroad Place -->
            <div class="col-md-6 mb-3">
                <label for="abroadPlace" class="form-label">Abroad Place</label>
                <input type="text" class="form-control" id="abroadPlace" name="abroad_place" value="<?php echo e($students->abroad_place ?? ''); ?>" placeholder="Enter abroad place (if any)">
            </div>
        </div>

        <div class="row">
            <!-- Date of Birth -->
            <div class="col-md-6 mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="dob" value="<?php echo e($students->dob ?? ''); ?>" name="dob">
            </div>

            <!-- Class (Dropdown) -->
            <div class="col-md-6 mb-3">
                <label for="class" class="form-label">Class</label>
                <select class="form-select" id="class" name="current_class_room_id">
                    <option value="mp" selected disabled>Select your class</option>
                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($class->id); ?>" <?php echo e(isset($students) && $students->current_class_room_id == $class->id ? 'selected' : ''); ?>>
                        <?php echo e($class->name); ?>

                    </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>

        <div class="row">
            <!-- Teacher (Dropdown) -->
            <div class="col-md-6 mb-3">
                <label for="teacher" class="form-label" >Teacher</label>
                <select class="form-select" id="teacher" name="teacher">
                    <option value="" selected disabled>Select your teacher</option>
                    <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($teacher->id); ?>" <?php echo e((isset($students) && $students->teacher_id == $teacher->id) ? 'selected' : ''); ?>><?php echo e($teacher->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
 
            <!-- Phone -->
            <div class="col-md-6 mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo e($students->phone ?? ''); ?>" placeholder="Enter your phone number">
            </div>
        </div>

        <div class="row">
            <!-- WhatsApp -->
            <div class="col-md-6 mb-3">
                <label for="whatsapp" class="form-label">WhatsApp</label>
                <input type="tel" class="form-control" id="whatsapp" name="whatsapp" value="<?php echo e($students->whatsapp ?? ''); ?>" placeholder="Enter your WhatsApp number">
            </div>

            <!-- Date of Birth -->
            <div class="col-md-6 mb-3">
                <label for="dob" class="form-label">Date of Join</label>
                <input type="date" class="form-control" id="join" value="<?php echo e($students->join_date ?? ''); ?>" name="join_date">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="dob" class="form-label">active</label>
                <input type="checkbox" name="active" <?php echo e(isset ($students) && $students->active ? 'checked' : ''); ?>>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">
                <?php echo e(isset($students) ? 'Update' : 'Submit'); ?>

            </button>
        </div>
    </form>
    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <div class="alert alert-danger"><?php echo e($message); ?></div>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo e(session('success')); ?>

        </div>
      <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel12.loc/resources/views/students/create.blade.php ENDPATH**/ ?>