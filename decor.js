const plants = [
  {
    name: "Aloe Vera",
    type: "Indoor",
    price: 250,
    image: "images/aloveVera.jpg",
  },
  {
    name: "Rose",
    type: "Outdoor",
    price: 150,
    image: "images/rose.webp",
  },
  {
    name: "Money Plant",
    type: "Indoor",
    price: 200,
    image: "images/moneyPlant.jpg",
  },
  {
    name: "Tulsi",
    type: "Medicinal",
    price: 100,
    image: "images/tulasi.jpg",
  },
];

let cart = [];

function showPlant(index) {
  const plant = plants[index];

  document.getElementById("plantDetails").innerHTML = `
        <img src="${plant.image}" width="200" alt="${plant.name}">
        <p><strong>Name:</strong> ${plant.name}</p>
        <p><strong>Type:</strong> ${plant.type}</p>
        <p><strong>Price:</strong> ₹${plant.price}</p>
        <button onclick="addToCart(${index})">Add to Cart</button>
    `;
}

function addToCart(index) {
  cart.push(plants[index]);
  updateCart();
}

function updateCart() {
  const cartDiv = document.getElementById("cartDetails");

  if (cart.length === 0) {
    cartDiv.innerHTML = "<p>Cart is empty</p>";
    return;
  }

  let total = 0;
  let html = "<ul>";

  cart.forEach((item) => {
    total += item.price;
    html += `<li>${item.name} - ₹${item.price}</li>`;
  });

  html += `</ul><p><strong>Total:</strong> ₹${total}</p>`;

  cartDiv.innerHTML = html;
}
