document.addEventListener("DOMContentLoaded", () => {
    const colores = ["transparent", "#fbce03", "#03b1e4", "#ff6b04", "#e9072d", "#e37cd1", "#6abe4c"];
    const dinos = ["", "amarillo", "celeste", "naranja", "rojo", "rosado", "verde"];
    const tableros = document.querySelectorAll("section.tablero");
    const totalTableros = tableros.length;
    const btnIzq = document.querySelector("nav button.izq");
    const btnDer = document.querySelector("nav button.der");
    const marcador = document.querySelector("nav div");
    let tableroActivo = 0;

    const mostrarTablero = (index) => {
        tableros.forEach((tablero, i) => {
            tablero.style.display = i === index ? "block" : "none";
        });
        marcador.textContent = `${index + 1}/${totalTableros}`;
    };

    const cambiarTablero = (direccion) => {
        if (direccion === "der") {
            tableroActivo = (tableroActivo + 1) % totalTableros;
        } else if (direccion === "izq") {
            tableroActivo = (tableroActivo - 1 + totalTableros) % totalTableros;
        }
        mostrarTablero(tableroActivo);
    };

    const manejarClickColor = (boton) => {
        let index = parseInt(boton.dataset.colorIndex || "0");
        index = (index + 1) % colores.length;
        boton.style.backgroundColor = colores[index];
        boton.dataset.colorIndex = index;
        boton.dataset.colorName = dinos[index];
    };

    const botones = document.querySelectorAll('input[type="button"]');
    botones.forEach((boton) => {
        boton.dataset.colorIndex = "0";
        boton.addEventListener("click", () => manejarClickColor(boton));
    });

    btnIzq.addEventListener("click", () => cambiarTablero("izq"));
    btnDer.addEventListener("click", () => cambiarTablero("der"));
    mostrarTablero(tableroActivo);
});
