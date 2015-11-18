<div class="container">
    <div class="page-header well">
        <h1>Registration</h1>      
    </div>
    <div class="row">
        <div class="col-sm-12" id="loginform">
            <form action="register/status" method="post" role="form">
                <div class="form-group">
                    <label for="name">Name: </label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <label for="email">Username: </label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter desired username">
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter your e-mail">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" name="password" id="pwd" placeholder="Enter password">
                </div>
                    <button type="submit" class="btn btn-default">Register</button>
                    <?php echo anchor("welcome","Back to Main Menu"); ?>
            </form>

        </div>
    </div>
</div>
