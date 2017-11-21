<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">User Login</h3>
    </div>
    <div class="panel-body">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" required class="form-control">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" required class="form-control">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Submit">
            <a href="<?php echo ROOT_URL;?>shares" class="btn btn-danger">Cancel</a>
        </form>
    </div>
</div>