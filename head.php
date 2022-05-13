<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$title_web?></title>
    <link href="<?=domain_admin?>css/bootstrap.min.css"  rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=domain_admin?>css/custom.css"  /> 
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> 
</head>
<body>
    <div class="container py-3">
        <header>
          <div class="row pb-3 mb-4 border-bottom justify-content-between align-items-center">
            <div class="col-4 col-lg-4 order-0">
              <a href="<?=domain?>" class="h2 text-decoration-none text-success">
               <?=$title_web?>
              </a>
            </div>
            <div class="col-12 col-lg-5 order-2 order-lg-1">
              <form class="d-flex" method="GET">
                <input class="form-control me-2" name="key" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </div>
            <div class="col-4 col-lg-3 order-1 order-lg-2 mb-3">
              <div class="d-flex justify-content-end">
                  <?php if(!isset($_SESSION["user_email"])){ ?>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#LoginModal">Login</button>
                <?php }else {
                      $info_user = info($_SESSION["user_id"],$connect);  
                ?>
                <div class="avatar">
                  <button type="button" class="icon" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="<?=$info_user["image_profile"]?>" alt="avatar" />
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?=domain?>my-account.php">My account</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="<?=domain?>logout.php">Logout</a></li>
                  </ul>
                </div>  
                <?php }?>
              </div>
            </div>
          </div>
        </header>
        