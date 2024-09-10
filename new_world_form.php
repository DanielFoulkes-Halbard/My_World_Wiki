<h2>Create a new world</h2> <br><br>
<form id="new_world_form" action='new_world_logic.php' method='POST'>
    <label for='name'> Name </label><br>
    <input type='text' id='name' name='name'>
    <label for="decription"> Description </label><br>
    <textarea id="description" name='description' row='5' cols='40' placeholder="Enter a detailed description of your world"></textarea><br><br>
    <label for='logo'> World image or logo (optional)></label><br>
    <input type='file' id='logo' accept='image/*'><br><br>
    <input type='submit' value='Create World'>
</form>