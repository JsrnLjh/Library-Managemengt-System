<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
</head>
<body>
    <h1>Edit Book</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert alert-danger">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="/books/<?php echo e($book->id); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo e(old('title', $book->title)); ?>" required><br><br>

        <label for="author">Author:</label>
        <input type="text" id="author" name="author" value="<?php echo e(old('author', $book->author)); ?>" required><br><br>

        <label for="isbn">ISBN:</label>
        <input type="text" id="isbn" name="isbn" value="<?php echo e(old('isbn', $book->isbn)); ?>" required><br><br>

        <button type="submit">Update Book</button>
    </form>

    <a href="/books">Back to List</a>
</body>
</html><?php /**PATH C:\Users\jasar\Desktop\Laravel\LMS2\Library-Managemengt-System\resources\views/edit.blade.php ENDPATH**/ ?>