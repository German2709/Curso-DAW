// variable donde se almacena los productos
let products = {
  // la data almacena los datos de cada producto
    data: [
      {
        productName: "Camiseta Normal Blanca",//nombre del producto
        category: "Topwear",//se obtiene del filterProduct('categoria') ref. linea 25 del html
        price: "30",//precio
        image: "white-tshirt.jpg",//se coge la imagen descargada previamente en la carpeta
      },
      {
        productName: "FALDA CORTA BEIGE",
        category: "Bottomwear",
        price: "49",
        image: "short-skirt.jpg",
      },
      {
        productName: "RELOJ INTELIGENTE DEPORTIVO",
        category: "Watch",
        price: "99",
        image: "sporty-smartwatch.jpg",
      },
      {
        productName: "TOP TEJIDO BASICO",
        category: "Topwear",
        price: "29",
        image: "knitted-top.jpg",
      },
      {
        productName: "CHAQUETA NEGRA DE CUERO",
        category: "Jacket",
        price: "129",
        image: "black-leather-jacket.jpg",
      },
      {
        productName: "PANTALONES CON ESTILO ROSA",
        category: "Bottomwear",
        price: "89",
        image: "pink-trousers.jpg",
      },
      {
        productName: "CHAQUETA MARRON HOMBRE",
        category: "Jacket",
        price: "189",
        image: "brown-jacket.jpg",
      },
      {
        productName: "PANTALONES CONFY GRIS",
        category: "Bottomwear",
        price: "49",
        image: "comfy-gray-pants.jpg",
      },
    ],
  };
  
  for (let i of products.data) {
    //Crear contenedor que almacena los productos (imagenes/precio)
    let card = document.createElement("div");
    //card debe tener una categoría y debe permanecer oculta inicialmente
    card.classList.add("card", i.category, "hide");
    //div(contenedor) de la imagen
    let imgContainer = document.createElement("div");
    //se le añade la clase al contedor
    imgContainer.classList.add("image-container");
    //dentro del contendor con la clase "image-container" se crea el elemento img
    let image = document.createElement("img");
    //se le da el atributo donde se sustraerá la imagen
    image.setAttribute("src", i.image);
    //se acomoda los elementos como hijos de "card"
    imgContainer.appendChild(image);
    card.appendChild(imgContainer);
    //contenedor para el nombre del producto y precio
    let container = document.createElement("div");
    container.classList.add("container");
    //contedor donde se alamacena el nombre del producto
    let name = document.createElement("h5");
    name.classList.add("product-name");
    name.innerText = i.productName.toUpperCase();
    container.appendChild(name);
    //contenedor para el precio
    let price = document.createElement("h6");
    price.innerText = i.price + "€";
    container.appendChild(price);
  
    card.appendChild(container);
    document.getElementById("products").appendChild(card);
  }
  
  //parámetro pasado desde el botón (parámetro igual que categoría)
  function filterProduct(value) {
    //Código de clase de botón
    let buttons = document.querySelectorAll(".button-value");
    buttons.forEach((button) => {
      //comprobamos si el valor es igual a innerText
      if (value.toUpperCase() == button.innerText.toUpperCase()) {
        button.classList.add("active");
      } else {
        button.classList.remove("active");
      }
    });
  
    //seleccionamos todos los elementos
    let elements = document.querySelectorAll(".card");
    //recorrer todos los elementos
    elements.forEach((element) => {
      //Mostrar todos los elementos al hacer click en el boton "TODOS"
      if (value == "all") {
        element.classList.remove("hide");
      } else {
        //Comprobar si el elemento contiene una clase de categoría
        if (element.classList.contains(value)) {
          //mostramos el elemento basado en su categoria
          element.classList.remove("hide");
        } else {
          //oculta otros elementos
          element.classList.add("hide");
        }
      }
    });
  }
  
  //Al hacer click en el boton buscar
  document.getElementById("search").addEventListener("click", () => {
    //inicializaciones
    let searchInput = document.getElementById("search-input").value;
    let elements = document.querySelectorAll(".product-name");
    let cards = document.querySelectorAll(".card");
  
    //recorrer todos los elementos
    elements.forEach((element, index) => {
      //Comprobamos si el texto incluye el valor de la busqueda
      if (element.innerText.includes(searchInput.toUpperCase())) {
        //mostramos los productos
        cards[index].classList.remove("hide");
      } else {
        //ocultamos los demás
        cards[index].classList.add("hide");
      }
    });
  });
  
  //mostramos inicialmente todos los productos
  window.onload = () => {
    filterProduct("all");
  };
  