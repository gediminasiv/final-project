# Projekto kūrimas

1. Susikurti naują repozitoriją.
2. Ją nusiklonuoti į savo kompiuterį.
3. Jeigu symfony versijos dar neturite:

- Paleisti per terminalą komandą `composer create-project symfony/skeleton:"6.2.*" my_project_directory`, kuri sukurs griaučius symfony frameworkui direktorijoje `my_project_directory`.

4. Visus failus iš ten susikopijuoti į savo tuščią repozitoriją.
5. Per Git/VSCode pridėti visus failus ten.
6. Sukurti commit'ą.
7. Supushinti pakeitimus į serverį.

# Twig šablonų kūrimas (šablonai)

1. Prisidėti Twig modulį naudojant `composer require symfony/twig-bundle` (iš https://packagist.org/packages/symfony/twig-bundle).
2. Susikūriame naują failą `index.html.twig`, kuriame talpinsime savo projekto šabloną, kuris extendina `base.html.twig`.
3. Visus reikalingus failus frontendui (JS/CSS/paveikslėliai) dedame į `public/`direktoriją, kad jie būtų pasiekiami serveriui.
4. Jeigu mum reikalinga kokia nors `package.json` biblioteka (pvz.: Bootstrap), `npm install` irgi leidžiame `public` direktorijoje.

# Doctrine pridėjimas/darbas su Doctrine. (duomenų bazės)

1. Įsirašom Doctrine variklį: `composer require symfony/orm-pack`.
2. Įsirašom klasių generatorių: `composer require --dev symfony/maker-bundle`
3. Pasiredaguojame `.env` faile parametrą DATABASE_URL, kad jis atitiktų mūsų turimą vartotojo vardą ir slaptažodį.
4. Susikuriame duomenų bazę su `php bin/console doctrine:database:create`.
5. Susikūriame naują lentelę/duomenų bazės objektą/entity naudodami `php bin/console make:entity`.
6. Sukuriame nauja duomenų bazės lentelę su `php bin/console doctrine:schema:update --force`.

# Darbas su formomis

1. Norėdami išgauti visą informaciją apie užklausą iš Symfony, naudojame Request klasės `createFromGlobals` metodą. `$request = Request::createFromGlobals()`.
2. `$request->request->all()` - grąžina visus POST duomenis.
3. `$request->request->get('inputo-pavadinimas') - grąžina vieno input'o POST duomenis.
4. `$request->isMethod('POST')` patikrina ar buvo atliktas POST requestas.

# Darbas su Doctrine

1. Norėdami naudoti Doctrine manageri, turime pas save į controllerio funkciją įsidėti `ManagerRegistry` klasę.
2. Doctrine manageris - naudojamas įrašyti objektus į duombazę.
3. Doctrine repozitorija - naudojama nuskaityti objektus iš duombazės.

## Darbas su Manageriu

4. $manager->persist() - išsaugo objektą į query sąrašą.
5. $manager->flush() - įrašo visus persist'intus objektus į duombazę.

## Darbas su Repozitorija

6. Norėdami nuskaityti repozitorijos visus duomenis naudojame `findAll()`. SELECT \* FROM contact.
7. Norėdami nuskaityti repozitorijos vieną įrašą naudojame `findOneBy(['name' => 'Petras']);`. SELECT \* FROM contact WHERE name='Petras'.
