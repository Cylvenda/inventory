
const currentYear = () => {
    const year = new Date().getFullYear();
    document.getElementById("footer-date").innerHTML = year;
}
currentYear(); // call the set year function for the footer


// Menu add 
const MenuAddShow = () => {
    const menuButton = document.getElementById("menu-btn");
    const subMenu = document.createElement('div');
    subMenu.classList.add('menu-link');
    subMenu.innerHTML =
        `<ul>
        <li><a href="#"><img src="../img/icons/person_bl.svg">View Profile</a></li>
        <li><a href="#" > <img src="../img/icons/password.svg"> Change Password</a></li>
        <li><a href="../Config/logout"><img src="../img/icons/logout_b.svg"> Logout</a></li>
    </ul>`;

    menuButton.parentNode.appendChild(subMenu);
}

document.addEventListener('click', (event) => {
    const submenus = document.querySelectorAll('.btn-submenu-active');
    const menuButton = document.getElementById("menu-btn");
    const subMenu = document.getElementsByClassName("menu-link");

    submenus.forEach(submenu => {
        const isClickInside = submenu.contains(event.target);
        const isTriggerElement = submenu.previousElementSibling;
        const isTriggerButton = isTriggerElement && (isTriggerElement.tagName === 'LI' || (isTriggerElement.tagName === 'DIV' && isTriggerElement.classList.contains('link-container')));

        if (!isClickInside && !isTriggerButton) {
            submenu.classList.remove('btn-submenu-active');
            const relatedLi = submenu.previousElementSibling;
            if (relatedLi && relatedLi.tagName === 'LI') {
                const arrowButton = relatedLi.querySelector('.btn-arrow');
                if (arrowButton) {
                    arrowButton.style.transform = `rotate(0deg)`;
                }
            }
        }
    });

    if (!menuButton.contains(event.target) && !Array.from(subMenu).some(el => el.contains(event.target))) {
        if (menuButton.parentNode.contains(subMenu[0])) {
            menuButton.parentNode.removeChild(subMenu[0]);
        }
    }
});

// Nav bar displaying
const navDisplaying = document.getElementById("nav-bar");
const main = document.querySelector("main");
const footer = document.querySelector("footer")

const menuShow = () => {

    if (navDisplaying) {
        navDisplaying.classList.remove("nav-menu-link");
        main.style.marginLeft = '13rem'
        footer.style.marginLeft = '13rem'
    }

}

const menuClose = () => {

    if (navDisplaying) {
        navDisplaying.classList.add("nav-menu-link");
        main.style.marginLeft = '4rem'
        footer.style.marginLeft = '4rem'
    }
}

const menuShowSmall = () => {

    if (navDisplaying) {
        navDisplaying.classList.remove("nav-menu-link");
        main.style.marginLeft = '4rem'
        footer.style.marginLeft = '4rem'
    }
}

const menuCloseSmall = () => {

    if (navDisplaying) {
        navDisplaying.classList.add("nav-menu-link");
        main.style.marginLeft = '13rem'
        footer.style.marginLeft = '13rem'
    }
}

const getForm = () => {

    const form = document.getElementById("product-form-product")
    form.style.display = "block";

    const closeBtn = form.querySelector('.close-form-btn');
    closeBtn.addEventListener('click', () => {
        form.style.display = "none";
    });
}

const userForm = () => {

    const body = document.querySelector("body");
    const userDisplayNew = document.createElement('div');
    userDisplayNew.classList.add('container-form');
    userDisplayNew.innerHTML = userDisplay;

    body.appendChild(userDisplayNew);

    const closeBtn = userDisplayNew.querySelector('.close-form-btn');
    closeBtn.addEventListener('click', () => {
        userDisplayNew.remove();
    });

}
