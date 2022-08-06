<?php

namespace App\Filament\Widgets;

use App\Models\Item;
use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Items', Item::all()->count()),
            Card::make('Today\'s Orders', Order::all()->count()),
            Card::make('Month\'s Orders', Order::all()->count()),
            Card::make('Today\'s Sale', Order::whereDate('created_at',now()->toDate())
                ->sum('total_amount').' Rs'),
            Card::make('Month\'s Sale', Order::whereBetween('created_at',[
                now()->startOfMonth()->toDateString(),
                now()->endOfMonth()->toDateString()
                ])
                ->sum('total_amount').' Rs'),

        ];
    }
}
