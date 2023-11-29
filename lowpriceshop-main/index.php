<?php

include('includes/includes.php');
include('conexao.php'); // Inclua o arquivo de conexão aqui
try {
    // Criação de uma instância de PDO
    $pdo = new PDO($dsn, $user, $password, $options);

    // Consulta para obter os produtos
    $stmt = $pdo->prepare("SELECT idProduto, nomeProduto, imagemProduto, precoProduto, corProduto FROM produtos");
    $stmt->execute();
    $produtos = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>

<link rel="stylesheet" href="css/estilo.css">
<!-- O conteúdo principal da página vem aqui -->
<main>
    <section id="mais-vendidos">
        <h2>Mais Vendidos</h2>
        <!-- Adicione aqui os produtos mais vendidos em formato de carrossel -->
        <div class="cards-container">
    <?php foreach ($produtos as $produto): ?>
        <div class="card">
            <a href="produto.php?id=<?php echo $produto['idProduto']; ?>">
                <img src="img/<?php echo $produto['imagemProduto']; ?>" alt="<?php echo $produto['nomeProduto']; ?>">
                <h1><?php echo $produto['nomeProduto']; ?></h1>
                <h3>Valor: R$ <?php echo number_format($produto['precoProduto'], 2, ',', '.'); ?></h3>
            </a>
            <div class="additional-fields">
                <!-- Restante do código permanece o mesmo -->
            </div>
        </div>
    <?php endforeach; ?>
</div>

        </div>
    </section>
<!--
    <section id="novidades">
        <h2>Novidades para Você</h2>
        < Adicione aqui os produtos em destaque em formato de carrossel 
        <div id="carousel-novidades" class="carousel slide" data-ride="carousel">
          
        </div>
    </section>

    <section id="avaliacoes">
        <h2>Avaliações dos Usuários</h2>
        <div id="carousel-avaliacoes" class="carousel slide" data-ride="carousel">
        </div>
    </section>-->   
</main>
<hr>

<?php

include('includes/footer.php');

?>
