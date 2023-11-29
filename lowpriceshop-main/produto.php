<link rel="stylesheet" href="css/estilo.css">
<?php
include('conexao.php');
include('includes/includes.php');

if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Fetch product details based on the ID
    $stmt = $pdo->prepare("SELECT idProduto, nomeProduto, imagemProduto, precoProduto FROM produtos WHERE idProduto = ?");
    $stmt->execute([$productId]);
    $product = $stmt->fetch();

    if (!$product) {
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    echo "Obrigado pela sua compra, $name! Seu pedido de {$product['nomeProduto']}  foi realizado..";
    exit;
}
?>


    <title>Checkout - <?php echo $product['nomeProduto']; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .product-details {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #555;
        }
    </style>
<body>

<h1>Checkout - <?php echo $product['nomeProduto']; ?></h1>

<div class="product-details">
    <img src="img/<?php echo $product['imagemProduto']; ?>" alt="<?php echo $product['nomeProduto']; ?>">
    <h2><?php echo $product['nomeProduto']; ?></h2>
    <p id="totalDisplay">Valor: R$ <?php echo number_format($product['precoProduto'], 2, ',', '.'); ?></p>

<form method="post">
    <label for="name">Nome:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="cartao">Numero cartão:</label>
    <input type="text" id="cartao" name="cartao" required>
    <div id="cardTypeDisplay"></div>

    <label for="address">Endereço:</label>
    <textarea id="address" name="address" required></textarea>

    <button type="submit">Comprar</button>
</form>

<button type="button" id="addToCartBtn">Adicionar ao carrinho</button>
</div>

<script>
// JavaScript code to count clicks on the "Adicionar ao carrinho" button
let addToCartBtn = document.getElementById('addToCartBtn');
let clickCount = 0;

addToCartBtn.addEventListener('click', function () {
    clickCount++;
    let total = clickCount * <?php echo $product['precoProduto']; ?>;
    updateTotalDisplay(total);
});

// Function to update the total display on the webpage
function updateTotalDisplay(total) {
    let totalDisplay = document.getElementById('totalDisplay');
    totalDisplay.textContent = `Valor: R$ ${total.toFixed(2)}`;
}

// Function to identify card type based on the card number
function identifyCardType(cardNumber) {
    // Regular expressions for known card types
    const visaPattern = /^4/;
    const mastercardPattern = /^5[1-5]/;
    const eloPattern = /^(636368|438935|504175|451416|636297)/;

    if (visaPattern.test(cardNumber)) {
        return 'Visa';
    } else if (mastercardPattern.test(cardNumber)) {
        return 'MasterCard';
    } else if (eloPattern.test(cardNumber)) {
        return 'Elo';
    } else {
        return 'Unknown Card Type';
    }
}

// Function to update card type display
function updateCardTypeDisplay(cardNumber) {
    let cardTypeDisplay = document.getElementById('cardTypeDisplay');
    let cardType = identifyCardType(cardNumber);
    cardTypeDisplay.textContent = `Tipo de Cartão: ${cardType}`;
}

// Example usage
let cardNumberInput = document.getElementById('cartao');
cardNumberInput.addEventListener('input', function () {
    updateCardTypeDisplay(cardNumberInput.value);
});
</script>
</body>
</html>
