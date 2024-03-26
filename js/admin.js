
let quantityClickBtnChangeDayLichchieu=0;
function changeDay(i){
    let lichchieu_wrap= document.querySelector("#lichchieuphim_daytime ul");
    switch(i.getAttribute('name')){
        case "btn_left":
            document.querySelectorAll("#lichchieuphim_daytime ul li")[Math.abs(-quantityClickBtnChangeDayLichchieu)].setAttribute('id',"");
            quantityClickBtnChangeDayLichchieu++;
            document.querySelectorAll("#lichchieuphim_daytime ul li")[Math.abs(-quantityClickBtnChangeDayLichchieu)].setAttribute('id',"lichchieuphim_selected");
            lichchieu_wrap.style='transform:  translateX(calc('+quantityClickBtnChangeDayLichchieu+'* 72px));';
            if(quantityClickBtnChangeDayLichchieu==0)
                document.getElementsByClassName('lichchieuphim_header_btn ')[0].style="display:none;";
            else
                document.getElementsByClassName('lichchieuphim_header_btn ')[1].style="display:flex;";
            break;
        default:
            document.getElementsByClassName('lichchieuphim_header_btn ')[0].style="display:flex;";
           // console.log(document.querySelectorAll("#lichchieuphim_daytime ul li")[Math.abs(-quantityClickBtnChangeDayLichchieu)]);
            document.querySelectorAll("#lichchieuphim_daytime ul li")[Math.abs(-quantityClickBtnChangeDayLichchieu)].setAttribute('id',"");
            quantityClickBtnChangeDayLichchieu--;
            document.querySelectorAll("#lichchieuphim_daytime ul li")[Math.abs(-quantityClickBtnChangeDayLichchieu)].setAttribute('id',"lichchieuphim_selected");
            lichchieu_wrap.style='transform:  translateX(calc('+quantityClickBtnChangeDayLichchieu+'* 72px));';
            if(quantityClickBtnChangeDayLichchieu==-5)
                document.getElementsByClassName('lichchieuphim_header_btn ')[1].style="display:none;";
            else
                document.getElementsByClassName('lichchieuphim_header_btn ')[1].style="display:flex;";
            break;
    }
}
