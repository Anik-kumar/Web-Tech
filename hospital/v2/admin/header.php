<nav class="navbar navbar-inverse navbar-fixed-top" id="nav">
    <div class="container-fluid" id="firstContainer">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse1">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <div class="row">
            <div class="navbar-header col-lg-1 col-md-2 col-sm-2 col-xs-3">
                <a href="admin.php" class="navbar-brand"> <img src="./resources/images/Hospital_Logo_02.png"> </a>
            </div>
            <div class="collapse navbar-collapse col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-2" id="collapse1">
                <ul class="nav navbar-nav gap">
                    <li> <a href="admin.php" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Home</a> </li>
                    <li><a href="changePassword.php">Change Password</a></li>
                    <li><a href="../viewProfile.php">Profile</a></li>
                    <li>
                        <form action="searchAll.php" method="post" class="form-inline">
                            <input type="text" name="searchText" class="form-control" id="searchTest">
                            <button type="submit" name="searchBtn" class="btn btn-default">Search</button>
                        </form>
                    </li>

                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="../viewProfile.php"><?php echo $name; ?></a></li>
                    <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>