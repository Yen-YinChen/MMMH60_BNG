

// Menu icon clicking effect
const icon_a = $('.menu-icon-a');
//----Member menu icons clicking effect (oragnge)-----
let iconsUnclicked = document.querySelectorAll("svg.menu-icon-svg");
let iconsClicked = document.querySelectorAll("svg.menu-icon-svg-clicked");
function menuClick(event) {
    console.log(iconsUnclicked);
    console.log(event.currentTarget);
    // for (let i = 0; i < iconsUnclicked.length; i++) {
    //     iconsUnclicked[i].classList.add("active");
    // }
    // for (let i = 0; i < iconsClicked.length; i++) {
    //     iconsClicked[i].classList.remove("active");
    // }
    // let iconClicked = event.currentTarget.querySelectorAll('svg.menu-icon-svg-clicked')[0];
    // iconClicked.classList.add("active");
    // let iconUnclick = event.currentTarget.querySelectorAll('svg.menu-icon-svg')[0];
    // iconUnclick.classList.remove("active");
    icon_a.removeClass('active');
    $(event.currentTarget).addClass('active');
};
        // end of Member menu icons clicking effect -------------





