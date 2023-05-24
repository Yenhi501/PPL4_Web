const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button input");

var food = document.getElementsByName("food");
var errorText = document.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/food.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                location.href="add-friend.php";
              }else{
                errorText.style.display = "block";
                errorText.textContent = data;
              }
          }
      }
    }
    let formData = new FormData(form);
    console.log(formData);
    xhr.send(formData);
}

// for (var j=0; j<food.length; j++) {
//     food[j].addEventListener('click', function() {
//         let xhr = new XMLHttpRequest();
//         xhr.open("POST", "php/food.php", true);
//         xhr.onload = ()=>{
//         if(xhr.readyState === XMLHttpRequest.DONE){
//             if(xhr.status === 200){
//                 let data = xhr.response;
//                 if(data === "success"){
                    
//                     console.log("haha");
//                     location.href="add-friend.php";
//                 }else{
//                     errorText.style.display = "block";
//                     errorText.textContent = data;
//                 }
//             }
//         }
//         }
//         xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//         xhr.send("food_id="+this.id);
//       });
// }

