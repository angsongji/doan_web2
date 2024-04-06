// Xu ly su kien ghe don
const gheDons = document.querySelectorAll('.ghe-don div');
const lengthGheDons = gheDons.length;

for(let i = 0; i < lengthGheDons; i++) {
    gheDons[i].addEventListener(
        'click',
        (e) => {
            e.target.classList.toggle('daChon');
        },
        false
    )
}

// Xu ly su kien ghe doi
const gheDois = document.querySelectorAll('.ghe-doi div');
const lengthGheDois = gheDois.length;

for(let i = 0; i < lengthGheDois; i++) {
    gheDois[i].addEventListener(
        'click',
        (e) => {
            e.target.classList.toggle('daChon');
        },
        false
    )
}


