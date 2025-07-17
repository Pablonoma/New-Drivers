const stars = document.querySelectorAll(".star");
const ratingInput = document.getElementById("selected-rating");

// Evento clic para cada estrella
stars.forEach(function (star, index) {
  star.addEventListener("click", function () {
    // Obtener la calificación actual
    const rating = index + 1;

    // Almacenar la calificación en local storage
    localStorage.setItem("rating", rating);

    // Actualizar la interfaz de usuario
    updateStarRating(rating);

    // Actualizar el valor del campo oculto
    ratingInput.value = rating;

    // Mostrar la calificación en la consola (opcional)
    console.log("Calificación seleccionada: " + rating);
  });
});

// Función para actualizar la interfaz de usuario
function updateStarRating(rating) {
  // Recorrer todas las estrellas y eliminar checked
  for (let i = 0; i < stars.length; i++) {
    stars[i].classList.remove("checked");
  }

  // Agregar checked a las estrellas
  for (let i = 0; i < rating; i++) {
    stars[i].classList.add("checked");
  }
}

// Obtener la calificación almacenada en local storage
const storedRating = localStorage.getItem("rating");

// Si hay una calificación almacenada, actualizar la interfaz de usuario
if (storedRating) {
  updateStarRating(storedRating);
  ratingInput.value = storedRating;
}
