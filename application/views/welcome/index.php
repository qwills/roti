<div class="container">
    <div class="jumbotron">
        <h1>Welcome</h1>
    </div>
    <div class="row">
        <div class="col-sm-12" id="loginform">
            <form action="welcome/home" method="post" role="form">
                <div class="form-group">
                    <label for="email">Username / E-mail:</label>
                    <input type="email" class="form-control" name="username" id="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" name="password" id="pwd" placeholder="Enter password">
                </div>
                <div class="checkbox">
                    <label><input type="checkbox"> Remember me</label>
                </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                    <?php echo anchor("register","Register now"); ?>
            </form>

        </div>
    </div>
</div>
