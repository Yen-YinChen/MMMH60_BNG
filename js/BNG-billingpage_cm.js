
$(document).ready(function () {
    $('input').iCheck({
        checkboxClass: 'icheckbox_square-orange',
        radioClass: 'iradio_square-orange',
        increaseArea: '20%'
    });
});


// Computer 
function myFunction() {
    let element = document.getElementById("content");
    const x = document.getElementById("arrowimg");

    element.classList.toggle("hiddencontent");
    x.classList.toggle("transformimg");
}

// Mobile
function myFox() {
    let element = document.getElementById("content_mb");
    const x = document.getElementById("arrowimg_mb");

    element.classList.toggle("hiddencontent");
    x.classList.toggle("transformimg");
}
// Computer
function myButton() {
    let element = document.getElementById("content2");
    const x = document.getElementById("arrowimg2");

    element.classList.toggle("hiddencontent2");
    x.classList.toggle("transformimg2");
}
// Mobile
function myButon() {
    let element = document.getElementById("content2_mb");
    const x = document.getElementById("arrowimg2_mb");

    element.classList.toggle("hiddencontent2");
    x.classList.toggle("transformimg2");
}
// Computer
function myButtonTwo() {
    let element = document.getElementById("content3");
    const x = document.getElementById("arrowimg3");

    element.classList.toggle("hiddencontent3");
    x.classList.toggle("transformimg3");
}
// Mobile
function myButonTwo() {
    let element = document.getElementById("content3_mb");
    const x = document.getElementById("arrowimg3_mb");

    element.classList.toggle("hiddencontent3");
    x.classList.toggle("transformimg3");
}

// credit-card
$(document).ready(function () {
    $("#back, #front").click(function () {
        if (this.id == "back") {
            $(".flip-container").addClass("flip");
        }
        else if (this.id == "front") {
            $(".flip-container").removeClass("flip");
        }
    });
    $("#name, #number, #month, #cvv, #year").bind("change paste keyup", function () {
        if (this.id == "name") {
            $(".card__name").text($(this).val());
        }
        else if (this.id == "number") {
            var VISA_PREFIXES = ["4539", "4556", "4916", "4532", "4929", "4485", "4716"]; // Prefixes for VISA cards
            var MC_PREFIXES = ["51", "52", "53", "54", "55"]; // Prefixes for Master Card cards
            var field_value = $(this).val();

            if (field_value.charAt(0) === "4" && field_value.length >= 4) {
                var prefix = field_value.slice(0, 4);

                if (VISA_PREFIXES.includes(prefix)) {
                    $("#card__image").attr("src", "https://k60.kn3.net/F/7/8/1/A/3/D23.png");
                }
            } else if (field_value.charAt(0) === "5" && field_value.length >= 2) {
                var prefix = field_value.slice(0, 2);

                if (MC_PREFIXES.includes(prefix)) {
                    $("#card__image").attr("src", "https://k60.kn3.net/8/C/F/A/8/9/B0E.png");
                }
            } else {
                $("#card__image").attr("src", "");
            }

            $(".card__number").text(field_value);
        }
        else if (this.id == "month") {
            $(".card__month").text($(this).val());
        }
        else if (this.id == "cvv") {
            $(".card__cvv").text($(this).val());
        }
        else if (this.id == "year") {
            $(".card__year").text($(this).val());
        }
    });
});

// Validation 
(function () {
    'use strict';
    window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, true);
        });
    }, false);
})();




$('.billingpage-ckecklabelsty-cm').click(function (event) {
    console.log('Hi');
    event.preventDefault();
    $('#lastname').val('李');
    $('#firstname').val('疇松');
    $('#id1').val('A201397260');
    $('#phone1').val('0227603275');
    $('#email1').val('mwhwbh435@gmail.com');
    $('.icheckbox_square-orange').addClass('checked');
})


$('#billingpage-samewithpurchaser').click(function (event) {
    console.log('Hi San Francisco');
    event.preventDefault();
    $('#name1').val('李疇松');
    $('#id2').val('A201397260');
    $('#birthday').val('1993-03-07');
    $('#phone2').val('0227603275');
    $('#emergencyname').val('王書帆');
    $('#emergencyphone').val('0939618990');
    $('#autoinfo').attr('checked', true);
})

// 如有接資料庫價格欄位的作法
// function disp_confirm() {
//     var r = confirm("您的優惠卷號碼:BNGT05E2")
//     if (r == true) {
//         const price = 3000;
//         $('.billingpage-smallword-cm').text(price * .85);
//         // document.write("You pressed OK!")
//     }
//     else {
//         // document.write("You pressed Cancel!")
//     }
// }

// 沒有接資料庫的作法(桌機)
function disp_confirm() {
    var r = confirm("您的優惠卷號碼:BNGT05E2")
    if (r == true) {

        $('.billingpage-coupontotalvalue-cm').text('總金額TWD 2,550');
        // document.write("You pressed OK!")
    }
    else {
        // document.write("You pressed Cancel!")
    }
}

// 沒有接資料庫的作法(桌機)
function disp_confirm_mb() {
    var r = confirm("您的優惠卷號碼:BNGT19E3")
    if (r == true) {

        $('.billingpage-coupontotalvalue-mb-cm').text('總金額TWD 15,291');
        // document.write("You pressed OK!")
    }
    else {
        // document.write("You pressed Cancel!")
    }
}
