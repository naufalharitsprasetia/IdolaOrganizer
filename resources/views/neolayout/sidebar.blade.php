<div class="sidebar-container py-3 px-3 w-[22vw] h-full fixed bg-fourth">
    <div class="flex flex-col">
        {{-- logo --}}
        <a href="#" class="my-1 mx-1"><img src="/img/logox.png" class="w-[10rem] h-auto my-2 mx-1" alt=""></a>
        <hr class="border-2 border-primary">
        {{--  --}}
        <ul class="p-2 mx-2 font-semibold text-base text-primary ">
            <li class="my-1 py-2 hover:text-sixth ">
                <a href="/organisasi"><i class="fa-solid fa-left-long"></i> Back</a>
            </li>
            <li class="my-1 py-2 hover:text-sixth {{ $active === 'dashboard' ? 'text-sixth' : '' }}">
                <a href="/organisasi/{{ $organization->id }}"><i class="fa-solid fa-table-columns"></i> Dashboard</a>
            </li>
            <li class="my-1 py-2 hover:text-sixth {{ $active === 'struktur' ? 'text-sixth' : '' }}">
                <a href="/struktur?org={{ $organization->id }}"><i class="fa-solid fa-sitemap"></i> Struktur</a>
            </li>
            <li class="my-1 py-2 hover:text-sixth {{ $active === 'proker' ? 'text-sixth' : '' }}">
                <a href="/proker?org={{ $organization->id }}"><i class="fa-solid fa-lightbulb"></i> Program Kerja</a>
            </li>
            <li class="my-1 py-2 hover:text-sixth {{ $active === 'tasks' ? 'text-sixth' : '' }}">
                <a href="/task?org={{ $organization->id }}"><i class="fa-solid fa-list-check"></i> Tasks</a>
            </li>
            <li class="my-1 py-2 hover:text-sixth {{ $active === 'events' ? 'text-sixth' : '' }}">
                <a href="/event?org={{ $organization->id }}"><i class="fa-solid fa-calendar-days"></i> Events</a>
            </li>
        </ul>
        <hr class="border-2 border-primary">
        <ul class="flex flex-col justify-center items-center p-2 mx-2 font-semibold text-base text-primary ">
            <li class="mx-auto text-center">
                <img src="{{ asset('/storage' . '/' . $organization->logo_organization) }}" class="w-20"
                    alt="">
                {{ $organization->singkatan_organization }}
            </li>
        </ul>
        <hr class="border-2 border-primary">
        <ul class="p-2 mx-2 font-semibold text-base text-primary">
            <li class="my-1 py-2 hover:text-sixth">
                <a href=""><i class="fa-solid fa-user"></i> Profile <i class="fa-solid fa-caret-up"></i></a>
            </li>
            {{-- <li class="my-2 py-2 hover:text-sixth">
                <a href=""><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
            </li> --}}
        </ul>

    </div>
</div>
