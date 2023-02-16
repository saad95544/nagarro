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
        <h2>Create Task</h2>

        <form action="<?php echo URLROOT; ?>/tasks/create" method ="POST">
            <input type="text" placeholder="Title *" name="title">
            <input type="password" placeholder="Description *" name="description">
            <select name="status">
                <option value="" selected>Choose any status</option>
                <option value="pending">Pending</option>
                <option value="completed">Completed</option>
                <option value="re-open">Re-Open</option>
            </select>
            <br>
            <button id="submit" type="submit" value="submit">Submit</button>
        </form>
    </div>
</div>
