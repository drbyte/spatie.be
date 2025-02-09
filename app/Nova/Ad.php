<?php

namespace App\Nova;

use App\Models\Ad as EloquentAd;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Ad extends Resource
{
    public static $model = EloquentAd::class;

    public static $title = 'name';

    public static $group = "GitHub";

    public static $search = [
       'name',
    ];

    public function fields(NovaRequest $request)
    {
        return [
            Text::make('Name')
                ->sortable()
                ->rules(['required', 'max:255']),

            Image::make('Image')->disk('github_ads'),

            Text::make('Click Redirect URL')->rules(['required', 'max:255', 'url']),

            Boolean::make('Active'),

            HasMany::make('Repositories'),
        ];
    }
}
