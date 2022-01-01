<?php 
  include_once "php/DBConnection.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: LR2.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="CSS/styleUsers.css">
</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div >
  <div class="wrapper" id="UL">
      
    <section class="users">
      <header>
        <div class="content">
          <?php 
            include_once "php/DBConnection.php";
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE `unique_id` =" . $_SESSION['unique_id']);
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
           
          ?>
        
          <img src="<?php echo $row['image']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['username'] ?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
        
      </header>
      <div id="users-list" class="users-list">
         
      </div>
     
    </section>

    
  </div>
  </div>

   <div  id ="chatting" class="showing">
    <section class=" chat-area " id ="chatting2">
     
    </section>
  </div>

</div>




<script>


chatIcon.onclick = (e)=>{
        e.preventDefault();
}

function openNav() {
  document.getElementById("mySidenav").style.width = "700px";
  
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

function msgChat( incomingid) {

  console.log("out");
    document.getElementById("UL").style.width = "0";
    document.getElementById("UL").style.visibility = "hidden";
    document.getElementById("chatting").style.width = "700px";
    document.getElementById("chatting").style.visibility = "visible";
    document.getElementById("chatting2").style.visibility = "visible";
    document.getElementById("chatting2").style.width = "auto";

     let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/data2.php?userid="+incomingid, true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){

            let data = xhr.response;
             
             document.getElementById("chatting2").innerHTML = data;
             form = document.querySelector(".typing-area"),
incoming_id = form.querySelector(".incoming_id").value,
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");
const chatIcon = document.getElementById("chatIcon");


 
   
console.log("outtttttttttttttttttttttttttttt");
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
     console.log("out2");
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

console.log(incoming_id);
    
            
          }
      }
    }
    xhr.send();




  
}

function back_icon() {
  console.log("out");
    
    
    document.getElementById("UL").style.width = "450px";
    document.getElementById("UL").style.visibility = "visible";
    document.getElementById("chatting").style.width = "0px";
    document.getElementById("chatting").style.visibility = "hidden";
    document.getElementById("chatting2").style.visibility = "hidden";
    document.getElementById("chatting2").style.width = "0px";



  
}



</script>

<script src = "JS/users-list.js"></script>
<!-- <script src = "chat.js"></script>
 -->

   
</body>
</html> 
