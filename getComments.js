function getComments(comments){
    commentsOut = "";
    comments.forEach(element => {
        commentsOut += "<div class=\"card card-body\" style=\"margin-top: 10px\">";
        commentsOut += "<h4 class=\"card-title\">"+element.userName+"</h4>";
        commentsOut += "<p class=\"card-text\">"+element.comment+"</p>";
        commentsOut += "</div>";        
    });
    document.getElementById("commentsContainer").innerHTML = commentsOut;
}
window.onload = function onload(){
    var arr = new Array(
        {userName: "Janusz", comment: "kurła kiedyś to było"},
        {userName: "Grażyna", comment: "no nie to co teraz"},
        {userName: "Sebek", comment: "cho łojciec Kamil skacze!"},
    );
    getComments(arr);
}