<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        form {
            width: 50%;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        input, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            background-color: #2196F3;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #1e88e5;
        }
    </style>
</head>
<body>
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
        <h1>Edit Book</h1>
        <input type="text" name="title" value="<?php echo e(old('title', $book->title)); ?>" placeholder="Book Title" required>
        <input type="text" name="author" value="<?php echo e(old('author', $book->author)); ?>" placeholder="Author" required>
        <input type="text" name="isbn" value="<?php echo e(old('isbn', $book->isbn)); ?>" placeholder="ISBN" required>
        <button type="submit">Update Book</button>
    </form>
</body>
</html><?php /**PATH C:\Users\jasar\Desktop\Laravel\LMS2\Library-Managemengt-System\resources\views/edit.blade.php ENDPATH**/ ?>