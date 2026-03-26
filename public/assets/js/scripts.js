document.addEventListener("DOMContentLoaded", function () {
    Prism.highlightAll();
});

function sendReply(parentId, replyForm) {
    let reply = document.getElementById(replyForm);
    reply.querySelector("#parent_id").value = parentId;

    if (reply.style.display === "none") {
        reply.style.display = "block";
    } else {
        reply.style.display = "none";
    }
}

/**
 * Toggle mobile nav dropdowns
 */
document.querySelectorAll(".navmenu .toggle-dropdown").forEach((navmenu) => {
    navmenu.addEventListener("click", function (e) {
        e.preventDefault();
        this.parentNode.classList.toggle("active");
        this.parentNode.nextElementSibling.classList.toggle("dropdown-active");
        e.stopImmediatePropagation();
    });
});

// Close dropdown when clicking outside
document.addEventListener("click", function (e) {
    document
        .querySelectorAll(".navmenu .dropdown-active")
        .forEach((dropdown) => {
            if (
                !dropdown.contains(e.target) &&
                !dropdown.previousElementSibling.contains(e.target)
            ) {
                dropdown.classList.remove("dropdown-active");
                dropdown.previousElementSibling.classList.remove("active");
            }
        });
});
