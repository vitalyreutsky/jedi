document.addEventListener("DOMContentLoaded", function () {
  const contentBlocks = document.querySelectorAll("section");
  const navItems = document.querySelectorAll('.navigation__item[href^="#"]');
  const offsetTop = 150;
  let activeSection = "";
  const mobileMenuText = document.querySelector(".header__mobil-item");

  const setActiveSection = (id) => {
    localStorage.setItem("activeSection", id);
    navItems.forEach((item) => {
      const capitalized = capitalizeFirstLetter(id);
      mobileMenuText.textContent = capitalized;
      item.classList.toggle("active", item.getAttribute("href") === `#${id}`);
    });
  };

  const handleScroll = () => {
    let foundSection = Array.from(contentBlocks).find(
      (section) =>
        section.getBoundingClientRect().top < offsetTop &&
        section.getBoundingClientRect().bottom > offsetTop
    );
    if (foundSection && activeSection !== foundSection.id) {
      activeSection = foundSection.id;
      mobileMenuText.textContent = capitalizeFirstLetter(foundSection.id);

      setActiveSection(activeSection);
    }
  };

  const savedSection = localStorage.getItem("activeSection");

  if (savedSection && document.getElementById(savedSection)) {
    document.getElementById(savedSection).scrollIntoView({
      behavior: "smooth",
      block: "start",
    });
    setActiveSection(savedSection);
  } else {
    handleScroll();
  }

  navItems.forEach((link, index) => {
    link.addEventListener("click", (e) => {
      e.preventDefault();
      const id = link.getAttribute("href").substring(1);

      if (index === 0) {
        window.scrollTo({
          top: 0,
          behavior: "smooth",
        });
      } else {
        document.getElementById(id)?.scrollIntoView({
          behavior: "smooth",
          block: "start",
        });
      }
      setActiveSection(id);
    });
  });

  function capitalizeFirstLetter(str) {
    if (!str) return str;
    return str.charAt(0).toUpperCase() + str.slice(1);
  }

  window.addEventListener("scroll", handleScroll);
});
