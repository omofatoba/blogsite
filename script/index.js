

let t1=document.querySelectorAll(".t1");

t1[0].style.display="block";

let count=0;

setInterval(() => {
    t1[count].style.display="none"
   
    if (count === 2) {
        count = -1;
    }

    count++;
    t1[count].style.display="block"
}, 1500);

let df=document.querySelectorAll(".df");
df[0].className="news";

let drt=0;
setInterval(() => {
    df[drt].className="df"
   
    if (drt === 2) {
        drt = -1;
    }

    drt++;
    df[drt].className="news"
}, 3500);