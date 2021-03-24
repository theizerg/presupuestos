<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Pais;
use App\Models\Estado;
use App\Models\Estado_Civil;
use App\Models\Genero;
use App\Models\Grado_Instruccion;
use App\Models\Grado_Ministerial;
use App\Models\Nacionalidad;
use App\Models\TipoSangre;
use App\Models\Tipolocal;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
       DB::table('status')->insert([
            'nb_nombre'      => 'Activo'
        ]);

          DB::table('status')->insert([
            'nb_nombre'      =>'Inactivo'
        ]);

        $user = new User;
        $user->name = 'Theizer';
        $user->nu_zona = 1;
        $user->username = 'tgonzalez';
        $user->last_name = 'Gonzalez';
        $user->email = 'tgonzalez@gmail.com';
        $user->password = 'admin';
        $user->status = 1; // (1) active (0)disabled
        $user->save();

        $user->assignRole('Administrador');




        $pais= new Pais();
        $pais->nb_pais ='Afganistán';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Albania';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Alemania';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Andorra';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Angola';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Antigua y Barbuda';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Arabia Saudita';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Argelia';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Argentina';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Armenia';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Australia';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Austria';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Azerbaiyán';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Bahamas';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Bangladés';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Barbados';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Baréin';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Bélgica';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Belice';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Benín';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Bielorrusia';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Birmania';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Bolivia';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Bosnia y Herzegovina';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Botsuana';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Brasil';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Brunéi';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Bulgaria';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Burkina Faso';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Burundi';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Bután';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Cabo Verde';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Camboya';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Camerún';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Canadá';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Catar';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Chad';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Chile';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'China';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Chipre';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Ciudad del Vaticano';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Colombia';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Comoras';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Corea del Norte';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Corea del Sur';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Costa de Marfil';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Costa Rica';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Croacia';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Cuba';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Dinamarca';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Dominica';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Ecuador';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Egipto';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'El Salvador';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Emiratos Árabes Unidos';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Eritrea';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Eslovaquia';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Eslovenia';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'España';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Estados Unidos';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Estonia';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Etiopía';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Filipinas';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Finlandia';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Fiyi';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Francia';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Gabón';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Gambia';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Georgia';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Ghana';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Granada';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Grecia';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Guatemala';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Guyana';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Guinea';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Guinea-Bisáu';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Guinea Ecuatorial';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Haití';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Honduras';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Hungría';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'India';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Indonesia';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Irak';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Irán';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Irlanda';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Islandia';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Islas Marshall';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Islas Salomón';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Israel';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Italia';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Jamaica';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Japón';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Jordania';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Kazajistán';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Kenia';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Kirguistán';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Kiribati';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Kuwait';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Laos';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Lesoto';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Letonia';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Líbano';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Liberia';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Libia';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Liechtenstein';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Lituania';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Luxemburgo';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Macedonia del Norte';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Madagascar';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Malasia';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Malaui';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Maldivas';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Malí';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Malta';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Marruecos';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Mauricio';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Mauritania';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'México';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Micronesia';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Moldavia';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Mónaco';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Mongolia';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Montenegro';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Mozambique';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Namibia';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Nauru';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Nepal';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Nicaragua';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Níger';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Nigeria';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Noruega';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Nueva Zelanda';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Omán';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Países Bajos';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Pakistán';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Palaos';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Panamá';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Papúa Nueva Guinea';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Paraguay';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Perú';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Polonia';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Portugal';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Reino Unido de Gran Bretaña e Irlanda del Norte';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'República Centroafricana';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'República Checa';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'República del Congo';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'República Democrática del Congo';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'República Dominicana';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'República Sudafricana';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Ruanda';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Rumanía';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Rusia';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Samoa';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'San Cristóbal y Nieves';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'San Marino';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'San Vicente y las Granadinas';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Santa Lucía';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Santo Tomé y Príncipe';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Senegal';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Serbia';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Seychelles';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Sierra Leona';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Singapur';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Siria';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Somalia';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Sri Lanka';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Suazilandia';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Sudán';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Sudán del Sur';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Suecia';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Suiza';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Surinam';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Tailandia';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Tanzania';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Tayikistán';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Timor Oriental';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Togo';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Tonga';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Trinidad y Tobago';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Túnez';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Turkmenistán';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Turquía';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Tuvalu';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Ucrania';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Uganda';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Uruguay';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Uzbekistán';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Vanuatu';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Venezuela';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Vietnam';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Yemen';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Yibuti';
        $pais->save();


        $pais= new Pais();
        $pais->nb_pais = 'Zambia';
        $pais->save();

        $pais= new Pais();
        $pais->nb_pais = 'Zimbabue';
        $pais->save();



         $gender = new Genero();
        $gender->nb_genero = 'Masculino';
        $gender->save();

        $gender = new Genero();
        $gender->nb_genero = 'Femenino';
        $gender->save();

        $estadoCivil = new Estado_Civil();
        $estadoCivil->nb_estado_civil = 'Soltero(a)';
        $estadoCivil->save();

        $estadoCivil = new Estado_Civil();
        $estadoCivil->nb_estado_civil = 'Casado(a)';
        $estadoCivil->save();

        $estadoCivil = new Estado_Civil();
        $estadoCivil->nb_estado_civil = 'Viudo(a)';
        $estadoCivil->save();



        $estado = new Estado();
        $estado->nb_estado = 'Amazonas';
        $estado->save();

        $estado = new Estado();
        $estado->nb_estado = 'Anzoátegui';
        $estado->save();

        $estado = new Estado();
        $estado->nb_estado = 'Apure';
        $estado->save();

        $estado = new Estado();
        $estado->nb_estado = 'Aragua';
        $estado->save();

        $estado = new Estado();
        $estado->nb_estado = 'Barinas';
        $estado->save();

        $estado = new Estado();
        $estado->nb_estado = 'Bolívar';
        $estado->save();

        $estado = new Estado();
        $estado->nb_estado = 'Carabobo';
        $estado->save();

        $estado = new Estado();
        $estado->nb_estado = 'Cojedes';
        $estado->save();

        $estado = new Estado();
        $estado->nb_estado = 'Delta Amacuro';
        $estado->save();

        $estado = new Estado();
        $estado->nb_estado = 'Distrito Capital';
        $estado->save();

        $estado = new Estado();
        $estado->nb_estado = 'Falcón';
        $estado->save();

        $estado = new Estado();
        $estado->nb_estado = 'Guárico';
        $estado->save();

        $estado = new Estado();
        $estado->nb_estado = 'Lara';
        $estado->save();

        $estado = new Estado();
        $estado->nb_estado = 'Mérida';
        $estado->save();

        $estado = new Estado();
        $estado->nb_estado = 'Miranda';
        $estado->save();

        $estado = new Estado();
        $estado->nb_estado = 'Monagas';
        $estado->save();

        $estado = new Estado();
        $estado->nb_estado = 'Nueva Esparta';
        $estado->save();

        $estado = new Estado();
        $estado->nb_estado = 'Portuguesa';
        $estado->save();

        $estado = new Estado();
        $estado->nb_estado = 'Sucre';
        $estado->save();

        $estado = new Estado();
        $estado->nb_estado = 'Táchira';
        $estado->save();

        $estado = new Estado();
        $estado->nb_estado = 'Trujillo';
        $estado->save();

        $estado = new Estado();
        $estado->nb_estado = 'Vargas';
        $estado->save();

        $estado = new Estado();
        $estado->nb_estado = 'Yaracuy';
        $estado->save();

        $estado = new Estado();
        $estado->nb_estado = 'Zulia';
        $estado->save();

        $gradoMin= new Grado_Ministerial();
        $gradoMin->nb_grado_ministerial='Colaborador';
        $gradoMin->save();

        $gradoMin= new Grado_Ministerial();
        $gradoMin->nb_grado_ministerial='Laico';
        $gradoMin->save();


        $gradoMin= new Grado_Ministerial();
        $gradoMin->nb_grado_ministerial='Licenciado';
        $gradoMin->save();


        $gradoMin= new Grado_Ministerial();
        $gradoMin->nb_grado_ministerial='Ministro Ordenado';
        $gradoMin->save();


        $gradoIns= new Grado_Instruccion();
        $gradoIns->nb_grado_instruccion='Primaria';
        $gradoIns->save();

        $gradoIns= new Grado_Instruccion();
        $gradoIns->nb_grado_instruccion='Bachiller';
        $gradoIns->save();


        $gradoIns= new Grado_Instruccion();
        $gradoIns->nb_grado_instruccion='TSU';
        $gradoIns->save();

        $gradoIns= new Grado_Instruccion();
        $gradoIns->nb_grado_instruccion='Ingeniero';
        $gradoIns->save();

        $gradoIns= new Grado_Instruccion();
        $gradoIns->nb_grado_instruccion='Licenciado';
        $gradoIns->save();

        $gradoIns= new Grado_Instruccion();
        $gradoIns->nb_grado_instruccion='Majister';
        $gradoIns->save();

        $gradoIns= new Grado_Instruccion();
        $gradoIns->nb_grado_instruccion='Doctorado';
        $gradoIns->save();


        $Nacionalidad= new Nacionalidad();
        $Nacionalidad->nb_nacionalidad='Venezolano';
        $Nacionalidad->save();

        $Nacionalidad= new Nacionalidad();
        $Nacionalidad->nb_nacionalidad='Extranjero';
        $Nacionalidad->save();


        
        $tipo_sangre= new TipoSangre();
        $tipo_sangre->nb_tipo_sangre ='Sin recordar';
        $tipo_sangre->save();

        $tipo_sangre= new TipoSangre();
        $tipo_sangre->nb_tipo_sangre ='A Positiva';
        $tipo_sangre->save();

        $tipo_sangre= new TipoSangre();
        $tipo_sangre->nb_tipo_sangre ='A Negativo';
        $tipo_sangre->save();

        $tipo_sangre= new TipoSangre();
        $tipo_sangre->nb_tipo_sangre ='B Positivo';
        $tipo_sangre->save();

        $tipo_sangre= new TipoSangre();
        $tipo_sangre->nb_tipo_sangre ='B Negativo';
        $tipo_sangre->save();

        $tipo_sangre= new TipoSangre();
        $tipo_sangre->nb_tipo_sangre ='O Positivo';
        $tipo_sangre->save();

        $tipo_sangre= new TipoSangre();
        $tipo_sangre->nb_tipo_sangre ='O Negativo';
        $tipo_sangre->save();

        $tipo_sangre= new TipoSangre();
        $tipo_sangre->nb_tipo_sangre ='AB Positivo';
        $tipo_sangre->save();

        $tipo_sangre= new TipoSangre();
        $tipo_sangre->nb_tipo_sangre ='AB Negativo';
        $tipo_sangre->save();

        $tipo_local= new Tipolocal();
        $tipo_local->nb_nombre ='Alquilado';
        $tipo_local->save();


        $tipo_local= new Tipolocal();
        $tipo_local->nb_nombre ='Propio';
        $tipo_local->save();




    }
}
