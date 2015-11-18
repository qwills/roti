<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
            </button>
            <a class="navbar-brand" href="#">Roti</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><?php echo anchor("welcome/home","HOME");?></li>
                <li><?php echo anchor("customer","CUSTOMER");?></li>
                <li><?php echo anchor("item","ITEM");?></li>
                <li><?php echo anchor("invoice","INVOICE");?></li>  
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>