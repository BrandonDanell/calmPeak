
var items = [100];
function search() {
    console.log("Searching...");
    let userSearch = document.getElementById('user-search-box');
    fetch('https://www.googleapis.com/customsearch/v1?key=AIzaSyB_gAXIUniRNRdz3qUoBQp8sMPDcMHxi8c&cx=e40f58dfba11527b6&q=brewery+bar+restaurant+beer+in+' + userSearch.value)
        .then(response => response.json())
        .then(data => {
            try {
            // add query results to result list
            // let list = document.getElementById('result-list');
            // console.log("Trying to create list elements!!!!\n");
            items = data.items;
            // for(let i = 0; i < items.length; i++) {
            //     let button = document.createElement('button');
            //     button.id = `${i}`;   
            //     button.className = "location-button";
            //     button.innerText = items[i].title;
            //     list.appendChild(button);
            // }

            console.log('Success! \n response data?', data);
            send_to_php(items);
            location.reload();
            } catch(error) {
            console.log('Error during search!');
            console.error(error)
            }
            location.reload();
            console.log('Success! \n response data?', data);
            
        });


}

function openLoginBox() {
    document.getElementById('login-div').style.display="block";
}

function openSignupBox() {
    document.getElementById('signup-div').style.display="block";
}

function logout() {

}

function changeFrame(link) {
    document.getElementById('tap-list').src = link;
}

function send_to_php(locations) {
    $.ajax({
        url: '../models/location.php', 
        method: 'POST',              
        // Form data
        data: {location : JSON.stringify(locations)},
        success: function(res) {
            console.log(res);
        }
    });
}

