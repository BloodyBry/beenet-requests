<?php

namespace App\Filament\Resources\ServiceRequests\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

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

                TextColumn::make('priority')
                    ->label('Priorité')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Faible' => 'gray',
                        'Normale' => 'info',
                        'Urgente' => 'danger',
                        default => 'gray',
                    })
                    ->sortable(),

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

                TextColumn::make('attachment')
                    ->label('Fichier joint')
                    ->formatStateUsing(fn ($state) => $state ? 'Disponible' : 'Aucun fichier')
                    ->badge()
                    ->color(fn ($state) => $state ? 'success' : 'gray'),

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
                Action::make('open_attachment')
                    ->label('Voir le fichier')
                    ->icon('heroicon-o-paper-clip')
                    ->url(function ($record) {
                        if (!$record->attachment) {
                            return null;
                        }

                        return asset('storage/' . $record->attachment);
                    })
                    ->openUrlInNewTab()
                    ->visible(fn ($record) => !empty($record->attachment)),

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