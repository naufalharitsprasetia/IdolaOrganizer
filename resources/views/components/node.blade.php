<div class="branch-container">
    <div class="node">
        {{ $departement->name_departement }}
    </div>
    @if ($departement->children->count() > 0)
        <div class="line-vertical"></div>
        <div class="branches">
            @foreach ($departement->children as $child)
                <div class="branch-container">
                    <div class="line-horizontal"></div>
                    @include('components.node', ['departement' => $child])
                </div>
            @endforeach
        </div>
    @endif
</div>
