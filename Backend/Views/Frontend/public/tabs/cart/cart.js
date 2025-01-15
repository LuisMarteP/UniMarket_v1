// Variables de selección
const countEl = document.querySelector(".count");
const minus = document.querySelector(".minus");
const plus = document.querySelector(".plus");
const cartIcon = document.querySelector(".cart-icon");
const cartContainer = document.querySelector(".cart-container");
const addToCartBtn = document.querySelector(".add-to-cart");
const cartItems = document.querySelector(".cart-items");
const checkout = document.querySelector(".checkout");
const cartCount = document.querySelector(".cart-count");

// Variables de control
let count = 0;
let totalCartQty = 0;

// Actualiza el contador de cantidad de productos
const updateCount = (newCount) => {
  count = newCount;
  countEl.textContent = count;
};

// Botones de sumar y restar
minus.addEventListener("click", () => {
  if (count > 0) updateCount(count - 1);
});

plus.addEventListener("click", () => {
  updateCount(count + 1);
});

// Alternar visibilidad del carrito
cartIcon.addEventListener("click", () => {
  cartContainer.classList.toggle("active");
});

// Función para actualizar la cantidad total en el ícono del carrito
const updateTotalCartQty = () => {
  const cartItemsList = document.querySelectorAll(".cart-item");
  totalCartQty = 0;
  cartItemsList.forEach((item) => {
    totalCartQty += parseInt(item.dataset.quantity);
  });
  cartCount.innerHTML = `<span class="qty">${totalCartQty}</span>`;
};

// Agregar producto al carrito
const addItemToCart = (name, price, imageSrc) => {
  if (count === 0) return;

  const totalPrice = count * price;

  const cartItem = document.createElement("div");
  cartItem.classList.add("cart-item");
  cartItem.dataset.quantity = count;
  cartItem.innerHTML = `
    <img src="${imageSrc}" alt="${name}" />
    <div class="item-details">
      <div>${name}</div>
      <p>$${price.toFixed(2)} x ${count} <span class='total-price'>$${totalPrice.toFixed(2)}</span></p>
    </div>
    <button class="delete-item">❌</button>
  `;

  cartItems.appendChild(cartItem);
  updateTotalCartQty();

  // Quitar el producto del carrito
  cartItem.querySelector(".delete-item").addEventListener("click", () => {
    cartItem.remove();
    updateTotalCartQty();
  });

  // Reiniciar el contador
  updateCount(0);
};

// Evento del botón "Agregar al carrito"
addToCartBtn.addEventListener("click", () => {
  const productName = document.querySelector(".product-name").textContent;
  const productPrice = parseFloat(document.querySelector(".current-price").textContent.replace("$", ""));
  const productImg = document.querySelector(".main-img img").getAttribute("src");

  addItemToCart(productName, productPrice, productImg);
  cartContainer.classList.add("active");
});
