<?php
class Usuario
{
    public  $email, 
            $senha,
            $confirma;

    function __construct($email, $senha, $confirma)
    {
        $this->email = $email;
        $this->senha  = $senha;
        $this->confirma = $confirma;
    }
}
