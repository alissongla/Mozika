@if ($paginator->lastPage() > 1)
<ul class="pagination">
    <li class="{{ ($paginator->currentPage() == 1) ? ' d-none' : '' }}" style="margin-right: 10px">
        <a class="btn btn-dark mt-4" style="background-color:#db5502" href="{{ $paginator->url(1) }}" >Anterior</a>
    </li>
    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
            <a class="btn btn-dark mt-4" style="background-color:#db5502" href="{{ $paginator->url($i) }}" style="margin-right: 10px">{{ $i }}</a>
        </li>
    @endfor
    <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' d-none' : '' }}">
        <a class="btn btn-dark mt-4" style="background-color:#db5502" href="{{ $paginator->url($paginator->currentPage()+1) }}" >Proximo</a>
    </li>
</ul>
@endif