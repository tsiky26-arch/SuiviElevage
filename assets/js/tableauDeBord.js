document.addEventListener("DOMContentLoaded", () => {
    // Gestion de l'alerte de stock
    const stockElement = document.getElementById("stockAliments");
    const stockAlert = document.getElementById("stockAlert");
    const stockValue = parseInt(stockElement.textContent);

    if (stockValue < 10) {
        stockAlert.classList.add("alert");
    }

    // Initialisation du graphique des ventes et achats
    const ctx = document.getElementById("venteChart").getContext("2d");
    const venteChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["Jan", "Fév", "Mar", "Avr", "Mai", "Juin"],
            datasets: [
                {
                    label: "Ventes (Ar)",
                    data: [500, 700, 900, 400, 600, 1000],
                    backgroundColor: "#1abc9c",
                },
                {
                    label: "Achats (Ar)",
                    data: [300, 500, 800, 350, 500, 900],
                    backgroundColor: "#e74c3c",
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
