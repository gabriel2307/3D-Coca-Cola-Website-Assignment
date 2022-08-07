<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lab 9</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/x3dom/x3dom.css">
    <link rel="stylesheet" href="/~gu33/css/app.css">
</head>
<body>

<div class="bg-dark">
    <nav class="container navbar pb-sm-3 pb-0">
        <div class="container-fluid">
            <a class="navbar-brand" href="/~gu33/3dapp/assignment/index.php">My Coca Cola Brand</a>

            <ul class="navbar-nav ms-sm-auto mt-sm-0 mt-2 flex flex-row justify-content-center align-items-center">
                <li class="nav-item me-4">
                    <a class="nav-link <?php if($_SERVER['REQUEST_URI'] === '/') echo 'active' ?>" href="/~gu33/3dapp/assignment/index.php">Home</a>
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link <?php if($_SERVER['REQUEST_URI'] === '/?page=about') echo 'active' ?>" href="/~gu33/3dapp/assignment/index.php?page=about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($_SERVER['REQUEST_URI'] === '/?page=models') echo 'active' ?>" href="/~gu33/3dapp/assignment/index.php?page=models">Models</a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<div class="bg-light-green pb-4">
    <div class="container" style="min-height: 100vh">
        {{content}}
    </div>
</div>

<footer class="bg-dark">
    <div class="container py-3 d-flex align-items-center justify-content-between">
        <p class="nav-link m-0">&copy; 2022, Gabriel's Lab</p>

        <a href="https://github.com/gabriel2307/3D-Coca-Cola-Website-Assignment.git" target="_blank" style="width: fit-content" class="d-flex flex-column justify-content-center align-items-center text-light text-decoration-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" height="24" width="24"><path d="M20.11554,5.90131a3.88274,3.88274,0,0,0-.26-.31,4.41253,4.41253,0,0,0,.21-.76,5.28351,5.28351,0,0,0-.35-2.8s-1.12-.35-3.69,1.38a12.47675,12.47675,0,0,0-3.35-.45,12.60429,12.60429,0,0,0-3.36.45c-2.57-1.75-3.69-1.38-3.69-1.38a5.26343,5.26343,0,0,0-.35,2.77,4.21027,4.21027,0,0,0,.22.79c-.09.1-.18.21-.26.31a5.13973,5.13973,0,0,0-1.12,3.3,7.68624,7.68624,0,0,0,.04.85c.31994,4.43,3.27,5.46,6.08,5.78a2.55759,2.55759,0,0,0-.77,1.39,4.02183,4.02183,0,0,0-.13,1.09v1.30957c-1.11822.09937-2.26648-.06335-2.62219-1.06134a5.69461,5.69461,0,0,0-1.83447-2.41211,1.1789,1.1789,0,0,1-.169-.1123,1.00141,1.00141,0,0,0-.93066-.64551H3.77441a.99965.99965,0,0,0-1,.99512c-.0039.8125.80909,1.33691,1.14258,1.51562a4.4665,4.4665,0,0,1,.92285,1.3584c.36426,1.02344,1.4292,2.57812,4.46582,2.376.001.03515.002.06835.00245.09863l.00439.26758a.99974.99974,0,0,0,1,1l.00311-.00061V23.001h4.71112a.99974.99974,0,0,0,1-1s.00733-3.15967.00733-3.68964a4.02421,4.02421,0,0,0-.13-1.09l-.00183-.0061.00336.0061c-.00861-.035-.02173-.06353-.03113-.09747A2.53213,2.53213,0,0,0,15.134,15.8313l.0116.02087c-.00684-.00616-.01324-.01489-.02008-.02087,2.81-.32,5.74-1.37,6.06-5.78a7.68675,7.68675,0,0,0,.04-.85A5.2306,5.2306,0,0,0,20.11554,5.90131Z" data-name="Brand Logos"></path></svg>
        </a>
    </div>
</footer>


<script type="text/javascript" src="https://unpkg.com/x3dom/x3dom.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>