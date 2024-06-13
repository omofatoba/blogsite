let search=document.querySelector("#search");

search.addEventListener("input",()=>{
  let val=search.value;

  let data={
    val
  }

  let space=document.querySelector(".space");
  fetch("./action/fetch.php",{
    method:"POST",
    body:JSON.stringify(data)
  })
  .then(res=>res.text())
  .then((data)=>{
    
      document.querySelector(".space").innerHTML = data;
      console.log(data)
 
   
  })


})

