@extends('layouts.app')

@section('content')

@endsection

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            display: flex;
            gap: 20px;
            padding: 20px;
        }

        /* Блок с товарами (66%) */
        .products {
            width: 66%;
        }

        .product-card {
            display: flex;
            align-items: center;
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .product-card img {
            width: 100px;
            height: 100px;
            margin-right: 20px;
        }

        .product-info {
            flex-grow: 1;
        }

        .product-info h3 {
            margin: 0 0 10px;
            font-size: 18px;
        }

        .product-info p {
            margin: 0 0 10px;
            color: #555;
        }

        .counter {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .counter button {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        .counter button:hover {
            background-color: #218838;
        }

        .counter span {
            font-size: 16px;
        }

        .actions {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .actions button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
        }

        .actions button:hover {
            background-color: #0056b3;
        }

        .actions button.remove {
            background-color: #dc3545;
        }

        .actions button.remove:hover {
            background-color: #c82333;
        }

        /* Блок корзины (33%) */
        .cart {
            width: 33%;
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .cart h2 {
            margin: 0 0 20px;
            font-size: 24px;
        }

        .cart .total-price {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .cart .checkout-button {
            width: 100%;
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 15px;
            font-size: 18px;
            cursor: pointer;
        }

        .cart .checkout-button:hover {
            background-color: #218838;
        }

        .cart .delivery-info {
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Блок с товарами (66%) -->
        <div class="products">
            <div class="product-card">
                <img src="https://via.placeholder.com/100" alt="Товар 1">
                <div class="product-info">
                    <h3>Смартфон</h3>
                    <p>Цена: $500</p>
                    <div class="counter">
                        <button>-</button>
                        <span>1</span>
                        <button>+</button>
                    </div>
                </div>
                <div class="actions">
                    <button>Добавить в избранное</button>
                    <button class="remove">Удалить из корзины</button>
                </div>
            </div>
            <div class="product-card">
                <img src="https://via.placeholder.com/100" alt="Товар 2">
                <div class="product-info">
                    <h3>Ноутбук</h3>
                    <p>Цена: $1200</p>
                    <div class="counter">
                        <button>-</button>
                        <span>1</span>
                        <button>+</button>
                    </div>
                </div>
                <div class="actions">
                    <button>Добавить в избранное</button>
                    <button class="remove">Удалить из корзины</button>
                </div>
            </div>
            <div class="product-card">
                <img src="https://via.placeholder.com/100" alt="Товар 3">
                <div class="product-info">
                    <h3>Наушники</h3>
                    <p>Цена: $150</p>
                    <div class="counter">
                        <button>-</button>
                        <span>1</span>
                        <button>+</button>
                    </div>
                </div>
                <div class="actions">
                    <button>Добавить в избранное</button>
                    <button class="remove">Удалить из корзины</button>
                </div>
            </div>
        </div>

        <!-- Блок корзины (33%) -->
        <div class="cart">
            <h2>Корзина</h2>
            <p class="total-price">Общая сумма: $1850</p>
            <button class="checkout-button">Оформить заказ</button>
            <div class="delivery-info">
                <p>Доставка: Бесплатно</p>
                <p>Срок доставки: 3-5 дней</p>
            </div>
        </div>
    </div>
</body>
</html>