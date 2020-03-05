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

function switchFilterOption(element)
{
    var filterOption = element.parentNode.querySelector(".filter_options");
    if (filterOption.style.maxHeight && filterOption.style.maxHeight != "0px")
    {
        filterOption.style.maxHeight = "0px";
    }
    else filterOption.style.maxHeight = filterOption.scrollHeight + "px";
}