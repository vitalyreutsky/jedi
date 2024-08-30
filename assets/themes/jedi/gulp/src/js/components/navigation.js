document.addEventListener("DOMContentLoaded", function () {
  const contentBlocks = document.querySelectorAll("section");

  const navItems = document.querySelectorAll('.navigation__item[href^="#"]');
  const offsetTop = 150;
  let activeSection = "";

  const setActiveSection = (id) => {
    localStorage.setItem("activeSection", id);
    navItems.forEach((item) => {
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
      setActiveSection(activeSection);
    }
  };

  const savedSection = localStorage.getItem("activeSection");
  if (savedSection) {
    setActiveSection(savedSection);
  }

  navItems.forEach((link) => {
    link.addEventListener("click", (e) => {
      e.preventDefault();
      const id = link.getAttribute("href").substring(1);
      document.getElementById(id)?.scrollIntoView({
        behavior: "smooth",
        block: "start",
      });
      setActiveSection(id);
    });
  });

  window.addEventListener("scroll", handleScroll);
});
