<?php

namespace App\Filament\Resources\ServiceRequests\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ServiceRequestsTable
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
                    ->searchable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                TextColumn::make('service.title')
                    ->label('Service')
                    ->sortable(),

                TextColumn::make('priority')
                    ->label('Priorité')
                    ->badge()
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Statut')
                    ->badge()
                    ->sortable(),

                TextColumn::make('attachment')
                    ->label('Fichier')
                    ->limit(30),

                TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('priority')
                    ->label('Priorité')
                    ->options([
                        'Faible' => 'Faible',
                        'Normale' => 'Normale',
                        'Urgente' => 'Urgente',
                    ]),

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