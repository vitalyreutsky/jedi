const tabsNavButtons = document.querySelectorAll(".tabs__nav-btn");
const tabsContentItems = document.querySelectorAll(".tabs__content-item");

if (tabsNavButtons && tabsContentItems) {
  tabsNavButtons.forEach((button) => {
    button.addEventListener("click", function () {
      tabsNavButtons.forEach((btn) => btn.classList.remove("active"));
      tabsContentItems.forEach((content) => content.classList.remove("active"));

      const tabId = this.getAttribute("data-tab");
      document.getElementById(tabId).classList.add("active");
      this.classList.add("active");
    });
  });
}
