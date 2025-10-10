// ---------------------- Variables ----------------------
const tableros = document.querySelectorAll('.tablero');
const btnIzq = document.querySelector('button.izq');
const btnDer = document.querySelector('button.der');
const indicador = document.querySelector('nav div');
const headerJugador = document.querySelector('header.cuadradito');

let indiceActual = 0;

// ---------------------- Función para mostrar tablero ----------------------
function mostrarTablero(indice) {
    tableros.forEach((tablero, i) => {
        tablero.style.display = (i === indice) ? "block" : "none";
    });
    indicador.textContent = `${indice + 1}/${tableros.length}`;
    headerJugador.textContent = `Tablero de: ${usuarios[indice] || "Jugador Desconocido"}`;
}

// Inicializar mostrando el primer tablero
mostrarTablero(indiceActual);

// ---------------------- Navegación de tableros ----------------------
btnDer.addEventListener('click', () => {
    indiceActual = (indiceActual + 1) % tableros.length;
    mostrarTablero(indiceActual);
});

btnIzq.addEventListener('click', () => {
    indiceActual = (indiceActual - 1 + tableros.length) % tableros.length;
    mostrarTablero(indiceActual);
});

// ---------------------- Colores y dinos ----------------------
const botones = document.querySelectorAll('.celda input[type="button"]');
const colores = ["transparent","#fbce03","#03b1e4","#ff6b04","#e9072d","#e37cd1","#6abe4c"];
const dinos = ["","amarillo","celeste","naranja","rojo","rosado","verde"];

botones.forEach(btn => {
    let index = 0;
    btn.addEventListener("click", () => {
        index = (index + 1) % colores.length;
        btn.style.backgroundColor = colores[index];
        btn.dataset.dino = dinos[index];
    });
});

// ---------------------- Preparar formulario para enviar datos ----------------------
tableros.forEach(tablero => {
    const form = tablero.querySelector('form');

    form.addEventListener('submit', e => {
        e.preventDefault(); // Evitar envío estándar, vamos a actualizar los inputs hidden

        const inputsBotones = tablero.querySelectorAll('.celda input[type="button"]');
        inputsBotones.forEach(btn => {
            let hidden = btn.nextElementSibling;
            if (!hidden || hidden.type !== 'hidden') {
                hidden = document.createElement('input');
                hidden.type = 'hidden';
                hidden.name = btn.name;
                btn.after(hidden);
            }
            hidden.value = btn.dataset.dino || "";
        });

        form.submit(); // Enviar formulario actualizado
    });
});
