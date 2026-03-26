<!-- Pagination-->
@if ($totalPages)
<nav aria-label="Pagination">
    <hr class="my-0" />
    <ul class="pagination justify-content-center my-4">
        <!-- First -->
        @if ($currentPage == 1)
            <li class="page-item disabled"><a class="page-link" href="?page=1" tabindex="-1" aria-disabled="false"><i class="bi bi-chevron-double-left"></i></a></li>
        @else
            <li class="page-item"><a class="page-link" href="?page=1" tabindex="-1" aria-disabled="true"><i class="bi bi-chevron-double-left"></i></a></li>
        @endif

        <!-- Previous -->
        @if ($currentPage > 1)
            <li class="page-item"><a class="page-link" href="?page={{ $currentPage - 1 }}" tabindex="-1" aria-disabled="false"><i class="bi bi-chevron-left"></i></a></li>
        @else
            <li class="page-item disabled"><a class="page-link" href="?page={{ $currentPage - 1 }}" tabindex="-1" aria-disabled="true"><i class="bi bi-chevron-left"></i></a></li>
        @endif

        <!-- No. of pages -->
        @for ($i = 1; $i <= $totalPages; $i++)
            <li class="page-item {{ $i == $currentPage ? 'active' : '' }}" {{ $i == $currentPage ? 'aria-current="page"' : '' }}><a class="page-link" href="?page={{ $i }}">{{ $i }}</a></li>
        @endfor

        <!-- Next -->
        @if ($currentPage < $totalPages)
            <li class="page-item"><a class="page-link" href="?page={{ $currentPage + 1 }}" tabindex="-1" aria-disabled="false"><i class="bi bi-chevron-right"></i></a></li>
        @else
            <li class="page-item disabled"><a class="page-link" href="?page={{ $currentPage - 1 }}" tabindex="-1" aria-disabled="true"><i class="bi bi-chevron-right"></i></a></li>
        @endif

        <!-- Last -->
        @if ($currentPage == $totalPages)
            <li class="page-item disabled"><a class="page-link" href="?page={{ $totalPages }}" tabindex="-1" aria-disabled="false"><i class="bi bi-chevron-double-right"></i></a></li>
        @else
            <li class="page-item"><a class="page-link" href="?page={{ $totalPages }}" tabindex="-1" aria-disabled="true"><i class="bi bi-chevron-double-right"></i></a></li>
        @endif
    </ul>
</nav>
@endif
