<?php

/*
* rescrie update form!!!
*
*
========================================================================
*daca nu este valid sa se afiseze mesajul, altfel sa ramana campul completat
    *1. daca nu se indeplineste conditia{
        sa se afiseze mesajul;
    } else {
        - $_SESSION["keep"]["brand"] = $_POST["brand"]; ---- nu functioneaza --- apare brandul scris langa dropdown
        - daca salvez tot dropdownul intr-o sesiune, ramane salvata selectia, dar se afiseaza si dropdownul initial cu toate optiunile de selectat
    }

    *2. if($valid){
        ????
    }
========================================================================

* optiunea de adaugare a altui brand, diferit de cel din lista