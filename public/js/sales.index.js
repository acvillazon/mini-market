let products = [];

let cart = {};
let price = 0;
let current_id = -1;

let customer = null;

document.addEventListener("DOMContentLoaded", () => {
	products = JSON.parse(document.getElementById("products").textContent);
});

function addToCart() {
	if (Number(current_id) == -1) {
		return alert("Choose an product");
	}

	if (Number(document.getElementById("inputQuantity").value) <= 0) {
		return alert("Quantity min: 1");
	}

	//GET ID PRODUCT
	var input_product = document.getElementById("inputProduct");
	var select_product = inputProduct.options[inputProduct.selectedIndex];

	let id_product =
		select_product.value.split("|")[0] != -1
			? select_product.value.split("|")[0]
			: 0;

	let product_name = select_product.text;

	let quantity = document.getElementById("inputQuantity").value;
	let total = Number(quantity) * Number(price);
	let availability = true;

	let product = products.filter(
		(value) => Number(value.id_product) == Number(id_product)
	)[0];

	if (Number(product.quantity) < Number(quantity)) {
		return alert(
			`Product out of stock : ${product.name_product}, available: ${product.quantity}`
		);
	}

	product.quantity = Number(product.quantity) - quantity;

	if (cart[`${product_name}`]) {
		cart[`${product_name}`]["quantity"] =
			Number(cart[`${product_name}`]["quantity"]) + Number(quantity);
		cart[`${product_name}`]["total"] =
			Number(cart[`${product_name}`]["total"]) + Number(total);
	} else {
		cart[`${product_name}`] = {};
		cart[`${product_name}`] = {
			id_product,
			product_name,
			quantity: Number(quantity),
			total: Number(total),
		};
	}

	document.getElementById("inputQuantity").value = "";
	document.getElementById("inputProduct").value = -1;
	writeInTable(id_product, product_name, quantity, price, total);

	product = null;
	price = 0;
	current_id = -1;
}

function writeInTable(id_product, product_name, quantity, price, total) {
	let table = document.getElementById("container-data");
	let footer_total = document.getElementById("total_footer");

	let tr = document.createElement("tr");
	let td = `
			<tr>
				<th scope="col">${id_product}</th>
				<th scope="col">${product_name}</th>
				<th scope="col">${quantity}</th>
				<th scope="col">$${total}</th>
			</tr>
		`;

	tr.innerHTML = td;
	table.appendChild(tr);
	footer_total.textContent = `$ ${
		Number(footer_total.textContent.split("$")[1]) + total
	}`;
}

function currentProductPrice() {
	var selectBox = document.getElementById("inputProduct");
	var selectedValue = selectBox.options[selectBox.selectedIndex].value;
	price = selectedValue.split("|")[1];
	current_id = selectedValue.split("|")[0];
}

function clientOnChange() {
	//GET ID PRODUCT
	var inputClient = document.getElementById("inputClient");
	var selectedClient = inputClient.options[inputClient.selectedIndex].value;

	customer = selectedClient;

	if (selectedClient != -1) {
		document.getElementById("btn_payment").disabled = false;
	} else {
		document.getElementById("btn_payment").disabled = true;
	}
}

function sendToBackend() {
	if (!customer) {
		return alert("Choose an product");
	}

	var formData = new FormData();

	formData.append("user_id", customer);
	formData.append("sell", JSON.stringify(cart));

	var request = new XMLHttpRequest();
	request.onload = function () {
		if (request.status != 200) {
			// analyze HTTP status of the response
			alert(`Error ${request.status}: ${request.statusText}`); // e.g. 404: Not Found
		} else {
			// show the result
			// alert(`Done, got ${request.response.length} bytes`); // response is the server
		}

		window.location.href = "/sales/index";
	};
	request.open("POST", "/sales/store");
	request.send(formData);
}
