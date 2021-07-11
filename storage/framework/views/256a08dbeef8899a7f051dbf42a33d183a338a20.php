<!doctype html>
<html lang="ja">
  <head>
    <title>Todoリスト</title>
  <!-- 必要なメタタグ -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>

    <div class="container" style="margin-top:50px;">
      <h1>Todoリスト追加</h1>

        <form action='<?php echo e(url('/todos')); ?>' method="post">
          <?php echo e(csrf_field()); ?>

          <div class="form-group">
            <label>やることを追加してください</label>
            <input type="text" name="body" class="form-control" placeholder="todo list" style="max-width:1000px">
          </div>
          <button type="submit" class="btn btn-primary">追加する</button> 
        </form>

      <h1>Todoリスト</h1>

        <table class="table table-striped" style="max-width:1000px; margin-top:20px;">
            <!-- <thead>
            <tr>
              <th></th><th></th><th></th>
            </tr>
            <thead> -->
            <tbody>
              <?php $__currentLoopData = $todos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($todo->body); ?></td>
                  <td>
                    <form action="<?php echo e(action('TodosController@edit', $todo)); ?>" method="post">
                      <?php echo e(csrf_field()); ?>

                      <?php echo e(method_field('get')); ?>

                      <button type="submit" class="btn btn-primary">編集</button>
                    </form>
                  </td>

                  <!-- 削除ボタン -->
                  <td>
                    <form action="<?php echo e(url('/todos', $todo->id)); ?>" method="post">
                      <?php echo e(csrf_field()); ?>

                      <?php echo e(method_field('delete')); ?>

                      <button type="submit" class="btn btn-danger">削除</button>
                    </form>
                  </td>

                  <!-- 削除した際にポップ画面で確認する -->
                  <!-- <td><a class="del" data-id="<?php echo e($todo->id); ?>" href="#">削除</a>
                          <form method="post" action='<?php echo e(url('/todos', $todo->id)); ?>' id="form_<?php echo e($todo->id); ?>">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('delete')); ?>

                          </form>
                        </td> -->
                  </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>




  <!-- オプションのJavaScript -->
  <!-- 最初にjQuery、次にPopper.js、次にBootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script>
    (function() {
      'use strict';

      var cmds = document.getElementsByClassName('del');
      var i;

      for (i = 0; i < cmds.length; i++) {
        cmds[i].addEventListener('click', function(e) {
          e.preventDefault();
          if (confirm('are you sure?')) {
            document.getElementById('form_' + this.dataset.id).submit();
          }
        });
      }

    })();
</script>

  </body>
</html><?php /**PATH /var/www/html/todo/resources/views/todos/index.blade.php ENDPATH**/ ?>