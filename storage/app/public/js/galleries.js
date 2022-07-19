const input_file_form = document.getElementById("image_input");
const imgUploadDisplay = document.getElementById("display-image");

input_file_form.addEventListener("change", function () {
    const oFReader = new FileReader();

    oFReader.readAsDataURL(input_file_form.files[0]);

    oFReader.addEventListener("load", (oFREvent) => {
        imgUploadDisplay.src = oFREvent.target.result;
    });
});
