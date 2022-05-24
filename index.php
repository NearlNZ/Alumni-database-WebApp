<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Alumni Club</title>
        
        <!-- Include Fonts / Icons -->
        <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fredoka One" rel="stylesheet">
        <script src="fontawesome-6.1.1/js/all.min.js"></script>
        <!-- Include CSS / Js -->
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <!-- Custom Style -->
        <STYLE type="text/css">
            body {
                font-family: "Kanit";
            }
            #text-truncate-3 {   
                -webkit-line-clamp: 3;
                display: -webkit-box;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }
            #text-truncate-2 {   
                -webkit-line-clamp: 2;
                display: -webkit-box;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }
        </STYLE>
    </head>

    <body class="sb-nav-fixed">
        <!-- Topbar -->
        <?php require_once("components/topbar-visitor.php");?>
        <!-- End Topbar -->

        <!-- Page -->
        <div id="layoutSidenav" style="background-color: #EAEAEA;">
            <!-- Sidebar -->
            <?php require_once("components/sidebar-visitor.php");?>
            <!-- End Sidebar -->

            <!-- Content -->
            <div id="layoutSidenav_content">
                <main>
                    <!-- Baner (Best size : 3750x1400)-->
                    <div id="bannerSlide" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#bannerSlide" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#bannerSlide" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#bannerSlide" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#bannerSlide" data-bs-slide-to="3" aria-label="Slide 4"></button>
                            <button type="button" data-bs-target="#bannerSlide" data-bs-slide-to="4" aria-label="Slide 5"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="5000">
                                <img src="resource/pics/banner1.jpg" class="d-block w-100" style="object-fit: cover;">
                            </div>
                            <div class="carousel-item" data-bs-interval="5000">
                                <img src="resource/pics/banner2.jpg" class="d-block w-100" style="object-fit: cover;">
                            </div>
                            <div class="carousel-item" data-bs-interval="5000">
                                <img src="resource/pics/banner3.jpg" class="d-block w-100" style="object-fit: cover;">
                            </div>
                            <div class="carousel-item" data-bs-interval="5000">
                                <img src="resource/pics/banner4.jpg" class="d-block w-100" style="object-fit: cover;">
                            </div>
                            <div class="carousel-item" data-bs-interval="5000">
                                <img src="resource/pics/banner5.jpg" class="d-block w-100" style="object-fit: cover;">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#bannerSlide" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#bannerSlide" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <!-- Annoucements card -->
                    <div class="p-2">
                        <div class="card">
                            <div class="card-header bg-dark text-light">
                                <div class="mb-2 mt-2 ms-2">
                                    <i class="fa-solid fa-comment-dots me-2"></i>
                                    ข่าวประชาสัมพันธ์
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                                    <div class="col">
                                        <a class="card shadow-sm h-100 text-decoration-none" href="404.php">
                                            <img src="resource/pics/annoucements-card-head.jpg" class="card-img-top" alt="...">
                                            <div id="annoucement-card" class="card-body">
                                                <small class="text-muted"><i class="fa-solid fa-calendar me-2"></i>24/05/2022</small>
                                                <h5 class="card-title mt-3"><i class="fa-solid fa-circle-chevron-right me-2"></i>ตัวอย่างข่าวประชาสัมพันธ์ 1</h5>
                                                <p class="card-text text-dark" id="text-truncate-3">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis 
                                                    nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                                                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore 
                                                    eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                                                    in culpa qui officia deserunt mollit anim id est laborum
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="card shadow-sm h-100 text-decoration-none" href="404.php">
                                            <img src="resource/pics/annoucements-card-head.jpg" class="card-img-top" alt="...">
                                            <div id="annoucement-card" class="card-body">
                                                <small class="text-muted"><i class="fa-solid fa-calendar me-2"></i>24/05/2022</small>
                                                <h5 class="card-title mt-3"><i class="fa-solid fa-circle-chevron-right me-2"></i>ตัวอย่างข่าวประชาสัมพันธ์ 2</h5>
                                                <p class="card-text text-dark" id="text-truncate-3">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis 
                                                    nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                                                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore 
                                                    eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                                                    in culpa qui officia deserunt mollit anim id est laborum
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="card shadow-sm h-100 text-decoration-none" href="404.php">
                                            <img src="resource/pics/annoucements-card-head.jpg" class="card-img-top" alt="...">
                                            <div id="annoucement-card" class="card-body">
                                                <small class="text-muted"><i class="fa-solid fa-calendar me-2"></i>24/05/2022</small>
                                                <h5 class="card-title mt-3"><i class="fa-solid fa-circle-chevron-right me-2"></i>ตัวอย่างข่าวประชาสัมพันธ์ 3</h5>
                                                <p class="card-text text-dark" id="text-truncate-3">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis 
                                                    nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                                                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore 
                                                    eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                                                    in culpa qui officia deserunt mollit anim id est laborum
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="card shadow-sm h-100 text-decoration-none" href="404.php">
                                            <img src="resource/pics/annoucements-card-head.jpg" class="card-img-top" alt="...">
                                            <div id="annoucement-card" class="card-body">
                                                <small class="text-muted"><i class="fa-solid fa-calendar me-2"></i>24/05/2022</small>
                                                <h5 class="card-title mt-3"><i class="fa-solid fa-circle-chevron-right me-2"></i>ตัวอย่างข่าวประชาสัมพันธ์ 4</h5>
                                                <p class="card-text text-dark" id="text-truncate-3">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis 
                                                    nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                                                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore 
                                                    eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                                                    in culpa qui officia deserunt mollit anim id est laborum
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="card shadow-sm h-100 text-decoration-none" href="404.php">
                                            <img src="resource/pics/annoucements-card-head.jpg" class="card-img-top" alt="...">
                                            <div id="annoucement-card" class="card-body">
                                                <small class="text-muted"><i class="fa-solid fa-calendar me-2"></i>24/05/2022</small>
                                                <h5 class="card-title mt-3"><i class="fa-solid fa-circle-chevron-right me-2"></i>ตัวอย่างข่าวประชาสัมพันธ์ 5</h5>
                                                <p class="card-text text-dark" id="text-truncate-3">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis 
                                                    nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                                                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore 
                                                    eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                                                    in culpa qui officia deserunt mollit anim id est laborum
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="card shadow-sm h-100 text-decoration-none" href="404.php">
                                            <img src="resource/pics/annoucements-card-head.jpg" class="card-img-top" alt="...">
                                            <div id="annoucement-card" class="card-body">
                                                <small class="text-muted"><i class="fa-solid fa-calendar me-2"></i>24/05/2022</small>
                                                <h5 class="card-title mt-3"><i class="fa-solid fa-circle-chevron-right me-2"></i>ตัวอย่างข่าวประชาสัมพันธ์ 6</h5>
                                                <p class="card-text text-dark" id="text-truncate-3">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis 
                                                    nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                                                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore 
                                                    eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                                                    in culpa qui officia deserunt mollit anim id est laborum
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <a class="btn btn-primary rounded-pill mt-4 float-end" href="404.php">ข่าวทั้งหมด<i class="fa-solid fa-chevron-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Annoucements card -->

                    <!-- Static Banner -->
                        <img src="resource/pics/static-banner.png" class="mt-2 mb-2 w-100" style="background-color: #272788;">
                    <!-- End Static Banner -->

                    <!-- Activities card -->
                    <div class="p-2">
                        <div class="card">
                            <div class="card-header bg-dark text-light">
                                <div class="mb-2 mt-2 ms-2">
                                    <i class="fa-solid fa-star-half-stroke me-2"></i>
                                    กิจกรรมศิษย์เก่า
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <div class="row row-col-md-2 g-4">
                                    <div class="col-md-4">
                                        <a class="card shadow-sm h-100 text-decoration-none" href="404.php">
                                            <img src="resource/pics/activities-card.jpeg" class="card-img-top">
                                            <div id="annoucement-card" class="card-body">
                                                <h5 class="card-title mt-3"><i class="fa-solid fa-star me-2 text-warning"></i>ตัวอย่างกิจรรมที่กำลังจะถึง</h5>
                                                <p class="card-text text-dark" id="text-truncate-3">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis 
                                                    nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                                                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore 
                                                    eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                                                    in culpa qui officia deserunt mollit anim id est laborum
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card shadow-sm">
                                            <div class="card-header bg-dark text-light">
                                                <i class="fa-solid fa-calendar-day me-2"></i>
                                                ปฏิทินกิจกรรม
                                            </div>
                                            <ul class="list-group list-group-flush p-2">
                                                <a class="list-group-item" href="404.php">
                                                    <div>
                                                        <i class="fa-solid fa-star me-1 text-warning"></i> 
                                                        <span class="text-warning me-4">30 มิถุนายน</span>
                                                        
                                                    </div>
                                                    <p class="card-text text-dark" id="text-truncate-2">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis 
                                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                                                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore 
                                                        eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                                                        in culpa qui officia deserunt mollit anim id est laborum
                                                    </p>
                                                </a>
                                                <a class="list-group-item" href="404.php">
                                                    <div>
                                                        <i class="fa-solid fa-star me-1 text-warning"></i> 
                                                        <span class="text-warning me-4">10 กรกฎาคม</span>
                                                        
                                                    </div>
                                                    <p class="card-text text-dark" id="text-truncate-2">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis 
                                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                                                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore 
                                                        eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                                                        in culpa qui officia deserunt mollit anim id est laborum
                                                    </p>
                                                </a>
                                                <a class="list-group-item" href="404.php">
                                                    <div>
                                                        <i class="fa-solid fa-star me-1 text-warning"></i> 
                                                        <span class="text-warning me-4">12 สิงหาคม</span>
                                                        
                                                    </div>
                                                    <p class="card-text text-dark" id="text-truncate-2">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis 
                                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                                                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore 
                                                        eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                                                        in culpa qui officia deserunt mollit anim id est laborum
                                                    </p>
                                                </a>
                                                <a class="list-group-item" href="404.php">
                                                    <div>
                                                        <i class="fa-solid fa-star me-1 text-warning"></i> 
                                                        <span class="text-warning me-4">17 สิงหาคม</span>
                                                        
                                                    </div>
                                                    <p class="card-text text-dark" id="text-truncate-2">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis 
                                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                                                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore 
                                                        eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                                                        in culpa qui officia deserunt mollit anim id est laborum
                                                    </p>
                                                </a>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <a class="btn btn-primary rounded-pill mt-4 float-end" href="404.php">กิจกรรมทั้งหมด<i class="fa-solid fa-chevron-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Activities card -->


                </main>
                <?php require_once("components/footer.php");?>
            </div>
            <!-- End Content -->
        </div>
        <!--End Page -->
    </body>
</html>