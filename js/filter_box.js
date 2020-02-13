var filterBoxIsOpen = false;

function openFilterBox()
{
    var cont = document.getElementById("filter_box_container");
    cont.classList.add("open");
}

function closeFilterBox()
{
    var cont = document.getElementById("filter_box_container");
    cont.classList.remove("open");
}

function switchFilterBox()
{
    var cont = document.getElementById("filter_box_container");
    if (cont.classList.contains("open")) closeFilterBox();
    else openFilterBox();
}