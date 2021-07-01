// hiddencontent
function myFunction() {
    let element = document.getElementById("content");
    const x = document.getElementById("arrowimg");

    element.classList.toggle("hiddencontent");
    x.classList.toggle("transformimg");
}

function myFuntion() {
    let element = document.getElementById("contentmb");
    const x = document.getElementById("arrowimgmb");

    element.classList.toggle("hiddencontentmb");
    x.classList.toggle("transformimgmb");
}

// Trashcan Computer
function myTrash() {
    let element = document.getElementById("row1_content");
    element.classList.toggle("hidden_row1_content");
}
function myWaste() {
    let element = document.getElementById("row2_content");
    element.classList.toggle("hidden_row2_content");
}
function myJunk() {
    let element = document.getElementById("row3_content");
    element.classList.toggle("hidden_row3_content");
}
function myGarbage() {
    let element = document.getElementById("row4_content");
    element.classList.toggle("hidden_row4_content");
}
function myLitter() {
    let element = document.getElementById("row5_content");
    element.classList.toggle("hidden_row5_content");
}

// Trashcan Mobile 
function myTrashMb() {
    let element = document.getElementById("row1_content_mb");
    element.classList.toggle("hidden_row1_content_mb");
}
function myLitterMb() {
    let element = document.getElementById("row5_content_mb");
    element.classList.toggle("hidden_row5_content_mb");
}
function myWasteMb() {
    let element = document.getElementById("row2_content_mb");
    element.classList.toggle("hidden_row2_content_mb");
}
function myJunkMb() {
    let element = document.getElementById("row3_content_mb");
    element.classList.toggle("hidden_row3_content_mb");
}
function myGarbageMb() {
    let element = document.getElementById("row4_content_mb");
    element.classList.toggle("hidden_row4_content_mb");
}


// carousel 
$('.carousel-cm').slick({
    centerMode: true,
    centerPadding: '60px',
    slidesToShow: 3,
    responsive: [
        {
            breakpoint: 768,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 3
            }
        },
        {
            breakpoint: 480,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 1
            }
        }
    ]
});
