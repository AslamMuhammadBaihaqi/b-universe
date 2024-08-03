/* Section History */
$(document).ready(function () {
  const scrollContainer = $("#myScrollContainer");

  scrollContainer.scroll(function () {
    const scrollPosition = scrollContainer.scrollTop();

    // Remove bold class from all elements
    scrollContainer.find(".bold").removeClass("bold");

    // Find the first heading or paragraph visible in the container
    const firstVisibleElement = scrollContainer
      .find(".history1")
      .filter(function () {
        return (
          $(this).offset().top - scrollContainer.offset().top <= scrollPosition
        );
      })
      .last();

    // Add bold class to the first visible element
    firstVisibleElement.find("h3, p").addClass("bold");
  });
});
/* End Of Section */

/* Section Owl-carousel */
$(".owl-carousel").owlCarousel({
  loop: false,
  margin: 30,
  responsiveClass: true,
  navText: [
    "<span class='fa-solid fa-angle-left'></span>",
    "<span class='fa-solid fa-angle-right'></span>",
  ],
  responsive: {
    0: {
      items: 1.2,
      nav: true,
      loop: true,
    },
    600: {
      items: 2.5,
      nav: true,
      loop: true,
    },
    750: {
      items: 3,
      nav: true,
      loop: true,
    },
    1000: {
      items: 3.5,
      nav: true,
      loop: true,
    },
    1400: {
      items: 4,
      nav: true,
      loop: true,
    },
  },
});
/* End Of Section Owl-carousel */
