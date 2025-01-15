document.addEventListener("DOMContentLoaded", () => {
    const MainImg = document.getElementById("MainImg");
    const thumbnails = document.querySelectorAll(".small-img");
    const lightbox = document.getElementById("lightbox");
    const lightboxImg = document.getElementById("lightboxImg");
    const closeLightbox = document.getElementById("closeLightbox");

    // Función para cambiar la imagen principal
    const changeImage = (event) => {
        document.querySelector(".small-img.active")?.classList.remove("active");
        event.target.classList.add("active");
        MainImg.src = event.target.src; // Cambia la imagen principal
    };

    // Agrega evento a cada miniatura (thumbnail)
    thumbnails.forEach((thumb) => thumb.addEventListener("click", changeImage));

    // Mostrar el lightbox con la imagen activa
    MainImg.addEventListener("click", () => {
        lightbox.classList.add("active");
        lightboxImg.src = MainImg.src; // Actualiza la imagen del lightbox
    });

    // Cerrar el lightbox al hacer clic en el botón de cierre
    closeLightbox.addEventListener("click", () => {
        lightbox.classList.remove("active");
    });
    
    // Evento para el botón "anterior"
iconPrev.addEventListener("click", () => {
    let newIndex = currentImageIndex - 1;
    if (newIndex < 0) {
      newIndex = lightboxMainImages.length - 1; // Vuelve a la última imagen
    }
    changeImage(newIndex, lightboxMainImages, lightboxThumbnails);
  });
  
  // Evento para el botón "siguiente"
  iconNext.addEventListener("click", () => {
    let newIndex = currentImageIndex + 1;
    if (newIndex >= lightboxMainImages.length) {
      newIndex = 0; // Vuelve a la primera imagen
    }
    changeImage(newIndex, lightboxMainImages, lightboxThumbnails);
  });
  
    // Cerrar lightbox al hacer clic fuera de la imagen
    lightbox.addEventListener("click", (event) => {
        if (event.target === lightbox) {
            lightbox.classList.remove("active");
        }
    });
});
