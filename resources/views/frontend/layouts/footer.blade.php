<footer class="py-5 bg-body">
    <div class="container"><p class="m-0 text-center">Copyright &copy; ProcodeBlogs {{ date('Y') }}</p></div>
</footer>

<div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 color-mode-toggle" style="z-index: 999999">
    <button class="btn btn-secondary py-2 dropdown-toggle d-flex align-items-center shadow" id="color-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
        <span class="my-1 theme-icon-active" width="1em" height="1em"><i class="bi bi-circle-half"></i></span>
        <span class="visually-hidden" id="color-theme-text">Toggle theme</span>
    </button>
    <ul class="dropdown-menu dropdown-menu-end py-0 shadow" aria-labelledby="color-theme-text">
        <li>
            <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
                <span class="me-2 opacity-50" width="1em" height="1em"><i class="bi bi-sun-fill"></i></span>
                Light
                <span id="check2" class="ms-auto d-none" width="1em" height="1em"><i class="bi bi-check2"></i></span>
            </button>
        </li>
        <li>
            <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
                <span class="me-2 opacity-50" width="1em" height="1em"><i class="bi bi-moon-stars-fill"></i></span>
                Dark
                <span class="ms-auto d-none" width="1em" height="1em"><i class="bi bi-check2"></i></span>
            </button>
        </li>
        <li>
            <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
            <span class="me-2 opacity-50" width="1em" height="1em"><i class="bi bi-circle-half"></i></span>
            Auto
            <span class="ms-auto d-none" width="1em" height="1em"><i class="bi bi-check2"></i></span>
            </button>
        </li>
    </ul>
</div>
