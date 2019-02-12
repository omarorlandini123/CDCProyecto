import { MDCTopAppBar } from "./@material/top-app-bar/index";
import { MDCDrawer } from "./@material/drawer";


const topAppBarElement = document.querySelector(".mdc-top-app-bar");
const topAppBar = new MDCTopAppBar(topAppBarElement);
const drawerSelector = document.querySelector(".mdc-drawer");
if (drawerSelector != null) {
    var drawer = MDCDrawer.attachTo(drawerSelector);
}

//Mostrar Drawer
topAppBar.setScrollTarget(document.getElementById("main-content"));
topAppBar.listen("MDCTopAppBar:nav", () => {
    drawer.open = !drawer.open;
});

//Ocultar Drawer cuando haga click en una opcion
const listEl = document.querySelector(".mdc-drawer .mdc-list");
const mainContentEl = document.querySelector(".main-content");
if (listEl != null) {
    listEl.addEventListener("click", event => {
        drawer.open = false;
    });
}

document.body.addEventListener("MDCDrawer:closed", () => {
    //mainContentEl.querySelector('input, button').focus();
});
