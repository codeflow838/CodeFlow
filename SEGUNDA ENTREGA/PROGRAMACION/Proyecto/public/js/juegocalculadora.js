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

const form = document.querySelector('#formPartida');
form.addEventListener('submit', e => {
    botones.forEach(btn => {
        let hidden = btn.nextElementSibling;
        if (!hidden || hidden.type !== 'hidden') {
            hidden = document.createElement('input');
            hidden.type = 'hidden';
            hidden.name = btn.name;
            btn.after(hidden);
        }
        hidden.value = btn.dataset.dino || "";
    });
});
