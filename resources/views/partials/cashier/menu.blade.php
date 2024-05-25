<div class="py-4">
    <div class="px-4 flex items-center justify-between mb-4">
        <div class="text-xl font-bold">Gouden draak</div>
    </div>
    <div class="border-b border-gray-200">
        <ul class="px-4 space-x-4 flex flex-wrap text-md font-medium text-gray-500">
            <li class="me-2 flex">
                <a href="{{ route('admin.checkout') }}" aria-current="page"
                   class="{{ request()->routeIs('admin.checkout') ? 'border-b-2 border-black text-black font-bold' : 'pb-2' }}">Dashboard</a>
            </li>
            <li class="me-2 flex">
                <a href="{{ route('admin.sales') }}"
                   class="{{ request()->routeIs('admin.sales') ? 'border-b-2 border-black text-black font-bold' : 'pb-2' }}">Verkoop overzicht</a>
            </li>
            <li class="me-2 flex">
                <a href="{{ route('logout') }}"
                   class="{{ request()->routeIs('logout') ? 'border-b-2 border-black text-black font-bold' : 'pb-2' }}">Uitloggen</a>
            </li>
        </ul>
    </div>
</div>
