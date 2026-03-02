const mainImage = document.querySelector('.single__sample__image');
const galleryImages = document.querySelectorAll('.gallery-image');

galleryImages.forEach(img => {
  img.addEventListener('click', function() {

    // Add fade out animation
    mainImage.classList.add('fade-out');

    setTimeout(() => {

      // Store main image data
      const mainSrc = mainImage.src;
      const mainAlt = mainImage.alt;

      // Swap images
      mainImage.src = this.src;
      mainImage.alt = this.alt;

      this.src = mainSrc;
      this.alt = mainAlt;

      // Remove fade-out and fade-in
      mainImage.classList.remove('fade-out');
      mainImage.classList.add('fade-in');

      setTimeout(() => {
        mainImage.classList.remove('fade-in');
      }, 300);

    }, 200);

  });
});
console.log("hi");
