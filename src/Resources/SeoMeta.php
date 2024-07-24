<?php /** @noinspection PhpMultipleClassDeclarationsInspection */

namespace Wiroom\NovaSeo\Resources;

use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class SeoMeta extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\Wiroom\NovaSeo\Models\SeoMeta>
     */
    public static string $model = \Wiroom\NovaSeo\Models\SeoMeta::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'indexable.id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request): array
    {
        //dd($request->resource, $request->resourceId, $request->resourceIdKey);
        return [
            ID::make()->sortable(),

            Text::make('Requête cible', 'focus_keyword')
                ->rules('sometimes', 'max:255')
                ->help('Le mot-clé principal que vous souhaitez cibler avec cette page'),

            Text::make('Titre', 'title')
                ->rules('max:70')
                ->maxlength(70),

            Textarea::make('Description', 'description')
                ->rows(2)
                ->rules('max:160')
                ->maxlength(160),

            Image::make('Image Open Graph', 'image')
                ->disk('public')
                ->path('seo')
                ->prunable()
                ->help('Utilisée pour le partage sur les réseaux sociaux. Taille recommandée : 1200x630 px (aspect ratio of 1.9:1)'),

            Boolean::make('Ne pas indexer', 'is_robots_noindex')
                ->help("Indique aux moteurs de recherche de ne pas indexer cette page"),

            Boolean::make('Ne pas suivre', 'is_robots_nofollow')
                ->help("Indique aux moteurs de recherche de ne pas suivre les liens de cette page"),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request): array
    {
        return [];
    }
}
