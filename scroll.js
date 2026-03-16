const container = document.getElementById("filmes-no-carrossel");

let isDown = false;
let startX;
let scrollLeft;

container.addEventListener("mousedown", (e) => {
  isDown = true;
  container.style.cursor = "grabbing";
  startX = e.pageX;
  scrollLeft = container.scrollLeft;
});

document.addEventListener("mouseup", () => {
  isDown = false;
  container.style.cursor = "grab";
});

container.addEventListener("mousemove", (e) => {
  if (!isDown) return;

  e.preventDefault();
  const walk = (e.pageX - startX) * 2;
  container.scrollLeft = scrollLeft - walk;
});

const container2 = document.getElementById("filmes-no-carrossel_2");

let isDown2 = false;
let startX2;
let scrollLeft2;

container2.addEventListener("mousedown", (e) => {
  isDown2 = true;
  container2.style.cursor = "grabbing";
  startX2 = e.pageX;
  scrollLeft2 = container2.scrollLeft;
});

document.addEventListener("mouseup", () => {
  isDown2 = false;
  container2.style.cursor = "grab";
});

container2.addEventListener("mousemove", (e) => {
  if (!isDown2) return;

  e.preventDefault();
  const walk = (e.pageX - startX2) * 2;
  container2.scrollLeft = scrollLeft2 - walk;
});