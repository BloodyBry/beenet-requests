<?php

namespace App\Filament\Resources\ServiceRequests\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ServiceRequestForm
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

                Select::make('priority')
                    ->label('Priorité')
                    ->options([
                        'Faible' => 'Faible',
                        'Normale' => 'Normale',
                        'Urgente' => 'Urgente',
                    ])
                    ->required(),

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

                TextInput::make('attachment')
                    ->label('Fichier joint')
                    ->disabled()
                    ->dehydrated(false)
                    ->helperText('Le fichier est envoyé depuis le formulaire public.'),

                Textarea::make('description')
                    ->label('Description')
                    ->required()
                    ->rows(6)
                    ->columnSpanFull(),
            ]);
    }
}