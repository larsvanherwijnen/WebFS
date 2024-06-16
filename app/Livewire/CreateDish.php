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
use Illuminate\Validation\Rules\Unique;
use Livewire\Component;

class CreateDish extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Dish Information')->columns(2)->schema([
                    TextInput::make('name')
                        ->required(),
                    TextInput::make('price')
                        ->numeric()
                        ->required(),
                    Textarea::make('description')
                        ->required(),
                    Select::make('dish_type_id')
                        ->options(DishType::pluck('name', 'id')->toArray())
                        ->required(),
                    TextInput::make('menu_number')
                        ->required()
                        ->unique('dishes', 'menu_number'),
                ]),
                Section::make('Varianten')->schema([
                    Repeater::make('variants')
                        ->schema([
                            Grid::make()->schema([
                                TextInput::make('name')
                                    ->required(),
                                TextInput::make('price')
                                    ->numeric()
                                    ->required(),
                                Textarea::make('description')
                                    ->required(),
                                TextInput::make('menu_number_addition')
//                                    ->unique('dishes', 'menu_number_addition')
                                    ->unique(modifyRuleUsing: function (Unique $rule, Get $get, $value) {
                                        return $rule->where('menu_number', $get('menu_number'))
                                            ->where('menu_number_addition', $value);
                                    })
                                    ->required(),
                            ])->columnSpanFull(),
                        ])->addActionLabel('Add Variant'),
                ]),
            ])->statePath('data');
    }

    public function create(): void
    {
        $data = $this->form->getState();

        $dish = Dish::create($data);

        $variants = collect($data['variants']);

        $variants = $variants->map(function ($variant) use ($data) {
            $variant['menu_number'] = $data['menu_number'];
            $variant['dish_type_id'] = $data['dish_type_id'];

            return $variant;
        });

        $dish->variants()->createMany($variants);
    }

    public function render()
    {
        return view('livewire.create-dish');
    }
}
