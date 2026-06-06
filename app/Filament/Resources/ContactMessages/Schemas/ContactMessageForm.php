<?php

namespace App\Filament\Resources\ContactMessages\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ContactMessageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nom complet')
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(255),

                TextInput::make('phone')
                    ->label('Téléphone')
                    ->maxLength(30),

                TextInput::make('subject')
                    ->label('Sujet')
                    ->required()
                    ->maxLength(255),

                Textarea::make('message')
                    ->label('Message')
                    ->required()
                    ->rows(6)
                    ->columnSpanFull(),
            ]);
    }
}