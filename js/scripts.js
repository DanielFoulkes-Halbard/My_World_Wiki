function loadLandingContent(id, page) {

    console.log('id: ' + id)
    console.log('page: ' + page)

    var xhr = new XMLHttpRequest();
    
    xhr.open('GET', page, true);
    // Create event handler to track status changes in request
    xhr.onreadystatechange = function() {
        console.log('Ready state:', xhr.readyState, 'Status:', xhr.status); // Log readyState and status
        if (xhr.readyState == 4 && xhr.status == 200) {
            // If request is successful replace contents in the id with 'page' contents
            document.getElementById(id).innerHTML = xhr.responseText;
        } else if (xhr.readyState == 4 && xhr.status !== 200) {
            console.error('Error fetching the page:', xhr.status); // Log any errors
        }
    }
    xhr.send();
}

function testbutton(){
    alert(num);
    num++;
}

function loginAlert(message){
    alert(message);
    setTimeout(function() {
        window.location.href = "/my_world_wiki/index.php";
    }, 1000);
}

function openWorld(id, page){

}