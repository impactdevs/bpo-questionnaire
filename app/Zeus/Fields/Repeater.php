<?php

namespace App\Zeus\Fields;

use Filament\Forms\Components\Toggle;
use LaraZeus\Bolt\Fields\FieldsContract;

class Repeater extends FieldsContract
{
    public string $renderClass = Filament\Forms\Components\Repeater::class;

    public int $sort = 20;

    public function title(): string
    {
        return __('Checkbox List');
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
}

