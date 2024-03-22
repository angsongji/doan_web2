/*document.querySelectorAll('.menuadmin ul li')[0].addEventListener('click',function{
    alert("hello");
});
function changeContent(li){
    console.log(li);
}*/

let adminmenu=document.querySelectorAll('.menuadmin ul li');
/*clickAdminMenuToChangeContent();
function clickAdminMenuToChangeContent(){
    for(let i=0;i<adminmenu.length;i++){
      //  adminmenu[i].addEventListener('click',changeContent(adminmenu[i].getAttribute('name')));
       // adminmenu[i].setAttribute('onclick','changeContent('+adminmenu[i].getAttribute('name')+')');
        //adminmenu[i].setAttribute('onclick','hi()');
        adminmenu[i].setAttribute('onclick','hi(x)');
    }
}*/
function changeContent(x){
    alert('hi');
}
function hi(x){
    alert('hi');
}
/*function changeContent(name){
    
   let content=document.getElementById('content');
   
    switch(name){
        case 'plphim':{
            content.innerHTML=`<div id="movies" >
            <?php require 'pages/moviesadmin.php' ?>
        </div>`;
            break;
        }
        case 'pllichchieu':{
            content.innerHTML=`<div class="lichchieuphim" >
            chua coooooooo
        </div>`;
            break;
        }
        case 'pldichvu':{
            content.innerHTML=`<div class="dichvu" >
            chua co dich vu
        </div>`;
            break;
        }
        default: break;
    }
}*/