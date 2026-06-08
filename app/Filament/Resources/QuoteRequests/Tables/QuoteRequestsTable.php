<?php

namespace App\Filament\Resources\QuoteRequests\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class QuoteRequestsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('full_name')
                    ->label('Client')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('company_name')
                    ->label('Entreprise')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                TextColumn::make('phone')
                    ->label('Téléphone')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('service.title')
                    ->label('Service')
                    ->sortable(),

                TextColumn::make('budget')
                    ->label('Budget')
                    ->toggleable(),

                TextColumn::make('deadline')
                    ->label('Délai')
                    ->date('d/m/Y')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('status')
                    ->label('Statut')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Nouvelle' => 'warning',
                        'En cours' => 'info',
                        'Contacté' => 'primary',
                        'Acceptée' => 'success',
                        'Refusée' => 'danger',
                        'Terminée' => 'gray',
                        default => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Statut')
                    ->options([
                        'Nouvelle' => 'Nouvelle',
                        'En cours' => 'En cours',
                        'Contacté' => 'Contacté',
                        'Acceptée' => 'Acceptée',
                        'Refusée' => 'Refusée',
                        'Terminée' => 'Terminée',
                    ]),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}