// add to cart 

const cartButton = document.querySelectorAll(".addtocart");
const done = document.querySelectorAll(".done");
let added = false;
console.log(done);
for(let i=0; i < cartButton.length; i++)
{
    cartButton[i].addEventListener('click', ()=>{
        console.log('clicked', i+1);
      if(added){
        done[i].style.transform = "translate(-110%) skew(-40deg)";
        added = false;
      }
      else{
        done[i].style.transform = "translate(0px)";
        added = true;
      }
        
    });
}

// carousel

var carousel = function () {
    $('.featured-carousel').owlCarousel({
        loop: true,
        autoplay: true,
        margin: 30,
        smartSpeed: 1000,
        nav: false,
        dots: true,
        autoplayHoverPause: false,
        items: 1,
        // navText: ["<span class='ion-ios-arrow-back'></span>", "<span class='ion-ios-arrow-forward'></span>"],
    });

    // products
    $('.top-item').owlCarousel({
        loop: true,
        nav: true,
        margin: 5,
        responsive: {
            0: {
                items: 2,
                dots: false,
            },
            600: {
                items: 3,
                dots: false,
            },
            1000: {
                items: 5,
                dots: false,
            }
        }
        // navText: ["<span class='ion-ios-arrow-back'></span>", "<span class='ion-ios-arrow-forward'></span>"],
    });
}

carousel();




// =========== OTP ==================== //

const inputs = document.querySelectorAll(".otp-field > input");
const button = document.querySelector(".verify-btn");

window.addEventListener("load", () => inputs[0].focus());
button.setAttribute("disabled", "disabled");

inputs[0].addEventListener("paste", function (event) {
    event.preventDefault();

    const pastedValue = (event.clipboardData || window.clipboardData).getData(
        "text"
    );
    const otpLength = inputs.length;

    for (let i = 0; i < otpLength; i++) {
        if (i < pastedValue.length) {
            inputs[i].value = pastedValue[i];
            inputs[i].removeAttribute("disabled");
            inputs[i].focus;
        } else {
            inputs[i].value = ""; // Clear any remaining inputs
            inputs[i].focus;
        }
    }
});

inputs.forEach((input, index1) => {
    input.addEventListener("keyup", (e) => {
        const currentInput = input;
        const nextInput = input.nextElementSibling;
        const prevInput = input.previousElementSibling;

        if (currentInput.value.length > 1) {
            currentInput.value = "";
            return;
        }

        if (
            nextInput &&
            nextInput.hasAttribute("disabled") &&
            currentInput.value !== ""
        ) {
            nextInput.removeAttribute("disabled");
            nextInput.focus();
        }

        if (e.key === "Backspace") {
            inputs.forEach((input, index2) => {
                if (index1 <= index2 && prevInput) {
                    input.setAttribute("disabled", true);
                    input.value = "";
                    prevInput.focus();
                }
            });
        }

        button.classList.remove("active");
        button.setAttribute("disabled", "disabled");

        const inputsNo = inputs.length;
        if (!inputs[inputsNo - 1].disabled && inputs[inputsNo - 1].value !== "") {
            button.classList.add("active");
            button.removeAttribute("disabled");

            return;
        }
    });
});



// =============== LOGIN ====================== //

$("#login-form").submit(function (e) {
    e.preventDefault();
    $("#login_btn").html(
        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Log In`
    );
    let api = new ApiService();
    let mobile = $("#mobile").val();
    var data = {
        "action": "SEND_OTP",
        "mobile": mobile
    };

    let req = api.setData(api.url() + "/login", data);
    req.then((res) => {
        if (res.status == true) {
            $("#login_btn").html(
                `Log In`
            );
        } else {
            alert(res.message);
            location.reload();
        }
    });
});

$("#verify_form").submit(function (e) {
    e.preventDefault();
    $("#verify_btn").html(
        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Verify`
    );
    let api = new ApiService();
    let addotp = $('#first').val() + $('#second').val() + $('#third').val() + $('#four').val();
    let mobile = $('[name="mobile"]').val();
    var data = {
        "action": "VERIFY_OTP",
        "mobile": mobile,
        "otp": addotp
    };

    let req = api.setData(api.url() + "/login", data);
    req.then((res) => {
        console.log(res);
        if (res.status == true) {
            $("#verify_btn").html(
                `Verify`
            );
            location.reload();
        } else {
            $("#otp_error").html('Invalid OTP');
        }
    });
});
