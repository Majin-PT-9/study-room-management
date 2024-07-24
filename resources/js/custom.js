document.addEventListener("DOMContentLoaded", () => {
    setTimeout(() => {
        const alerta = document.getElementById("errors-alert");
        if (alerta) {
            alerta.classList.remove("show");
            alerta.addEventListener('transitionend', function() {
                alerta.remove();
            });
        }
    }, 5000); // Altere 5000 para o número de milissegundos desejado
});
