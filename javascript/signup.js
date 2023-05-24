const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button input");

// const radioButtons = document.querySelectorAll('input[name="gender"]');
// for (const radioButton of radioButtons) {
//     if (radioButton.checked) {
//         selectedSize = radioButton.value;
//         break;
//     }
// }

const errorText = form.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/signup.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                location.href="page1.php";
                //location.href="food.php";
              }else{
                errorText.style.display = "block";
                errorText.textContent = data;
              }
          }
      }
    }
    let formData = new FormData(form);
    //console.log(formData);
    xhr.send(formData);
}