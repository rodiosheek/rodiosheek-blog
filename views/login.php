<?php require ('header.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
<div class="login-form">
<form class="form-horizontal" action="?action=do-login" method="post">
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Login</label>
        <div class="col-sm-10">
            <input name="login" type="text" class="form-control" id="inputEmail3" placeholder="Login">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <input name="password" type="password" class="form-control" id="inputPassword3" placeholder="Password">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Sign in</button>
        </div>
    </div>
</form>
    </div>
            </div>
        </div>

</div>
<?php require ('footer.php'); ?>

