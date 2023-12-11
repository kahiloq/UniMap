document.addEventListener("DOMContentLoaded", function () {
    const heading = document.getElementById("login-heading");
    const colors = ["#ff0000", "#00ff00", "#0000ff", "#ffff00", "#ff00ff", "#00ffff", "#9900cc", "#ff4500", "#008080", "#800080"];
    let currentIndex = 0;

    function changeColor() {
        heading.style.color = colors[currentIndex];
        currentIndex = (currentIndex + 1) % colors.length;
    }

    // Cambia el color cada 1 segundo (1000 milisegundos)
    setInterval(changeColor, 1000);
});
