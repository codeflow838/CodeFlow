document.addEventListener("DOMContentLoaded", () => {

    const colores = ["transparent", "#fbce03", "#03b1e4", "#ff6b04", "#e9072d", "#e37cd1", "#6abe4c"];
    const dinos = ["", "amarillo", "celeste", "naranja", "rojo", "rosado", "verde"];

    const tableros = document.querySelectorAll("section.tablero");
    const totalTableros = tableros.length;
    let tableroActivo = 0;

    const marcador = document.querySelector("nav div");
    const btnIzq = document.querySelector("nav button.izq");
    const btnDer = document.querySelector("nav button.der");

    const mostrarTablero = (index) => {
        tableros.forEach((tablero, i) => {
            tablero.style.display = i === index ? "block" : "none";
        });
        if (marcador) marcador.textContent = `${index + 1}/${totalTableros}`;
    };

    const cambiarTablero = (direccion) => {
        if (direccion === "der") {
            tableroActivo = (tableroActivo + 1) % totalTableros;
        } else if (direccion === "izq") {
            tableroActivo = (tableroActivo - 1 + totalTableros) % totalTableros;
        }
        mostrarTablero(tableroActivo);
    };

    if (btnIzq) btnIzq.addEventListener("click", () => cambiarTablero("izq"));
    if (btnDer) btnDer.addEventListener("click", () => cambiarTablero("der"));

    const manejarClickColor = (boton) => {

        let index = parseInt(boton.dataset.colorIndex || "0");
        index = (index + 1) % colores.length;

        boton.style.backgroundColor = colores[index];
        boton.dataset.colorIndex = index;
        boton.dataset.colorName = dinos[index];

        const inputHidden = boton.nextElementSibling;
        if (inputHidden && inputHidden.type === "hidden") {
            inputHidden.value = dinos[index];
        }
    };

    const botones = document.querySelectorAll('input[type="button"]');
    botones.forEach((boton) => {
        boton.dataset.colorIndex = "0";
        boton.dataset.colorName = "";
        boton.addEventListener("click", () => manejarClickColor(boton));
    });

    mostrarTablero(tableroActivo);
});
