![Nova Pennant](https://banners.beyondco.de/Nova%20Pennant.png?theme=light&packageManager=composer+require&packageName=laravel%2Fnova-pennant&pattern=cage&style=style_1&description=A+Pennant+Resource+Tool+for+Laravel+Nova&md=1&showWatermark=0&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg)

This package makes it easy to view and manage Laravel Pennant featuers for your Laravel application inside of Nova.

## Installation

You can install the Nova tool via Composer:

```shell
composer require laravel/nova-pennant
```

Next, you must register the tool within the User Resource.

```php
use Laravel\Nova\PennantTool\PennantTool;

/**
 * Get the fields displayed by the resource.
 *
 * @return array
 */
public function fields(NovaRequest $request)
{
    return [
        ID::make()->sortable(),

        Text::make('Name')
            ->sortable()
            ->rules('required', 'max:255'),

        Text::make('Email')
            ->sortable()
            ->rules('required', 'email', 'max:254')
            ->creationRules('unique:users,email')
            ->updateRules('unique:users,email,{{resourceId}}'),

        Password::make('Password')
            ->onlyOnForms()
            ->creationRules('required', Rules\Password::defaults())
            ->updateRules('nullable', Rules\Password::defaults()),

        PennantTool::make(),
    ];
}
```


