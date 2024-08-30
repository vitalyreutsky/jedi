document.addEventListener("DOMContentLoaded", function () {
  const contentBlocks = document.querySelectorAll("section");
  const navItems = document.querySelectorAll('.navigation__item[href^="#"]');
  const offsetTop = 150;
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
    if (foundSection) {
      const id = foundSection.id;
      if (localStorage.getItem("activeSection") !== id) {
        setActiveSection(id);
      }
    }
  };

  const scrollToSection = (id) => {
    const section = document.getElementById(id);
    if (section) {
      section.scrollIntoView({
        behavior: "smooth",
        block: "start",
        inline: "nearest",
      });
      setActiveSection(id);
    }
  };

  // Сразу прокручиваем к сохраненной секции или первой секции при загрузке страницы
  const savedSection = localStorage.getItem("activeSection");
  if (savedSection && document.getElementById(savedSection)) {
    setTimeout(() => {
      scrollToSection(savedSection);
    }, 100); // Небольшая задержка для обработки переходов
  } else {
    handleScroll();
  }

  navItems.forEach((link) => {
    link.addEventListener("click", (e) => {
      e.preventDefault();
      const id = link.getAttribute("href").substring(1);
      scrollToSection(id);
    });
  });

  window.addEventListener("scroll", handleScroll);

  function capitalizeFirstLetter(str) {
    if (!str) return str; // Проверка на пустую строку
    return str.charAt(0).toUpperCase() + str.slice(1);
  }
});
