# Projekto kūrimas

1. Susikurti naują repozitoriją.
2. Ją nusiklonuoti į savo kompiuterį.
3. Jeigu symfony versijos dar neturite:

- Paleisti per terminalą komandą `composer create-project symfony/skeleton:"6.2.*" my_project_directory`, kuri sukurs griaučius symfony frameworkui direktorijoje `my_project_directory`.

4. Visus failus iš ten susikopijuoti į savo tuščią repozitoriją.
5. Per Git/VSCode pridėti visus failus ten.
6. Sukurti commit'ą.
7. Supushinti pakeitimus į serverį.

# Twig šablonų kūrimas

1. Prisidėti Twig modulį naudojant `composer require symfony/twig-bundle` (iš https://packagist.org/packages/symfony/twig-bundle).
2. Susikūriame naują failą `index.html.twig`, kuriame talpinsime savo projekto šabloną, kuris extendina `base.html.twig`.
3. Visus reikalingus failus frontendui (JS/CSS/paveikslėliai) dedame į `public/`direktoriją, kad jie būtų pasiekiami serveriui.
4. Jeigu mum reikalinga kokia nors `package.json` biblioteka (pvz.: Bootstrap), `npm install` irgi leidžiame `public` direktorijoje.
