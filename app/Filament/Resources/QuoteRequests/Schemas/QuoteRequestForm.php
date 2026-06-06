<?php

namespace App\Filament\Resources\QuoteRequests\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class QuoteRequestForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('full_name')
                    ->label('Nom complet')
                    ->required()
                    ->maxLength(255),

                TextInput::make('company_name')
                    ->label('Entreprise')
                    ->maxLength(255),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(255),

                TextInput::make('phone')
                    ->label('Téléphone')
                    ->maxLength(30),

                Select::make('service_id')
                    ->label('Service')
                    ->relationship('service', 'title')
                    ->searchable()
                    ->preload(),

                TextInput::make('budget')
                    ->label('Budget')
                    ->maxLength(255),

                DatePicker::make('deadline')
                    ->label('Délai souhaité'),

                Select::make('status')
                    ->label('Statut')
                    ->options([
                        'Nouvelle' => 'Nouvelle',
                        'En cours' => 'En cours',
                        'Contacté' => 'Contacté',
                        'Acceptée' => 'Acceptée',
                        'Refusée' => 'Refusée',
                        'Terminée' => 'Terminée',
                    ])
                    ->default('Nouvelle')
                    ->required(),

                Textarea::make('project_description')
                    ->label('Description du projet')
                    ->required()
                    ->rows(6)
                    ->columnSpanFull(),
            ]);
    }
}