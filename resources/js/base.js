document.addEventListener('DOMContentLoaded', () => {

    // Get all "navbar-burger" elements
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

    // Check if there are any navbar burgers
    if ($navbarBurgers.length > 0) {

        // Add a click event on each of them
        $navbarBurgers.forEach(el => {
            el.addEventListener('click', () => {

                // Get the target from the "data-target" attribute
                const target = el.dataset.target;
                const $target = document.getElementById(target);

                // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                el.classList.toggle('is-active');
                $target.classList.toggle('is-active');

            });
        });
    }

});

let searchE = document.getElementById("search");
if (searchE != null) {
    searchE.addEventListener("input", function (e) {
        let value = e.target.value.trim();
        let sr = document.getElementById("search-results");

        if (value.length > 0) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("search-results").classList.remove("hidden");
                    document.getElementById("results").classList.add("hidden");

                    sr.innerHTML = this.responseText;
                }
            };
            xhr.open("GET", "search/" + value, true);
            xhr.send();
        } else {
            document.getElementById("search-results").classList.add("hidden");
            document.getElementById("results").classList.remove("hidden");
        }
    });
}

function buy(e) {
    console.log(e);
}

function add_to_cart(e) {

}
