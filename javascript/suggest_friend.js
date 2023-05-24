var friend = document.getElementsByName("friend");
var errorText = document.querySelector(".error-text");

for (var j=0; j<friend.length; j++) {
    friend[j].addEventListener('click', function() {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/suggest-friend.php", true);
        xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data === "success1"){
                    const element = document.getElementById(this.id);
                    element.remove();
                    const para = document.createElement("p");
                    const note = document.createTextNode("Bạn đã gửi lời chào!");
                    para.appendChild(note);
                    const div = document.getElementById("div"+this.id);
                    div.appendChild(para);
                }else{
                    const element = document.getElementById(this.id);
                    element.remove();
                    const para = document.createElement("p");
                    const note = document.createTextNode("Bạn đã gửi lời chào trước đó");
                    para.appendChild(note);
                    const div = document.getElementById("div"+this.id);
                    div.appendChild(para);
                }
            }
        }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("friend_id="+this.id);
      });
}