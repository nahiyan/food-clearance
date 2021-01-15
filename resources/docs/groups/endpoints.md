# Endpoints


## api/user




> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/api/user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/api/user"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-user" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-user"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user"></code></pre>
</div>
<div id="execution-error-GETapi-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user"></code></pre>
</div>
<form id="form-GETapi-user" data-method="GET" data-path="api/user" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-user', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-user" onclick="tryItOut('GETapi-user');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-user" onclick="cancelTryOut('GETapi-user');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-user" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/user</code></b>
</p>
</form>


## Show the application dashboard.




> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Homepage
</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="D8lrVXwR9RtNRkWEv1zUcsoUtF10HjhkZVKCjqUB">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css"
            integrity="sha256-vK3UTo/8wHbaUn+dTQD0X6dzidqc5l7gczvH+Bnowwk=" crossorigin="anonymous" />

        <link rel="stylesheet" href="http://food_clearance.test/css/app.css">

        <script>
            async function buy(e, id) {
                let quantity = e.parentElement.querySelector("input[name='quantity']").value;
    
                let response = await axios({
                    method: 'post',
                    url: 'foods/' + id + '/buy',
                    data: {
                        quantity: quantity
                    }
                });
    
                if (response.status == 200) {
                    document.getElementById("results").classList.remove("hidden");
                    document.getElementById("search-results").classList.add("hidden");
    
                    document.getElementById("results").innerHTML = response.data;
    
                    document.getElementById("modal").classList.add("is-active");
                    document.getElementById("modal").querySelector(".modal-content .box").innerHTML = "Order placed successfully!";
                }
            }
    
            async function addToCart(e, id) {
                let quantity = parseInt(e.parentElement.querySelector("input[name='quantity']").value);
    
                let response = await axios({
                    method: 'post',
                    url: "http://food_clearance.test/cart",
                    data: {
                        quantity: quantity,
                        food_id: id
                    }
                });
    
                if (response.status == 200) {
                    document.getElementById("modal").classList.add("is-active");
                    document.getElementById("modal").querySelector(".modal-content .box").innerHTML = "Added to cart successfully!";
                }
            }
        </script>
    </head>

    <body>
        <div class="modal" id="modal">
            <div class="modal-background"></div>
            <div class="modal-content">
                <div class="box">

                </div>
            </div>
            <button class="modal-close is-large" aria-label="close"></button>
        </div>

        <nav class="navbar is-dark" role="navigation" aria-label="main navigation">
            <div class="container">
                <div class="navbar-brand">
                    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
                        data-target="navbarBasic">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                    </a>
                </div>

                <div id="navbarBasic" class="navbar-menu">
                    <div class="navbar-start">
                        <a class="navbar-item" href="http://food_clearance.test">
                            Home
                        </a>
                                            </div>

                    <div class="navbar-end">
                        <div class="navbar-item">
                            <input type="text" id="search" class="input" placeholder="Search">
                        </div>

                        
                        <div class="navbar-item">
                            <div class="buttons">
                                                                <a class="button is-primary" href="http://food_clearance.test/register">
                                    <strong>Register</strong>
                                </a>
                                <a class="button is-light" href="http://food_clearance.test/login">
                                    Login
                                </a>
                                                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container" id="content">
                                    
            <div id="search-results" class="hidden">
    <i>No food items found!</i>
</div>

<div id="results">
    <h1 class="title">Food Items</h1>

    <div class="columns is-multiline">
                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/6.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        AFDDn
                        <span class="subtitle is-6"> x 28</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 861</p>
                    <p class="subtitle is-6">Expires 1 day ago.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Shukhi&#039;s Bakery</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/8.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        49fIE
                        <span class="subtitle is-6"> x 9</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 447</p>
                    <p class="subtitle is-6">Expires 1 day ago.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Shukhi&#039;s Bakery</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/10.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        bP67k
                        <span class="subtitle is-6"> x 74</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 687</p>
                    <p class="subtitle is-6">Expires 1 day ago.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Shukhi&#039;s Pizza</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/11.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        aKXaA
                        <span class="subtitle is-6"> x 62</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 98</p>
                    <p class="subtitle is-6">Expires 1 day ago.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">aJWz9</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/14.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        hdumg
                        <span class="subtitle is-6"> x 54</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 754</p>
                    <p class="subtitle is-6">Expires 1 day ago.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Em646</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/33.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        sqXQQ
                        <span class="subtitle is-6"> x 2</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 953</p>
                    <p class="subtitle is-6">Expires 1 day ago.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">eFxJu</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/47.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        GQqez
                        <span class="subtitle is-6"> x 13</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 795</p>
                    <p class="subtitle is-6">Expires 1 day ago.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">zutDT</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/35.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        K1ba0
                        <span class="subtitle is-6"> x 23</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 474</p>
                    <p class="subtitle is-6">Expires 17 hours ago.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Em646</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/45.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        Ttj5c
                        <span class="subtitle is-6"> x 91</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 661</p>
                    <p class="subtitle is-6">Expires 17 hours ago.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Em646</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/25.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        lt7xS
                        <span class="subtitle is-6"> x 80</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 568</p>
                    <p class="subtitle is-6">Expires 6 hours from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">eFxJu</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/28.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        A8xY1
                        <span class="subtitle is-6"> x 75</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 17</p>
                    <p class="subtitle is-6">Expires 6 hours from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">aJWz9</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/40.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        FJdzh
                        <span class="subtitle is-6"> x 89</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 851</p>
                    <p class="subtitle is-6">Expires 6 hours from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">HigNJ</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/1.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        9LM03
                        <span class="subtitle is-6"> x 38</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 954</p>
                    <p class="subtitle is-6">Expires 1 day from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Shukhi&#039;s Bakery</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/27.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        62NCl
                        <span class="subtitle is-6"> x 28</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 998</p>
                    <p class="subtitle is-6">Expires 1 day from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">zutDT</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/29.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        Hl4h8
                        <span class="subtitle is-6"> x 10</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 944</p>
                    <p class="subtitle is-6">Expires 1 day from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">zutDT</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/30.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        rK9bJ
                        <span class="subtitle is-6"> x 69</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 272</p>
                    <p class="subtitle is-6">Expires 1 day from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">HigNJ</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/7.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        J0QXI
                        <span class="subtitle is-6"> x 87</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 776</p>
                    <p class="subtitle is-6">Expires 2 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">zutDT</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/22.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        nibXY
                        <span class="subtitle is-6"> x 14</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 813</p>
                    <p class="subtitle is-6">Expires 2 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">eFxJu</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/23.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        rQqNa
                        <span class="subtitle is-6"> x 87</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 704</p>
                    <p class="subtitle is-6">Expires 2 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">eFxJu</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/32.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        GdQq8
                        <span class="subtitle is-6"> x 71</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 180</p>
                    <p class="subtitle is-6">Expires 2 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">eFxJu</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/34.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        5zEAv
                        <span class="subtitle is-6"> x 97</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 784</p>
                    <p class="subtitle is-6">Expires 2 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">zutDT</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/12.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        8re2f
                        <span class="subtitle is-6"> x 93</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 439</p>
                    <p class="subtitle is-6">Expires 3 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Shukhi&#039;s Bakery</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/42.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        1ReJh
                        <span class="subtitle is-6"> x 87</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 598</p>
                    <p class="subtitle is-6">Expires 3 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">eFxJu</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/2.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        uS5Da
                        <span class="subtitle is-6"> x 26</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 266</p>
                    <p class="subtitle is-6">Expires 4 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Em646</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/3.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        RmAiN
                        <span class="subtitle is-6"> x 99</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 970</p>
                    <p class="subtitle is-6">Expires 4 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Shukhi&#039;s Bakery</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/5.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        tgHto
                        <span class="subtitle is-6"> x 60</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 515</p>
                    <p class="subtitle is-6">Expires 4 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Shukhi&#039;s Bakery</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/39.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        JHJeB
                        <span class="subtitle is-6"> x 34</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 685</p>
                    <p class="subtitle is-6">Expires 4 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">aJWz9</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/50.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        o4FpX
                        <span class="subtitle is-6"> x 33</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 130</p>
                    <p class="subtitle is-6">Expires 4 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Shukhi&#039;s Bakery</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/4.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        A3W1v
                        <span class="subtitle is-6"> x 88</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 410</p>
                    <p class="subtitle is-6">Expires 5 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">zutDT</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/16.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        sFJ6E
                        <span class="subtitle is-6"> x 82</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 969</p>
                    <p class="subtitle is-6">Expires 5 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">zutDT</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/17.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        wMmuB
                        <span class="subtitle is-6"> x 64</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 590</p>
                    <p class="subtitle is-6">Expires 5 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">aJWz9</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/19.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        OjesS
                        <span class="subtitle is-6"> x 12</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 635</p>
                    <p class="subtitle is-6">Expires 5 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Shukhi&#039;s Bakery</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/21.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        hIL1i
                        <span class="subtitle is-6"> x 87</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 858</p>
                    <p class="subtitle is-6">Expires 5 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">aJWz9</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/46.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        eC54C
                        <span class="subtitle is-6"> x 89</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 567</p>
                    <p class="subtitle is-6">Expires 5 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Shukhi&#039;s Pizza</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/9.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        XymUR
                        <span class="subtitle is-6"> x 65</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 963</p>
                    <p class="subtitle is-6">Expires 6 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Shukhi&#039;s Bakery</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/15.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        zL1tQ
                        <span class="subtitle is-6"> x 79</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 618</p>
                    <p class="subtitle is-6">Expires 6 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Shukhi&#039;s Pizza</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/18.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        K60HQ
                        <span class="subtitle is-6"> x 17</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 399</p>
                    <p class="subtitle is-6">Expires 6 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Shukhi&#039;s Bakery</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/20.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        pALUJ
                        <span class="subtitle is-6"> x 44</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 531</p>
                    <p class="subtitle is-6">Expires 6 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">zutDT</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/26.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        CML74
                        <span class="subtitle is-6"> x 88</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 101</p>
                    <p class="subtitle is-6">Expires 6 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">eFxJu</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/31.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        FtsG2
                        <span class="subtitle is-6"> x 42</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 792</p>
                    <p class="subtitle is-6">Expires 6 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Em646</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/37.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        LFqRm
                        <span class="subtitle is-6"> x 10</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 766</p>
                    <p class="subtitle is-6">Expires 6 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Em646</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/43.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        EGMST
                        <span class="subtitle is-6"> x 96</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 136</p>
                    <p class="subtitle is-6">Expires 6 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">HigNJ</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/44.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        s4oxr
                        <span class="subtitle is-6"> x 86</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 64</p>
                    <p class="subtitle is-6">Expires 6 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">eFxJu</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/48.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        zTTI0
                        <span class="subtitle is-6"> x 8</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 517</p>
                    <p class="subtitle is-6">Expires 6 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">aJWz9</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/13.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        jCnYk
                        <span class="subtitle is-6"> x 25</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 543</p>
                    <p class="subtitle is-6">Expires 1 week from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Shukhi&#039;s Bakery</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/24.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        u0HYb
                        <span class="subtitle is-6"> x 33</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 583</p>
                    <p class="subtitle is-6">Expires 1 week from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">eFxJu</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/36.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        wILEP
                        <span class="subtitle is-6"> x 11</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 75</p>
                    <p class="subtitle is-6">Expires 1 week from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Shukhi&#039;s Bakery</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/38.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        pFzkS
                        <span class="subtitle is-6"> x 23</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 573</p>
                    <p class="subtitle is-6">Expires 1 week from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">aJWz9</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/41.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        77cUD
                        <span class="subtitle is-6"> x 5</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 837</p>
                    <p class="subtitle is-6">Expires 1 week from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">zutDT</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/49.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        qnMNm
                        <span class="subtitle is-6"> x 50</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 228</p>
                    <p class="subtitle is-6">Expires 1 week from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">aJWz9</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>            </div>
</div>
        </div>

        <script src="http://food_clearance.test/js/app.js"></script>
    </body>

</html>
```
<div id="execution-results-GET-" hidden>
    <blockquote>Received response<span id="execution-response-status-GET-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GET-"></code></pre>
</div>
<div id="execution-error-GET-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GET-"></code></pre>
</div>
<form id="form-GET-" data-method="GET" data-path="/" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GET-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GET-" onclick="tryItOut('GET-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GET-" onclick="cancelTryOut('GET-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GET-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>/</code></b>
</p>
</form>


## Show the application dashboard.




> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/home" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/home"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Homepage
</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="D8lrVXwR9RtNRkWEv1zUcsoUtF10HjhkZVKCjqUB">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css"
            integrity="sha256-vK3UTo/8wHbaUn+dTQD0X6dzidqc5l7gczvH+Bnowwk=" crossorigin="anonymous" />

        <link rel="stylesheet" href="http://food_clearance.test/css/app.css">

        <script>
            async function buy(e, id) {
                let quantity = e.parentElement.querySelector("input[name='quantity']").value;
    
                let response = await axios({
                    method: 'post',
                    url: 'foods/' + id + '/buy',
                    data: {
                        quantity: quantity
                    }
                });
    
                if (response.status == 200) {
                    document.getElementById("results").classList.remove("hidden");
                    document.getElementById("search-results").classList.add("hidden");
    
                    document.getElementById("results").innerHTML = response.data;
    
                    document.getElementById("modal").classList.add("is-active");
                    document.getElementById("modal").querySelector(".modal-content .box").innerHTML = "Order placed successfully!";
                }
            }
    
            async function addToCart(e, id) {
                let quantity = parseInt(e.parentElement.querySelector("input[name='quantity']").value);
    
                let response = await axios({
                    method: 'post',
                    url: "http://food_clearance.test/cart",
                    data: {
                        quantity: quantity,
                        food_id: id
                    }
                });
    
                if (response.status == 200) {
                    document.getElementById("modal").classList.add("is-active");
                    document.getElementById("modal").querySelector(".modal-content .box").innerHTML = "Added to cart successfully!";
                }
            }
        </script>
    </head>

    <body>
        <div class="modal" id="modal">
            <div class="modal-background"></div>
            <div class="modal-content">
                <div class="box">

                </div>
            </div>
            <button class="modal-close is-large" aria-label="close"></button>
        </div>

        <nav class="navbar is-dark" role="navigation" aria-label="main navigation">
            <div class="container">
                <div class="navbar-brand">
                    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
                        data-target="navbarBasic">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                    </a>
                </div>

                <div id="navbarBasic" class="navbar-menu">
                    <div class="navbar-start">
                        <a class="navbar-item" href="http://food_clearance.test">
                            Home
                        </a>
                                            </div>

                    <div class="navbar-end">
                        <div class="navbar-item">
                            <input type="text" id="search" class="input" placeholder="Search">
                        </div>

                        
                        <div class="navbar-item">
                            <div class="buttons">
                                                                <a class="button is-primary" href="http://food_clearance.test/register">
                                    <strong>Register</strong>
                                </a>
                                <a class="button is-light" href="http://food_clearance.test/login">
                                    Login
                                </a>
                                                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container" id="content">
                                    
            <div id="search-results" class="hidden">
    <i>No food items found!</i>
</div>

<div id="results">
    <h1 class="title">Food Items</h1>

    <div class="columns is-multiline">
                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/6.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        AFDDn
                        <span class="subtitle is-6"> x 28</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 861</p>
                    <p class="subtitle is-6">Expires 1 day ago.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Shukhi&#039;s Bakery</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/8.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        49fIE
                        <span class="subtitle is-6"> x 9</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 447</p>
                    <p class="subtitle is-6">Expires 1 day ago.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Shukhi&#039;s Bakery</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/10.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        bP67k
                        <span class="subtitle is-6"> x 74</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 687</p>
                    <p class="subtitle is-6">Expires 1 day ago.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Shukhi&#039;s Pizza</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/11.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        aKXaA
                        <span class="subtitle is-6"> x 62</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 98</p>
                    <p class="subtitle is-6">Expires 1 day ago.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">aJWz9</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/14.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        hdumg
                        <span class="subtitle is-6"> x 54</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 754</p>
                    <p class="subtitle is-6">Expires 1 day ago.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Em646</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/33.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        sqXQQ
                        <span class="subtitle is-6"> x 2</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 953</p>
                    <p class="subtitle is-6">Expires 1 day ago.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">eFxJu</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/47.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        GQqez
                        <span class="subtitle is-6"> x 13</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 795</p>
                    <p class="subtitle is-6">Expires 1 day ago.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">zutDT</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/35.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        K1ba0
                        <span class="subtitle is-6"> x 23</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 474</p>
                    <p class="subtitle is-6">Expires 17 hours ago.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Em646</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/45.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        Ttj5c
                        <span class="subtitle is-6"> x 91</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 661</p>
                    <p class="subtitle is-6">Expires 17 hours ago.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Em646</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/25.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        lt7xS
                        <span class="subtitle is-6"> x 80</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 568</p>
                    <p class="subtitle is-6">Expires 6 hours from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">eFxJu</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/28.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        A8xY1
                        <span class="subtitle is-6"> x 75</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 17</p>
                    <p class="subtitle is-6">Expires 6 hours from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">aJWz9</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/40.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        FJdzh
                        <span class="subtitle is-6"> x 89</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 851</p>
                    <p class="subtitle is-6">Expires 6 hours from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">HigNJ</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/1.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        9LM03
                        <span class="subtitle is-6"> x 38</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 954</p>
                    <p class="subtitle is-6">Expires 1 day from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Shukhi&#039;s Bakery</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/27.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        62NCl
                        <span class="subtitle is-6"> x 28</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 998</p>
                    <p class="subtitle is-6">Expires 1 day from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">zutDT</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/29.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        Hl4h8
                        <span class="subtitle is-6"> x 10</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 944</p>
                    <p class="subtitle is-6">Expires 1 day from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">zutDT</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/30.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        rK9bJ
                        <span class="subtitle is-6"> x 69</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 272</p>
                    <p class="subtitle is-6">Expires 1 day from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">HigNJ</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/7.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        J0QXI
                        <span class="subtitle is-6"> x 87</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 776</p>
                    <p class="subtitle is-6">Expires 2 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">zutDT</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/22.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        nibXY
                        <span class="subtitle is-6"> x 14</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 813</p>
                    <p class="subtitle is-6">Expires 2 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">eFxJu</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/23.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        rQqNa
                        <span class="subtitle is-6"> x 87</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 704</p>
                    <p class="subtitle is-6">Expires 2 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">eFxJu</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/32.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        GdQq8
                        <span class="subtitle is-6"> x 71</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 180</p>
                    <p class="subtitle is-6">Expires 2 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">eFxJu</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/34.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        5zEAv
                        <span class="subtitle is-6"> x 97</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 784</p>
                    <p class="subtitle is-6">Expires 2 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">zutDT</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/12.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        8re2f
                        <span class="subtitle is-6"> x 93</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 439</p>
                    <p class="subtitle is-6">Expires 3 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Shukhi&#039;s Bakery</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/42.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        1ReJh
                        <span class="subtitle is-6"> x 87</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 598</p>
                    <p class="subtitle is-6">Expires 3 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">eFxJu</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/2.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        uS5Da
                        <span class="subtitle is-6"> x 26</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 266</p>
                    <p class="subtitle is-6">Expires 4 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Em646</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/3.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        RmAiN
                        <span class="subtitle is-6"> x 99</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 970</p>
                    <p class="subtitle is-6">Expires 4 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Shukhi&#039;s Bakery</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/5.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        tgHto
                        <span class="subtitle is-6"> x 60</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 515</p>
                    <p class="subtitle is-6">Expires 4 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Shukhi&#039;s Bakery</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/39.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        JHJeB
                        <span class="subtitle is-6"> x 34</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 685</p>
                    <p class="subtitle is-6">Expires 4 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">aJWz9</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/50.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        o4FpX
                        <span class="subtitle is-6"> x 33</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 130</p>
                    <p class="subtitle is-6">Expires 4 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Shukhi&#039;s Bakery</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/4.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        A3W1v
                        <span class="subtitle is-6"> x 88</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 410</p>
                    <p class="subtitle is-6">Expires 5 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">zutDT</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/16.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        sFJ6E
                        <span class="subtitle is-6"> x 82</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 969</p>
                    <p class="subtitle is-6">Expires 5 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">zutDT</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/17.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        wMmuB
                        <span class="subtitle is-6"> x 64</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 590</p>
                    <p class="subtitle is-6">Expires 5 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">aJWz9</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/19.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        OjesS
                        <span class="subtitle is-6"> x 12</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 635</p>
                    <p class="subtitle is-6">Expires 5 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Shukhi&#039;s Bakery</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/21.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        hIL1i
                        <span class="subtitle is-6"> x 87</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 858</p>
                    <p class="subtitle is-6">Expires 5 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">aJWz9</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/46.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        eC54C
                        <span class="subtitle is-6"> x 89</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 567</p>
                    <p class="subtitle is-6">Expires 5 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Shukhi&#039;s Pizza</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/9.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        XymUR
                        <span class="subtitle is-6"> x 65</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 963</p>
                    <p class="subtitle is-6">Expires 6 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Shukhi&#039;s Bakery</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/15.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        zL1tQ
                        <span class="subtitle is-6"> x 79</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 618</p>
                    <p class="subtitle is-6">Expires 6 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Shukhi&#039;s Pizza</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/18.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        K60HQ
                        <span class="subtitle is-6"> x 17</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 399</p>
                    <p class="subtitle is-6">Expires 6 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Shukhi&#039;s Bakery</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/20.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        pALUJ
                        <span class="subtitle is-6"> x 44</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 531</p>
                    <p class="subtitle is-6">Expires 6 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">zutDT</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/26.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        CML74
                        <span class="subtitle is-6"> x 88</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 101</p>
                    <p class="subtitle is-6">Expires 6 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">eFxJu</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/31.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        FtsG2
                        <span class="subtitle is-6"> x 42</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 792</p>
                    <p class="subtitle is-6">Expires 6 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Em646</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/37.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        LFqRm
                        <span class="subtitle is-6"> x 10</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 766</p>
                    <p class="subtitle is-6">Expires 6 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Em646</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/43.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        EGMST
                        <span class="subtitle is-6"> x 96</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 136</p>
                    <p class="subtitle is-6">Expires 6 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">HigNJ</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/44.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        s4oxr
                        <span class="subtitle is-6"> x 86</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 64</p>
                    <p class="subtitle is-6">Expires 6 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">eFxJu</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/48.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        zTTI0
                        <span class="subtitle is-6"> x 8</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 517</p>
                    <p class="subtitle is-6">Expires 6 days from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">aJWz9</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/13.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        jCnYk
                        <span class="subtitle is-6"> x 25</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 543</p>
                    <p class="subtitle is-6">Expires 1 week from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Shukhi&#039;s Bakery</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/24.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        u0HYb
                        <span class="subtitle is-6"> x 33</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 583</p>
                    <p class="subtitle is-6">Expires 1 week from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">eFxJu</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/36.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        wILEP
                        <span class="subtitle is-6"> x 11</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 75</p>
                    <p class="subtitle is-6">Expires 1 week from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">Shukhi&#039;s Bakery</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/38.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        pFzkS
                        <span class="subtitle is-6"> x 23</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 573</p>
                    <p class="subtitle is-6">Expires 1 week from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">aJWz9</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/41.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        77cUD
                        <span class="subtitle is-6"> x 5</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 837</p>
                    <p class="subtitle is-6">Expires 1 week from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">zutDT</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>                <div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="http://food_clearance.test/storage/images/49.jpg">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        qnMNm
                        <span class="subtitle is-6"> x 50</span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ 228</p>
                    <p class="subtitle is-6">Expires 1 week from now.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">aJWz9</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    
                    <a class="button is-outlined" href="http://food_clearance.test/login">Add to Cart</a>

                    <a class="button is-outlined is-success" href="http://food_clearance.test/login">Buy</a>

                    <a class="button is-outlined" href="http://food_clearance.test/login">Report</a>

                                    </div>
            </div>
        </div>
    </div>
</div>            </div>
</div>
        </div>

        <script src="http://food_clearance.test/js/app.js"></script>
    </body>

</html>
```
<div id="execution-results-GEThome" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome"></code></pre>
</div>
<div id="execution-error-GEThome" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome"></code></pre>
</div>
<form id="form-GEThome" data-method="GET" data-path="home" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome" onclick="tryItOut('GEThome');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome" onclick="cancelTryOut('GEThome');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home</code></b>
</p>
</form>


## Show the application&#039;s login form.




> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title></title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="D8lrVXwR9RtNRkWEv1zUcsoUtF10HjhkZVKCjqUB">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css"
            integrity="sha256-vK3UTo/8wHbaUn+dTQD0X6dzidqc5l7gczvH+Bnowwk=" crossorigin="anonymous" />

        <link rel="stylesheet" href="http://food_clearance.test/css/app.css">

        <script>
            async function buy(e, id) {
                let quantity = e.parentElement.querySelector("input[name='quantity']").value;
    
                let response = await axios({
                    method: 'post',
                    url: 'foods/' + id + '/buy',
                    data: {
                        quantity: quantity
                    }
                });
    
                if (response.status == 200) {
                    document.getElementById("results").classList.remove("hidden");
                    document.getElementById("search-results").classList.add("hidden");
    
                    document.getElementById("results").innerHTML = response.data;
    
                    document.getElementById("modal").classList.add("is-active");
                    document.getElementById("modal").querySelector(".modal-content .box").innerHTML = "Order placed successfully!";
                }
            }
    
            async function addToCart(e, id) {
                let quantity = parseInt(e.parentElement.querySelector("input[name='quantity']").value);
    
                let response = await axios({
                    method: 'post',
                    url: "http://food_clearance.test/cart",
                    data: {
                        quantity: quantity,
                        food_id: id
                    }
                });
    
                if (response.status == 200) {
                    document.getElementById("modal").classList.add("is-active");
                    document.getElementById("modal").querySelector(".modal-content .box").innerHTML = "Added to cart successfully!";
                }
            }
        </script>
    </head>

    <body>
        <div class="modal" id="modal">
            <div class="modal-background"></div>
            <div class="modal-content">
                <div class="box">

                </div>
            </div>
            <button class="modal-close is-large" aria-label="close"></button>
        </div>

        <nav class="navbar is-dark" role="navigation" aria-label="main navigation">
            <div class="container">
                <div class="navbar-brand">
                    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
                        data-target="navbarBasic">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                    </a>
                </div>

                <div id="navbarBasic" class="navbar-menu">
                    <div class="navbar-start">
                        <a class="navbar-item" href="http://food_clearance.test">
                            Home
                        </a>
                                            </div>

                    <div class="navbar-end">
                        <div class="navbar-item">
                            <input type="text" id="search" class="input" placeholder="Search">
                        </div>

                        
                        <div class="navbar-item">
                            <div class="buttons">
                                                                <a class="button is-primary" href="http://food_clearance.test/register">
                                    <strong>Register</strong>
                                </a>
                                <a class="button is-light" href="http://food_clearance.test/login">
                                    Login
                                </a>
                                                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container" id="content">
                                    
                <div class="is-box">
        <h1 class="title">Login</h1>
        <form method="POST" action="http://food_clearance.test/login">
            <input type="hidden" name="_token" value="D8lrVXwR9RtNRkWEv1zUcsoUtF10HjhkZVKCjqUB">    
            <div class="field">
                <label for="email" class="label">E-Mail Address</label>
    
                <div>
                    <input id="email" type="email" class="input" name="email" value="" required autocomplete="email" autofocus>
    
                                    </div>
            </div>
    
            <div class="field">
                <label for="password" class="label">Password</label>
    
                <div>
                    <input id="password" type="password" class="input" name="password" required autocomplete="current-password">
    
                                    </div>
            </div>
    
            <div class="field">
                <div class="control">
                    <label class="checkbox" for="remember">
                        <input type="checkbox" name="remember" id="remember" >
                        Remember me
                    </label>
                </div>
            </div>
    
            <div class="field">
                <button type="submit" class="button is-outlined">
                    Login
                </button>
            </div>
        </form>
    </div>
        </div>

        <script src="http://food_clearance.test/js/app.js"></script>
    </body>

</html>
```
<div id="execution-results-GETlogin" hidden>
    <blockquote>Received response<span id="execution-response-status-GETlogin"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETlogin"></code></pre>
</div>
<div id="execution-error-GETlogin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETlogin"></code></pre>
</div>
<form id="form-GETlogin" data-method="GET" data-path="login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETlogin', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETlogin" onclick="tryItOut('GETlogin');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETlogin" onclick="cancelTryOut('GETlogin');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETlogin" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>login</code></b>
</p>
</form>


## Handle a login request to the application.




> Example request:

```bash
curl -X POST \
    "http://food_clearance.test/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTlogin" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTlogin"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTlogin"></code></pre>
</div>
<div id="execution-error-POSTlogin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTlogin"></code></pre>
</div>
<form id="form-POSTlogin" data-method="POST" data-path="login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTlogin', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTlogin" onclick="tryItOut('POSTlogin');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTlogin" onclick="cancelTryOut('POSTlogin');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTlogin" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>login</code></b>
</p>
</form>


## Log the user out of the application.




> Example request:

```bash
curl -X POST \
    "http://food_clearance.test/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTlogout" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTlogout"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTlogout"></code></pre>
</div>
<div id="execution-error-POSTlogout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTlogout"></code></pre>
</div>
<form id="form-POSTlogout" data-method="POST" data-path="logout" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTlogout', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTlogout" onclick="tryItOut('POSTlogout');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTlogout" onclick="cancelTryOut('POSTlogout');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTlogout" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>logout</code></b>
</p>
</form>


## Show the application registration form.




> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title></title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="D8lrVXwR9RtNRkWEv1zUcsoUtF10HjhkZVKCjqUB">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css"
            integrity="sha256-vK3UTo/8wHbaUn+dTQD0X6dzidqc5l7gczvH+Bnowwk=" crossorigin="anonymous" />

        <link rel="stylesheet" href="http://food_clearance.test/css/app.css">

        <script>
            async function buy(e, id) {
                let quantity = e.parentElement.querySelector("input[name='quantity']").value;
    
                let response = await axios({
                    method: 'post',
                    url: 'foods/' + id + '/buy',
                    data: {
                        quantity: quantity
                    }
                });
    
                if (response.status == 200) {
                    document.getElementById("results").classList.remove("hidden");
                    document.getElementById("search-results").classList.add("hidden");
    
                    document.getElementById("results").innerHTML = response.data;
    
                    document.getElementById("modal").classList.add("is-active");
                    document.getElementById("modal").querySelector(".modal-content .box").innerHTML = "Order placed successfully!";
                }
            }
    
            async function addToCart(e, id) {
                let quantity = parseInt(e.parentElement.querySelector("input[name='quantity']").value);
    
                let response = await axios({
                    method: 'post',
                    url: "http://food_clearance.test/cart",
                    data: {
                        quantity: quantity,
                        food_id: id
                    }
                });
    
                if (response.status == 200) {
                    document.getElementById("modal").classList.add("is-active");
                    document.getElementById("modal").querySelector(".modal-content .box").innerHTML = "Added to cart successfully!";
                }
            }
        </script>
    </head>

    <body>
        <div class="modal" id="modal">
            <div class="modal-background"></div>
            <div class="modal-content">
                <div class="box">

                </div>
            </div>
            <button class="modal-close is-large" aria-label="close"></button>
        </div>

        <nav class="navbar is-dark" role="navigation" aria-label="main navigation">
            <div class="container">
                <div class="navbar-brand">
                    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
                        data-target="navbarBasic">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                    </a>
                </div>

                <div id="navbarBasic" class="navbar-menu">
                    <div class="navbar-start">
                        <a class="navbar-item" href="http://food_clearance.test">
                            Home
                        </a>
                                            </div>

                    <div class="navbar-end">
                        <div class="navbar-item">
                            <input type="text" id="search" class="input" placeholder="Search">
                        </div>

                        
                        <div class="navbar-item">
                            <div class="buttons">
                                                                <a class="button is-primary" href="http://food_clearance.test/register">
                                    <strong>Register</strong>
                                </a>
                                <a class="button is-light" href="http://food_clearance.test/login">
                                    Login
                                </a>
                                                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container" id="content">
                                    
                <div class="is-box">
        <h1 class="title">Register</h1>
        <form method="POST" action="http://food_clearance.test/register">
            <input type="hidden" name="_token" value="D8lrVXwR9RtNRkWEv1zUcsoUtF10HjhkZVKCjqUB">    
            <div class="field">
                <label for="name" class="label">Name</label>
    
                <div>
                    <input id="name" type="text" class="input" name="name" value="" required autocomplete="name" autofocus>
    
                                    </div>
            </div>
    
            <div class="field">
                <label for="email" class="label">E-Mail Address</label>
    
                <div>
                    <input id="email" type="email" class="input" name="email" value="" required autocomplete="email">
    
                                    </div>
            </div>
    
            <div class="field">
                <label for="password" class="label">Password</label>
    
                <div>
                    <input id="password" type="password" class="input" name="password" required autocomplete="new-password">
    
                                    </div>
            </div>
    
            <div class="field">
                <label for="password-confirm" class="label">Confirm Password</label>
    
                <div>
                    <input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
    
            <div class="field">
                <button type="submit" class="button is-outlined is-success">
                    Register
                </button>
            </div>
        </form>
    </div>
        </div>

        <script src="http://food_clearance.test/js/app.js"></script>
    </body>

</html>
```
<div id="execution-results-GETregister" hidden>
    <blockquote>Received response<span id="execution-response-status-GETregister"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETregister"></code></pre>
</div>
<div id="execution-error-GETregister" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETregister"></code></pre>
</div>
<form id="form-GETregister" data-method="GET" data-path="register" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETregister', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETregister" onclick="tryItOut('GETregister');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETregister" onclick="cancelTryOut('GETregister');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETregister" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>register</code></b>
</p>
</form>


## Handle a registration request for the application.




> Example request:

```bash
curl -X POST \
    "http://food_clearance.test/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTregister" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTregister"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTregister"></code></pre>
</div>
<div id="execution-error-POSTregister" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTregister"></code></pre>
</div>
<form id="form-POSTregister" data-method="POST" data-path="register" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTregister', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTregister" onclick="tryItOut('POSTregister');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTregister" onclick="cancelTryOut('POSTregister');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTregister" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>register</code></b>
</p>
</form>


## Display the form to request a password reset link.




> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (500):

```json
{
    "message": "View [layouts.app] not found. (View: \/Users\/nahiyanalamgir\/code\/food-clearance-original\/resources\/views\/auth\/passwords\/email.blade.php)",
    "exception": "Facade\\Ignition\\Exceptions\\ViewException",
    "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/View\/FileViewFinder.php",
    "line": 137,
    "trace": [
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/View\/FileViewFinder.php",
            "line": 79,
            "function": "findInPaths",
            "class": "Illuminate\\View\\FileViewFinder",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Factory.php",
            "line": 138,
            "function": "find",
            "class": "Illuminate\\View\\FileViewFinder",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/resources\/views\/auth\/passwords\/email.blade.php",
            "line": 63,
            "function": "make",
            "class": "Illuminate\\View\\Factory",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php",
            "line": 107,
            "function": "require"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php",
            "line": 108,
            "function": "Illuminate\\Filesystem\\{closure}",
            "class": "Illuminate\\Filesystem\\Filesystem",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php",
            "line": 58,
            "function": "getRequire",
            "class": "Illuminate\\Filesystem\\Filesystem",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php",
            "line": 61,
            "function": "evaluatePath",
            "class": "Illuminate\\View\\Engines\\PhpEngine",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php",
            "line": 37,
            "function": "get",
            "class": "Illuminate\\View\\Engines\\CompilerEngine",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/View\/View.php",
            "line": 139,
            "function": "get",
            "class": "Facade\\Ignition\\Views\\Engines\\CompilerEngine",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/View\/View.php",
            "line": 122,
            "function": "getContents",
            "class": "Illuminate\\View\\View",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/View\/View.php",
            "line": 91,
            "function": "renderContents",
            "class": "Illuminate\\View\\View",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Http\/Response.php",
            "line": 62,
            "function": "render",
            "class": "Illuminate\\View\\View",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Http\/Response.php",
            "line": 34,
            "function": "setContent",
            "class": "Illuminate\\Http\\Response",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 780,
            "function": "__construct",
            "class": "Illuminate\\Http\\Response",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 752,
            "function": "toResponse",
            "class": "Illuminate\\Routing\\Router",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 692,
            "function": "prepareResponse",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Middleware\/SubstituteBindings.php",
            "line": 41,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/VerifyCsrfToken.php",
            "line": 78,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Middleware\/ShareErrorsFromSession.php",
            "line": 49,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\View\\Middleware\\ShareErrorsFromSession",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Session\/Middleware\/StartSession.php",
            "line": 121,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Session\/Middleware\/StartSession.php",
            "line": 63,
            "function": "handleStatefulRequest",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/AddQueuedCookiesToResponse.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/EncryptCookies.php",
            "line": 67,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\EncryptCookies",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 694,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 669,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 635,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 624,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 166,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/PreventRequestsDuringMaintenance.php",
            "line": 86,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/fruitcake\/laravel-cors\/src\/HandleCors.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fruitcake\\Cors\\HandleCors",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/fideloper\/proxy\/src\/TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 141,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 110,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 324,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 305,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 236,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 172,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 127,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 119,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 36,
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Util.php",
            "line": 40,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 93,
            "function": "unwrapIfClosure",
            "class": "Illuminate\\Container\\Util",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 37,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 610,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 136,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Command\/Command.php",
            "line": 255,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Application.php",
            "line": 971,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Application.php",
            "line": 290,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Application.php",
            "line": 166,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php",
            "line": 93,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```
<div id="execution-results-GETpassword-reset" hidden>
    <blockquote>Received response<span id="execution-response-status-GETpassword-reset"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETpassword-reset"></code></pre>
</div>
<div id="execution-error-GETpassword-reset" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETpassword-reset"></code></pre>
</div>
<form id="form-GETpassword-reset" data-method="GET" data-path="password/reset" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETpassword-reset', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETpassword-reset" onclick="tryItOut('GETpassword-reset');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETpassword-reset" onclick="cancelTryOut('GETpassword-reset');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETpassword-reset" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>password/reset</code></b>
</p>
</form>


## Send a reset link to the given user.




> Example request:

```bash
curl -X POST \
    "http://food_clearance.test/password/email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/password/email"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTpassword-email" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTpassword-email"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTpassword-email"></code></pre>
</div>
<div id="execution-error-POSTpassword-email" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTpassword-email"></code></pre>
</div>
<form id="form-POSTpassword-email" data-method="POST" data-path="password/email" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTpassword-email', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTpassword-email" onclick="tryItOut('POSTpassword-email');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTpassword-email" onclick="cancelTryOut('POSTpassword-email');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTpassword-email" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>password/email</code></b>
</p>
</form>


## Display the password reset view for the given token.


If no token is present, display the link request form.

> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/password/reset/velit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/password/reset/velit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (500):

```json
{
    "message": "View [layouts.app] not found. (View: \/Users\/nahiyanalamgir\/code\/food-clearance-original\/resources\/views\/auth\/passwords\/reset.blade.php)",
    "exception": "Facade\\Ignition\\Exceptions\\ViewException",
    "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/View\/FileViewFinder.php",
    "line": 137,
    "trace": [
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/View\/FileViewFinder.php",
            "line": 79,
            "function": "findInPaths",
            "class": "Illuminate\\View\\FileViewFinder",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Factory.php",
            "line": 138,
            "function": "find",
            "class": "Illuminate\\View\\FileViewFinder",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/resources\/views\/auth\/passwords\/reset.blade.php",
            "line": 94,
            "function": "make",
            "class": "Illuminate\\View\\Factory",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php",
            "line": 107,
            "function": "require"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Filesystem\/Filesystem.php",
            "line": 108,
            "function": "Illuminate\\Filesystem\\{closure}",
            "class": "Illuminate\\Filesystem\\Filesystem",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/PhpEngine.php",
            "line": 58,
            "function": "getRequire",
            "class": "Illuminate\\Filesystem\\Filesystem",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Engines\/CompilerEngine.php",
            "line": 61,
            "function": "evaluatePath",
            "class": "Illuminate\\View\\Engines\\PhpEngine",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/facade\/ignition\/src\/Views\/Engines\/CompilerEngine.php",
            "line": 37,
            "function": "get",
            "class": "Illuminate\\View\\Engines\\CompilerEngine",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/View\/View.php",
            "line": 139,
            "function": "get",
            "class": "Facade\\Ignition\\Views\\Engines\\CompilerEngine",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/View\/View.php",
            "line": 122,
            "function": "getContents",
            "class": "Illuminate\\View\\View",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/View\/View.php",
            "line": 91,
            "function": "renderContents",
            "class": "Illuminate\\View\\View",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Http\/Response.php",
            "line": 62,
            "function": "render",
            "class": "Illuminate\\View\\View",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Http\/Response.php",
            "line": 34,
            "function": "setContent",
            "class": "Illuminate\\Http\\Response",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 780,
            "function": "__construct",
            "class": "Illuminate\\Http\\Response",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 752,
            "function": "toResponse",
            "class": "Illuminate\\Routing\\Router",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 692,
            "function": "prepareResponse",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Middleware\/SubstituteBindings.php",
            "line": 41,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/VerifyCsrfToken.php",
            "line": 78,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Middleware\/ShareErrorsFromSession.php",
            "line": 49,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\View\\Middleware\\ShareErrorsFromSession",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Session\/Middleware\/StartSession.php",
            "line": 121,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Session\/Middleware\/StartSession.php",
            "line": 63,
            "function": "handleStatefulRequest",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/AddQueuedCookiesToResponse.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/EncryptCookies.php",
            "line": 67,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\EncryptCookies",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 694,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 669,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 635,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 624,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 166,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/PreventRequestsDuringMaintenance.php",
            "line": 86,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/fruitcake\/laravel-cors\/src\/HandleCors.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fruitcake\\Cors\\HandleCors",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/fideloper\/proxy\/src\/TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 141,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 110,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 324,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 305,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 236,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 172,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 127,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 119,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 36,
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Util.php",
            "line": 40,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 93,
            "function": "unwrapIfClosure",
            "class": "Illuminate\\Container\\Util",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 37,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 610,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 136,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Command\/Command.php",
            "line": 255,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Application.php",
            "line": 971,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Application.php",
            "line": 290,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Application.php",
            "line": 166,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php",
            "line": 93,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```
<div id="execution-results-GETpassword-reset--token-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETpassword-reset--token-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETpassword-reset--token-"></code></pre>
</div>
<div id="execution-error-GETpassword-reset--token-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETpassword-reset--token-"></code></pre>
</div>
<form id="form-GETpassword-reset--token-" data-method="GET" data-path="password/reset/{token}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETpassword-reset--token-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETpassword-reset--token-" onclick="tryItOut('GETpassword-reset--token-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETpassword-reset--token-" onclick="cancelTryOut('GETpassword-reset--token-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETpassword-reset--token-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>password/reset/{token}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="token" data-endpoint="GETpassword-reset--token-" data-component="url" required  hidden>
<br>
</p>
</form>


## Reset the given user&#039;s password.




> Example request:

```bash
curl -X POST \
    "http://food_clearance.test/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTpassword-reset" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTpassword-reset"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTpassword-reset"></code></pre>
</div>
<div id="execution-error-POSTpassword-reset" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTpassword-reset"></code></pre>
</div>
<form id="form-POSTpassword-reset" data-method="POST" data-path="password/reset" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTpassword-reset', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTpassword-reset" onclick="tryItOut('POSTpassword-reset');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTpassword-reset" onclick="cancelTryOut('POSTpassword-reset');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTpassword-reset" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>password/reset</code></b>
</p>
</form>


## Display the password confirmation view.




> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/password/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETpassword-confirm" hidden>
    <blockquote>Received response<span id="execution-response-status-GETpassword-confirm"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETpassword-confirm"></code></pre>
</div>
<div id="execution-error-GETpassword-confirm" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETpassword-confirm"></code></pre>
</div>
<form id="form-GETpassword-confirm" data-method="GET" data-path="password/confirm" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETpassword-confirm', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETpassword-confirm" onclick="tryItOut('GETpassword-confirm');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETpassword-confirm" onclick="cancelTryOut('GETpassword-confirm');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETpassword-confirm" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>password/confirm</code></b>
</p>
</form>


## Confirm the given user&#039;s password.




> Example request:

```bash
curl -X POST \
    "http://food_clearance.test/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/password/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTpassword-confirm" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTpassword-confirm"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTpassword-confirm"></code></pre>
</div>
<div id="execution-error-POSTpassword-confirm" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTpassword-confirm"></code></pre>
</div>
<form id="form-POSTpassword-confirm" data-method="POST" data-path="password/confirm" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTpassword-confirm', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTpassword-confirm" onclick="tryItOut('POSTpassword-confirm');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTpassword-confirm" onclick="cancelTryOut('POSTpassword-confirm');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTpassword-confirm" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>password/confirm</code></b>
</p>
</form>


## Display a listing of the resource.




> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/admin/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/admin/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://food_clearance.test'" />

        <title>Redirecting to http://food_clearance.test</title>
    </head>
    <body>
        Redirecting to <a href="http://food_clearance.test">http://food_clearance.test</a>.
    </body>
</html>
```
<div id="execution-results-GETadmin-users" hidden>
    <blockquote>Received response<span id="execution-response-status-GETadmin-users"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-users"></code></pre>
</div>
<div id="execution-error-GETadmin-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-users"></code></pre>
</div>
<form id="form-GETadmin-users" data-method="GET" data-path="admin/users" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETadmin-users', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETadmin-users" onclick="tryItOut('GETadmin-users');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETadmin-users" onclick="cancelTryOut('GETadmin-users');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETadmin-users" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>admin/users</code></b>
</p>
</form>


## Show the form for creating a new resource.




> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/admin/users/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/admin/users/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://food_clearance.test'" />

        <title>Redirecting to http://food_clearance.test</title>
    </head>
    <body>
        Redirecting to <a href="http://food_clearance.test">http://food_clearance.test</a>.
    </body>
</html>
```
<div id="execution-results-GETadmin-users-create" hidden>
    <blockquote>Received response<span id="execution-response-status-GETadmin-users-create"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-users-create"></code></pre>
</div>
<div id="execution-error-GETadmin-users-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-users-create"></code></pre>
</div>
<form id="form-GETadmin-users-create" data-method="GET" data-path="admin/users/create" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETadmin-users-create', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETadmin-users-create" onclick="tryItOut('GETadmin-users-create');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETadmin-users-create" onclick="cancelTryOut('GETadmin-users-create');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETadmin-users-create" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>admin/users/create</code></b>
</p>
</form>


## Store a newly created resource in storage.




> Example request:

```bash
curl -X POST \
    "http://food_clearance.test/admin/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/admin/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTadmin-users" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTadmin-users"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTadmin-users"></code></pre>
</div>
<div id="execution-error-POSTadmin-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTadmin-users"></code></pre>
</div>
<form id="form-POSTadmin-users" data-method="POST" data-path="admin/users" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTadmin-users', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTadmin-users" onclick="tryItOut('POSTadmin-users');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTadmin-users" onclick="cancelTryOut('POSTadmin-users');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTadmin-users" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>admin/users</code></b>
</p>
</form>


## Display the specified resource.




> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/admin/users/sint" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/admin/users/sint"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (404):

```json
{
    "message": "No query results for model [App\\Models\\User] sint",
    "exception": "Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException",
    "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Exceptions\/Handler.php",
    "line": 365,
    "trace": [
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Exceptions\/Handler.php",
            "line": 314,
            "function": "prepareException",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/nunomaduro\/collision\/src\/Adapters\/Laravel\/ExceptionHandler.php",
            "line": 54,
            "function": "render",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 51,
            "function": "render",
            "class": "NunoMaduro\\Collision\\Adapters\\Laravel\\ExceptionHandler",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 172,
            "function": "handleException",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/VerifyCsrfToken.php",
            "line": 78,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Middleware\/ShareErrorsFromSession.php",
            "line": 49,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\View\\Middleware\\ShareErrorsFromSession",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Session\/Middleware\/StartSession.php",
            "line": 121,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Session\/Middleware\/StartSession.php",
            "line": 63,
            "function": "handleStatefulRequest",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/AddQueuedCookiesToResponse.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/EncryptCookies.php",
            "line": 67,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\EncryptCookies",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 694,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 669,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 635,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 624,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 166,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/PreventRequestsDuringMaintenance.php",
            "line": 86,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/fruitcake\/laravel-cors\/src\/HandleCors.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fruitcake\\Cors\\HandleCors",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/fideloper\/proxy\/src\/TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 141,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 110,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 324,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 305,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 236,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 172,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 127,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 119,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 36,
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Util.php",
            "line": 40,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 93,
            "function": "unwrapIfClosure",
            "class": "Illuminate\\Container\\Util",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 37,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 610,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 136,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Command\/Command.php",
            "line": 255,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Application.php",
            "line": 971,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Application.php",
            "line": 290,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Application.php",
            "line": 166,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php",
            "line": 93,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```
<div id="execution-results-GETadmin-users--user-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETadmin-users--user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-users--user-"></code></pre>
</div>
<div id="execution-error-GETadmin-users--user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-users--user-"></code></pre>
</div>
<form id="form-GETadmin-users--user-" data-method="GET" data-path="admin/users/{user}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETadmin-users--user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETadmin-users--user-" onclick="tryItOut('GETadmin-users--user-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETadmin-users--user-" onclick="cancelTryOut('GETadmin-users--user-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETadmin-users--user-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>admin/users/{user}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user" data-endpoint="GETadmin-users--user-" data-component="url" required  hidden>
<br>
</p>
</form>


## Show the form for editing the specified resource.




> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/admin/users/delectus/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/admin/users/delectus/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (404):

```json
{
    "message": "No query results for model [App\\Models\\User] delectus",
    "exception": "Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException",
    "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Exceptions\/Handler.php",
    "line": 365,
    "trace": [
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Exceptions\/Handler.php",
            "line": 314,
            "function": "prepareException",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/nunomaduro\/collision\/src\/Adapters\/Laravel\/ExceptionHandler.php",
            "line": 54,
            "function": "render",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 51,
            "function": "render",
            "class": "NunoMaduro\\Collision\\Adapters\\Laravel\\ExceptionHandler",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 172,
            "function": "handleException",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/VerifyCsrfToken.php",
            "line": 78,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Middleware\/ShareErrorsFromSession.php",
            "line": 49,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\View\\Middleware\\ShareErrorsFromSession",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Session\/Middleware\/StartSession.php",
            "line": 121,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Session\/Middleware\/StartSession.php",
            "line": 63,
            "function": "handleStatefulRequest",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/AddQueuedCookiesToResponse.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/EncryptCookies.php",
            "line": 67,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\EncryptCookies",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 694,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 669,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 635,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 624,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 166,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/PreventRequestsDuringMaintenance.php",
            "line": 86,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/fruitcake\/laravel-cors\/src\/HandleCors.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fruitcake\\Cors\\HandleCors",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/fideloper\/proxy\/src\/TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 141,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 110,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 324,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 305,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 236,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 172,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 127,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 119,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 36,
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Util.php",
            "line": 40,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 93,
            "function": "unwrapIfClosure",
            "class": "Illuminate\\Container\\Util",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 37,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 610,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 136,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Command\/Command.php",
            "line": 255,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Application.php",
            "line": 971,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Application.php",
            "line": 290,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Application.php",
            "line": 166,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php",
            "line": 93,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```
<div id="execution-results-GETadmin-users--user--edit" hidden>
    <blockquote>Received response<span id="execution-response-status-GETadmin-users--user--edit"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-users--user--edit"></code></pre>
</div>
<div id="execution-error-GETadmin-users--user--edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-users--user--edit"></code></pre>
</div>
<form id="form-GETadmin-users--user--edit" data-method="GET" data-path="admin/users/{user}/edit" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETadmin-users--user--edit', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETadmin-users--user--edit" onclick="tryItOut('GETadmin-users--user--edit');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETadmin-users--user--edit" onclick="cancelTryOut('GETadmin-users--user--edit');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETadmin-users--user--edit" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>admin/users/{user}/edit</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user" data-endpoint="GETadmin-users--user--edit" data-component="url" required  hidden>
<br>
</p>
</form>


## Update the specified resource in storage.




> Example request:

```bash
curl -X PUT \
    "http://food_clearance.test/admin/users/adipisci" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/admin/users/adipisci"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response => response.json());
```


<div id="execution-results-PUTadmin-users--user-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTadmin-users--user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTadmin-users--user-"></code></pre>
</div>
<div id="execution-error-PUTadmin-users--user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTadmin-users--user-"></code></pre>
</div>
<form id="form-PUTadmin-users--user-" data-method="PUT" data-path="admin/users/{user}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTadmin-users--user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTadmin-users--user-" onclick="tryItOut('PUTadmin-users--user-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTadmin-users--user-" onclick="cancelTryOut('PUTadmin-users--user-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTadmin-users--user-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>admin/users/{user}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>admin/users/{user}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user" data-endpoint="PUTadmin-users--user-" data-component="url" required  hidden>
<br>
</p>
</form>


## Remove the specified resource from storage.




> Example request:

```bash
curl -X DELETE \
    "http://food_clearance.test/admin/users/dolorum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/admin/users/dolorum"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response => response.json());
```


<div id="execution-results-DELETEadmin-users--user-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEadmin-users--user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEadmin-users--user-"></code></pre>
</div>
<div id="execution-error-DELETEadmin-users--user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEadmin-users--user-"></code></pre>
</div>
<form id="form-DELETEadmin-users--user-" data-method="DELETE" data-path="admin/users/{user}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEadmin-users--user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEadmin-users--user-" onclick="tryItOut('DELETEadmin-users--user-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEadmin-users--user-" onclick="cancelTryOut('DELETEadmin-users--user-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEadmin-users--user-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>admin/users/{user}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user" data-endpoint="DELETEadmin-users--user-" data-component="url" required  hidden>
<br>
</p>
</form>


## Display a listing of the resource.




> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/admin/foods" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/admin/foods"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://food_clearance.test'" />

        <title>Redirecting to http://food_clearance.test</title>
    </head>
    <body>
        Redirecting to <a href="http://food_clearance.test">http://food_clearance.test</a>.
    </body>
</html>
```
<div id="execution-results-GETadmin-foods" hidden>
    <blockquote>Received response<span id="execution-response-status-GETadmin-foods"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-foods"></code></pre>
</div>
<div id="execution-error-GETadmin-foods" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-foods"></code></pre>
</div>
<form id="form-GETadmin-foods" data-method="GET" data-path="admin/foods" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETadmin-foods', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETadmin-foods" onclick="tryItOut('GETadmin-foods');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETadmin-foods" onclick="cancelTryOut('GETadmin-foods');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETadmin-foods" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>admin/foods</code></b>
</p>
</form>


## Show the form for creating a new resource.




> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/admin/foods/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/admin/foods/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://food_clearance.test'" />

        <title>Redirecting to http://food_clearance.test</title>
    </head>
    <body>
        Redirecting to <a href="http://food_clearance.test">http://food_clearance.test</a>.
    </body>
</html>
```
<div id="execution-results-GETadmin-foods-create" hidden>
    <blockquote>Received response<span id="execution-response-status-GETadmin-foods-create"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-foods-create"></code></pre>
</div>
<div id="execution-error-GETadmin-foods-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-foods-create"></code></pre>
</div>
<form id="form-GETadmin-foods-create" data-method="GET" data-path="admin/foods/create" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETadmin-foods-create', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETadmin-foods-create" onclick="tryItOut('GETadmin-foods-create');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETadmin-foods-create" onclick="cancelTryOut('GETadmin-foods-create');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETadmin-foods-create" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>admin/foods/create</code></b>
</p>
</form>


## Store a newly created resource in storage.




> Example request:

```bash
curl -X POST \
    "http://food_clearance.test/admin/foods" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/admin/foods"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTadmin-foods" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTadmin-foods"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTadmin-foods"></code></pre>
</div>
<div id="execution-error-POSTadmin-foods" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTadmin-foods"></code></pre>
</div>
<form id="form-POSTadmin-foods" data-method="POST" data-path="admin/foods" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTadmin-foods', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTadmin-foods" onclick="tryItOut('POSTadmin-foods');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTadmin-foods" onclick="cancelTryOut('POSTadmin-foods');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTadmin-foods" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>admin/foods</code></b>
</p>
</form>


## Display the specified resource.




> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/admin/foods/dolor" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/admin/foods/dolor"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (404):

```json
{
    "message": "No query results for model [App\\Models\\Food] dolor",
    "exception": "Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException",
    "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Exceptions\/Handler.php",
    "line": 365,
    "trace": [
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Exceptions\/Handler.php",
            "line": 314,
            "function": "prepareException",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/nunomaduro\/collision\/src\/Adapters\/Laravel\/ExceptionHandler.php",
            "line": 54,
            "function": "render",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 51,
            "function": "render",
            "class": "NunoMaduro\\Collision\\Adapters\\Laravel\\ExceptionHandler",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 172,
            "function": "handleException",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/VerifyCsrfToken.php",
            "line": 78,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Middleware\/ShareErrorsFromSession.php",
            "line": 49,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\View\\Middleware\\ShareErrorsFromSession",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Session\/Middleware\/StartSession.php",
            "line": 121,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Session\/Middleware\/StartSession.php",
            "line": 63,
            "function": "handleStatefulRequest",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/AddQueuedCookiesToResponse.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/EncryptCookies.php",
            "line": 67,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\EncryptCookies",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 694,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 669,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 635,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 624,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 166,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/PreventRequestsDuringMaintenance.php",
            "line": 86,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/fruitcake\/laravel-cors\/src\/HandleCors.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fruitcake\\Cors\\HandleCors",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/fideloper\/proxy\/src\/TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 141,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 110,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 324,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 305,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 236,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 172,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 127,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 119,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 36,
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Util.php",
            "line": 40,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 93,
            "function": "unwrapIfClosure",
            "class": "Illuminate\\Container\\Util",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 37,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 610,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 136,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Command\/Command.php",
            "line": 255,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Application.php",
            "line": 971,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Application.php",
            "line": 290,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Application.php",
            "line": 166,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php",
            "line": 93,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```
<div id="execution-results-GETadmin-foods--food-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETadmin-foods--food-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-foods--food-"></code></pre>
</div>
<div id="execution-error-GETadmin-foods--food-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-foods--food-"></code></pre>
</div>
<form id="form-GETadmin-foods--food-" data-method="GET" data-path="admin/foods/{food}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETadmin-foods--food-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETadmin-foods--food-" onclick="tryItOut('GETadmin-foods--food-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETadmin-foods--food-" onclick="cancelTryOut('GETadmin-foods--food-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETadmin-foods--food-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>admin/foods/{food}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>food</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="food" data-endpoint="GETadmin-foods--food-" data-component="url" required  hidden>
<br>
</p>
</form>


## Show the form for editing the specified resource.




> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/admin/foods/aspernatur/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/admin/foods/aspernatur/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (404):

```json
{
    "message": "No query results for model [App\\Models\\Food] aspernatur",
    "exception": "Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException",
    "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Exceptions\/Handler.php",
    "line": 365,
    "trace": [
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Exceptions\/Handler.php",
            "line": 314,
            "function": "prepareException",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/nunomaduro\/collision\/src\/Adapters\/Laravel\/ExceptionHandler.php",
            "line": 54,
            "function": "render",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 51,
            "function": "render",
            "class": "NunoMaduro\\Collision\\Adapters\\Laravel\\ExceptionHandler",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 172,
            "function": "handleException",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/VerifyCsrfToken.php",
            "line": 78,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Middleware\/ShareErrorsFromSession.php",
            "line": 49,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\View\\Middleware\\ShareErrorsFromSession",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Session\/Middleware\/StartSession.php",
            "line": 121,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Session\/Middleware\/StartSession.php",
            "line": 63,
            "function": "handleStatefulRequest",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/AddQueuedCookiesToResponse.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/EncryptCookies.php",
            "line": 67,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\EncryptCookies",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 694,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 669,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 635,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 624,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 166,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/PreventRequestsDuringMaintenance.php",
            "line": 86,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/fruitcake\/laravel-cors\/src\/HandleCors.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fruitcake\\Cors\\HandleCors",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/fideloper\/proxy\/src\/TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 141,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 110,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 324,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 305,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 236,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 172,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 127,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 119,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 36,
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Util.php",
            "line": 40,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 93,
            "function": "unwrapIfClosure",
            "class": "Illuminate\\Container\\Util",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 37,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 610,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 136,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Command\/Command.php",
            "line": 255,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Application.php",
            "line": 971,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Application.php",
            "line": 290,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Application.php",
            "line": 166,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php",
            "line": 93,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```
<div id="execution-results-GETadmin-foods--food--edit" hidden>
    <blockquote>Received response<span id="execution-response-status-GETadmin-foods--food--edit"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-foods--food--edit"></code></pre>
</div>
<div id="execution-error-GETadmin-foods--food--edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-foods--food--edit"></code></pre>
</div>
<form id="form-GETadmin-foods--food--edit" data-method="GET" data-path="admin/foods/{food}/edit" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETadmin-foods--food--edit', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETadmin-foods--food--edit" onclick="tryItOut('GETadmin-foods--food--edit');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETadmin-foods--food--edit" onclick="cancelTryOut('GETadmin-foods--food--edit');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETadmin-foods--food--edit" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>admin/foods/{food}/edit</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>food</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="food" data-endpoint="GETadmin-foods--food--edit" data-component="url" required  hidden>
<br>
</p>
</form>


## Update the specified resource in storage.




> Example request:

```bash
curl -X PUT \
    "http://food_clearance.test/admin/foods/dolores" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/admin/foods/dolores"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response => response.json());
```


<div id="execution-results-PUTadmin-foods--food-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTadmin-foods--food-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTadmin-foods--food-"></code></pre>
</div>
<div id="execution-error-PUTadmin-foods--food-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTadmin-foods--food-"></code></pre>
</div>
<form id="form-PUTadmin-foods--food-" data-method="PUT" data-path="admin/foods/{food}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTadmin-foods--food-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTadmin-foods--food-" onclick="tryItOut('PUTadmin-foods--food-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTadmin-foods--food-" onclick="cancelTryOut('PUTadmin-foods--food-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTadmin-foods--food-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>admin/foods/{food}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>admin/foods/{food}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>food</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="food" data-endpoint="PUTadmin-foods--food-" data-component="url" required  hidden>
<br>
</p>
</form>


## Remove the specified resource from storage.




> Example request:

```bash
curl -X DELETE \
    "http://food_clearance.test/admin/foods/exercitationem" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/admin/foods/exercitationem"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response => response.json());
```


<div id="execution-results-DELETEadmin-foods--food-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEadmin-foods--food-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEadmin-foods--food-"></code></pre>
</div>
<div id="execution-error-DELETEadmin-foods--food-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEadmin-foods--food-"></code></pre>
</div>
<form id="form-DELETEadmin-foods--food-" data-method="DELETE" data-path="admin/foods/{food}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEadmin-foods--food-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEadmin-foods--food-" onclick="tryItOut('DELETEadmin-foods--food-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEadmin-foods--food-" onclick="cancelTryOut('DELETEadmin-foods--food-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEadmin-foods--food-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>admin/foods/{food}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>food</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="food" data-endpoint="DELETEadmin-foods--food-" data-component="url" required  hidden>
<br>
</p>
</form>


## Display a listing of the resource.




> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/admin/companies" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/admin/companies"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://food_clearance.test'" />

        <title>Redirecting to http://food_clearance.test</title>
    </head>
    <body>
        Redirecting to <a href="http://food_clearance.test">http://food_clearance.test</a>.
    </body>
</html>
```
<div id="execution-results-GETadmin-companies" hidden>
    <blockquote>Received response<span id="execution-response-status-GETadmin-companies"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-companies"></code></pre>
</div>
<div id="execution-error-GETadmin-companies" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-companies"></code></pre>
</div>
<form id="form-GETadmin-companies" data-method="GET" data-path="admin/companies" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETadmin-companies', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETadmin-companies" onclick="tryItOut('GETadmin-companies');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETadmin-companies" onclick="cancelTryOut('GETadmin-companies');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETadmin-companies" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>admin/companies</code></b>
</p>
</form>


## Show the form for creating a new resource.




> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/admin/companies/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/admin/companies/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://food_clearance.test'" />

        <title>Redirecting to http://food_clearance.test</title>
    </head>
    <body>
        Redirecting to <a href="http://food_clearance.test">http://food_clearance.test</a>.
    </body>
</html>
```
<div id="execution-results-GETadmin-companies-create" hidden>
    <blockquote>Received response<span id="execution-response-status-GETadmin-companies-create"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-companies-create"></code></pre>
</div>
<div id="execution-error-GETadmin-companies-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-companies-create"></code></pre>
</div>
<form id="form-GETadmin-companies-create" data-method="GET" data-path="admin/companies/create" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETadmin-companies-create', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETadmin-companies-create" onclick="tryItOut('GETadmin-companies-create');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETadmin-companies-create" onclick="cancelTryOut('GETadmin-companies-create');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETadmin-companies-create" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>admin/companies/create</code></b>
</p>
</form>


## Store a newly created resource in storage.




> Example request:

```bash
curl -X POST \
    "http://food_clearance.test/admin/companies" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/admin/companies"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTadmin-companies" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTadmin-companies"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTadmin-companies"></code></pre>
</div>
<div id="execution-error-POSTadmin-companies" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTadmin-companies"></code></pre>
</div>
<form id="form-POSTadmin-companies" data-method="POST" data-path="admin/companies" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTadmin-companies', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTadmin-companies" onclick="tryItOut('POSTadmin-companies');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTadmin-companies" onclick="cancelTryOut('POSTadmin-companies');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTadmin-companies" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>admin/companies</code></b>
</p>
</form>


## Display the specified resource.




> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/admin/companies/quisquam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/admin/companies/quisquam"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (404):

```json
{
    "message": "No query results for model [App\\Models\\Company] quisquam",
    "exception": "Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException",
    "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Exceptions\/Handler.php",
    "line": 365,
    "trace": [
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Exceptions\/Handler.php",
            "line": 314,
            "function": "prepareException",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/nunomaduro\/collision\/src\/Adapters\/Laravel\/ExceptionHandler.php",
            "line": 54,
            "function": "render",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 51,
            "function": "render",
            "class": "NunoMaduro\\Collision\\Adapters\\Laravel\\ExceptionHandler",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 172,
            "function": "handleException",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/VerifyCsrfToken.php",
            "line": 78,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Middleware\/ShareErrorsFromSession.php",
            "line": 49,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\View\\Middleware\\ShareErrorsFromSession",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Session\/Middleware\/StartSession.php",
            "line": 121,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Session\/Middleware\/StartSession.php",
            "line": 63,
            "function": "handleStatefulRequest",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/AddQueuedCookiesToResponse.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/EncryptCookies.php",
            "line": 67,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\EncryptCookies",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 694,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 669,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 635,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 624,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 166,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/PreventRequestsDuringMaintenance.php",
            "line": 86,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/fruitcake\/laravel-cors\/src\/HandleCors.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fruitcake\\Cors\\HandleCors",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/fideloper\/proxy\/src\/TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 141,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 110,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 324,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 305,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 236,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 172,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 127,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 119,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 36,
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Util.php",
            "line": 40,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 93,
            "function": "unwrapIfClosure",
            "class": "Illuminate\\Container\\Util",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 37,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 610,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 136,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Command\/Command.php",
            "line": 255,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Application.php",
            "line": 971,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Application.php",
            "line": 290,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Application.php",
            "line": 166,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php",
            "line": 93,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```
<div id="execution-results-GETadmin-companies--company-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETadmin-companies--company-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-companies--company-"></code></pre>
</div>
<div id="execution-error-GETadmin-companies--company-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-companies--company-"></code></pre>
</div>
<form id="form-GETadmin-companies--company-" data-method="GET" data-path="admin/companies/{company}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETadmin-companies--company-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETadmin-companies--company-" onclick="tryItOut('GETadmin-companies--company-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETadmin-companies--company-" onclick="cancelTryOut('GETadmin-companies--company-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETadmin-companies--company-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>admin/companies/{company}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>company</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company" data-endpoint="GETadmin-companies--company-" data-component="url" required  hidden>
<br>
</p>
</form>


## Show the form for editing the specified resource.




> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/admin/companies/dicta/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/admin/companies/dicta/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (404):

```json
{
    "message": "No query results for model [App\\Models\\Company] dicta",
    "exception": "Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException",
    "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Exceptions\/Handler.php",
    "line": 365,
    "trace": [
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Exceptions\/Handler.php",
            "line": 314,
            "function": "prepareException",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/nunomaduro\/collision\/src\/Adapters\/Laravel\/ExceptionHandler.php",
            "line": 54,
            "function": "render",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 51,
            "function": "render",
            "class": "NunoMaduro\\Collision\\Adapters\\Laravel\\ExceptionHandler",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 172,
            "function": "handleException",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/VerifyCsrfToken.php",
            "line": 78,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Middleware\/ShareErrorsFromSession.php",
            "line": 49,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\View\\Middleware\\ShareErrorsFromSession",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Session\/Middleware\/StartSession.php",
            "line": 121,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Session\/Middleware\/StartSession.php",
            "line": 63,
            "function": "handleStatefulRequest",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/AddQueuedCookiesToResponse.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/EncryptCookies.php",
            "line": 67,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\EncryptCookies",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 694,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 669,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 635,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 624,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 166,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/PreventRequestsDuringMaintenance.php",
            "line": 86,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/fruitcake\/laravel-cors\/src\/HandleCors.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fruitcake\\Cors\\HandleCors",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/fideloper\/proxy\/src\/TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 141,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 110,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 324,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 305,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 236,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 172,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 127,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 119,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 36,
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Util.php",
            "line": 40,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 93,
            "function": "unwrapIfClosure",
            "class": "Illuminate\\Container\\Util",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 37,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 610,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 136,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Command\/Command.php",
            "line": 255,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Application.php",
            "line": 971,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Application.php",
            "line": 290,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Application.php",
            "line": 166,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php",
            "line": 93,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```
<div id="execution-results-GETadmin-companies--company--edit" hidden>
    <blockquote>Received response<span id="execution-response-status-GETadmin-companies--company--edit"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-companies--company--edit"></code></pre>
</div>
<div id="execution-error-GETadmin-companies--company--edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-companies--company--edit"></code></pre>
</div>
<form id="form-GETadmin-companies--company--edit" data-method="GET" data-path="admin/companies/{company}/edit" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETadmin-companies--company--edit', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETadmin-companies--company--edit" onclick="tryItOut('GETadmin-companies--company--edit');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETadmin-companies--company--edit" onclick="cancelTryOut('GETadmin-companies--company--edit');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETadmin-companies--company--edit" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>admin/companies/{company}/edit</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>company</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company" data-endpoint="GETadmin-companies--company--edit" data-component="url" required  hidden>
<br>
</p>
</form>


## Update the specified resource in storage.




> Example request:

```bash
curl -X PUT \
    "http://food_clearance.test/admin/companies/nemo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/admin/companies/nemo"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response => response.json());
```


<div id="execution-results-PUTadmin-companies--company-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTadmin-companies--company-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTadmin-companies--company-"></code></pre>
</div>
<div id="execution-error-PUTadmin-companies--company-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTadmin-companies--company-"></code></pre>
</div>
<form id="form-PUTadmin-companies--company-" data-method="PUT" data-path="admin/companies/{company}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTadmin-companies--company-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTadmin-companies--company-" onclick="tryItOut('PUTadmin-companies--company-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTadmin-companies--company-" onclick="cancelTryOut('PUTadmin-companies--company-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTadmin-companies--company-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>admin/companies/{company}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>admin/companies/{company}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>company</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company" data-endpoint="PUTadmin-companies--company-" data-component="url" required  hidden>
<br>
</p>
</form>


## Remove the specified resource from storage.




> Example request:

```bash
curl -X DELETE \
    "http://food_clearance.test/admin/companies/voluptatum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/admin/companies/voluptatum"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response => response.json());
```


<div id="execution-results-DELETEadmin-companies--company-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEadmin-companies--company-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEadmin-companies--company-"></code></pre>
</div>
<div id="execution-error-DELETEadmin-companies--company-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEadmin-companies--company-"></code></pre>
</div>
<form id="form-DELETEadmin-companies--company-" data-method="DELETE" data-path="admin/companies/{company}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEadmin-companies--company-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEadmin-companies--company-" onclick="tryItOut('DELETEadmin-companies--company-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEadmin-companies--company-" onclick="cancelTryOut('DELETEadmin-companies--company-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEadmin-companies--company-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>admin/companies/{company}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>company</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company" data-endpoint="DELETEadmin-companies--company-" data-component="url" required  hidden>
<br>
</p>
</form>


## Display a listing of the resource.




> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/admin/transactions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/admin/transactions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://food_clearance.test'" />

        <title>Redirecting to http://food_clearance.test</title>
    </head>
    <body>
        Redirecting to <a href="http://food_clearance.test">http://food_clearance.test</a>.
    </body>
</html>
```
<div id="execution-results-GETadmin-transactions" hidden>
    <blockquote>Received response<span id="execution-response-status-GETadmin-transactions"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-transactions"></code></pre>
</div>
<div id="execution-error-GETadmin-transactions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-transactions"></code></pre>
</div>
<form id="form-GETadmin-transactions" data-method="GET" data-path="admin/transactions" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETadmin-transactions', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETadmin-transactions" onclick="tryItOut('GETadmin-transactions');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETadmin-transactions" onclick="cancelTryOut('GETadmin-transactions');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETadmin-transactions" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>admin/transactions</code></b>
</p>
</form>


## Remove the specified resource from storage.




> Example request:

```bash
curl -X DELETE \
    "http://food_clearance.test/admin/transactions/et" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/admin/transactions/et"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response => response.json());
```


<div id="execution-results-DELETEadmin-transactions--transaction-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEadmin-transactions--transaction-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEadmin-transactions--transaction-"></code></pre>
</div>
<div id="execution-error-DELETEadmin-transactions--transaction-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEadmin-transactions--transaction-"></code></pre>
</div>
<form id="form-DELETEadmin-transactions--transaction-" data-method="DELETE" data-path="admin/transactions/{transaction}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEadmin-transactions--transaction-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEadmin-transactions--transaction-" onclick="tryItOut('DELETEadmin-transactions--transaction-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEadmin-transactions--transaction-" onclick="cancelTryOut('DELETEadmin-transactions--transaction-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEadmin-transactions--transaction-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>admin/transactions/{transaction}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>transaction</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="transaction" data-endpoint="DELETEadmin-transactions--transaction-" data-component="url" required  hidden>
<br>
</p>
</form>


## Display a listing of the resource.




> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/admin/reports" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/admin/reports"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://food_clearance.test'" />

        <title>Redirecting to http://food_clearance.test</title>
    </head>
    <body>
        Redirecting to <a href="http://food_clearance.test">http://food_clearance.test</a>.
    </body>
</html>
```
<div id="execution-results-GETadmin-reports" hidden>
    <blockquote>Received response<span id="execution-response-status-GETadmin-reports"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-reports"></code></pre>
</div>
<div id="execution-error-GETadmin-reports" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-reports"></code></pre>
</div>
<form id="form-GETadmin-reports" data-method="GET" data-path="admin/reports" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETadmin-reports', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETadmin-reports" onclick="tryItOut('GETadmin-reports');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETadmin-reports" onclick="cancelTryOut('GETadmin-reports');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETadmin-reports" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>admin/reports</code></b>
</p>
</form>


## Remove the specified resource from storage.




> Example request:

```bash
curl -X DELETE \
    "http://food_clearance.test/admin/reports/sapiente" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/admin/reports/sapiente"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response => response.json());
```


<div id="execution-results-DELETEadmin-reports--report-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEadmin-reports--report-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEadmin-reports--report-"></code></pre>
</div>
<div id="execution-error-DELETEadmin-reports--report-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEadmin-reports--report-"></code></pre>
</div>
<form id="form-DELETEadmin-reports--report-" data-method="DELETE" data-path="admin/reports/{report}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEadmin-reports--report-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEadmin-reports--report-" onclick="tryItOut('DELETEadmin-reports--report-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEadmin-reports--report-" onclick="cancelTryOut('DELETEadmin-reports--report-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEadmin-reports--report-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>admin/reports/{report}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>report</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="report" data-endpoint="DELETEadmin-reports--report-" data-component="url" required  hidden>
<br>
</p>
</form>


## admin




> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/admin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/admin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://food_clearance.test'" />

        <title>Redirecting to http://food_clearance.test</title>
    </head>
    <body>
        Redirecting to <a href="http://food_clearance.test">http://food_clearance.test</a>.
    </body>
</html>
```
<div id="execution-results-GETadmin" hidden>
    <blockquote>Received response<span id="execution-response-status-GETadmin"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin"></code></pre>
</div>
<div id="execution-error-GETadmin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin"></code></pre>
</div>
<form id="form-GETadmin" data-method="GET" data-path="admin" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETadmin', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETadmin" onclick="tryItOut('GETadmin');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETadmin" onclick="cancelTryOut('GETadmin');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETadmin" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>admin</code></b>
</p>
</form>


## Display a listing of the resource.




> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/company/foods" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/company/foods"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://food_clearance.test'" />

        <title>Redirecting to http://food_clearance.test</title>
    </head>
    <body>
        Redirecting to <a href="http://food_clearance.test">http://food_clearance.test</a>.
    </body>
</html>
```
<div id="execution-results-GETcompany-foods" hidden>
    <blockquote>Received response<span id="execution-response-status-GETcompany-foods"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETcompany-foods"></code></pre>
</div>
<div id="execution-error-GETcompany-foods" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETcompany-foods"></code></pre>
</div>
<form id="form-GETcompany-foods" data-method="GET" data-path="company/foods" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETcompany-foods', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETcompany-foods" onclick="tryItOut('GETcompany-foods');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETcompany-foods" onclick="cancelTryOut('GETcompany-foods');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETcompany-foods" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>company/foods</code></b>
</p>
</form>


## Show the form for creating a new resource.




> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/company/foods/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/company/foods/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://food_clearance.test'" />

        <title>Redirecting to http://food_clearance.test</title>
    </head>
    <body>
        Redirecting to <a href="http://food_clearance.test">http://food_clearance.test</a>.
    </body>
</html>
```
<div id="execution-results-GETcompany-foods-create" hidden>
    <blockquote>Received response<span id="execution-response-status-GETcompany-foods-create"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETcompany-foods-create"></code></pre>
</div>
<div id="execution-error-GETcompany-foods-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETcompany-foods-create"></code></pre>
</div>
<form id="form-GETcompany-foods-create" data-method="GET" data-path="company/foods/create" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETcompany-foods-create', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETcompany-foods-create" onclick="tryItOut('GETcompany-foods-create');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETcompany-foods-create" onclick="cancelTryOut('GETcompany-foods-create');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETcompany-foods-create" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>company/foods/create</code></b>
</p>
</form>


## Store a newly created resource in storage.




> Example request:

```bash
curl -X POST \
    "http://food_clearance.test/company/foods" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/company/foods"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTcompany-foods" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTcompany-foods"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTcompany-foods"></code></pre>
</div>
<div id="execution-error-POSTcompany-foods" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTcompany-foods"></code></pre>
</div>
<form id="form-POSTcompany-foods" data-method="POST" data-path="company/foods" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTcompany-foods', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTcompany-foods" onclick="tryItOut('POSTcompany-foods');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTcompany-foods" onclick="cancelTryOut('POSTcompany-foods');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTcompany-foods" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>company/foods</code></b>
</p>
</form>


## Display the specified resource.




> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/company/foods/aut" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/company/foods/aut"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (404):

```json
{
    "message": "No query results for model [App\\Models\\Food] aut",
    "exception": "Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException",
    "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Exceptions\/Handler.php",
    "line": 365,
    "trace": [
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Exceptions\/Handler.php",
            "line": 314,
            "function": "prepareException",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/nunomaduro\/collision\/src\/Adapters\/Laravel\/ExceptionHandler.php",
            "line": 54,
            "function": "render",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 51,
            "function": "render",
            "class": "NunoMaduro\\Collision\\Adapters\\Laravel\\ExceptionHandler",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 172,
            "function": "handleException",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/VerifyCsrfToken.php",
            "line": 78,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Middleware\/ShareErrorsFromSession.php",
            "line": 49,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\View\\Middleware\\ShareErrorsFromSession",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Session\/Middleware\/StartSession.php",
            "line": 121,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Session\/Middleware\/StartSession.php",
            "line": 63,
            "function": "handleStatefulRequest",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/AddQueuedCookiesToResponse.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/EncryptCookies.php",
            "line": 67,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\EncryptCookies",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 694,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 669,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 635,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 624,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 166,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/PreventRequestsDuringMaintenance.php",
            "line": 86,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/fruitcake\/laravel-cors\/src\/HandleCors.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fruitcake\\Cors\\HandleCors",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/fideloper\/proxy\/src\/TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 141,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 110,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 324,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 305,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 236,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 172,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 127,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 119,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 36,
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Util.php",
            "line": 40,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 93,
            "function": "unwrapIfClosure",
            "class": "Illuminate\\Container\\Util",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 37,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 610,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 136,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Command\/Command.php",
            "line": 255,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Application.php",
            "line": 971,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Application.php",
            "line": 290,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Application.php",
            "line": 166,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php",
            "line": 93,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```
<div id="execution-results-GETcompany-foods--food-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETcompany-foods--food-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETcompany-foods--food-"></code></pre>
</div>
<div id="execution-error-GETcompany-foods--food-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETcompany-foods--food-"></code></pre>
</div>
<form id="form-GETcompany-foods--food-" data-method="GET" data-path="company/foods/{food}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETcompany-foods--food-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETcompany-foods--food-" onclick="tryItOut('GETcompany-foods--food-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETcompany-foods--food-" onclick="cancelTryOut('GETcompany-foods--food-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETcompany-foods--food-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>company/foods/{food}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>food</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="food" data-endpoint="GETcompany-foods--food-" data-component="url" required  hidden>
<br>
</p>
</form>


## Show the form for editing the specified resource.




> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/company/foods/harum/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/company/foods/harum/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (404):

```json
{
    "message": "No query results for model [App\\Models\\Food] harum",
    "exception": "Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException",
    "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Exceptions\/Handler.php",
    "line": 365,
    "trace": [
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Exceptions\/Handler.php",
            "line": 314,
            "function": "prepareException",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/nunomaduro\/collision\/src\/Adapters\/Laravel\/ExceptionHandler.php",
            "line": 54,
            "function": "render",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 51,
            "function": "render",
            "class": "NunoMaduro\\Collision\\Adapters\\Laravel\\ExceptionHandler",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 172,
            "function": "handleException",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/VerifyCsrfToken.php",
            "line": 78,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Middleware\/ShareErrorsFromSession.php",
            "line": 49,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\View\\Middleware\\ShareErrorsFromSession",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Session\/Middleware\/StartSession.php",
            "line": 121,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Session\/Middleware\/StartSession.php",
            "line": 63,
            "function": "handleStatefulRequest",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/AddQueuedCookiesToResponse.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/EncryptCookies.php",
            "line": 67,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\EncryptCookies",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 694,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 669,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 635,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 624,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 166,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/PreventRequestsDuringMaintenance.php",
            "line": 86,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/fruitcake\/laravel-cors\/src\/HandleCors.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fruitcake\\Cors\\HandleCors",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/fideloper\/proxy\/src\/TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 141,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 110,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 324,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 305,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 236,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 172,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 127,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 119,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 36,
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Util.php",
            "line": 40,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 93,
            "function": "unwrapIfClosure",
            "class": "Illuminate\\Container\\Util",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 37,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 610,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 136,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Command\/Command.php",
            "line": 255,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Application.php",
            "line": 971,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Application.php",
            "line": 290,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Application.php",
            "line": 166,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php",
            "line": 93,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```
<div id="execution-results-GETcompany-foods--food--edit" hidden>
    <blockquote>Received response<span id="execution-response-status-GETcompany-foods--food--edit"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETcompany-foods--food--edit"></code></pre>
</div>
<div id="execution-error-GETcompany-foods--food--edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETcompany-foods--food--edit"></code></pre>
</div>
<form id="form-GETcompany-foods--food--edit" data-method="GET" data-path="company/foods/{food}/edit" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETcompany-foods--food--edit', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETcompany-foods--food--edit" onclick="tryItOut('GETcompany-foods--food--edit');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETcompany-foods--food--edit" onclick="cancelTryOut('GETcompany-foods--food--edit');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETcompany-foods--food--edit" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>company/foods/{food}/edit</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>food</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="food" data-endpoint="GETcompany-foods--food--edit" data-component="url" required  hidden>
<br>
</p>
</form>


## Update the specified resource in storage.




> Example request:

```bash
curl -X PUT \
    "http://food_clearance.test/company/foods/sed" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/company/foods/sed"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response => response.json());
```


<div id="execution-results-PUTcompany-foods--food-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTcompany-foods--food-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTcompany-foods--food-"></code></pre>
</div>
<div id="execution-error-PUTcompany-foods--food-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTcompany-foods--food-"></code></pre>
</div>
<form id="form-PUTcompany-foods--food-" data-method="PUT" data-path="company/foods/{food}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTcompany-foods--food-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTcompany-foods--food-" onclick="tryItOut('PUTcompany-foods--food-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTcompany-foods--food-" onclick="cancelTryOut('PUTcompany-foods--food-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTcompany-foods--food-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>company/foods/{food}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>company/foods/{food}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>food</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="food" data-endpoint="PUTcompany-foods--food-" data-component="url" required  hidden>
<br>
</p>
</form>


## Remove the specified resource from storage.




> Example request:

```bash
curl -X DELETE \
    "http://food_clearance.test/company/foods/voluptas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/company/foods/voluptas"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response => response.json());
```


<div id="execution-results-DELETEcompany-foods--food-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEcompany-foods--food-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEcompany-foods--food-"></code></pre>
</div>
<div id="execution-error-DELETEcompany-foods--food-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEcompany-foods--food-"></code></pre>
</div>
<form id="form-DELETEcompany-foods--food-" data-method="DELETE" data-path="company/foods/{food}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEcompany-foods--food-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEcompany-foods--food-" onclick="tryItOut('DELETEcompany-foods--food-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEcompany-foods--food-" onclick="cancelTryOut('DELETEcompany-foods--food-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEcompany-foods--food-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>company/foods/{food}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>food</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="food" data-endpoint="DELETEcompany-foods--food-" data-component="url" required  hidden>
<br>
</p>
</form>


## Display a listing of the resource.




> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/company/companies" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/company/companies"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://food_clearance.test'" />

        <title>Redirecting to http://food_clearance.test</title>
    </head>
    <body>
        Redirecting to <a href="http://food_clearance.test">http://food_clearance.test</a>.
    </body>
</html>
```
<div id="execution-results-GETcompany-companies" hidden>
    <blockquote>Received response<span id="execution-response-status-GETcompany-companies"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETcompany-companies"></code></pre>
</div>
<div id="execution-error-GETcompany-companies" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETcompany-companies"></code></pre>
</div>
<form id="form-GETcompany-companies" data-method="GET" data-path="company/companies" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETcompany-companies', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETcompany-companies" onclick="tryItOut('GETcompany-companies');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETcompany-companies" onclick="cancelTryOut('GETcompany-companies');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETcompany-companies" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>company/companies</code></b>
</p>
</form>


## Show the form for creating a new resource.




> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/company/companies/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/company/companies/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://food_clearance.test'" />

        <title>Redirecting to http://food_clearance.test</title>
    </head>
    <body>
        Redirecting to <a href="http://food_clearance.test">http://food_clearance.test</a>.
    </body>
</html>
```
<div id="execution-results-GETcompany-companies-create" hidden>
    <blockquote>Received response<span id="execution-response-status-GETcompany-companies-create"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETcompany-companies-create"></code></pre>
</div>
<div id="execution-error-GETcompany-companies-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETcompany-companies-create"></code></pre>
</div>
<form id="form-GETcompany-companies-create" data-method="GET" data-path="company/companies/create" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETcompany-companies-create', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETcompany-companies-create" onclick="tryItOut('GETcompany-companies-create');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETcompany-companies-create" onclick="cancelTryOut('GETcompany-companies-create');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETcompany-companies-create" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>company/companies/create</code></b>
</p>
</form>


## Store a newly created resource in storage.




> Example request:

```bash
curl -X POST \
    "http://food_clearance.test/company/companies" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/company/companies"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTcompany-companies" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTcompany-companies"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTcompany-companies"></code></pre>
</div>
<div id="execution-error-POSTcompany-companies" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTcompany-companies"></code></pre>
</div>
<form id="form-POSTcompany-companies" data-method="POST" data-path="company/companies" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTcompany-companies', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTcompany-companies" onclick="tryItOut('POSTcompany-companies');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTcompany-companies" onclick="cancelTryOut('POSTcompany-companies');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTcompany-companies" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>company/companies</code></b>
</p>
</form>


## Display the specified resource.




> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/company/companies/iusto" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/company/companies/iusto"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (404):

```json
{
    "message": "No query results for model [App\\Models\\Company] iusto",
    "exception": "Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException",
    "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Exceptions\/Handler.php",
    "line": 365,
    "trace": [
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Exceptions\/Handler.php",
            "line": 314,
            "function": "prepareException",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/nunomaduro\/collision\/src\/Adapters\/Laravel\/ExceptionHandler.php",
            "line": 54,
            "function": "render",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 51,
            "function": "render",
            "class": "NunoMaduro\\Collision\\Adapters\\Laravel\\ExceptionHandler",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 172,
            "function": "handleException",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/VerifyCsrfToken.php",
            "line": 78,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Middleware\/ShareErrorsFromSession.php",
            "line": 49,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\View\\Middleware\\ShareErrorsFromSession",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Session\/Middleware\/StartSession.php",
            "line": 121,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Session\/Middleware\/StartSession.php",
            "line": 63,
            "function": "handleStatefulRequest",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/AddQueuedCookiesToResponse.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/EncryptCookies.php",
            "line": 67,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\EncryptCookies",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 694,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 669,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 635,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 624,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 166,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/PreventRequestsDuringMaintenance.php",
            "line": 86,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/fruitcake\/laravel-cors\/src\/HandleCors.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fruitcake\\Cors\\HandleCors",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/fideloper\/proxy\/src\/TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 141,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 110,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 324,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 305,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 236,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 172,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 127,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 119,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 36,
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Util.php",
            "line": 40,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 93,
            "function": "unwrapIfClosure",
            "class": "Illuminate\\Container\\Util",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 37,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 610,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 136,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Command\/Command.php",
            "line": 255,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Application.php",
            "line": 971,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Application.php",
            "line": 290,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Application.php",
            "line": 166,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php",
            "line": 93,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```
<div id="execution-results-GETcompany-companies--company-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETcompany-companies--company-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETcompany-companies--company-"></code></pre>
</div>
<div id="execution-error-GETcompany-companies--company-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETcompany-companies--company-"></code></pre>
</div>
<form id="form-GETcompany-companies--company-" data-method="GET" data-path="company/companies/{company}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETcompany-companies--company-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETcompany-companies--company-" onclick="tryItOut('GETcompany-companies--company-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETcompany-companies--company-" onclick="cancelTryOut('GETcompany-companies--company-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETcompany-companies--company-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>company/companies/{company}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>company</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company" data-endpoint="GETcompany-companies--company-" data-component="url" required  hidden>
<br>
</p>
</form>


## Show the form for editing the specified resource.




> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/company/companies/atque/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/company/companies/atque/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (404):

```json
{
    "message": "No query results for model [App\\Models\\Company] atque",
    "exception": "Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException",
    "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Exceptions\/Handler.php",
    "line": 365,
    "trace": [
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Exceptions\/Handler.php",
            "line": 314,
            "function": "prepareException",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/nunomaduro\/collision\/src\/Adapters\/Laravel\/ExceptionHandler.php",
            "line": 54,
            "function": "render",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 51,
            "function": "render",
            "class": "NunoMaduro\\Collision\\Adapters\\Laravel\\ExceptionHandler",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 172,
            "function": "handleException",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/VerifyCsrfToken.php",
            "line": 78,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Middleware\/ShareErrorsFromSession.php",
            "line": 49,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\View\\Middleware\\ShareErrorsFromSession",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Session\/Middleware\/StartSession.php",
            "line": 121,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Session\/Middleware\/StartSession.php",
            "line": 63,
            "function": "handleStatefulRequest",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/AddQueuedCookiesToResponse.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/EncryptCookies.php",
            "line": 67,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\EncryptCookies",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 694,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 669,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 635,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 624,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 166,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/PreventRequestsDuringMaintenance.php",
            "line": 86,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/fruitcake\/laravel-cors\/src\/HandleCors.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fruitcake\\Cors\\HandleCors",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/fideloper\/proxy\/src\/TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 141,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 110,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 324,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 305,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 236,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 172,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 127,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 119,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 36,
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Util.php",
            "line": 40,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 93,
            "function": "unwrapIfClosure",
            "class": "Illuminate\\Container\\Util",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 37,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 610,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 136,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Command\/Command.php",
            "line": 255,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Application.php",
            "line": 971,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Application.php",
            "line": 290,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/symfony\/console\/Application.php",
            "line": 166,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php",
            "line": 93,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/Users\/nahiyanalamgir\/code\/food-clearance-original\/artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```
<div id="execution-results-GETcompany-companies--company--edit" hidden>
    <blockquote>Received response<span id="execution-response-status-GETcompany-companies--company--edit"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETcompany-companies--company--edit"></code></pre>
</div>
<div id="execution-error-GETcompany-companies--company--edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETcompany-companies--company--edit"></code></pre>
</div>
<form id="form-GETcompany-companies--company--edit" data-method="GET" data-path="company/companies/{company}/edit" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETcompany-companies--company--edit', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETcompany-companies--company--edit" onclick="tryItOut('GETcompany-companies--company--edit');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETcompany-companies--company--edit" onclick="cancelTryOut('GETcompany-companies--company--edit');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETcompany-companies--company--edit" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>company/companies/{company}/edit</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>company</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company" data-endpoint="GETcompany-companies--company--edit" data-component="url" required  hidden>
<br>
</p>
</form>


## Update the specified resource in storage.




> Example request:

```bash
curl -X PUT \
    "http://food_clearance.test/company/companies/sapiente" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/company/companies/sapiente"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response => response.json());
```


<div id="execution-results-PUTcompany-companies--company-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTcompany-companies--company-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTcompany-companies--company-"></code></pre>
</div>
<div id="execution-error-PUTcompany-companies--company-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTcompany-companies--company-"></code></pre>
</div>
<form id="form-PUTcompany-companies--company-" data-method="PUT" data-path="company/companies/{company}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTcompany-companies--company-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTcompany-companies--company-" onclick="tryItOut('PUTcompany-companies--company-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTcompany-companies--company-" onclick="cancelTryOut('PUTcompany-companies--company-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTcompany-companies--company-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>company/companies/{company}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>company/companies/{company}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>company</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company" data-endpoint="PUTcompany-companies--company-" data-component="url" required  hidden>
<br>
</p>
</form>


## Remove the specified resource from storage.




> Example request:

```bash
curl -X DELETE \
    "http://food_clearance.test/company/companies/nihil" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/company/companies/nihil"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response => response.json());
```


<div id="execution-results-DELETEcompany-companies--company-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEcompany-companies--company-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEcompany-companies--company-"></code></pre>
</div>
<div id="execution-error-DELETEcompany-companies--company-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEcompany-companies--company-"></code></pre>
</div>
<form id="form-DELETEcompany-companies--company-" data-method="DELETE" data-path="company/companies/{company}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEcompany-companies--company-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEcompany-companies--company-" onclick="tryItOut('DELETEcompany-companies--company-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEcompany-companies--company-" onclick="cancelTryOut('DELETEcompany-companies--company-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEcompany-companies--company-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>company/companies/{company}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>company</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company" data-endpoint="DELETEcompany-companies--company-" data-component="url" required  hidden>
<br>
</p>
</form>


## Display a listing of the resource.




> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/company/transactions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/company/transactions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://food_clearance.test'" />

        <title>Redirecting to http://food_clearance.test</title>
    </head>
    <body>
        Redirecting to <a href="http://food_clearance.test">http://food_clearance.test</a>.
    </body>
</html>
```
<div id="execution-results-GETcompany-transactions" hidden>
    <blockquote>Received response<span id="execution-response-status-GETcompany-transactions"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETcompany-transactions"></code></pre>
</div>
<div id="execution-error-GETcompany-transactions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETcompany-transactions"></code></pre>
</div>
<form id="form-GETcompany-transactions" data-method="GET" data-path="company/transactions" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETcompany-transactions', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETcompany-transactions" onclick="tryItOut('GETcompany-transactions');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETcompany-transactions" onclick="cancelTryOut('GETcompany-transactions');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETcompany-transactions" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>company/transactions</code></b>
</p>
</form>


## Remove the specified resource from storage.




> Example request:

```bash
curl -X DELETE \
    "http://food_clearance.test/company/transactions/ea" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/company/transactions/ea"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response => response.json());
```


<div id="execution-results-DELETEcompany-transactions--transaction-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEcompany-transactions--transaction-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEcompany-transactions--transaction-"></code></pre>
</div>
<div id="execution-error-DELETEcompany-transactions--transaction-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEcompany-transactions--transaction-"></code></pre>
</div>
<form id="form-DELETEcompany-transactions--transaction-" data-method="DELETE" data-path="company/transactions/{transaction}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEcompany-transactions--transaction-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEcompany-transactions--transaction-" onclick="tryItOut('DELETEcompany-transactions--transaction-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEcompany-transactions--transaction-" onclick="cancelTryOut('DELETEcompany-transactions--transaction-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEcompany-transactions--transaction-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>company/transactions/{transaction}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>transaction</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="transaction" data-endpoint="DELETEcompany-transactions--transaction-" data-component="url" required  hidden>
<br>
</p>
</form>


## company




> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/company" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/company"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://food_clearance.test'" />

        <title>Redirecting to http://food_clearance.test</title>
    </head>
    <body>
        Redirecting to <a href="http://food_clearance.test">http://food_clearance.test</a>.
    </body>
</html>
```
<div id="execution-results-GETcompany" hidden>
    <blockquote>Received response<span id="execution-response-status-GETcompany"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETcompany"></code></pre>
</div>
<div id="execution-error-GETcompany" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETcompany"></code></pre>
</div>
<form id="form-GETcompany" data-method="GET" data-path="company" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETcompany', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETcompany" onclick="tryItOut('GETcompany');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETcompany" onclick="cancelTryOut('GETcompany');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETcompany" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>company</code></b>
</p>
</form>


## search/{query}




> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/search/et" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/search/et"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<h1 class="title">Search Results</h1>

    <i>No search results found.</i>

```
<div id="execution-results-GETsearch--query-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETsearch--query-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETsearch--query-"></code></pre>
</div>
<div id="execution-error-GETsearch--query-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETsearch--query-"></code></pre>
</div>
<form id="form-GETsearch--query-" data-method="GET" data-path="search/{query}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETsearch--query-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETsearch--query-" onclick="tryItOut('GETsearch--query-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETsearch--query-" onclick="cancelTryOut('GETsearch--query-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETsearch--query-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>search/{query}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>query</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="query" data-endpoint="GETsearch--query-" data-component="url" required  hidden>
<br>
</p>
</form>


## Display a listing of the resource.




> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/cart" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/cart"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETcart" hidden>
    <blockquote>Received response<span id="execution-response-status-GETcart"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETcart"></code></pre>
</div>
<div id="execution-error-GETcart" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETcart"></code></pre>
</div>
<form id="form-GETcart" data-method="GET" data-path="cart" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETcart', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETcart" onclick="tryItOut('GETcart');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETcart" onclick="cancelTryOut('GETcart');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETcart" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>cart</code></b>
</p>
</form>


## Store a newly created resource in storage.




> Example request:

```bash
curl -X POST \
    "http://food_clearance.test/cart" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/cart"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTcart" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTcart"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTcart"></code></pre>
</div>
<div id="execution-error-POSTcart" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTcart"></code></pre>
</div>
<form id="form-POSTcart" data-method="POST" data-path="cart" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTcart', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTcart" onclick="tryItOut('POSTcart');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTcart" onclick="cancelTryOut('POSTcart');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTcart" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>cart</code></b>
</p>
</form>


## Remove the specified resource from storage.




> Example request:

```bash
curl -X DELETE \
    "http://food_clearance.test/cart/delectus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/cart/delectus"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response => response.json());
```


<div id="execution-results-DELETEcart--cart-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEcart--cart-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEcart--cart-"></code></pre>
</div>
<div id="execution-error-DELETEcart--cart-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEcart--cart-"></code></pre>
</div>
<form id="form-DELETEcart--cart-" data-method="DELETE" data-path="cart/{cart}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEcart--cart-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEcart--cart-" onclick="tryItOut('DELETEcart--cart-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEcart--cart-" onclick="cancelTryOut('DELETEcart--cart-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEcart--cart-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>cart/{cart}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>cart</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="cart" data-endpoint="DELETEcart--cart-" data-component="url" required  hidden>
<br>
</p>
</form>


## cart/checkout




> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/cart/checkout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/cart/checkout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETcart-checkout" hidden>
    <blockquote>Received response<span id="execution-response-status-GETcart-checkout"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETcart-checkout"></code></pre>
</div>
<div id="execution-error-GETcart-checkout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETcart-checkout"></code></pre>
</div>
<form id="form-GETcart-checkout" data-method="GET" data-path="cart/checkout" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETcart-checkout', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETcart-checkout" onclick="tryItOut('GETcart-checkout');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETcart-checkout" onclick="cancelTryOut('GETcart-checkout');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETcart-checkout" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>cart/checkout</code></b>
</p>
</form>


## foods/{id}/buy




> Example request:

```bash
curl -X POST \
    "http://food_clearance.test/foods/atque/buy" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/foods/atque/buy"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTfoods--id--buy" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTfoods--id--buy"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTfoods--id--buy"></code></pre>
</div>
<div id="execution-error-POSTfoods--id--buy" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTfoods--id--buy"></code></pre>
</div>
<form id="form-POSTfoods--id--buy" data-method="POST" data-path="foods/{id}/buy" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTfoods--id--buy', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTfoods--id--buy" onclick="tryItOut('POSTfoods--id--buy');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTfoods--id--buy" onclick="cancelTryOut('POSTfoods--id--buy');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTfoods--id--buy" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>foods/{id}/buy</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSTfoods--id--buy" data-component="url" required  hidden>
<br>
</p>
</form>


## Show the form for creating a new resource.




> Example request:

```bash
curl -X GET \
    -G "http://food_clearance.test/reports/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/reports/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETreports-create" hidden>
    <blockquote>Received response<span id="execution-response-status-GETreports-create"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETreports-create"></code></pre>
</div>
<div id="execution-error-GETreports-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETreports-create"></code></pre>
</div>
<form id="form-GETreports-create" data-method="GET" data-path="reports/create" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETreports-create', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETreports-create" onclick="tryItOut('GETreports-create');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETreports-create" onclick="cancelTryOut('GETreports-create');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETreports-create" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>reports/create</code></b>
</p>
</form>


## Store a newly created resource in storage.




> Example request:

```bash
curl -X POST \
    "http://food_clearance.test/reports" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://food_clearance.test/reports"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTreports" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTreports"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTreports"></code></pre>
</div>
<div id="execution-error-POSTreports" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTreports"></code></pre>
</div>
<form id="form-POSTreports" data-method="POST" data-path="reports" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTreports', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTreports" onclick="tryItOut('POSTreports');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTreports" onclick="cancelTryOut('POSTreports');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTreports" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>reports</code></b>
</p>
</form>



