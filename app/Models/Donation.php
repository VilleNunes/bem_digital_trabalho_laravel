<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Donation extends Model
{
    protected $fillable = [
        'user_id',
        'campaign_id',
        'name',
        'description',
        'quantify',
        'amount',
        'type',
        'recipient_name',
    ];

    protected $casts = [
        'quantify' => 'integer',
        'amount' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function campaign(): BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }

    /**
     * Scope para filtrar doações do tipo entrada
     */
    public function scopeEntradas($query)
    {
        return $query->where('type', 'entrada');
    }

    /**
     * Scope para filtrar doações do tipo saída
     */
    public function scopeSaidas($query)
    {
        return $query->where('type', 'saida');
    }

    /**
     * Scope para filtrar por campanha
     */
    public function scopeByCampaign($query, $campaignId)
    {
        return $query->where('campaign_id', $campaignId);
    }

    /**
     * Verifica se é uma entrada
     */
    public function isEntrada(): bool
    {
        return $this->type === 'entrada';
    }

    /**
     * Verifica se é uma saída
     */
    public function isSaida(): bool
    {
        return $this->type === 'saida';
    }

    /**
     * Retorna o tipo formatado
     */
    public function getTypeFormattedAttribute(): string
    {
        return $this->type === 'entrada' ? 'Entrada' : 'Saída';
    }

    /**
     * Retorna o valor formatado
     */
    public function getAmountFormattedAttribute(): ?string
    {
        return $this->amount !== null ? 'R$ ' . number_format($this->amount, 2, ',', '.') : null;
    }
}
