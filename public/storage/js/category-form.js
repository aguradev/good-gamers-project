const editBtn = document.querySelectorAll(".table-section #edit-btn");
const deleteForm = document.querySelectorAll(".table-section #form_delete");
const modalForm = document.querySelector(".modal .form-data");

// category assets
const categoryForm = modalForm.querySelector("#category-form");
const categoryInput = categoryForm.querySelector("input[name='name_category']");

// http://goodgamers-project.test/admin/asasas/update-category"

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

editBtn.forEach(function (value) {
    value.addEventListener("click", function () {
        let category = value.getAttribute("data-category");

        $.ajaxSetup({
            Headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            type: "GET",
            url: `get-data-category/${category}`,
        }).done(function (data) {
            let dataResponse = data;

            categoryForm.setAttribute(
                "action",
                `${window.location.protocol}//${window.location.host}/admin/${data.name_category}/update-category`
            );
            categoryInput.value = dataResponse.name_category;
            categoryForm.setAttribute("method", "POST");
            categoryInput.value = dataResponse.name_category;
        });
    });
});
