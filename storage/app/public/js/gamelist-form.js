// gamelist
const input_file_form = document.getElementById("image_input");
const imgUploadDisplay = document.getElementById("display-image");
const inputBanner = document.getElementById("banner_input");
const BannerPreview = document.getElementById("display-banner");

// show image preview
input_file_form.addEventListener("change", function () {
    const oFReader = new FileReader();

    oFReader.readAsDataURL(input_file_form.files[0]);

    oFReader.addEventListener("load", (oFREvent) => {
        imgUploadDisplay.src = oFREvent.target.result;
    });
});

inputBanner.addEventListener("change", function () {
    const oFReader = new FileReader();

    oFReader.readAsDataURL(inputBanner.files[0]);

    oFReader.addEventListener("load", (oFREvent) => {
        BannerPreview.src = oFREvent.target.result;
    });
});
