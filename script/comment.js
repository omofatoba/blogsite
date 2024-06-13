

if (document.querySelector(".btn_comment")) {
const userId=document.querySelector(".user_id").value
const postId=document.querySelector(".post_id").value;
const user_name=document.querySelector(".user_name").value;
const user_image=document.querySelector(".user_image").value;
let holder=document.querySelector(".holder");  

user_image

document.querySelector(".btn_comment").addEventListener("click",()=>{
 
    const content=document.querySelector(".content").value;
    let parent_id=document.querySelector(".parent_id").value;
    let shm=document.querySelector(".shm");
    let com_id=document.querySelector(".com_id").value;
    let y=""
    if (Number(shm.value) === 0) {
        y="create"
    }else{
        y="update"
    }

    let data={
        userId,
        postId,
        content,
        user_name,
        user_image,
        parent_id,
        type:y,
        com_id
    
    }

    if (content.length === 0) {
    console.log("something")    
    }else{
        fetch('action/comments.php',{
            method:"POST",
            body:JSON.stringify(data)
        }).then(res=>res.text())
        .then((data)=>{
            holder.innerHTML=data;
            reply()
            edit()
            del()
        })
    }
    document.querySelector(".content").value="";
    
    document.querySelector(".pep").style.display="none"
    document.querySelector(".tg").innerHTML='';
    document.querySelector(".parent_id").value=0;
})


function get() {

    let data={
        postId,
        type:"select"
    }
    fetch('action/comments.php',{
        method:"POST",
        body:JSON.stringify(data)
    }).then(res=>res.text())
    .then((data)=>{
        holder.innerHTML=data;
        
reply()
edit()
del()
    })
}

get()

//reply section;

function reply() {
   let replyBtn=document.querySelectorAll(".repBtn");

   replyBtn.forEach(btn => {
    btn.addEventListener("click",()=>{
        document.querySelector(".content").focus();
        let name=btn.getAttribute("name");
   let parent_id=document.querySelector(".parent_id");
   parent_id.value=btn.getAttribute("com_id");
   document.querySelector(".pep").style.display="block"
document.querySelector(".tg").innerHTML=name;




//cancel x

document.querySelector(".x").addEventListener('click',()=>{
    document.querySelector(".pep").style.display="none"
    document.querySelector(".tg").innerHTML='';
    parent_id.value=0;


})

    })
   }); 
}



//edit

function edit(params) {
    let edit=document.querySelectorAll(".et");
    edit.forEach(ele => {
        ele.addEventListener("click",()=>{
            let id="#com"+ele.getAttribute("com_id");


console.log(id)

        let content=document.querySelector(id);
            



            document.querySelector(".se").style.display="block"
            document.querySelector(".content").focus()
            document.querySelector(".content").value=content.innerHTML;

           

            document.querySelector(".shm").value=1;
            document.querySelector(".com_id").value=ele.getAttribute("com_id");


        })



        document.querySelector(".se").addEventListener('click',()=>{
            document.querySelector(".se").style.display="none"
            document.querySelector(".content").value='';
            document.querySelector(".shm").value=0;
            document.querySelector(".com_id").value=0
        
        })


    });




}



function del(params) {
    let del=document.querySelectorAll(".c-del");
del.forEach(ele => {
    ele.addEventListener("click",function (params) {
       let id=ele.getAttribute("com_id")

        
    let data={
        id,
        type:"delete"
    }
    fetch('action/comments.php',{
        method:"POST",
        body:JSON.stringify(data)
    }).then(res=>res.text())
    .then((data)=>{
        ele.parentElement.parentElement.parentElement.parentElement.remove()
    })
    })
});
} 


}else{


document.querySelector("#chn").addEventListener("click",()=>{
    localStorage.setItem("url",window.location.href);

    window.location.replace("http://localhost/blogsite/login.php");
  })

}
