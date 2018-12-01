<?php

use Illuminate\Database\Seeder;

class datosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datos = array(
            [
            'ublicacion'=>'Calle 10 - Carrera 10 - Edificio 10 - etc',
            'texto_contacto'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem quisquam, earum vel doloremque, sequi iusto, vero iure cumque delectus quidem sint voluptatum expedita totam odio inventore et magnam distinctio nostrum? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eos recusandae quaerat voluptates quibusdam ipsa ex reiciendis aspernatur fugiat enim eum illo, nisi explicabo ad accusantium corporis culpa blanditiis, adipisci quasi animi? Dolorem architecto enim nemo, sequi nulla explicabo vero possimus.',
            'condiciones_compra'=>'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusamus veritatis tenetur soluta quo ipsum eum odit porro reiciendis sapiente. Odio maiores culpa neque voluptas commodi totam earum incidunt, velit eos! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero cum ab necessitatibus, quidem dicta quasi velit voluptatibus ex, quaerat dolor consequatur architecto officia? Nesciunt cum facilis repellendus? Molestiae, perspiciatis ab?', 'email'=>'producto@producto.com',
            'telefono'=>'00-000-000-00',
            'visitas'=>'162',
            'analitycs'=>"UA-117200171-1",
            'mapa'=>'<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d194348.13981091083!2d-3.8196208010396684!3d40.43786975934314!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd422997800a3c81%3A0xc436dec1618c2269!2zTWFkcmlkLCBFc3Bhw7Fh!5e0!3m2!1ses!2sve!4v1519906555906" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>'
            ]);
        \App\dato::insert($datos);
    }
}
