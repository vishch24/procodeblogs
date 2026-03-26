/*!
 * Start Bootstrap - Simple Sidebar v6.0.6 (https://startbootstrap.com/template/simple-sidebar)
 * Copyright 2013-2023 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-simple-sidebar/blob/master/LICENSE)
 */
//
// Scripts
//

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

window.addEventListener("DOMContentLoaded", (event) => {
    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector("#sidebarToggle");
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }

        sidebarToggle.innerHTML = '<i class="bi bi-list"></i>';
        sidebarToggle.addEventListener("click", (event) => {
            event.preventDefault();
            document.body.classList.toggle("sb-sidenav-toggled");
            localStorage.setItem(
                "sb|sidebar-toggle",
                document.body.classList.contains("sb-sidenav-toggled")
            );

            if (window.innerWidth < 768) {
                if (document.body.classList.contains("sb-sidenav-toggled"))
                    sidebarToggle.innerHTML = '<i class="bi bi-x-lg"></i>';
                else sidebarToggle.innerHTML = '<i class="bi bi-list"></i>';
            }
        });
    }
});

new DataTable("#datatable", {
    pageLength: 5
});

$(document).ready(function () {
    $(".select2").each(function () {
        $(this).select2({
            placeholder: $(this).attr("placeholder"), // Get placeholder for each element
        });
    });

    if ($(".editor").length) {

        tinymce.init({
            selector: ".editor",
            // skin: 'oxide',
            // content_css: 'default',
            height: 500,
            plugins: [
                "advlist",
                "autolink",
                "lists",
                "link",
                "image",
                "charmap",
                "preview",
                "anchor",
                "searchreplace",
                "visualblocks",
                "code",
                "codesample",
                "fullscreen",
                "insertdatetime",
                "media",
                "table",
                "help",
                "wordcount",
            ],
            toolbar:
                "undo redo | blocks | " +
                "bold italic backcolor | alignleft aligncenter " +
                "alignright alignjustify | bullist numlist outdent indent | " +
                "removeformat | help",
            codesample_languages: [
                { text: "Plain Text", value: "plaintext" },
                { text: "HTML/XML", value: "markup" },
                { text: "Javascript", value: "javascript" },
                { text: "CSS", value: "css" },
                { text: "PHP", value: "php" },
                { text: "Ruby", value: "ruby" },
                { text: "Python", value: "python" },
                { text: "Java", value: "java" },
                { text: "C", value: "c" },
                { text: "C#", value: "csharp" },
                { text: "C++", value: "cpp" },
            ],
            content_css:
                "https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism.min.css",
            codesample_global_prismjs: true, // Ensure TinyMCE works with Prism.js
            // content_style:
            //     "body { font-family:Helvetica,Arial,sans-serif; font-size:16px }",
        });

        // const toggleDarkMode = () => {
        //         const editor = tinymce.activeEditor.getContainer();
        //         console.log(editor.classList);
        //         editor.classList.toggle('dark-mode');
        // }

        // // Attach event listener (safer than inline onclick)
        // document.getElementById("darkModeToggle").addEventListener("click", toggleDarkMode);
    }
});
