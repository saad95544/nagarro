<?php
   require APPROOT . '/views/includes/head.php';
?>
<div class="navbar">
    <?php
       require APPROOT . '/views/includes/navigation.php';
    ?>
</div>

<div class="container-login">
    <div class="wrapper-login">
        <h2>Tasks</h2>
        <a href="<?php echo URLROOT; ?>/pages/task_create_update"><button>
        <span>Create Task</span>
        <svg viewBox="-5 -5 110 110" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,0 C0,0 100,0 100,0 C100,0 100,100 100,100 C100,100 0,100 0,100 C0,100 0,0 0,0"/>
        </svg>
        </button></a>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created On</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $task) { ?>
                    <tr>
                        <td><?php echo $task['title']; ?></td>
                        <td><?php echo $task['description']; ?></td>
                        <td><?php echo $task['created_on']; ?></td>
                        <td>
                            <form method="post" action="<?php echo URLROOT; ?>/tasks/update">
                            <select name="status" onchange="this.form.submit()">
                                <option value="pending" <?php if($task['status'] == 'pending') echo 'selected'; ?>>Pending</option>
                                <option value="completed" <?php if($task['status'] == 'completed') echo 'selected'; ?>>Completed</option>
                                <option value="re-open" <?php if($task['status'] == 're-open') echo 'selected'; ?>>Re-Open</option>
                            </select>
                            <input type="hidden" name="id" value="<?php echo $task['id'] ?>">
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
