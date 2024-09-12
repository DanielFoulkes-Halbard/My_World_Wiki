<h2>Create a new article entry here:</h2><br><br>

<form id="new_article_form" action="new_article_logic.php" method="POST" enctype="multipart/form-data">
    <label for="topic">Title</label><br>
    <input type="text" id="topic" name="topic" required><br><br>

    <label for="type">Article type</label><br>
    <select name="type" id="type" required>
        <option value="location">Location</option>
        <option value="character">Character</option>
        <option value="event">Event</option>
        <option value="item">Item</option>
        <option value="concept">Concept</option>
    </select><br><br>

    <label for="content">Content</label><br>
    <textarea id="content" name="content" rows="10" cols="60" placeholder="Enter the content of this article" required></textarea><br><br>

    <label for="article_image">Article image (optional)</label><br>
    <input type="file" id="article_image" name="article_image" accept="image/*"><br><br>

    <input type="submit" value="Create Article">
</form>
