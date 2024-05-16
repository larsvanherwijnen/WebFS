<?php

namespace App\Console\Commands;

use App\Models\DishType;
use App\Models\DishTypes;
use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class ImportCsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $menuFile = storage_path('Legacy/Data/menu.csv');
        $salesFile = storage_path('Legacy/Data/sales.csv');

        if (!file_exists($menuFile) || !file_exists($salesFile)) {
            $this->error('CSV files not found');
            return;
        }

        $this->info('Starting import...');

        $menuItems = $this->getMenuItems($menuFile);

        $salesData = $this->getSalesData($salesFile);

        $coupledData = $this->coupleData($menuItems, $salesData);

        $types = $this->collectAndSaveDishTypes($menuItems);

        $this->saveToDatabase($coupledData, $types);

        $this->info('Data imported successfully.');
    }


    private function getMenuItems($file): Collection
    {
        $menuData = collect();
        $headerSkipped = false;

        if (($handle = fopen($file, 'r')) !== FALSE) {
            while (($data = fgetcsv($handle)) !== FALSE) {
                if (!$headerSkipped) {
                    $headerSkipped = true;
                    continue;
                }

                $menuData->push([
                    'id' => $data[0],
                    'menu_number' => $data[1],
                    'menu_addition' => $data[2],
                    'name' => $data[3],
                    'price' => $data[4],
                    'dish_type' => $data[5],
                    'description' => $data[6]
                ]);
            }

            fclose($handle);
        }

        return $menuData;
    }


    private function getSalesData($file): Collection
    {
        $salesData = collect();
        $headerSkipped = false;

        if (($handle = fopen($file, 'r')) !== FALSE) {
            while (($data = fgetcsv($handle)) !== FALSE) {
                if (!$headerSkipped) {
                    $headerSkipped = true;
                    continue;
                }

                $salesData->push([
                    'product_id' => $data[1],
                    'quantity' => $data[2],
                    'created_at' => $data[3],
                    'updated_at' => $data[3]
                ]);
            }

            fclose($handle);
        }

        return $salesData;
    }

    private function collectAndSaveDishTypes($menuItems): Collection
    {
        $dishTypes = $menuItems->pluck('dish_type')->unique();

        //mass insert dish types to database
        $dishTypes->each(function ($dishType) {
            DishType::firstOrCreate(['name' => $dishType]);
        });


        return DishType::all();
    }

    private function coupleData($menuData, $salesData): Collection
    {
        $groupedSalesData = $salesData->groupBy('product_id');

        // Transform sales data into associative array structure
        $groupedSalesData = $groupedSalesData->map(function ($sales, $productId) {
            return $sales->toArray();
        });

        $menuData->transform(function ($menuItem) use ($groupedSalesData) {
            // Find the sales data corresponding to the menu item's product ID
            $sales = $groupedSalesData->get($menuItem['id']);
            // If sales data exists, add it to the menu item under the 'sales' key
            if ($sales) {
                $menuItem['sales'] = $sales;
            } else {
                $menuItem['sales'] = [];
            }

            return $menuItem;
        });

        return $menuData;
    }

    private function saveToDatabase($data, $types)
    {
        $data->collect()->each(function ($item) use ($types) {
            $dishType = $types->firstWhere('name', $item['dish_type']);

            $product = Product::create([
                'name' => $item['name'],
                'price' => $item['price'],
                'description' => $item['description'],
                'menu_number' => empty($item['menu_number']) ? null : $item['menu_number'],
                'menu_number_addition' => $item['menu_addition'],
                'dish_type_id' => $dishType->id
            ]);

            $product->sales()->createMany($item['sales']);
        });


    }

}
