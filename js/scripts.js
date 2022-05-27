
/*
document.body.onload = function() {
    setInterval(email, 5000);
}

function email(){

    let inbox = document.querySelector("#InboxLink");

    let ajaxPostObj = new XMLHttpRequest();

    ajaxPostObj.open("GET", "index.php?show=inbox", true);
    //ajaxPostObj.open("GET", "includes/inbox.php?show=inbox", true);

    ajaxPostObj.onreadystatechange = function(){
        if(ajaxPostObj.readyState == 4 && ajaxPostObj.status == 200) {

            console.log(ajaxPostObj.status);
            console.log(ajaxPostObj.responseText);
            
            
            var row = document.getElementById("inboxTable").rows.length;
            

            inbox.innerHTML = "Inbox (" + (row-1) + ")";
            
        }
    }
    ajaxPostObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajaxPostObj.send()
}
*/

