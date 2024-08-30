document.addEventListener("DOMContentLoaded", function () {
  const contentBlocks = document.querySelectorAll("section");
  const navItems = document.querySelectorAll('.navigation__item[href^="#"]');
  const offsetTop = 150;
  const mobileMenuText = document.querySelector(".header__mobil-item");

  const setActiveSection = (id) => {
    localStorage.setItem("activeSection", id);
    navItems.forEach((item) => {
      item.classList.toggle("active", item.getAttribute("href") === `#${id}`);
    });

    if (mobileMenuText) {
      mobileMenuText.textContent = capitalizeFirstLetter(id);
    }
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

  const scrollToTop = () => {
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
    setActiveSection("");
  };

  navItems.forEach((link, index) => {
    link.addEventListener("click", (e) => {
      e.preventDefault();
      const id = link.getAttribute("href").substring(1);

      if (index === 0) {
        scrollToTop();
      } else {
        scrollToSection(id);
      }
    });
  });

  const restoreActiveSection = () => {
    const savedSection = localStorage.getItem("activeSection");
    if (savedSection) {
      setTimeout(() => {
        const section = document.getElementById(savedSection);
        if (section) {
          requestAnimationFrame(() => {
            section.scrollIntoView({
              behavior: "smooth",
              block: "start",
              inline: "nearest",
            });
            setActiveSection(savedSection);
          });
        }
      }, 100);
    } else {
      scrollToTop();
    }
  };

  restoreActiveSection();

  window.addEventListener("scroll", handleScroll);

  function capitalizeFirstLetter(str) {
    if (!str) return str;
    return str.charAt(0).toUpperCase() + str.slice(1);
  }
});
