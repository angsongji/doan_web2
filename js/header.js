let varMenu = true;
function openMenu() {
    const menu = document.querySelector("#menu");
    const bars = document.getElementById("bars");

    if(varMenu) {
        menu.style.display = "block";
        bars.innerHTML = `<i class="fa-solid fa-xmark"></i>`;
    }else {
        menu.style.display = "none";
        bars.innerHTML = `<i class="fa-solid fa-bars"></i>`;
    }

    varMenu = !varMenu;
}

let modalvar = true;
document.getElementById("modalSearch").addEventListener("click", () => {
    const modal = document.getElementById("search");
    if(modalvar){
        modal.style.display = "block";
    } else{
        modal.style.display = "none";
    }
    modalvar = !modalvar;
})

document.getElementById("modalSearchSM").addEventListener("click", () => {
    const modal = document.getElementById("searchSM");
    const body = document.querySelector("body");
    if(modalvar){
        modal.style.display = "block";
        body.classList.add("modal-open");
    } else{
        modal.style.display = "none";
        body.classList.remove("modal-open");
    }
    modalvar = !modalvar;
})