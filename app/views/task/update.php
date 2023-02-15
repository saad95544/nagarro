<!-- views/tasks/update.php -->

<h2>Update Task</h2>
<form method="post" action="<?php echo URLROOT; ?>/tasks/update/<?php echo $data['id']; ?>">
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control" value="<?php echo $data['title']; ?>" required>
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" id="description" class="form-control" rows="3" required><?php echo $data['description']; ?></textarea>
  </div>
  <div class="form-group">
    <label for="status">Status</label>
    <select name="status" id="status" class="form-control">
      <option value="todo" <?php echo ($data['status'] === 'todo') ? 'selected' : ''; ?>>To Do</option>
      <option value="in_progress" <?php echo ($data['status'] === 'in_progress') ? 'selected' : ''; ?>>In Progress</option>
      <option value="completed" <?php echo ($data['status'] === 'completed') ? 'selected' : ''; ?>>Completed</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
