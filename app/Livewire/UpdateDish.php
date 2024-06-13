<?php

namespace App\Livewire;

use App\Models\Dish;
use App\Models\DishType;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Livewire\Component;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class UpdateDish extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];
    public Dish $dish;

    public function mount(Dish $dish): void
    {
        $this->dish = $dish->load('variants');

        $this->form->fill($this->dish->toArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Dish Information')->columns(2)->schema([
                    TextInput::make('name')
                        ->required(),
                    TextInput::make('price')
                        ->required(),
                    Textarea::make('description')
                        ->required(),
                    Select::make('dish_type_id')
                        ->options(DishType::pluck('name', 'id')->toArray())
                        ->required(),
                    TextInput::make('menu_number')
                        ->required()
                        ->disabled()
                        ->unique(ignoreRecord: true),
                ]),
                Section::make('Varianten')->schema([
                    Repeater::make('variants')
                        ->schema([
                            Grid::make()->schema([
                                TextInput::make('name')
                                    ->required(),
                                TextInput::make('price')
                                    ->required(),
                                Textarea::make('description')
                                    ->required(),
                                TextInput::make('menu_number')->hidden()->dehydrated(),
                                TextInput::make('menu_number_addition')
                                    ->default(function (Get $get) {
                                        return 'a';
                                    })
                                    ->disabled()
                                    ->dehydrated()
                                    ->required(),
                            ])->columnSpanFull(),
                        ])->addActionLabel('Add Variant')
                ])
            ])->statePath('data');
    }

    public function update(): void
    {
        $data = $this->form->getState();

        $this->dish->update($data);

        $variants = collect($data['variants']);

        // Process each variant
        $variants->each(function ($variant) use ($data) {
            $variant['dish_type_id'] = $data['dish_type_id'];

            // Check if the variant has an id
            if (isset($variant['id'])) {
                // Find the existing variant and update it
                $existingVariant = $this->dish->variants()->find($variant['id']);
                if ($existingVariant) {
                    $existingVariant->update($variant);
                }
            } else {
                // Create a new variant
                $this->dish->variants()->create($variant);
            }
        });

        // Optionally, you might want to delete variants that were removed
        $existingVariantIds = $this->dish->variants()->pluck('id')->toArray();
        $newVariantIds = $variants->pluck('id')->filter()->toArray();
        $variantsToDelete = array_diff($existingVariantIds, $newVariantIds);
        if ($variantsToDelete) {
            $this->dish->variants()->whereIn('id', $variantsToDelete)->delete();
        }
    }

    public function render()
    {
        return view('livewire.update-dish');
    }
}
