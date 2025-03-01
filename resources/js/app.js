import "./bootstrap";
import Alpine from "alpinejs";
import slideshow from "./components/slideshow";

Alpine.data("slideshow", slideshow);
window.Alpine = Alpine;
Alpine.start();
