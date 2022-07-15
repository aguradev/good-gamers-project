const formSubmit = document.querySelector(
    ".form-data button[name='submit-form']"
);
const editBtn = document.querySelectorAll(".table-section #edit-btn");
const deleteBtn = document.querySelectorAll(".table-section #delete_action");
const deleteForm = document.querySelectorAll(".table-section #form_delete");
const modalForm = document.querySelector(".modal .form-data");
const FormsInModal = modalForm.querySelector("#form-modal");

// payment-gateway
const imgUploadDisplay = document.getElementById("display-image");
const imgModalDisplay = document.getElementById("display-modal-image");
const logoModalInput = document.getElementById("payment_modal_logo");
const editPayment = document.querySelectorAll(".table-section #edit_payment");
const inputPayment = modalForm.querySelector(
    "input[name='name_payment_gateway']"
);
const oldPaymentLogo = document.querySelector("input[name='old_payment_logo']");

// gamelist
const input_file_form = document.getElementById("image_input");

deleteForm.forEach((forms) => {
    forms.addEventListener("click", function (event) {
        event.preventDefault();

        Swal.fire({
            title: "are your sure to delete data ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#D926A9",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                event.returnValue = true;
                $(this).unbind("submit").submit();
            }
        });
    });
});

// function BtnDisplayProcess(button) {
//     if (button.classList.contains("btn-secondary")) {
//         button.classList.replace("btn-secondary", "btn-disabled");
//         button.classList.add("loading");
//         button.innerText = "Processing";
//     } else {
//         button.classList.replace("btn-disabled", "btn-secondary");
//         button.classList.remove("loading");
//         button.innerText = "Create Data";
//     }
// }

// formCategory.addEventListener("submit", function (event) {
//     event.preventDefault();

//     Swal.fire({
//         title: "are your sure to create new category ?",
//         icon: "warning",
//         showCancelButton: true,
//         confirmButtonColor: "#D926A9",
//         cancelButtonColor: "#d33",
//         confirmButtonText: "Yes, Created it!",
//     }).then((result) => {
//         if (result.isConfirmed) {
//             BtnDisplayProcess(formSubmit);
//             setTimeout(function () {
//                 BtnDisplayProcess(formSubmit);
//                 event.returnValue = true;
//             }, 5000);
//         }
//     });
// });

// payment gateway code

logoModalInput.addEventListener("change", function () {
    const oFReader = new FileReader();

    oFReader.readAsDataURL(logoModalInput.files[0]);

    oFReader.addEventListener("load", (oFREvent) => {
        imgModalDisplay.src = oFREvent.target.result;
    });
});

editPayment.forEach(function (value) {
    value.addEventListener("click", function () {
        let slug = value.getAttribute("data-slug");

        $.ajaxSetup({
            Headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            type: "GET",
            url: `payment-gateway/${slug}/edit`,
        }).done(function (data) {
            let dataResponse = data;
            let payment_logo = `${window.location.protocol}//${window.location.host}/storage/${dataResponse.payment_logo}`;

            console.log(dataResponse);

            FormsInModal.setAttribute("action", `payment-gateway/${slug}`);
            FormsInModal.setAttribute("method", "POST");
            imgModalDisplay.setAttribute("src", payment_logo);
            inputPayment.value = dataResponse.name_payment_gateway;
            oldPaymentLogo.value = dataResponse.payment_logo;
        });
    });
});

// show image preview
input_file_form.addEventListener("change", function () {
    const oFReader = new FileReader();

    oFReader.readAsDataURL(input_file_form.files[0]);

    oFReader.addEventListener("load", (oFREvent) => {
        imgUploadDisplay.src = oFREvent.target.result;
    });
});
