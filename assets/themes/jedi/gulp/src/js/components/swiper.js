import Swiper from "swiper";
import { Autoplay, Keyboard, Navigation, Pagination } from "swiper/modules";

Swiper.use([Keyboard, Autoplay, Pagination, Navigation]);

const hero = new Swiper(".hero__images", {
  slidesPerView: 1,
  slidesPerGroup: 1,
  spaceBetween: 10,
  speed: 1000,
  loop: true,

  autoplay: {
    delay: 3000,
  },
  keyboard: {
    enabled: true,
    onlyInViewport: true,
  },
  navigation: {
    nextEl: ".hero__arrow--right",
    prevEl: ".hero__arrow--left",
  },
});
