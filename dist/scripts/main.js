let lastActive = null;

// Set active class based on current URL
document.querySelectorAll(".nav-link").forEach((link) => {
  if (link.href === window.location.href) {
    link.classList.add("active");
    lastActive = link; // Remember the initially active link
  }
});

// Add hover and leave listeners
document.querySelectorAll(".nav-link").forEach((link) => {
  link.addEventListener("mouseover", () => {
    document.querySelectorAll(".nav-link").forEach((nav) => {
      nav.classList.remove("active");
    });
  });

  link.addEventListener("mouseleave", () => {
    if (lastActive) {
      lastActive.classList.add("active");
    }
  });
});