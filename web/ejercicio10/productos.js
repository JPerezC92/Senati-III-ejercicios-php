const productos = [
  {
    nombre: "Leche",
    descripcion: "Producto lacteo",
    precio: 3.20
  },
  {
    nombre: "Cafe",
    descripcion: "Abarrote",
    precio: 7.10
  },
  {
    nombre: "Galleta",
    descripcion: "Abarrote",
    precio: 1.50
  },
  {
    nombre: "Gaseosa",
    descripcion: "Bebida 1/2 litro",
    precio: 2.50
  },
];



// opciones
productos.forEach((producto) => {

  const selectProduct = document.querySelector("#productos");
  console.log(producto);
  const option = document.createElement("option");
  option.value = producto.nombre;
  option.innerText = producto.nombre;

  selectProduct.appendChild(option);
  console.log(selectProduct);

});

// descripcion


const getDatos = () => {
  const selectProduct = document.querySelector("#selectProducto");
  const [ { descripcion, precio } ] = productos.filter(({ nombre }) => nombre === selectProduct.value);

  // pintando descripcion
  const descripcionInput = document.querySelector("#descripcion");
  descripcionInput.value = descripcion;

  // pintando precio

  const precioInput = document.querySelector("#precio");
  precioInput.value = precio;

};

const selectProduct = document.addEventListener("change", getDatos);