<?php
require_once 'dbconnect.php';

$world_id = $_SESSION['world_id'];

$articles_per_page = 50;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) {
    $page = 1;
}

$count_stmt = $pdo->prepare("SELECT COUNT(*) FROM articles WHERE user_id = ? AND world_id = ?");
$count_stmt->execute([$_SESSION['user_id'], $_SESSION['world_id']]);
$total_articles = $count_stmt->fetchColumn();

$total_pages = ceil($total_articles/$articles_per_page);

$stmt = $pdo->prepare("SELECT * FROM articles WHERE user_id = ? AND world_id = ?");
$stmt->execute([$_SESSION['user_id'], $_SESSION['world_id']]);
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<div id='worldcontent'>
    <h2>Articles in <?php echo htmlspecialchars($_SESSION['world_name']); ?></h2><br>

    <!-- Articles list -->
    <ul>
        <?php if (!empty($articles)): ?>
            <?php foreach ($articles as $article): ?>
                <li>
                    <a href="view_article.php?article_id=<?php echo htmlspecialchars($article['article_id']); ?>">
                        <?php echo htmlspecialchars($article['topic']); ?>
                    </a>
                </li><br>
            <?php endforeach; ?>
        <?php else: ?>
            <li>No articles found.</li>
        <?php endif; ?>
    </ul>

    <!-- Pagination controls -->
    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="?page=<?php echo $page - 1; ?>">Previous</a>
        <?php endif; ?>

        <?php if ($page < $total_pages): ?>
            <a href="?page=<?php echo $page + 1; ?>">Next</a>
        <?php endif; ?>
    </div>

    <div class="button-world">
            <input type='button' onclick="loadLandingContent('worldcontent', 'new_article_form.php')" value = "Create new article">
    </div>

</div>