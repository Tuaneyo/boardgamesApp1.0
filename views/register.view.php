<!---->
<!--<div class="container">-->

<!--</div>-->

<html lang="en">
<body>

<header>
    <!-- Full Page Intro -->
    <div class="view bg h-100" style="background-image: url('http://www.gsfdcy.com/data/img/17/1305119-chess-wallpaper.png'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
        <!-- Mask & flexbox options-->
        <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
            <!-- Content -->
            <div class="container">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-md-12 mb-4 white-text text-center">
                        <h1 class="h1-reponsive text-shadow white-text text-uppercase font-weight-bold mb-4 pt-md-5 pt-5 wow fadeInDown" data-wow-delay="0.3s"><strong>SIGN UP</strong></h1>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 co-sm-12 "></div>
                            <div class="col-lg-6 col-md-6 co-sm-12 ">
                                <form  method="post" action="register" class="pt-5 register-form">
                                    <div class="form-group">
                                        <div class="input-group mb-2 mr-sm-2 h-100">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text addPlayerLabel"><i class="fas fa-id-card-alt"></i></div>
                                            </div>
                                            <input name="nickname" class="form-control formInput"
                                                   placeholder="nickname"
                                                   value="<?= (isset($request['nickname']) ? $request['nickname'] : '') ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group mb-2 mr-sm-2 h-100">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text addPlayerLabel"><i class="fas fa-user"></i></div>
                                                    </div>
                                                    <input name="fname" class="form-control formInput"  placeholder="firstname" value="<?= (isset($request['fname']) ? $request['fname'] : '') ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group mb-2 mr-sm-2 h-100">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text addPlayerLabel"><i class="fas fa-user-circle"></i></div>
                                                    </div>
                                                    <input name="lname" class="form-control formInput"  placeholder="lastname" value="<?= (isset($request['lname']) ? $request['lname'] : '') ?>" >
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-2 mr-sm-2 h-100">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text addPlayerLabel"><i class="fas fa-mobile"></i></div>
                                            </div>
                                            <input name="mobile" class="form-control formInput"  placeholder="mobiel" value="<?= (isset($request['mobile']) ? $request['mobile'] : '') ?>">
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-2 mr-sm-2 h-100">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text addPlayerLabel"><i class="fas fa-envelope"></i></div>
                                            </div>
                                            <input name="email" class="form-control formInput"  placeholder="email" value="<?= (isset($request['email']) ? $request['email'] : '') ?>">
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-2 mr-sm-2 h-100">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text addPlayerLabel"><i class="fas fa-key"></i></div>
                                            </div>
                                            <input type="password" name="password" class="form-control formInput" placeholder="password min 8chac.">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-2 mr-sm-2 h-100">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text addPlayerLabel"><i class="fas fa-key"></i></div>
                                            </div>
                                            <input type="password" name="password" class="form-control formInput" placeholder="password">
                                        </div>

                                    </div>
                                    <button type="submit" class="btn addPlayerBtn w-100 m-0 mt-4">create a free account</button>
                                </form>
                            </div>
                            <div class="col-lg-3 col-md-3 co-sm-12 "></div>
                        </div>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </div>
            <!-- Content -->
        </div>
        <!-- Mask & flexbox options-->
    </div>
    <!-- Full Page Intro -->
</header>
<!-- Main navigation -->


</body>
</html>