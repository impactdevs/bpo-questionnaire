<?php

namespace App\Zeus\Fields;

use Filament\Forms\Components\Toggle;
use LaraZeus\Bolt\Fields\FieldsContract;
use Filament\Forms\Components\TextInput;

class Repeater extends FieldsContract
{
    // public string $renderClass = Filament\Forms\Components\Repeater::class;
    public string $renderClass = \Filament\Forms\Components\Repeater::class;

    public int $sort = 20;

    public function title(): string
    {
        return __('Repeater List');
    }

    public static function getOptions(): array
    {
        return [
            self::htmlID(),
            self::required(),
            self::columnSpanFull(),
        ];
    }

    public static function getOptionsHidden(): array
    {
        return [
            self::hiddenHtmlID(),
            self::hiddenRequired(),
            self::hiddenColumnSpanFull(),
        ];
    }
    public function appendFilamentComponentsOptions($component, $zeusField, bool $hasVisibility = false)
{
    parent::appendFilamentComponentsOptions($component, $zeusField, $hasVisibility);

    $component = $component->schema([
        TextInput::make('name')
            ->label(__('Add Field Name'))
            ,

    ]);

    return $component;
}
}

