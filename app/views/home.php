<?php
ob_start();
if (!isset($_SESSION)) {
  session_start();
}

$conn = mysqli_connect("localhost", "root", "", "php_csdl_bacha");
mysqli_set_charset($conn, "utf8mb4");

$profiles_per_page = 1;
$current_page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$start_from = ($current_page - 1) * $profiles_per_page;

$sql_user = mysqli_query($conn, "SELECT * FROM users LIMIT $start_from, $profiles_per_page");
while ($row = mysqli_fetch_array($sql_user)) {
  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../../public/assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../public/assets/css/adminlte.css">
    <link rel="stylesheet" href="../../public/assets/css/adminlte.css.map">
    <link rel="stylesheet" href="../../public/assets/css/adminlte.min.css">
    <link rel="stylesheet" href="../../public/assets/css/adminlte.css.map">
    <link rel="stylesheet" href="../../public/assets/css/docs.css">
    <link rel="stylesheet" href="../../public/assets/css/highlighter.css">
    <link rel="stylesheet" href="../../public/assets/css/custom.css">
  </head>

  <body class="hold-transition sidebar-mini">
    <div class="wrapper" style="margin:0!important;">
      <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="margin: 0 !important;">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="../../index3.html" class="nav-link">Home</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
              <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
              <form class="form-inline">
                <div class="input-group input-group-sm">
                  <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                      <i class="fas fa-search"></i>
                    </button>
                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-comments"></i>
              <span class="badge badge-danger navbar-badge">377</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="#" class="dropdown-item">
                <div class="media">
                  <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Brad Diesel
                      <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">Call me whenever you can...</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <div class="media">
                  <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      John Pierce
                      <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">I got your message bro</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <div class="media">
                  <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Nora Silvester
                      <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">The subject goes here</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">15 Notifications</span>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
          </li>
        </ul>
      </nav>

      <div class="content-wrapper" style="margin:0!important;">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>User Profile</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">User Profile</li>
                </ol>
              </div>
            </div>
          </div>
        </section>

        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3">
                <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
                    <div class="text-center">
                      <img class="profile-user-img img-fluid img-circle"
                        src="../../public/assets/img/<?= $row["photo"] ?>" alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center"><?= $row["name"] ?></h3>

                    <p class="text-muted text-center">Software Engineer</p>

                    <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <b>Followers</b> <a class="float-right">1,322</a>
                      </li>
                      <li class="list-group-item">
                        <b>Following</b> <a class="float-right">543</a>
                      </li>
                      <li class="list-group-item">
                        <b>Friends</b> <a class="float-right">13,287</a>
                      </li>
                    </ul>

                    <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                  </div>
                </div>
              </div>

              <div class="col-md-9">
                <div class="card">

                  <div class="card-header p-2">
                    <ul class="nav nav-pills">
                      <li class="nav-item"><a class="nav-link active" href="#aboutme" data-toggle="tab">About Me</a></li>
                      <li class="nav-item"><a class="nav-link" href="#experience" data-toggle="tab">Experience</a></li>
                      <li class="nav-item"><a class="nav-link" href="#education" data-toggle="tab">Education</a></li>
                      <li class="nav-item"><a class="nav-link" href="#project" data-toggle="tab">Project</a></li>
                      <li class="nav-item"><a class="nav-link" href="#post" data-toggle="tab">Post</a></li>
                      <li class="nav-item"><a class="nav-link" href="#contact" data-toggle="tab">Contact</a></li>
                    </ul>
                  </div>

                  <div class="card-body">
                    <div class="tab-content">
                      <div class="tab-pane" id="aboutme">
                        <h2>Thông tin cá nhân</h2>
                        <img src="<?php echo htmlspecialchars($row['photo']); ?>" alt="Photo" class="profile-photo">
                        <p><strong>Tên:</strong> <?php echo htmlspecialchars($row['name']); ?></p>
                        <p><strong>Tuổi:</strong> <?php echo htmlspecialchars($row['age']); ?></p>
                        <p><strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?></p>
                        <p><strong>Kỹ năng:</strong> <?php echo htmlspecialchars($row['skills']); ?></p>
                        <p><strong>Kinh nghiệm:</strong> <?php echo htmlspecialchars($row['experience']); ?></p>
                      </div>
                      <div class="tab-pane" id="experience">
                      </div>
                      <div class="tab-pane" id="education">
                      </div>
                      <div class="tab-pane" id="project">
                      </div>
                      <div class="active tab-pane" id="post">
                        <div class="post">
                          <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg"
                              alt="user image">
                            <span class="username">
                              <a href="#">Jonathan Burke Jr.</a>
                              <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                            </span>
                            <span class="description">Shared publicly - 7:30 PM today</span>
                          </div>
                          <p>
                            Lorem ipsum represents a long-held tradition for designers,
                            typographers and the like. Some people hate it and argue for
                            its demise, but others ignore the hate as they create awesome
                            tools to help create filler text for everyone from bacon lovers
                            to Charlie Sheen fans.
                          </p>

                          <p>
                            <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                            <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                            <span class="float-right">
                              <a href="#" class="link-black text-sm">
                                <i class="far fa-comments mr-1"></i> Comments (5)
                              </a>
                            </span>
                          </p>

                          <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                        </div>

                        <div class="post clearfix">
                          <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg"
                              alt="User Image">
                            <span class="username">
                              <a href="#">Sarah Ross</a>
                              <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                            </span>
                            <span class="description">Sent you a message - 3 days ago</span>
                          </div>
                          <p>
                            Lorem ipsum represents a long-held tradition for designers,
                            typographers and the like. Some people hate it and argue for
                            its demise, but others ignore the hate as they create awesome
                            tools to help create filler text for everyone from bacon lovers
                            to Charlie Sheen fans.
                          </p>

                          <form class="form-horizontal">
                            <div class="input-group input-group-sm mb-0">
                              <input class="form-control form-control-sm" placeholder="Response">
                              <div class="input-group-append">
                                <button type="submit" class="btn btn-danger">Send</button>
                              </div>
                            </div>
                          </form>
                        </div>

                        <div class="post">
                          <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg"
                              alt="User Image">
                            <span class="username">
                              <a href="#">Adam Jones</a>
                              <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                            </span>
                            <span class="description">Posted 5 photos - 5 days ago</span>
                          </div>
                          <div class="row mb-3">
                            <div class="col-sm-6">
                              <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                            </div>
                            <div class="col-sm-6">
                              <div class="row">
                                <div class="col-sm-6">
                                  <img class="img-fluid mb-3" src="../../dist/img/photo2.png" alt="Photo">
                                  <img class="img-fluid" src="../../dist/img/photo3.jpg" alt="Photo">
                                </div>
                                <div class="col-sm-6">
                                  <img class="img-fluid mb-3" src="../../dist/img/photo4.jpg" alt="Photo">
                                  <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                                </div>
                              </div>
                            </div>
                          </div>

                          <p>
                            <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                            <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                            <span class="float-right">
                              <a href="#" class="link-black text-sm">
                                <i class="far fa-comments mr-1"></i> Comments (5)
                              </a>
                            </span>
                          </p>

                          <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                        </div>
                      </div>

                      <div class="tab-pane" id="contact">
                      <h2>Thông tin liên hệ</h2>
                      <p><strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?></p>
                      </div>
                      
                    </div>
                  </div>

                </div>
              </div>
        </section>
      </div>

      <aside class="control-sidebar control-sidebar-dark">
      </aside>
    </div>

    <script src="/phptest/public/assets/plugins/jquery/jquery.min.js"></script>
    <script src="/phptest/public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/phptest/public/assets/js/adminlte.min.js"></script>
    <script src="/phptest/public/assets/js/demo.js"></script>
  </body>

  </html>
  <div class="pagination">
    <?php if ($current_page > 1): ?>
      <a href="?page=<?= $current_page - 1 ?>">&laquo; Trước</a>
    <?php endif; ?>

    <?php
    $total_pages_sql = "SELECT COUNT(*) FROM users";
    $result = mysqli_query($conn, $total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $profiles_per_page);
    if (isset($total_pages)):
      ?>
      <?php for ($i = 1; $i <= $total_pages; $i++): ?>
        <a href="?page=<?= $i ?>" <?= ($i == $current_page) ? 'class="active"' : '' ?>><?= $i ?></a>
      <?php endfor; ?>
      <?php if ($current_page < $total_pages): ?>
        <a href="?page=<?= $current_page + 1 ?>">Tiếp &raquo;</a>
      <?php endif; ?>
    <?php endif; ?>
  </div>

  <?php
}
?>