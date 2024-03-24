
function openModal() {
    const modal = document.querySelector("#modal");
    modal.style.display = "block";
}

function closeModal() {
    const close = document.getElementsByClassName("closeModal");
    const modal = document.querySelector("#modal");
    close[0].addEventListener("click", () => {
        modal.style.display = "none";
    })
    close[1].addEventListener("click", () => {
        modal.style.display = "none";
    })
}

let bool = false;
function openTab(event, tabName) {
    const tabContents = document.getElementsByClassName("tab-content");
    for (let i = 0; i < tabContents.length; i++) {
        tabContents[i].classList.remove("active");
    }
    if (bool) {
        document.getElementById(tabName).classList.add("active");
    } else {
        document.getElementById(tabName).classList.remove("active");
    }
    event.currentTarget.classList.add("active");
    bool = !bool;
}

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