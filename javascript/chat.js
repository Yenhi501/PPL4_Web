const form = document.querySelector(".typing-area"),
incoming_id = form.querySelector(".incoming_id").value,
inputField = form.querySelector(".input-field"),
sendBtn = document.getElementById("send"),
chatBox = document.querySelector(".chat-box");
const acceptButton = document.getElementById("accept");
const textbox = document.getElementById("message");

check();
function check(){
    let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/check-status.php", true);
        xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data === "notfriend"){
                    sendBtn.classList.remove("active"); 
                    // var x = document.createElement("BUTTON");
                    // x.setAttribute("id", "accept");
                    // var t = document.createTextNode("Accept");
                    // x.appendChild(t);
                    // chatBox.appendChild(x);
                    //acceptButton.style.display = "block";
                    textbox.disabled = true;
                    //textbox.display = "none";
                }else{
                    //textbox.display = "block";
                    acceptButton.style.display = "none";
                }
            }
        }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("incoming_id="+incoming_id);
}

acceptButton.onclick = ()=> {
    console.log("acceptButton clicked");
    acceptButton.remove();
    let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/accept-friend.php", true);
        xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data === "success") {
                    sendBtn.classList.add("active");
                    textbox.disabled = false;
                }
            }
        }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("incoming_id="+incoming_id);
}

form.onsubmit = (e)=>{
    e.preventDefault();
}

inputField.focus();
inputField.onkeyup = ()=>{
    if(inputField.value != ""){
        sendBtn.classList.add("active");
    }else{
        sendBtn.classList.remove("active");
    }
}

sendBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              inputField.value = "";
              scrollToBottom();
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}
chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}

setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            chatBox.innerHTML = data;
            if(!chatBox.classList.contains("active")){
                scrollToBottom();
              }
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("incoming_id="+incoming_id);
}, 500);

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}
  