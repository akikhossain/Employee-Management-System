
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Employee Management System</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <!-- Google fonts - Popppins for copy-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&amp;display=swap" rel="stylesheet">
    <!-- Prism Syntax Highlighting-->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/vendor/prismjs/plugins/toolbar/prism-toolbar.css">
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/vendor/prismjs/themes/prism-okaidia.css">
    <!-- The Main Theme stylesheet (Contains also Bootstrap CSS)-->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/css/style.default.63c85ff9.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/css/custom.0a822280.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/img/favicon.png">
  </head>
  <body>
    <!-- navbar-->
    <header class="header">
      <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow"><a class="sidebar-toggler text-gray-500 me-4 me-lg-5 lead" href="#"><i class="fas fa-align-left"></i></a><a class="navbar-brand fw-bold text-uppercase text-base" href="index.html"><span class="d-none d-brand-partial">Employee </span><span class="d-none d-sm-inline">Management System</span></a>
        <ul class="ms-auto d-flex align-items-center list-unstyled mb-0">
          <li class="nav-item dropdown">
            <form class="ms-auto me-4 d-none d-lg-block" id="searchForm">
              <div class="input-group input-group-sm input-group-navbar">
                <input class="form-control" id="searchInput" type="search" placeholder="Search">
                <button class="btn" type="button"> <i class="fas fa-search"></i></button>
              </div>
            </form>
            <div class="dropdown-menu dropdown-menu-animated text-sm" id="searchDropdownMenu">
              <h6 class="dropdown-header text-uppercase fw-normal">Recent pages</h6><a class="dropdown-item py-1" href="cms-post.html"> <i class="far fa-file me-2"> </i>Posts</a><a class="dropdown-item py-1" href="widgets-stats.html"> <i class="far fa-file me-2"> </i>Widgets</a><a class="dropdown-item py-1" href="pages-profile.html"> <i class="far fa-file me-2"> </i>Profile</a>
              <div class="dropdown-divider"></div>
              <h6 class="dropdown-header text-uppercase fw-normal">Users</h6><a class="dropdown-item py-1" href="pages-profile.html"> <img class="avatar avatar-xs p-1 me-2" src="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/img/avatar-0.jpg" alt="Jason Doe"><span>Jason Doe</span></a><a class="dropdown-item py-1" href="pages-profile.html"> <img class="avatar avatar-xs p-1 me-2" src="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/img/avatar-1.jpg" alt="Frank Williams"><span>Frank Williams</span></a><a class="dropdown-item py-1" href="pages-profile.html"> <img class="avatar avatar-xs p-1 me-2" src="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/img/avatar-2.jpg" alt="Ashley Wood"><span>Ashley Wood</span></a>
              <div class="dropdown-divider"></div>
              <h6 class="dropdown-header text-uppercase fw-normal">Filters</h6><a class="dropdown-item py-1" href="#!"> <span class="badge me-2 badge-success-light">Posts</span><span class="text-xs">Search all posts</span></a><a class="dropdown-item py-1" href="#!"> <span class="badge me-2 badge-danger-light">Users</span><span class="text-xs">Only in users</span></a><a class="dropdown-item py-1" href="#!"> <span class="badge me-2 badge-warning-light">Campaigns</span><span class="text-xs">Only in campaigns</span></a>
            </div>
          </li>
          <li class="nav-item dropdown me-2"><a class="nav-link nav-link-icon text-gray-400 px-1" id="notifications" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <svg class="svg-icon svg-icon-md svg-icon-heavy">
                    <use xlink:href="icons/orion-svg-sprite.71e9f5f2.svg#sales-up-1"> </use>
                  </svg><span class="notification-badge bg-green"></span></a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated text-sm" aria-labelledby="notifications"><a class="dropdown-item" href="#">
                <div class="d-flex align-items-center">
                  <div class="icon icon-sm bg-indigo text-white"><i class="fab fa-twitter"></i></div>
                  <div class="text ms-2">
                    <p class="mb-0">You have 2 followers</p>
                  </div>
                </div></a><a class="dropdown-item" href="#"> 
                <div class="d-flex align-items-center">
                  <div class="icon icon-sm bg-green text-white"><i class="fas fa-envelope"></i></div>
                  <div class="text ms-2">
                    <p class="mb-0">You have 6 new messages</p>
                  </div>
                </div></a><a class="dropdown-item" href="#">
                <div class="d-flex align-items-center">
                  <div class="icon icon-sm bg-blue text-white"><i class="fas fa-upload"></i></div>
                  <div class="text ms-2">
                    <p class="mb-0">Server rebooted</p>
                  </div>
                </div></a><a class="dropdown-item" href="#">
                <div class="d-flex align-items-center">
                  <div class="icon icon-sm bg-indigo text-white"><i class="fab fa-twitter"></i></div>
                  <div class="text ms-2">
                    <p class="mb-0">You have 2 followers</p>
                  </div>
                </div></a>
              <div class="dropdown-divider"></div><a class="dropdown-item text-center" href="#"><small class="fw-bold text-uppercase">View all notifications</small></a>
            </div>
          </li>
          <!-- Messages                        -->
          <li class="nav-item dropdown me-2 me-lg-3"> <a class="nav-link nav-link-icon text-gray-400 px-1" id="messages" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <svg class="svg-icon svg-icon-md svg-icon-heavy">
                    <use xlink:href="icons/orion-svg-sprite.71e9f5f2.svg#paper-plane-1"> </use>
                  </svg><span class="notification-badge notification-badge-number bg-primary">10</span></a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated text-sm" aria-labelledby="messages"><a class="dropdown-item d-flex align-items-center p-3" href="#"> <img class="avatar avatar-sm p-1 me-2" src="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/img/avatar-0.jpg" alt="Jason Doe">
                <div class="pt-1">
                  <h6 class="fw-bold mb-0">Jason Doe</h6><span class="text-muted text-sm">Sent you a message</span>
                </div></a><a class="dropdown-item d-flex align-items-center p-3" href="#"> <img class="avatar avatar-sm p-1 me-2" src="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/img/avatar-1.jpg" alt="Frank Williams">
                <div class="pt-1">
                  <h6 class="fw-bold mb-0">Frank Williams</h6><span class="text-muted text-sm">Sent you a message</span>
                </div></a><a class="dropdown-item d-flex align-items-center p-3" href="#"> <img class="avatar avatar-sm p-1 me-2" src="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/img/avatar-2.jpg" alt="Ashley Wood">
                <div class="pt-1">
                  <h6 class="fw-bold mb-0">Ashley Wood</h6><span class="text-muted text-sm">Sent you a message</span>
                </div></a>
              <div class="dropdown-divider"></div><a class="dropdown-item text-center" href="#"> <small class="fw-bold text-uppercase">View all messages                          </small></a>
            </div>
          </li>
          <li class="nav-item dropdown ms-auto"><a class="nav-link pe-0" id="userInfo" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar p-1" src="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/img/avatar-6.jpg" alt="Jason Doe"></a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated" aria-labelledby="userInfo">
              <div class="dropdown-header text-gray-700">
                <h6 class="text-uppercase font-weight-bold">Mark Stephen</h6><small>Web Developer</small>
              </div>
              <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Settings</a><a class="dropdown-item" href="#">Activity log       </a>
              <div class="dropdown-divider"></div><a class="dropdown-item" href="login.html">Logout</a>
            </div>
          </li>
        </ul>
      </nav>
    </header>
    <div class="d-flex align-items-stretch">
      <div class="sidebar py-3" id="sidebar">
         
        <ul class="list-unstyled">
              <li class="sidebar-list-item"><a class="sidebar-link text-muted active" href="#" data-bs-target="#dashboardsDropdown" role="button" aria-expanded="true" data-bs-toggle="collapse"> 
                      <svg class="svg-icon svg-icon-md me-3">
                        <use xlink:href="icons/orion-svg-sprite.71e9f5f2.svg#real-estate-1"> </use>
                      </svg><span class="sidebar-link-title">Dashboards </span></a>
                 
              </li>
              <li class="sidebar-list-item"><a class="sidebar-link text-muted " href="#" data-bs-target="#cmsDropdown" role="button" aria-expanded="false" data-bs-toggle="collapse"> 
                      <svg class="svg-icon svg-icon-md me-3">
                        <use xlink:href="icons/orion-svg-sprite.71e9f5f2.svg#reading-1"> </use>
                      </svg><span class="sidebar-link-title">CMS </span></a>
                <ul class="sidebar-menu list-unstyled collapse " id="cmsDropdown">
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="cms-post.html">Posts</a></li>
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="cms-post-new.html">Add new post</a></li>
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="cms-category.html">Categories</a></li>
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="cms-media.html">Media library</a></li>
                </ul>
              </li>
              <li class="sidebar-list-item"><a class="sidebar-link text-muted " href="#" data-bs-target="#widgetsDropdown" role="button" aria-expanded="false" data-bs-toggle="collapse"> 
                      <svg class="svg-icon svg-icon-md me-3">
                        <use xlink:href="icons/orion-svg-sprite.71e9f5f2.svg#statistic-1"> </use>
                      </svg><span class="sidebar-link-title">Widgets </span></a>
                <ul class="sidebar-menu list-unstyled collapse " id="widgetsDropdown">
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="widgets-stats.html">Stats</a></li>
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="widgets-data.html">Data</a></li>
                </ul>
              </li>
              <li class="sidebar-list-item"><a class="sidebar-link text-muted " href="#" data-bs-target="#e-commerceDropdown" role="button" aria-expanded="false" data-bs-toggle="collapse"> 
                      <svg class="svg-icon svg-icon-md me-3">
                        <use xlink:href="icons/orion-svg-sprite.71e9f5f2.svg#delivery-truck-1"> </use>
                      </svg><span class="sidebar-link-title">E-commerce </span></a>
                <ul class="sidebar-menu list-unstyled collapse " id="e-commerceDropdown">
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="e-commerce-products.html">Products</a></li>
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="e-commerce-product-new.html">Products - New</a></li>
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="e-commerce-orders.html">Orders</a></li>
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="e-commerce-order.html">Order - Detail</a></li>
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="e-commerce-customers.html">Customers</a></li>
                </ul>
              </li>
              <li class="sidebar-list-item"><a class="sidebar-link text-muted " href="#" data-bs-target="#pagesDropdown" role="button" aria-expanded="false" data-bs-toggle="collapse"> 
                      <svg class="svg-icon svg-icon-md me-3">
                        <use xlink:href="icons/orion-svg-sprite.71e9f5f2.svg#paper-stack-1"> </use>
                      </svg><span class="sidebar-link-title">Pages </span></a>
                <ul class="sidebar-menu list-unstyled collapse " id="pagesDropdown">
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="pages-profile.html">Profile</a></li>
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="pages-pricing.html">Pricing table</a></li>
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="pages-contacts.html">Contacts</a></li>
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="pages-invoice.html">Invoice</a></li>
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="pages-knowledge-base.html">Knowledge base</a></li>
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="pages-knowledge-base-topic.html">Knowledge base - Topic</a></li>
                </ul>
              </li>
              <li class="sidebar-list-item"><a class="sidebar-link text-muted " href="#" data-bs-target="#userDropdown" role="button" aria-expanded="false" data-bs-toggle="collapse"> 
                      <svg class="svg-icon svg-icon-md me-3">
                        <use xlink:href="icons/orion-svg-sprite.71e9f5f2.svg#man-1"> </use>
                      </svg><span class="sidebar-link-title">User </span></a>
                <ul class="sidebar-menu list-unstyled collapse " id="userDropdown">
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="login.html">Login page</a></li>
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="register.html">Register</a></li>
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="login-2.html">Login v.2 <span class="badge bg-info ms-2 text-decoration-none">New</span></a></li>
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="register-2.html">Register v.2 <span class="badge bg-info ms-2 text-decoration-none">New</span></a></li>
                </ul>
              </li>
              <li class="sidebar-list-item"><a class="sidebar-link text-muted " href="#" data-bs-target="#componentsDropdown" role="button" aria-expanded="false" data-bs-toggle="collapse"> 
                      <svg class="svg-icon svg-icon-md me-3">
                        <use xlink:href="icons/orion-svg-sprite.71e9f5f2.svg#sorting-1"> </use>
                      </svg><span class="sidebar-link-title">Components </span></a>
                <ul class="sidebar-menu list-unstyled collapse " id="componentsDropdown">
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="components-cards.html">Cards</a></li>
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="components-calendar.html">Calendar</a></li>
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="components-gallery.html">Gallery</a></li>
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="components-loading-buttons.html">Loading buttons</a></li>
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="components-map.html">Maps</a></li>
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="components-notifications.html">Notifications</a></li>
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="components-preloader.html">Preloaders</a></li>
                </ul>
              </li>
              <li class="sidebar-list-item"><a class="sidebar-link text-muted " href="#" data-bs-target="#chartsDropdown" role="button" aria-expanded="false" data-bs-toggle="collapse"> 
                      <svg class="svg-icon svg-icon-md me-3">
                        <use xlink:href="icons/orion-svg-sprite.71e9f5f2.svg#pie-chart-1"> </use>
                      </svg><span class="sidebar-link-title">Charts </span></a>
                <ul class="sidebar-menu list-unstyled collapse " id="chartsDropdown">
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="charts.html">Charts</a></li>
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="charts-gauge-sparkline.html">Gauge + Sparkline</a></li>
                </ul>
              </li>
              <li class="sidebar-list-item"><a class="sidebar-link text-muted " href="#" data-bs-target="#formsDropdown" role="button" aria-expanded="false" data-bs-toggle="collapse"> 
                      <svg class="svg-icon svg-icon-md me-3">
                        <use xlink:href="icons/orion-svg-sprite.71e9f5f2.svg#file-storage-1"> </use>
                      </svg><span class="sidebar-link-title">Forms </span></a>
                <ul class="sidebar-menu list-unstyled collapse " id="formsDropdown">
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="forms.html">Basic forms</a></li>
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="forms-advanced.html">Advanced forms</a></li>
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="forms-dropzone.html">Files upload</a></li>
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="forms-texteditor.html">Text editor</a></li>
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="forms-validation.html">Validation</a></li>
                </ul>
              </li>
              <li class="sidebar-list-item"><a class="sidebar-link text-muted " href="#" data-bs-target="#tablesDropdown" role="button" aria-expanded="false" data-bs-toggle="collapse"> 
                      <svg class="svg-icon svg-icon-md me-3">
                        <use xlink:href="icons/orion-svg-sprite.71e9f5f2.svg#grid-1"> </use>
                      </svg><span class="sidebar-link-title">Tables </span></a>
                <ul class="sidebar-menu list-unstyled collapse " id="tablesDropdown">
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="tables.html">Bootstrap tables</a></li>
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="tables-datatable.html">Datatable</a></li>
                </ul>
              </li>
        </ul>
         
      </div>
      <div class="page-holder bg-gray-100">
        <div class="container-fluid px-lg-4 px-xl-5">
              <!-- Page Header-->
              <div class="page-header">
                <h1 class="page-heading">dashboard</h1>
              </div>
          <section class="mb-3 mb-lg-5">
            <div class="row mb-3">
                  <!-- Widget Type 1-->
                  <div class="mb-4 col-sm-6 col-lg-3 mb-4">
                    <div class="card h-100">
                      <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                          <div>
                            <h4 class="fw-normal text-red">$10,500</h4>
                            <p class="subtitle text-sm text-muted mb-0">Earnings</p>
                          </div>
                          <div class="flex-shrink-0 ms-3">
                                <svg class="svg-icon text-red">
                                  <use xlink:href="icons/orion-svg-sprite.71e9f5f2.svg#speed-1"> </use>
                                </svg>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer py-3 bg-red-light">
                        <div class="row align-items-center text-red">
                          <div class="col-10">
                            <p class="mb-0">20% increase</p>
                          </div>
                          <div class="col-2 text-end"><i class="fas fa-caret-up"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /Widget Type 1-->
                  <!-- Widget Type 1-->
                  <div class="mb-4 col-sm-6 col-lg-3 mb-4">
                    <div class="card h-100">
                      <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                          <div>
                            <h4 class="fw-normal text-blue">584</h4>
                            <p class="subtitle text-sm text-muted mb-0">Readers</p>
                          </div>
                          <div class="flex-shrink-0 ms-3">
                                <svg class="svg-icon text-blue">
                                  <use xlink:href="icons/orion-svg-sprite.71e9f5f2.svg#news-1"> </use>
                                </svg>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer py-3 bg-blue-light">
                        <div class="row align-items-center text-blue">
                          <div class="col-10">
                            <p class="mb-0">3% increase</p>
                          </div>
                          <div class="col-2 text-end"><i class="fas fa-caret-up"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /Widget Type 1-->
                  <!-- Widget Type 1-->
                  <div class="mb-4 col-sm-6 col-lg-3 mb-4">
                    <div class="card h-100">
                      <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                          <div>
                            <h4 class="fw-normal text-primary">876</h4>
                            <p class="subtitle text-sm text-muted mb-0">Bookmarks</p>
                          </div>
                          <div class="flex-shrink-0 ms-3">
                                <svg class="svg-icon text-primary">
                                  <use xlink:href="icons/orion-svg-sprite.71e9f5f2.svg#bookmark-1"> </use>
                                </svg>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer py-3 bg-primary-light">
                        <div class="row align-items-center text-primary">
                          <div class="col-10">
                            <p class="mb-0">10% increase</p>
                          </div>
                          <div class="col-2 text-end"><i class="fas fa-caret-up"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /Widget Type 1-->
                  <!-- Widget Type 1-->
                  <div class="mb-4 col-sm-6 col-lg-3 mb-4">
                    <div class="card h-100">
                      <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                          <div>
                            <h4 class="fw-normal text-green">3,500</h4>
                            <p class="subtitle text-sm text-muted mb-0">Visitors</p>
                          </div>
                          <div class="flex-shrink-0 ms-3">
                                <svg class="svg-icon text-green">
                                  <use xlink:href="icons/orion-svg-sprite.71e9f5f2.svg#world-map-1"> </use>
                                </svg>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer py-3 bg-green-light">
                        <div class="row align-items-center text-green">
                          <div class="col-10">
                            <p class="mb-0">5% decrease</p>
                          </div>
                          <div class="col-2 text-end"><i class="fas fa-caret-down"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /Widget Type 1-->
            </div>
            
            
                  <!-- /Widget Type 12-->
                  <!-- Widget Type 13-->
                  
            
    <!-- JavaScript files-->
    <script src="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <!-- Data Tables-->
    <script src="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/vendor/simple-datatables/umd/simple-datatables.js"></script>
    <!-- Init Charts on Homepage-->
    <script src="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/vendor/chart.js/Chart.min.js"></script>
    <script src="js/charts-defaults.8a5fcd99.js"></script>
    <script src="js/index-default.50a9efee.js"></script>
    <!-- Main Theme JS File-->
    <script src="js/theme.87f0a411.js"></script>
    <!-- Prism for syntax highlighting-->
    <script src="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/vendor/prismjs/prism.js"></script>
    <script src="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/vendor/prismjs/plugins/normalize-whitespace/prism-normalize-whitespace.min.js"></script>
    <script src="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/vendor/prismjs/plugins/toolbar/prism-toolbar.min.js"></script>
    <script src="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/vendor/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js"></script>
    <script type="text/javascript">
      // Optional
      Prism.plugins.NormalizeWhitespace.setDefaults({
      'remove-trailing': true,
      'remove-indent': true,
      'left-trim': true,
      'right-trim': true,
      });
          
    </script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </body>
</html>