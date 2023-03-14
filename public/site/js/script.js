function openPage(link) {
    window.open(link, "_blink").focus();
}

const changeThemeBtn = document.querySelector("#dark-sun");
const nomeBtn = document.querySelector("#dark-sun span");
const mobileTheme = document.querySelector("#change-theme");

changeThemeBtn.addEventListener("click", function () {
    document.body.classList.toggle("dark");
    escrita();

    localStorage.removeItem("dark");

    if (document.body.classList.contains("dark")) {
        localStorage.setItem("dark", 1);
    }

    const cards = document.querySelectorAll(".card");
    cards.forEach((e) => {
        e.classList.toggle("card-dark");
    });
});

mobileTheme.addEventListener("change", function () {
    document.body.classList.toggle("dark");
    escrita();
    localStorage.removeItem("dark");

    if (document.body.classList.contains("dark")) {
        localStorage.setItem("dark", 1);
    }

    const cards = document.querySelectorAll(".card");
    cards.forEach((e) => {
        e.classList.toggle("card-dark");
    });
});

function escrita() {
    if (nomeBtn.textContent == "claro") {
        nomeBtn.innerHTML = "dark";
        document.getElementById("site-header").style.backgroundColor =
            "#A9BA9D";
        document.getElementById("site-footer").style.backgroundColor =
            "#A9BA9D";
    } else {
        nomeBtn.innerHTML = "claro";
        document.getElementById("site-header").style.backgroundColor =
            "#5CE086";
        document.getElementById("site-footer").style.backgroundColor =
            "#5CE086";
    }
}

function loadTheme() {
    const darkMode = localStorage.getItem("dark");
    if (darkMode) {
        document.body.classList.toggle("dark");
        escrita();
        const cards = document.querySelectorAll(".card");
        cards.forEach((e) => {
            e.classList.toggle("card-dark");
        });
    }
}
loadTheme();
