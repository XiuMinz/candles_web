// function addPost(){
//     let title = document.forms['addPost']['title'].value;
//     let body = document.forms['addPost']['body'].value;
//     let img = document.forms['addPost']['img'];
//     let file = img.files;
//     if(file.length == 0){
//         alert('invalid');
//         return false;
//     }
//         if(title == "" || body == ""){
//         alert("Please fill out the form");
//         return false;
// }
// };
let form = document.querySelector("#addPost");
form.addEventListener("submit", function (e) {
        console.log("test2");
        let title = document.forms["addPost"]["title"].value;
        if (title == "") {
            alert("invalid");
            console.log("test");
            return false;
        }
    
});