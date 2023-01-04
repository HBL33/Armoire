// Cochez toutes les cases portant le nom "choice" à l'aide de querySelectorAll.
let checkboxes = document.querySelectorAll("input[type=checkbox][name=choice]");
let enabledchoice = [];
let cookieDingler = [];
let nam = "";
// Utilisez Array.forEach pour ajouter un écouteur d'événement à chaque case à cocher.
checkboxes.forEach(function (checkbox) {
  checkbox.addEventListener("change", function (e) {
    e.preventDefault();
    enabledchoice = Array.from(checkboxes) //Convertissez les cases à cocher en tableau pour utiliser le filtre et la carte.
      .filter((i) => i.checked) // Utilisez Array.filter pour supprimer les cases à cocher non cochées.
      .map((i) => i.value); // Utilisez Array.map pour extraire uniquement les valeurs de case à cocher du tableau d'objets
    cookieDingler = JSON.stringify(enabledchoice);
    document.cookie = " nam " + "=" + cookieDingler;
    console.log(cookieDingler);
  });
});

function cocherToutSaisons(seasons) {
  let cases = document.getElementsByClassName("seasons"); // on recupere tous les INPUT par classe
  for (
    let i = 1;
    i < cases.length;
    i++ // on les parcourt
  )
    if (cases[i].type == "checkbox") {
      // si on a une checkbox...
      cases[i].checked = seasons;
    }
  // ... on la coche ou non
}
function cocherToutCouleurs(color) {
  let cases = document.getElementsByClassName("color"); // on recupere tous les INPUT par classe
  for (
    let i = 1;
    i < cases.length;
    i++ // on les parcourt
  )
    if (cases[i].type == "checkbox") {
      // si on a une checkbox...
      cases[i].checked = color;
    }
  // ... on la coche ou non
}
function cocherToutModeles(model) {
  let cases = document.getElementsByClassName("model"); // on recupere tous les INPUT par classe
  for (
    let i = 1;
    i < cases.length;
    i++ // on les parcourt
  )
    if (cases[i].type == "checkbox") {
      // si on a une checkbox...
      cases[i].checked = model;
    }
  // ... on la coche ou non
}
function cocherToutMarques(brand) {
  let cases = document.getElementsByClassName("brand"); // on recupere tous les INPUT par classe
  for (
    let i = 1;
    i < cases.length;
    i++ // on les parcourt
  )
    if (cases[i].type == "checkbox") {
      // si on a une checkbox...
      cases[i].checked = brand;
    }
  // ... on la coche ou non
}
// display the selected items
function displaySelected() {
  let selected = document.querySelectorAll("input[type=checkbox]:checked");
  let selectedItems = [];
  selected.forEach((item) => {
    selectedItems.push(item.value);
  });
  document.getElementById("selected").innerHTML = selectedItems;
}
