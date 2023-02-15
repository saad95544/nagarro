<!-- views/tasks/create.php -->

<h2>Create Task</h2>
<form method="post" action="<?php echo URLROOT; ?>/tasks/store">
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Create</button>
</form>
