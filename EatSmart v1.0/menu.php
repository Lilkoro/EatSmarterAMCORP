<?php 
    $nomMenu = array(
        "M1" => "Menu S",
        "M2" => "Bucket M",
        "M3" => "Bucket L",
        "B1" => "Double Krunch®",
        "B2" => "Colonel Original®",
        "B3" => "Double Stacker",
        "D1" => "Muffin au Nutella",
        "D2" => "Kream Ball®",
        "D3" => "Pom'Potes® Bio"
);

    $prixMenu = array(
        "M1" => "7.90Euro",
        "M2" => "15.90Euro",
        "M3" => "23.90Euro",
        "B1" => "5.50Euro",
        "B2" => "6.90Euro",
        "B3" => "7.50Euro",
        "D1" => "2.20Euro",
        "D2" => "2.00Euro",
        "D3" => "1.50Euro"
);

    $descrMenu = array(
        "M1" => "Comprend 5 Tenders et 8 Hot Wings avec une boisson.",
        "M2" => "Comprend 10 Tenders et 16 Hot Wings avec une boisson.",
        "M3" => "Comprend 20 Tenders et 32 Hot Wings avec une boisson.",
        "B1" => "Un burger croustillant avec du fromage, sans tomate, inclus avec boisson et frites.",
        "B2" => "Burger avec filet de poulet croustillant et fromage, avec option bacon (+0,50 €), inclus avec boisson et frites.",
        "B3" => "Burger au poulet avec fromage et bacon, inclus avec boisson et frites.",
        "D1" => "Muffin moelleux au Nutella.",
        "D2" => "Crème glacée en coupe. ",
        "D3" => "Compote de pommes bio."
);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fast Food</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>


    <!-- navbar and main -->


    <div class="banner">
        <nav class="navbar navbar-expand-md pt-3 position-relative">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="../Assestss/Place Your Logo Here (Double Click to Edit).png" alt="Logo..." height="90"
                        width="120">
                </a>
                <div class="navbar-toggler bg-body navbar-expand-md" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </div>
                <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Fast Food Point</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav fs-5 justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item position-relative">
                                <a class="nav-link active text-white fw-bold" aria-current="page" href="#">HOME</a>
                            </li>
                            <li class="nav-item position-relative">
                                <a class="nav-link text-white fw-bold" href="#product">PRODUCT</a>
                            </li>
                            <li class="nav-item position-relative">
                                <a class="nav-link text-white fw-bold" href="#about">ABOUT</a>
                            </li>
                            </li>
                            <li class="nav-item position-relative">
                                <a class="nav-link text-white fw-bold" href="#contact">CONTACT</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-7 col-md-8 mt-4 text-white">
                    <h1 class="main-1 text-black fw-bold text-white">Le nouveau restaurant de AMCorp</h1>
                    <p class="mt-5 fs-2">Chez les restaurant franchisé AMCorp vous allez manger sains et à petit prix ! On respect vous et la nature avec des labels certifiés !
                    </p>
                </div>
            </div>
        </div>
    </div>


    <!-- Our Packages -->


    <div class="container-fluid image-back-1-2 bg-danger-subtle">
        <div class="container">
            <div class="row pt-5 pb-5">
                <div class="col">
                    <div class="h1 text-center text-danger-emphasis">Poulet & Bucket</div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 gy-4 pb-5">
                <div class="col">
                    <div class="card card-pack">
                        <h4 class="card-title text-danger text-center text-danger pt-3 pb-3"><?php echo $nomMenu["M1"];?></h4>
                        <img src="../Assestss/10.png" class="card-img w-25 align-self-center" alt="Loading...">
                        <div class="card-body text-center">
                            <h5 class="card-text text-danger fs-4"><?php echo $prixMenu["M1"];?></h5>
                            <p class="card-text text-danger pe-3 ps-3"><?php echo $descrMenu["M1"];?></p>
                            <button type="button"
                                class="btn bg-danger text-white border-0 rounded-5 pe-4 ps-4 fs-4">Ajout au Panier</button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-pack">
                        <h4 class="card-title text-danger text-danger text-center pt-3 pb-3"><?php echo $nomMenu["M2"];?></h4>
                        <img src="../Assestss/10.png" class="card-img w-25 align-self-center" alt="Loading...">
                        <div class="card-body text-center">
                            <h5 class="card-text text-danger fs-4"><?php echo $prixMenu["M2"];?></h5>
                            <p class="card-text text-danger pe-3 ps-3"><?php echo $descrMenu["M2"];?></p>
                            <button type="button"
                                class="btn bg-danger text-white border-0 rounded-5 pe-4 ps-4 fs-4">Ajout au Panier</button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-pack">
                        <h4 class="card-title text-danger text-center pt-3 pb-3"><?php echo $nomMenu["M3"];?></h4>
                        <img src="../Assestss/10.png" class="card-img w-25 align-self-center" alt="Loading...">
                        <div class="card-body text-center">
                            <h5 class="card-text text-danger fs-4"><?php echo $prixMenu["M3"];?></h5>
                            <p class="card-text text-danger ps-3 pe-3"><?php echo $descrMenu["M3"];?></p>
                            <button type="button"
                                class="btn bg-danger text-white border-0 rounded-5 pe-4 ps-4 fs-4">Ajout au Panier</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-5 pb-5">
                <div class="col">
                    <div class="h1 text-center text-danger-emphasis">Burgers</div>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-3 gy-4 pb-5">
                <div class="col">
                    <div class="card card-pack">
                        <h4 class="card-title text-danger text-center text-danger pt-3 pb-3"><?php echo $nomMenu["B1"];?></h4>
                        <img src="../Assestss/10.png" class="card-img w-25 align-self-center" alt="Loading...">
                        <div class="card-body text-center">
                            <h5 class="card-text text-danger fs-4"><?php echo $prixMenu["B1"];?></h5>
                            <p class="card-text text-danger pe-3 ps-3"><?php echo $descrMenu["B1"];?></p>
                            <button type="button"
                                class="btn bg-danger text-white border-0 rounded-5 pe-4 ps-4 fs-4">Ajout au Panier</button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-pack">
                        <h4 class="card-title text-danger text-danger text-center pt-3 pb-3"><?php echo $nomMenu["B2"];?></h4>
                        <img src="../Assestss/10.png" class="card-img w-25 align-self-center" alt="Loading...">
                        <div class="card-body text-center">
                            <h5 class="card-text text-danger fs-4"><?php echo $prixMenu["B2"];?></h5>
                            <p class="card-text text-danger pe-3 ps-3"><?php echo $descrMenu["B2"];?></p>
                            <button type="button"
                                class="btn bg-danger text-white border-0 rounded-5 pe-4 ps-4 fs-4">Ajout au Panier</button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-pack">
                        <h4 class="card-title text-danger text-center pt-3 pb-3"><?php echo $nomMenu["B3"];?></h4>
                        <img src="../Assestss/10.png" class="card-img w-25 align-self-center" alt="Loading...">
                        <div class="card-body text-center">
                            <h5 class="card-text text-danger fs-4"><?php echo $prixMenu["B3"];?></h5>
                            <p class="card-text text-danger ps-3 pe-3"><?php echo $descrMenu["B3"];?></p>
                            <button type="button"
                                class="btn bg-danger text-white border-0 rounded-5 pe-4 ps-4 fs-4">Ajout au Panier</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row pt-5 pb-5">
                <div class="col">
                    <div class="h1 text-center text-danger-emphasis">Desserts</div>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-3 gy-4 pb-5">
                <div class="col">
                    <div class="card card-pack">
                        <h4 class="card-title text-danger text-center text-danger pt-3 pb-3"><?php echo $nomMenu["D1"];?></h4>
                        <img src="../Assestss/10.png" class="card-img w-25 align-self-center" alt="Loading...">
                        <div class="card-body text-center">
                            <h5 class="card-text text-danger fs-4"><?php echo $prixMenu["D1"];?></h5>
                            <p class="card-text text-danger pe-3 ps-3"><?php echo $descrMenu["D1"];?></p>
                            <button type="button"
                                class="btn bg-danger text-white border-0 rounded-5 pe-4 ps-4 fs-4">Ajout au Panier</button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-pack">
                        <h4 class="card-title text-danger text-danger text-center pt-3 pb-3"><?php echo $nomMenu["D2"];?></h4>
                        <img src="../Assestss/10.png" class="card-img w-25 align-self-center" alt="Loading...">
                        <div class="card-body text-center">
                            <h5 class="card-text text-danger fs-4"><?php echo $prixMenu["D2"];?></h5>
                            <p class="card-text text-danger pe-3 ps-3"><?php echo $descrMenu["D2"];?></p>
                            <button type="button"
                                class="btn bg-danger text-white border-0 rounded-5 pe-4 ps-4 fs-4">Ajout au Panier</button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-pack">
                        <h4 class="card-title text-danger text-center pt-3 pb-3"><?php echo $nomMenu["D3"];?></h4>
                        <img src="../Assestss/10.png" class="card-img w-25 align-self-center" alt="Loading...">
                        <div class="card-body text-center">
                            <h5 class="card-text text-danger fs-4"><?php echo $prixMenu["D3"];?></h5>
                            <p class="card-text text-danger ps-3 pe-3"><?php echo $descrMenu["D3"];?></p>
                            <button type="button"
                                class="btn bg-danger text-white border-0 rounded-5 pe-4 ps-4 fs-4">Ajout au Panier</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>