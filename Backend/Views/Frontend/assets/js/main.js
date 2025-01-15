document.addEventListener("DOMContentLoaded", () => {
    const MainImg = document.getElementById("MainImg");
    const thumbnails = document.querySelectorAll(".small-img");
    const lightbox = document.getElementById("lightbox");
    const lightboxImg = document.getElementById("lightboxImg");
    const closeLightbox = document.getElementById("closeLightbox");

    // Cambiar imagen principal
    thumbnails.forEach((thumb) => {
        thumb.addEventListener("click", () => {
            MainImg.src = thumb.src;
        });
    });

    // Abrir Lightbox
    MainImg.addEventListener("click", () => {
        lightbox.style.display = "flex";
        lightboxImg.src = MainImg.src;
    });

    // Cerrar Lightbox
    closeLightbox.addEventListener("click", () => {
        lightbox.style.display = "none";
    });

    // Cerrar al hacer clic fuera de la imagen
    lightbox.addEventListener("click", (e) => {
        if (e.target === lightbox) {
            lightbox.style.display = "none";
        }
    });
});