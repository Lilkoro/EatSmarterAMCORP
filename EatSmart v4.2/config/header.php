
<?php
    /**
     * @file config/header.php
     * 
     * @brief En-tête de la page HTML.
     * 
     * Ce fichier contient le code HTML pour l'en-tête de la page web.
     * Il inclut les liens vers les fichiers CSS et JavaScript nécessaires.
     */
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fast Food</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<div class="banner">
    <nav class="navbar pt-3 position-relative">
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const panierButtons = document.querySelectorAll('button[form="ajoutPanier"]');
                const cartCookieName = 'panier';
                /**
                 * Récupère le panier depuis le cookie.
                 * @return Si le cookie n'existe pas, retourne un objet vide.
                 */
                function getCartFromCookies() {
                    const cookies = document.cookie.split('; ');
                    const cartCookie = cookies.find(row => row.startsWith(cartCookieName + '='));
                    return cartCookie ? JSON.parse(decodeURIComponent(cartCookie.split('=')[1])) : {};
                }
                /**
                 * Enregistre le panier dans le cookie.
                 * @param {Object} cart - Le panier à enregistrer.
                 * @return {void}
                 */
                function saveCartToCookies(cart) {
                    document.cookie = `${cartCookieName}=${encodeURIComponent(JSON.stringify(cart))}; path=/; max-age=31536000`;
                }
                /**
                 * Met à jour l'affichage du panier.
                 * @param {Object} cart - Le panier à afficher.
                 * @return {void}
                 */
                function updateCartDisplay(cart) {
                    const cartBox = document.querySelector('.cart-box');
                    cartBox.innerHTML = `
                        <ul class="list-group mb-3"></ul>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Total:</span>
                            <span class="fw-bold">€0.00</span>
                        </div>
                    `;

                    const cartList = cartBox.querySelector('.list-group');
                    const totalElement = cartBox.querySelector('.d-flex span:last-child');
                    let total = 0;

                    for (const [item, details] of Object.entries(cart)) {
                        const listItem = document.createElement('li');
                        listItem.className = 'list-group-item d-flex justify-content-between align-items-center';
                        listItem.textContent = details.name;

                        const badge = document.createElement('span');
                        badge.className = 'badge bg-primary rounded-pill';
                        badge.textContent = details.quantity;

                        listItem.appendChild(badge);
                        cartList.appendChild(listItem);

                        total += details.quantity * details.price; // Assuming `details.price` exists
                    }

                    totalElement.textContent = `€${total.toFixed(2)}`;
                }
                /**
                 * Ajoute un article au panier.
                 * @param {string} itemId - L'ID de l'article.
                 * @param {string} itemName - Le nom de l'article.
                 * @param {number} itemPrice - Le prix de l'article.
                 * @return {void}
                 */
                function addToCart(itemId, itemName, itemPrice) {
                    const cart = getCartFromCookies();
                    if (cart[itemId]) {
                        cart[itemId].quantity += 1;
                    } else {
                        cart[itemId] = { name: itemName, price: itemPrice, quantity: 1 };
                    }
                    saveCartToCookies(cart);
                    updateCartDisplay(cart);
                }

                panierButtons.forEach(button => {
                    button.addEventListener('click', function (event) {
                        event.preventDefault();
                        const itemId = this.value;
                        const itemName = this.dataset.name; // Assuming you have a `data-name` attribute
                        const itemPrice = parseFloat(this.dataset.price); // Assuming you have a `data-price` attribute
                        console.log(itemId, itemName, itemPrice);
                        addToCart(itemId, itemName, itemPrice);
                    });
                });

                // Initialize cart display on page load
                updateCartDisplay(getCartFromCookies());
            });
        </script>
        <div class="container">
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
                            <a class="nav-link text-white fw-bold" href="#PRODUCT">Le Menu</a>
                        </li>
                        <li class="nav-item position-relative">
                            <a class="nav-link text-white fw-bold" href="./contact.php">Nous Contacter</a>
                        </li>
                        <li>
                            <a class="navbar-brand" href="#">
                                <div class="cart-box border rounded p-3 bg-light">
                                    <h5 class="text-center fw-bold">Votre Panier</h5>
                                    <button class="btn btn-success w-100 mt-3">Passer la commande</button>
                                </div>
                            </a>
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