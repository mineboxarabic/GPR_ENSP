<!-- header -->
<header class="navbar navbar-white navbar-fixed-top">
    <!-- .navbar-header -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="zmdi zmdi-view-headline zmdi-hc-2x"></span>
        </button>
        <a class="navbar-brand" href="./index.html" title="Deluxe - Material Admin Template"><i class="zmdi zmdi-widgets"></i>  ENSP - GPRv3.0</a>
    </div>
    <!-- /.navbar-header -->
    
    <!-- .navbar-top-links -->
    <nav>
        <!-- .navbar-left -->
            <ul class="nav navbar-top-links navbar-left">
                <li>
                    <a href="javascript:void(0);" class="toggle-sidebar hvr-underline-from-center" title="Show/Hide Sidebar">
                        <i class="zmdi zmdi-menu"></i>
                    </a>
                </li>

            </ul>
        <!-- /.navbar-left -->

        <?php 
            if(isset($_SESSION["current_user"])){
                $user = User::find($_SESSION["current_user"]);
                if($user)
                    echo "<p style=\"color:green;\">current_user: ".$user->first_name .' '.$user->last_name."</p>";
                else
                    echo "<p tyle=\"color:red;\">current_user: not set</p>";
            }
            else{
                echo "<p tyle=\"color:red;\">current_user: not set</p>";
            }
        ?>
    </nav>
    
    <!-- /.navbar-top-links -->
</header> 
<!-- /header -->
