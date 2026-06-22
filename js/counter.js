// Function to start counter animation
function startCounterAnimation(element) {
  $(element).each(function () {
    var $this = $(this),
      countTo = $this.attr("data-count");

    $({
      countNum: $this.text(),
    }).animate(
      {
        countNum: countTo,
      },

      {
        duration: 4000,
        easing: "linear",
        step: function () {
          $this.text(Math.floor(this.countNum));
        },
        complete: function () {
          $this.text(this.countNum);
          //alert('finished');
        },
      }
    );
  });
}

// Intersection Observer configuration
var options = {
  root: null,
  rootMargin: "0px",
  threshold: 0.5, // Trigger when 50% of the element is visible
};

// Callback function for Intersection Observer
function handleIntersection(entries, observer) {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      // Start counter animation when element is in view
      startCounterAnimation(entry.target);
      // Unobserve the target after animation starts to avoid repetitive animation
      observer.unobserve(entry.target);
    }
  });
}

// Create Intersection Observer instance
var observer = new IntersectionObserver(handleIntersection, options);

// Target elements to observe
$(".count").each(function () {
  observer.observe(this);
});
