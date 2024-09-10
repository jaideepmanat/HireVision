document.addEventListener("DOMContentLoaded", () => {
  const profileIcon = document.querySelector(".profile-icon img");
  const dropdownMenu = document.querySelector(".dropdown-menu");

  profileIcon.addEventListener("click", () => {
    dropdownMenu.style.display =
      dropdownMenu.style.display === "block" ? "none" : "block";
  });

  // Hide dropdown if clicked outside
  document.addEventListener("click", (event) => {
    if (
      !profileIcon.contains(event.target) &&
      !dropdownMenu.contains(event.target)
    ) {
      dropdownMenu.style.display = "none";
    }
  });
});
