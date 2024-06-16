<div>
    <div class="space-y-3">
        <a href="{{route('admin.dishes')}}" class="bg-green-500 rounded p-2 mb-4">
            terug naar overzicht
        </a>
        <form wire:submit="update">
            {{ $this->form }}

            <button type="submit" class="bg-green-500 rounded p-2 mt-4">
                Aanpassing opslaan
            </button>
        </form>
    </div>
</div>
