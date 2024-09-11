<?php

class UserValidator
{
    // Metoda walidująca adres e-mail
    public function validateEmail(string $email): bool
    {
        // Wyrażenie regularne do sprawdzenia poprawności adresu e-mail
        $pattern = '/^[a-zA-Z][a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
        
        // Sprawdzenie czy adres e-mail pasuje do wzorca
        return (bool)preg_match($pattern, $email);
    }

    // Metoda walidująca hasło
    public function validatePassword(string $password): bool
    {
        // Sprawdzanie minimalnej długości hasła (min. 8 znaków)
        if (strlen($password) < 8) {
            return false;
        }

        // Sprawdzanie czy hasło zawiera co najmniej jedną dużą literę
        if (!preg_match('/[A-Z]/', $password)) {
            return false;
        }

        // Sprawdzanie czy hasło zawiera co najmniej jedną małą literę
        if (!preg_match('/[a-z]/', $password)) {
            return false;
        }

        // Sprawdzanie czy hasło zawiera co najmniej jedną cyfrę
        if (!preg_match('/\d/', $password)) {
            return false;
        }

        // Sprawdzanie czy hasło zawiera co najmniej jeden znak specjalny
        if (!preg_match('/[\W_]/', $password)) {
            return false;
        }

        // Jeśli wszystkie warunki są spełnione, zwróć true
        return true;
    }
}
