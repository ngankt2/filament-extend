<?php

namespace Wiz\VNLocation;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class WizProvinceSelect
{

    public static function make($title = "Tỉnh/Thành phố"): Select
    {
        return Select::make('district_code')
            ->relationship('province', 'name')
            ->required()
            ->reactive()
            ->searchable()
            ->label($title)
            ->afterStateUpdated(function (callable $set, $state) {
                $set('district_code', null);  // Reset district_id when province changes
            });
    }

}
