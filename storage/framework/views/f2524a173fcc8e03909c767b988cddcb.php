<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <style>
        body {
            text-align: center;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            font-size: 50px;
            margin-bottom: 20px;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
        }
        .success {
            color: green;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>📚Book List</h1>
    <div>
        <?php if(session('success')): ?>
            <p class="success"><?php echo e(session('success')); ?></p>
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

        bladeCopy<div class="card mb-4">
    <div class="card-header">
        <h5>Filter Books</h5>
    </div>
    <div class="card-body">
        <form action="<?php echo e(route('LMS')); ?>" method="GET">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="genre_id">Genre</label>
                        <select name="genre_id" id="genre_id" class="form-control">
                            <option value="">All Genres</option>
                            <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($genre->id); ?>" <?php echo e(request('genre_id') == $genre->id ? 'selected' : ''); ?>>
                                    <?php echo e($genre->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="subject_id">Subject</label>
                        <select name="subject_id" id="subject_id" class="form-control">
                            <option value="">All Subjects</option>
                            <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($subject->id); ?>" <?php echo e(request('subject_id') == $subject->id ? 'selected' : ''); ?>>
                                    <?php echo e($subject->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="availability">Availability</label>
                        <select name="availability" id="availability" class="form-control">
                            <option value="">All</option>
                            <option value="available" <?php echo e(request('availability') == 'available' ? 'selected' : ''); ?>>Available</option>
                            <option value="checked_out" <?php echo e(request('availability') == 'checked_out' ? 'selected' : ''); ?>>Checked Out</option>
                            <option value="on_hold" <?php echo e(request('availability') == 'on_hold' ? 'selected' : ''); ?>>On Hold</option>
                            <option value="in_processing" <?php echo e(request('availability') == 'in_processing' ? 'selected' : ''); ?>>In Processing</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="text-right mt-3">
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="<?php echo e(route('LMS')); ?>" class="btn btn-secondary">Reset</a>
            </div>
        </form>
    </div>
</div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>ISBN</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($book->id); ?></td>
                        <td><?php echo e($book->title); ?></td>
                        <td><?php echo e($book->author); ?></td>
                        <td><?php echo e($book->isbn); ?></td>
                        <td>
                            <a href="/books/<?php echo e($book->id); ?>/edit" style="text-decoration: none; background-color: #2196F3; color: white; padding: 5px 10px; border-radius: 5px;">Edit</a>
                            <form action="/books/<?php echo e($book->id); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" onclick="return confirm('Are you sure?')" style="background-color: #f44336; color: white; padding: 5px 10px; border: none; border-radius: 5px; cursor: pointer;">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div style="text-align: center; margin-top: 20px;">
            <a href="/books/create" style="text-decoration: none; background-color: #4CAF50; color: white; padding: 10px 20px; border-radius: 5px;">Add Book</a>
        </div>
    </div>
</body>
</html><?php /**PATH C:\Users\jasar\Desktop\Laravel\LMS2\Library-Managemengt-System\resources\views/LMS.blade.php ENDPATH**/ ?>