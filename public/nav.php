<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar p-0 pr-2 pl-2">
    <a class="navbar-brand p-3" href="home">AVDL</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
                <li class="ownNav-item nav-item ">
                    <a class="nav-link ft-15 d-flex flex-column justify-content-center align-items-center" href="home">
                        <span class="ft-15 "><i class="fas fa-home"></i></span>
                        <span class="nav-link ft-15 ">HOME </span>
                    </a>
                </li>
                <li class="ownNav-item nav-item ">
                    <a class="nav-link ft-15 d-flex flex-column justify-content-center align-items-center" href="games">
                        <span class="ft-15 "><i class="fas fa-dice-four"></i></span>
                        <span class="nav-link ft-15 ">GAMES</span>
                    </a>
                </li>
<!--                <li class="ownNav-item nav-item  ">-->
<!--                    <a class="nav-link ft-15  d-flex flex-column justify-content-center align-items-center" href="users">-->
<!--                        <span class="ft-15 "><i class="fas fa-id-card-alt"></i></span>-->
<!--                        <span class="nav-link ft-15 " href="/users">USERS </span>-->
<!--                    </a>-->
<!--                </li>-->
                <li class="ownNav-item nav-item ">
                    <a class="nav-link ft-15  d-flex flex-column justify-content-center align-items-center" href="battles">
                        <span class="ft-15 "><i class="fas fa-chess-board"></i></span>
                        <span class="nav-link ft-15  " >BATLLES </span>
                    </a>
                </li>
                <li class="ownNav-item nav-item ">
                    <a class="nav-link ft-15  d-flex flex-column justify-content-center align-items-center" href="players">
                        <span class="ft-15 "><i class="fas fa-users"></i></span>
                        <span class="nav-link ft-15 " >PLAYERS </span>
                    </a>
                </li>
        </ul>
        <ul class="navbar-nav w-100 f-flex justify-content-end align-items-md-end align-items-sm-start ">
            <?php if(isset($_COOKIE['cookie'] )) : ?>
            <li class="ownNav-item nav-item">
                <a class="nav-link .ft-15 dropdown-toggle d-flex flex-column justify-content-center align-items-center" href="gebruiker"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span><i class="fas fa-user"></i></span>
                    <span class="nav-link"> <?= 'Hello ' . $_COOKIE['cookie']  ?></span>
                </a>
                <div class="dropdown-menu">
                    <a class="btn bg-home-color cl-home-color dropdown-item" href="logout"><i class="fas fa-power-off"></i>  Logout </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="account"><i class="far fa-user"></i> MY ACCOUNT</a>
                    <a class="dropdown-item" href="games_create"><i class="fas fa-gamepad"></i> ADD GAME</a>
                    <a class="dropdown-item" href="battles_create"><i class="fas fa-trophy"></i> ADD BATTLE</a>
                </div>
            </li>
            <?php else :?>
            <li class="ownNav-item nav-item d-flex flex-column justify-content-center align-items-center  mr-lg-4 mr-sm-0">
                <a class="nav-link " href="register">SIGN UP</a>
            </li>
            <li class="ownNav-item nav-item d-flex flex-column justify-content-center align-items-center ">
                <a class="nav-link sign-btn" href="login" >LOGIN <span class="sr-only"></span></a>
            </li>
            <?php endif; ?>
        </ul>

    </div>
</nav>

