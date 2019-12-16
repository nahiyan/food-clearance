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

        if (value.length > 0) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("search-results").classList.remove("hidden");
                    document.getElementById("results").classList.add("hidden");

                    let foods = JSON.parse(this.responseText);
                    let sr = document.getElementById("search-results");
                    sr.innerHTML = "";

                    let cols = document.createElement("div");
                    cols.setAttribute("class", "columns is-multiline");
                    cols.innerHTML = "";

                    if (foods.length == 0) {
                        document.getElementById("search-results").innerHTML = `<i>No food items found!</i>`;
                    } else {
                        for (i = 0; i < foods.length; i++) {
                            let food = foods[i];

                            cols.innerHTML +=
                                `<div class="column is-one-quarter">
                                    <div class="card">
                                        <div class="card-image">
                                            <figure class="image is-4by3">
                                                <img src="images/${food.image_name}">
                                            </figure>
                                        </div>
                                        <div class="card-content">
                                            <div class="media">
                                                <div class="media-content">
                                                    <p class="title is-4">${food.name}</p>
                                                    <p class="subtitle is-6">Expires ${food.expires_at}.</p>
                                                    <p class="subtitle is-6">Manufactured by <a href="#">${food.company_name}</a>.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <footer class="card-footer">
                                            <a href="#" class="card-footer-item">Buy</a>
                                        </footer>
                                    </div>
                                </div>
                                `;
                        }

                        sr.appendChild(cols);
                    }
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