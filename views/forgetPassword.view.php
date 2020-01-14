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
                        <h1 class="h1-reponsive white-text text-uppercase font-weight-bold mb-4 pt-md-5 pt-5 wow fadeInDown"
                            data-wow-delay="0.3s"><strong>Enter a new password</strong></h1>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 co-sm-12 "></div>
                            <div class="col-lg-6 col-md-6 co-sm-12 ">
                                <form  method="post" action="new_password" class="pt-5 register-form">
                                    <div class="form-group">
                                        <div class="input-group mb-2 mr-sm-2 h-100">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text addPlayerLabel"><i class="fas fa-unlock"></i></div>
                                            </div>
                                            <input type="password" name="password" class="form-control formInput"  placeholder="new password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-2 mr-sm-2 h-100">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text addPlayerLabel"><i class="fas fa-lock"></i></div>
                                            </div>
                                            <input type="password" name="password" class="form-control formInput"  placeholder="reenter new password">
                                        </div>
                                    </div>
                                    <input type="hidden" name="hash" value="<?= (isset($request['code'])) ? $request['code'] :  '' ?>" />
                                    <div class="d-flex flex-column justify-content-center">
                                        <button type="submit" class="btn addPlayerBtn m-0 mt-4">MAKE NEW PASSWORD</button>
                                    </div>
                                </form>

                            </div>
                            <div class="col-lg-3 col-md-3 co-sm-12 "></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

