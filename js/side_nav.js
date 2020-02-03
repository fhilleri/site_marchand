function openSideNav(element)
{
    element = document.getElementById("side_nav");

    const outsideClickListener = event => {
        if (event.target.closest("#side_nav") == null && event.target.id !== "side_nav_button")
        {
            element.classList.remove("triggered");
            document.removeEventListener('click', outsideClickListener);
        }
    }

    element.classList.add("triggered");
    document.addEventListener('click', outsideClickListener);

}
