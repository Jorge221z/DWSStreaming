<?php

namespace App\Rules;

use Closure;
use Cohensive\OEmbed\Facades\OEmbed;
use Illuminate\Contracts\Validation\ValidationRule;

class OEmbedUrl implements ValidationRule
{
    protected $providers;

    // Constructor para aceptar proveedores permitidos (ej: ['youtube'])
    public function __construct(array $providers = [])
    {
        $this->providers = $providers;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Si el campo está vacío y es nullable, no hacemos nada
        if (empty($value)) {
            return;
        }

        // Verificar si la URL es válida usando oEmbed
        $embed = OEmbed::get($value);

        // Si no se pudo obtener el embed, la URL es inválida
        if (!$embed) {
            $fail("El enlace no es un tráiler válido de YouTube.");
            return;
        }

     /*   // Si se especificaron proveedores, validar contra ellos
        if (!empty($this->providers) && !in_array($embed->providerAlias(), $this->providers)) {
            $fail("El enlace debe ser de uno de los siguientes proveedores: " . implode(', ', $this->providers));
        }*/   //de momento lo dejamos comentado porque me estaba dando fallo la funcion providerAlias()
    }
}
