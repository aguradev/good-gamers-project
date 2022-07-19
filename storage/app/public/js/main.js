const dropdownLink = document.querySelectorAll(
    ".dropdown-sidebar .dropdown-link-game"
);

const dropdownContent = document.querySelectorAll(
    ".dropdown-sidebar .dropdown-menu-sidebar"
);

const dropdownArray = Array.from(dropdownContent);

dropdownLink.forEach(function (value, number) {
    value.addEventListener("click", function (event) {
        event.preventDefault();
        console.log("click");
        if (event.target.getAttribute("id") == "game-data") {
            if (dropdownArray[0].classList.contains("hidden")) {
                dropdownArray[0].classList.replace("hidden", "block");
            } else {
                dropdownArray[0].classList.replace("block", "hidden");
            }
        } else if (event.target.getAttribute("id") == "create-menu") {
            if (dropdownArray[1].classList.contains("hidden")) {
                dropdownArray[1].classList.replace("hidden", "block");
            } else {
                dropdownArray[1].classList.replace("block", "hidden");
            }
        }
    });
});
