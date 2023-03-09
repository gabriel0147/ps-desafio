function openPage(link) {
    window.open(link, "_blink").focus();
}

const changeThemeBtn = document.querySelector("#dark-sun");

const nomeBtn = document.querySelector("#dark-sun span");

changeThemeBtn.addEventListener("click", function () {
    document.body.classList.toggle("dark");
    if (nomeBtn.textContent == "claro") nomeBtn.innerHTML = "dark";
    else nomeBtn.innerHTML = "claro";

    const cards = document.querySelectorAll(".card");
    cards.forEach((e) => {
        e.classList.toggle("card-dark");
    });
});
