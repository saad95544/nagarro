<div class="container">
  <div class="d-flex justify-content-between align-items-center">
    <h1>Tasks</h1>
    <a href="<?php echo URLROOT; ?>/tasks/create" class="btn btn-primary">Create Task</a>
  </div>
  <table class="table mt-3">
    <thead>
      <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Completed By</th>
        <th>Completed On</th>
        <th>Status</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($data['tasks'] as $task): ?>
        <tr>
          <td><?php echo $task->title; ?></td>
          <td><?php echo $task->description; ?></td>
          <td><?php echo $task->user_name; ?></td>
          <td><?php echo $task->completed_on; ?></td>
          <td>
            <?php if ($task->status == 1): ?>
              <span class="badge badge-success">Completed</span>
            <?php else: ?>
              <span class="badge badge-warning">Incomplete</span>
            <?php endif; ?>
          </td>
          <td>
            <a href="<?php echo URLROOT; ?>/tasks/edit/<?php echo $task->id; ?>" class="btn btn-sm btn-primary">Edit</a>
            <form method="POST" action="<?php echo URLROOT; ?>/tasks/delete/<?php echo $task->id; ?>" class="d-inline">
              <input type="submit" value="Delete" class="btn btn-sm btn-danger">
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
