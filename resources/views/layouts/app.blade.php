<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('KokoPolosShop', 'E-commerce Site')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Base styles */
body {
    font-family: 'Arial', sans-serif;
    line-height: 1.6;
    color: #333;
    background-color: #f4f4f4;
}

.container {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

/* Typography */
h1, h2, h3, h4, h5, h6 {
    margin-bottom: 20px;
    color: #2c3e50;
}

/* Buttons */
.btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #3498db;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #2980b9;
}

.btn-primary {
    background-color: #3498db;
}

.btn-secondary {
    background-color: #95a5a6;
}

.btn-danger {
    background-color: #e74c3c;
}

.btn-warning {
    background-color: #f39c12;
}

.btn-info {
    background-color: #2ecc71;
}

/* Forms */
.form-group {
    margin-bottom: 20px;
}

.form-control {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

/* Navigation */
nav {
    background-color: #34495e;
    padding: 10px 0;
}

nav ul {
    list-style-type: none;
    padding: 0;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
}

/* Hero Section */
.hero {
    background-color: #3498db;
    color: #fff;
    text-align: center;
    padding: 60px 0;
    margin-bottom: 40px;
}

.hero h1 {
    font-size: 3em;
    margin-bottom: 20px;
}

/* Product Grid */
.product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 30px;
}

.product-card {
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    overflow: hidden;
    transition: transform 0.3s ease;
}

.product-card:hover {
    transform: translateY(-5px);
}

.product-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.product-card-body {
    padding: 20px;
}

.product-card h3 {
    margin-top: 0;
}

.product-card .price {
    font-weight: bold;
    color: #e74c3c;
}

/* Category Grid */
.category-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 20px;
}

.category-card {
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    overflow: hidden;
    text-decoration: none;
    color: #333;
    transition: transform 0.3s ease;
}

.category-card:hover {
    transform: translateY(-5px);
}

.category-card img {
    width: 100%;
    height: 150px;
    object-fit: cover;
}

.category-card h3 {
    padding: 15px;
    margin: 0;
    text-align: center;
}

/* Alert Messages */
.alert {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
}

.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
}

.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}

/* Pagination */
.pagination {
    display: flex;
    justify-content: center;
    list-style-type: none;
    padding: 0;
}

.pagination li {
    margin: 0 5px;
}

.pagination li a {
    display: block;
    padding: 5px 10px;
    background-color: #fff;
    border: 1px solid #ddd;
    color: #333;
    text-decoration: none;
}

.pagination li.active a {
    background-color: #3498db;
    color: #fff;
}

/* Responsive Design */
@media (max-width: 768px) {
    .product-grid,
    .category-grid {
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    }

    .hero h1 {
        font-size: 2em;
    }
}

@media (max-width: 480px) {
    .product-grid,
    .category-grid {
        grid-template-columns: 1fr;
    }

    .btn {
        display: block;
        width: 100%;
        margin-bottom: 10px;
    }
}
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{route('categories.index')}}">Category</a></li>
                <li><a href="{{ route('products.index') }}">Products</a></li>
                <li><a href="{{ route('cart.index') }}">Cart</a></li>
                @auth
                    <li><a href="{{ route('orders.index') }}">My Orders</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endauth
            </ul>
        </nav>
    </header>

    <main>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Koko Polos Shop. All rights reserved.</p>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>